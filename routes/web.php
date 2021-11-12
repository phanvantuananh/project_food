<?php

use App\Http\Controllers\CustomAuthController;
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
Route::group(['prefix' => '/', 'middleware' => 'check.login'], function () {
    Route::get('login', [CustomAuthController::class, 'index'])->name('login');
    Route::post('login', [CustomAuthController::class, 'customLogin']);
    Route::get('register', [CustomAuthController::class, 'register'])->name('register');
    Route::post('register', [CustomAuthController::class, 'customRegister']);
    Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');


    Route::get('google', [SocialiteAuthController::class, 'googleRedirect'])->name('auth/google');
    Route::get('/auth/google/callback', [SocialiteAuthController::class, 'loginWithGoogle']);
    Route::get('facebook', [SocialiteAuthController::class, 'facebookRedirect'])->name('auth/facebook');
    Route::get('auth/facebook/callback', [SocialiteAuthController::class, 'loginWithFacebook']);
});


###################
# AUTH
###################
