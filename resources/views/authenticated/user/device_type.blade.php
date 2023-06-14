@extends('authenticated.layouts.app')

@section('content')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2 text-center">Add {{ $devicetype }} Device </h1>

    </div>

    <form class="" id="add_device_form" autocomplete="off" action="add_{{ $devicetype }}_device" method="post">
        @csrf
        @include('authenticated.layouts.error_feedback')
        <div class="row">
            <div class="col-md-6">
                <div class="form-floating mb-3">
                    <input autocomplete="off" type="text" class="form-control " name="device_model" id="floatingInput2"
                           placeholder="Device Model">
                    <label class="text-dark" for="floatingInput2">Device Model</label>
                </div>
            </div>


            <div class="col-md-6">
                <div class="form-floating mb-3">
                    <input autocomplete="off" type="text" class="form-control " name="device_eui" id="floatingInput2"
                           placeholder="Device EUI (EUI64)">
                    <label class="text-dark" for="floatingInput2">Device EUI (EUI64)</label>
                </div>
            </div>



            <div class="col-md-6 mt-4">
                <button type="submit" id="add_device_btn" class="btn btn-outline-dark">Next</button>
            </div>
        </div>



    </form>
@endsection
