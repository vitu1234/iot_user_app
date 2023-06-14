@extends('authenticated.layouts.app')

@section('content')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2 text-center">Add Device</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <!--                    <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal"-->
            <!--                            data-bs-target="#staticBackdrop">-->
            <!--                        <span data-feather="plus" class="align-text-bottom"></span>-->
            <!--                        Add Device-->
            <!--                    </button>-->
        </div>
    </div>

    <form class="" id="add_device_form" autocomplete="off" action="device_type" method="get">
        <div class="row">
            <div class="col-md-6">
                <div class="form-floating mt-2">

                    <select required id="dropdown_menu_farms" name="devicetype" class="form-select form-select-md mb-3"
                            aria-label=".form-select-lg example" >
                        <option value="wifi">WiFi</option>
                        <option value="lora">LoRa</option>
                        <option value="zigbee">ZigBee</option>
                        <option value="bluetooth">Bluetooth</option>
                    </select>
                    <label class="text-dark" for="dropdown_menu_farms">Device Type</label>
                </div>
            </div>

            <div class="col-md-6 mt-4">
                <button type="submit" id="add_device_btn" class="btn btn-outline-dark">Next</button>
            </div>
        </div>



    </form>
@endsection
