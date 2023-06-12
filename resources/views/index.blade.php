@extends('public.layouts.app')

@section('content')
    <main class="px-3">
        <h3>Welcome to {{ config('app.name', 'IoT Automator') }}</h3>
        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. A at commodi et ex, laudantium odit
            omnis? Corporis dolor doloribus excepturi molestias mollitia non, quae quasi reprehenderit rerum, veritatis
            vitae voluptas!</p>
        <p class="lead">
            <a href="#" class="btn btn-lg btn-light fw-bold border-white bg-white">Learn more</a>
        </p>
    </main>
@endsection
