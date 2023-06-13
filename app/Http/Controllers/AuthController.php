<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\ChirpstackAPIs;


class AuthController extends Controller
{
    public $chirpstackAPI;

    public function __construct()
    {
        $this->chirpstackAPI = new ChirpstackAPIs();
//        $this->middleware(CheckAuthMiddleware::class)->only(['registerView']);
    }


    /**
     * Display a listing of the resource.
     */
    public function loginView()
    {
//        echo "<pre>";
//        print_r($this->chirpstackAPI->sendGetrequest("device-profile-templates"));
//        echo "</pre>";
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

        $data = [
            'application' => [
                'description' => 'Application for ' . $username,
                'name' => $email,
                'tenantId' => env("CHIRPSTACK_TENANT_ID")
            ]
        ];
        //CREATE CHIRPSTACK APPLICATION
        $saveChirpStackApp = $this->chirpstackAPI->sendPostRequest("applications", $data);
        if ($saveChirpStackApp['error']) {
            return redirect("/public/register")->with(['status' => 'error', 'message' => 'An error occurred accessing external services!']);
        }

        $application_id = $saveChirpStackApp['data']['id'];
        $getSavedUser = DB::connection('pgsql')->select(
            'SELECT *
                    FROM users
                    WHERE email = :email
                    AND username = :username LIMIT 1',
            [
                'email' => $email,
                'username' => $username
            ]
        );

        $user_id = $getSavedUser[0]->user_id;

        //save application ID
        $saveAppID = DB::connection('pgsql')->insert(
            'INSERT INTO user_application (
                   user_id,
                   application_id,
                   created_at,
                   updated_at
                    ) VALUES (?, ?, ?, ?)',
            [
                $user_id,
                $application_id,
                $date_created,
                $date_created
            ]
        );

        if ($saveUser && $saveAppID) {
            return redirect("/public/login")->with(['status' => 'success', 'message' => 'Account created, login to continue!']);
        } else {
            return redirect("/public/register")->with(['status' => 'error', 'message' => 'Account not created']);
        }
    }


    public function login(Request $request)
    {

        $request->validate([
            'login' => 'required',
            'password' => 'required',
        ], [
            'login.required' => 'Username or email is required'
        ]);

        $login = $request->input('login');
        $password = $request->input('password');

        $user = DB::connection('pgsql')->select(
            'SELECT *
                    FROM users
                    WHERE email = :email
                    OR username = :username',
            [
                'email' => $login,
                'username' => $login
            ]
        );
        if (count($user) == 0) {
            return back()->withErrors(['login' => 'Invalid credentialsff'])->onlyInput('login');
        }
        if (!$user || !password_verify($password, $user[0]->password)) {
            return back()->withErrors(['login' => 'Invalid credentialfs'])->onlyInput('login');
        }

        $credentials = $request->only(['password']);
        // Check if the login value is an email
        if (filter_var($request->input('login'), FILTER_VALIDATE_EMAIL)) {
            // If it's an email, set the email key
            $credentials['email'] = $request->input('login');
        } else {
            // If it's not an email, set the username key
            $credentials['username'] = $request->input('login');
        }


        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/user/dashboard');
        }
        return back()->withErrors(['login' => 'Invalid credentialsf'])->onlyInput('login');


    }


}
