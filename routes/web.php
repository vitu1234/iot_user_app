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
Route::post('/public/loginuser', [App\Http\Controllers\AuthController::class, 'login'])->name("loginuser");

Route::get('/user/dashboard', [App\Http\Controllers\UserAppController::class, 'index'])->name("dashboard");
Route::get('/user/devices', [App\Http\Controllers\DevicesController::class, 'index'])->name("devices");
Route::get('/user/devices/add', [App\Http\Controllers\DevicesController::class, 'showAddForm'])->name("add_device");
Route::get('/user/devices/device_type', [App\Http\Controllers\DevicesController::class, 'device_type'])->name("device_type");
