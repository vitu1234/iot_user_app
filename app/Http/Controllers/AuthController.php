<?php

namespace App\Http\Controllers;

use App\Http\Middleware\CheckAuthMiddleware;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{

    public function __construct()
    {
//        $this->middleware(CheckAuthMiddleware::class)->only(['registerView']);
    }


    /**
     * Display a listing of the resource.
     */
    public function loginView()
    {
        return view('public.user.login');
    }

    public function registerView()
    {

        return view('public.user.register');
    }

    /**
     * Show the form for creating a new resource.
     */


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);

        $first_name = $request->first_name;
        $last_name = $request->last_name;
        $username = $request->username;
        $email = $request->email;
        $date_created = date("Y/m/d H:i:s");
        try {
            $password = app('hash')->make($request->password);
        } catch (BindingResolutionException $e) {
        }
        $saveUser = DB::connection('pgsql')->insert(
            'INSERT INTO users (
                   username,
                   email,
                   password,
                   created_at,
                   updated_at,
                   first_name,
                   last_name
                    ) VALUES (?, ?, ?, ?, ?, ?, ?)',
            [
                $username,
                $email,
                $password,
                $date_created,
                $date_created,
                $first_name,
                $last_name
            ]
        );


        if ($saveUser) {
            return redirect("/public/login")->with(['status' => 'success', 'message' => 'Account created, login to continue!']);
        } else {
            return redirect("/public/register")->with(['status' => 'error', 'message' => 'Account not created']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
