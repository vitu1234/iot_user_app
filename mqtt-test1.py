import base64
import json
import logging
import os
import paho.mqtt.client as mqtt
import psycopg2


db_user = os.getenv("DB_USER", "chirpstack") #set to default localhost to avoid program crashing
db_password= os.getenv("DB_PASSWORD", "chirpstack") #set to default localhost to avoid program crashing
host = os.getenv("HOST", "192.168.13.164") #set to default localhost to avoid program crashing
db_port = os.getenv("DB_PORT", "5432") #set to default localhost to avoid program crashing
db_name = os.getenv("DB_NAME", "postgres") #set to default localhost to avoid program crashing

# Define cursor variable with default value
logging.basicConfig(level=logging.DEBUG)
psycopg2.extensions.register_type(psycopg2.extensions.UNICODE)
def database_conn():
    try:

        connection = psycopg2.connect(user=db_user,
                                        password=db_password,
                                        host=host,
                                        port=db_port,
                                        database=db_name)
        return connection
        # cursor = connection.cursor()

        # postgres_insert_query = """ INSERT INTO mobile (ID, MODEL, PRICE) VALUES (%s,%s,%s)"""
        # record_to_insert = (5, 'One Plus 6', 950)
        # cursor.execute(postgres_insert_query, record_to_insert)

        # connection.commit()
        # count = cursor.rowcount
        # print(count, "Record inserted successfully into mobile table")
    except (psycopg2.Error, Exception) as error:
        print("Error connecting to the database:", error)
        return None





# The callback for when the client receives a CONNACK response from the server.
def on_connect(client, userdata, flags, rc):
    print("Connected with result code "+str(rc))

    # client.subscribe("application/+/device/+/event/+")
    client.subscribe([("application/+/device/+/event/up", 0), ("application/+/device/+/event/status", 0), ("application/+/device/+/event/join", 0),("application/+/device/+/event/ack", 0),("application/+/device/+/event/txack", 0), ("application/+/device/+/event/log", 0)])

