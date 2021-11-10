<?php

use App\Http\Controllers\SocialiteAuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

###################
# GUEST
###################

Route::get('/home', function () {
    return view('home');
});
Route::get('login', function () {
    return view('login');
});
Route::get('register', function () {
    return view('register');
});
Route::get('google', [SocialiteAuthController::class, 'googleRedirect'])->name('auth/google');
Route::get('/auth/google/callback', [SocialiteAuthController::class, 'loginWithGoogle']);
Route::get('/test', [\App\Http\Controllers\TestController::class, 'index']);
###################
# AUTH
###################
