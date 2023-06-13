@extends('authenticated.layouts.app')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
        <h1 class="h2">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar" class="align-text-bottom"></span>
                This week
            </button>
        </div>
    </div>

    <!--            <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>-->

    <h3>Devices</h3>
    <div class="pt-3 pb-2 mb-3 border-top">
        <div class="row mt-4 " id="devices">


            <!--                    <div class="col-md-3">-->
            <!--                        <div class="card" style="width: 100%;">-->
            <!--                            <div class="card-body">-->
            <!--                                <h5 class="card-title"><strong>Pump 123</strong></h5>-->
            <!--                                <h6 class="card-subtitle mb-2 text-muted">Farm 1342</h6>-->
            <!--                                <p class="card-text">Temp: 25C <strong>|</strong> Humidity: 20% <strong>|</strong> Soil-->
            <!--                                    Moisture: 34%</p>-->
            <!---->
            <!--                                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">-->
            <!--                                    <input type="radio" class="btn-check" name="btnradio" id="btnradio1"-->
            <!--                                           autocomplete="off">-->
            <!--                                    <label class="btn btn-outline-secondary" for="btnradio1">ON</label>-->
            <!---->
            <!--                                    <input type="radio" class="btn-check" name="btnradio" id="btnradio2"-->
            <!--                                           autocomplete="off" checked>-->
            <!--                                    <label class="btn btn-outline-danger" for="btnradio2">OFF</label>-->
            <!---->
            <!--                                </div>-->
            <!--                                <br/><i><small class="text-secondary"><strong>NB:</strong> remember to turn off pump-->
            <!--                                        after using</small></i>-->
            <!--                            </div>-->
            <!--                        </div>-->
            <!--                    </div>-->


        </div>
    </div>
@endsection