# The callback for when a PUBLISH message is received from the server.
def on_message(client, userdata, msg):
    print(msg.topic+" ")
    string = msg.topic
    event_name = string.split("/")[-1]
    if event_name == "up":
        print("UP")
        connection = database_conn()
        if connection is not None:
            print("save device up data")

            decoded_message=str(msg.payload.decode("utf-8"))
            msg_json=json.loads(decoded_message)
            print(msg_json)

            tenantId = msg_json["deviceInfo"]["tenantId"] if "deviceInfo" in msg_json and "tenantId" in msg_json["deviceInfo"] else ""
            tenantName = msg_json["deviceInfo"]["tenantName"] if "deviceInfo" in msg_json and "tenantName" in msg_json["deviceInfo"] else ""
            applicationId = msg_json["deviceInfo"]["applicationId"] if "deviceInfo" in msg_json and "applicationId" in msg_json["deviceInfo"] else ""
            applicationName = msg_json["deviceInfo"]["applicationName"] if "deviceInfo" in msg_json and "applicationName" in msg_json["deviceInfo"] else ""
            deviceProfileId = msg_json["deviceInfo"]["deviceProfileId"] if "deviceInfo" in msg_json and "deviceProfileId" in msg_json["deviceInfo"] else ""
            deviceProfileName = msg_json["deviceInfo"]["deviceProfileName"] if "deviceInfo" in msg_json and "deviceProfileName" in msg_json["deviceInfo"] else ""
            deviceName = msg_json["deviceInfo"]["deviceName"] if "deviceInfo" in msg_json and "deviceName" in msg_json["deviceInfo"] else ""
            devEui = msg_json["deviceInfo"]["devEui"] if "deviceInfo" in msg_json and "devEui" in msg_json["deviceInfo"] else ""
            tags = None
            if "deviceInfo" in msg_json and "tags" in msg_json["deviceInfo"]:
                    if msg_json["deviceInfo"]["tags"] == "{}":
                        tags = None


            devAddr = msg_json["devAddr"] if "devAddr" in msg_json else ""
            time = msg_json["time"] if "time" in msg_json else ""

            region_name = msg_json["rxInfo"][0]["metadata"]["region_common_name"] if "rxInfo" in msg_json and len(msg_json["rxInfo"]) > 0 and "metadata" in msg_json["rxInfo"][0] and "region_common_name" in msg_json["rxInfo"][0]["metadata"] else ""
            latitude = msg_json["rxInfo"][0]["metadata"]["latitude"] if "rxInfo" in msg_json and len(msg_json["rxInfo"]) > 0 and "metadata" in msg_json["rxInfo"][0] and "latitude" in msg_json["rxInfo"][0]["metadata"] else ""
            longitude = msg_json["rxInfo"][0]["metadata"]["longitude"] if "rxInfo" in msg_json and len(msg_json["rxInfo"]) > 0 and "metadata" in msg_json["rxInfo"][0] and "longitude" in msg_json["rxInfo"][0]["metadata"] else ""
            location_source = msg_json["rxInfo"][0]["location"]["source"] if "rxInfo" in msg_json and len(msg_json["rxInfo"]) > 0 and "location" in msg_json["rxInfo"][0] and "source" in msg_json["rxInfo"][0]["location"] else ""

            frequency = msg_json["txInfo"]["frequency"] if "txInfo" in msg_json and "frequency" in msg_json["txInfo"] else ""
            bandwidth = msg_json["txInfo"]["modulation"]["lora"]["bandwidth"] if "txInfo" in msg_json and "modulation" in msg_json["txInfo"] and "lora" in msg_json["txInfo"]["modulation"] and "bandwidth" in msg_json["txInfo"]["modulation"]["lora"] else ""
            spreadingFactor = msg_json["txInfo"]["modulation"]["lora"]["spreadingFactor"] if "txInfo" in msg_json and "modulation" in msg_json["txInfo"] and "lora" in msg_json["txInfo"]["modulation"] and "spreadingFactor" in msg_json["txInfo"]["modulation"]["lora"] else ""
            codeRate = msg_json["txInfo"]["modulation"]["lora"]["codeRate"] if "txInfo" in msg_json and "modulation" in msg_json["txInfo"] and "lora" in msg_json["txInfo"]["modulation"] and "codeRate" in msg_json["txInfo"]["modulation"]["lora"] else ""



            data = base64.b64decode(msg_json["data"]).decode('utf-8') if "data" in msg_json else ""

            confirmed = msg_json["confirmed"] if "confirmed" in msg_json else "False"

            cursor = connection.cursor()

         # Convert the dictionary to a sequence of values
            record_to_insert = (
                tenantId, tenantName, applicationId, applicationName, deviceProfileId,
                deviceProfileName, deviceName, devEui, devAddr, data, confirmed, latitude,
                longitude, bandwidth, frequency, spreadingFactor, codeRate, "LoRa", time,
                region_name, tags, location_source
            )

            print(record_to_insert)

            # Modify the INSERT query to match the number of columns
            postgres_insert_query = """
                INSERT INTO public.connected_devices (
                    tenant_id, tenant_name, application_id, application_name, device_profile_id,
                    device_profile_name, device_name, dev_eui, dev_addr, payload, confirmed, latitude,
                    longitude, bandwidth, frequency, spreading_factor, code_rate, device_type,
                    last_seen, region, tags, location_source
                )
                VALUES (
                    %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s
                )
            """
            cursor.execute(postgres_insert_query, record_to_insert)
            connection.commit()
            count = cursor.rowcount
            if connection:
                if cursor:
                    cursor.close()
                connection.close()
        else:
            print("error to connect to pgsql")
    elif event_name== "status":
        print("STATUS")
    elif event_name == "join":
        print("JOIN REQUEST")
    elif event_name == "ack":
        print("ACK EVENT")
    elif event_name == "txack":
        print("TXACK EVENT")
    elif event_name == "log":
        print("LOG")

client = mqtt.Client()
client.on_connect = on_connect
client.on_message = on_message

client.connect(host, 1883, 60)






# Blocking call that processes network traffic, dispatches callbacks and
# handles reconnecting.
# Other loop*() functions are available that give a threaded interface and a
# manual interface.
client.loop_forever()
