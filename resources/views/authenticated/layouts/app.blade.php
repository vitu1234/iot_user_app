<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'IoT Automator') }}</title>

    <!-- Fonts -->
    <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <meta name="theme-color" content="#712cf9">
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="{{ asset('css/dashboard.css')}}" rel="stylesheet">
</head>
<body>
@include('authenticated.layouts.topnavbar')

<div class="container-fluid">
    <div class="row">
        @include('authenticated.layouts.sidebar')

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            @yield('content')
        </main>
    </div>
</div>
<script src="{{ asset('js/bootstrap.bundle.min.js')}}" type="application/javascript"></script>

<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"
        crossorigin="anonymous"></script>
<script src="{{ asset('js/dashboard.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/jquery-3.6.3.min.js')}}"></script>
<script src="{{ asset('js/sweetalert2.js')}}"></script>

<script src="{{ asset('js/js.js')}}"></script>
<script>
    $(document).ready(() => {
        {{--get_all_user_devices_dashboard("<?php echo $access_token; ?>")--}}
    })
</script>
</body>
</html>
</body>
</html>
