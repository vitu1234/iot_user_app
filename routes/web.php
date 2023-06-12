<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/public/login', [App\Http\Controllers\AuthController::class, 'loginView'])->name("login");
Route::get('/public/register', [App\Http\Controllers\AuthController::class, 'registerView'])->name("register");
Route::post('/public/registeruser', [App\Http\Controllers\AuthController::class, 'store'])->name("registeruser");
Route::post('/public/loginuser', [App\Http\Controllers\AuthController::class, 'store'])->name("loginuser");
