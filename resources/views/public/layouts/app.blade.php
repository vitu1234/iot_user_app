<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'IoT Automator') }}</title>

    <!-- Fonts -->
    <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet">

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

    <link href="{{ asset('css/style.css')}}" rel="stylesheet">
</head>
<body class="d-flex h-100 text-center text-bg-secondary">

<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">


    @include('public.layouts.navigation')

    <!-- Page Content -->
    <main class="px-3 mt-5 mb-5">
        @yield('content')
    </main>


    @include('public.layouts.footer')
</div>
</body>

<script type="text/javascript" src="{{ asset('js/bootstrap.bundle.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/jquery-3.6.3.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(() => {
        // alert("ffj")
    })
</script>
</html>
