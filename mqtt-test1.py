import paho.mqtt.client as mqtt

# The callback for when the client receives a CONNACK response from the server.
def on_connect(client, userdata, flags, rc):
    print("Connected with result code "+str(rc))

    # client.subscribe("application/+/device/+/event/+")
    client.subscribe([("application/+/device/+/event/up", 0), ("application/+/device/+/event/status", 0), ("application/+/device/+/event/join", 0),("application/+/device/+/event/ack", 0),("application/+/device/+/event/txack", 0), ("application/+/device/+/event/log", 0)])

# The callback for when a PUBLISH message is received from the server.
def on_message(client, userdata, msg):
    print(msg.topic+" ")
    # print(" "+str(msg.payload))

client = mqtt.Client()
client.on_connect = on_connect
client.on_message = on_message

client.connect("192.168.13.164", 1883, 60)

# Blocking call that processes network traffic, dispatches callbacks and
# handles reconnecting.
# Other loop*() functions are available that give a threaded interface and a
# manual interface.
client.loop_forever()
