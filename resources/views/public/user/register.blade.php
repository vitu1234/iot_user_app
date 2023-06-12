@extends('public.layouts.app')

@section('content')
    <form id="user_register_form" method="post" action="registeruser" class="" autocomplete="off">
        @csrf
        <!--      <img class="mb-4" src="/docs/5.3/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">-->
        <h5 class="h5 mb-3 fw-normal"><strong>Register account</strong></h5>

        <div class="form1 px-md-5">
            @include('public.layouts.error_feedback')

            <div class="form-floating mb-3">
                <input autocomplete="off" type="text" class="form-control" id="username" name="username"
                       placeholder="Ex: JayJay" required/>
                <label class="text-dark" for="username">Username</label>
            </div>

            <div class="form-floating mb-3">
                <input autocomplete="off" type="text" class="form-control" id="first_name" name="first_name"
                       placeholder="Ex: John" required/>
                <label class="text-dark" for="first_name">First Name</label>
            </div>
            <div class="form-floating mb-3">
                <input autocomplete="off" type="text" class="form-control" id="last_name" name="last_name"
                       placeholder="Ex: Doe" required/>
                <label class="text-dark" for="last_name">Last Name</label>
            </div>


            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required/>
                <label class="text-dark" for="email">Email address</label>
            </div>

            <div class="form-floating mt-3 mb-1">
                <input type="password" class="form-control form-control-sm" id="password" name="password" required
                       placeholder="Password">
                <label class=" text-dark" for="password">Password</label>
            </div>

        </div>

        <input type="hidden" name="longtude" id="longtude" value="" required>
        <input type="hidden" name="latitude" id="latitude" value="" required>
        <input type="hidden" name="address" id="address" value="" required>


        <div class="form2 px-md-5">

            <small>By creating an account, you agree to our terms & conditions</small>

            <button id="btn_register" class="w-100 btn btn-md btn-dark text-light mt-3" type="submit">Finish Registration</button>
        </div>


    </form>
@endsection
