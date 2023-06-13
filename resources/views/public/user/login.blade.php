@extends('public.layouts.app')

@section('content')
    <form method="post" id="login_form" class="px-md-5" action="loginuser">
        @csrf
        <!--      <img class="mb-4" src="/docs/5.3/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">-->
        <h5 class="h5 mb-3 fw-normal"><strong>Please sign in</strong></h5>
        @include('public.layouts.error_feedback')
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="email" required name="login"
                   placeholder="name@example.com">
            <label class="text-dark" for="email">Email address</label>
        </div>

        <div class="form-floating mt-3 mb-1">
            <input type="password" class="form-control" id="password" name="password" required
                   placeholder="Password">
            <label class="text-dark" for="password">Password</label>
        </div>
        <div class="form-floating mb-3">
            <a class="link-light float-end" href="#">Forgot Password?</a>
        </div>
        <button id="login_btn" class="w-100 btn btn-md btn-dark text-light mt-3" type="submit">Sign in</button>
    </form>
@endsection
