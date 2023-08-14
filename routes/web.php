<?php

use App\Http\Controllers\Dashboard1Controller;
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


Route::resource('dashboard', Dashboard1Controller::class)->only('index',);


Route::get('profile', function () {
    return view('profile');
})->name('profile');

Route::get('/login', function () {
    return view('Auth.login');
})->name('login');
