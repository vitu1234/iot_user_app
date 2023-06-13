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

    <form class="" id="add_device_form" autocomplete="off">
        <div class="row">
            <div class="col-md-6">
                <div class="form-floating mt-2">

                    <select required id="dropdown_menu_farms" name="farm_id" class="form-select form-select-md mb-3"
                            aria-label=".form-select-lg example">

                    </select>
                    <label class="text-dark" for="dropdown_menu_farms">Farm/Location</label>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-floating mb-3">
                    <input autocomplete="off" type="text" class="form-control " name="device_name" id="floatingInput2"
                           placeholder="Device Name">
                    <label class="text-dark" for="floatingInput2">Device Name</label>
                </div>
            </div>
        </div>

        <!--                <div class="row">-->
        <!--                    <div class="col-md-6">-->
        <!--                        <div class=" mb-3">-->
        <!--                            <textarea autocomplete="off" type="text" class="form-control " id="raw_readings_type" name="raw_readings_type"-->
        <!--                                      placeholder="Ex: humidity, temperature, soil_moisture"></textarea>-->
        <!--                            <label class="text-dark" for="readings_type">Measurements(s) Type <small class="text-danger-emphasis">(Sensor measurements type input one line separated by commas, *No spaces -only Underscore allowed)</small></label>-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                    <div class="col-md-6">-->
        <!--                        <div class=" mb-3">-->
        <!--                            <textarea autocomplete="off" type="text" class="form-control " id="raw_readings_units_type" name="raw_readings_units_type"-->
        <!--                                      placeholder="Ex:  °C, %, CM"></textarea>-->
        <!--                            <label class="text-dark" for="readings_type">Measurements(s) Units <small class="text-danger-emphasis">(Measurements units input one line separated by commas, *No spaces -only Underscore allowed)</small></label>-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                </div>-->
        <div class="row">
            <div class="col-md-12">
                <div class=" mb-3">
                            <textarea autocomplete="off" type="text" class="form-control " id="description"
                                      name="description"
                                      placeholder="Description"></textarea>
                    <label class="text-dark" for="textarea">Device Description</label>
                </div>
            </div>
        </div>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" id="add_device_btn" class="btn btn-outline-dark">Claim Device</button>
    </form>
@endsection
