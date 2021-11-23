<?php

use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\SocialiteAuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|-------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

###################
# GUEST
###################
Route::get('home', function () {
    return view('client.home');
})->name('home');
Route::group(['prefix' => '/', 'middleware' => 'check.login'], function () {
    Route::get('login', [CustomAuthController::class, 'index'])->name('login');
    Route::post('login', [CustomAuthController::class, 'customLogin']);
    Route::get('register', [CustomAuthController::class, 'register'])->name('register');
    Route::post('register', [CustomAuthController::class, 'customRegister']);

    Route::get('google', [SocialiteAuthController::class, 'googleRedirect'])->name('auth/google');
    Route::get('/auth/google/callback', [SocialiteAuthController::class, 'loginWithGoogle']);
    Route::get('facebook', [SocialiteAuthController::class, 'facebookRedirect'])->name('auth/facebook');
    Route::get('auth/facebook/callback', [SocialiteAuthController::class, 'loginWithFacebook']);
});
Route::get('logout', [CustomAuthController::class, 'signOut'])->name('logout');
//information user
Route::get('home/information/{id}', [CustomAuthController::class, 'userViewInfo'])->name('user-information');
Route::post('home/information/{id}', [CustomAuthController::class, 'updateUserInformation']);
Route::get('home/change-password/{id}', [CustomAuthController::class, 'viewChangePassword'])->name('change-pass');
Route::post('home/change-password/{id}', [CustomAuthController::class, 'changePassword']);
//list product
Route::get('home/shop', [ShopController::class, 'index'])->name('shop');
Route::get('home/shop/category', [ShopController::class, 'lstProduct'])->name('lst-product');
//add to cart
// required login
Route::group(['prefix' => '/home/shop', 'middleware' => 'check.auth.login'], function () {
    Route::get('cart', [ShopController::class, 'cart'])->name('cart');
    Route::get('add-to-cart/{id}', [ShopController::class, 'addToCart'])->name('add-to-cart');
    Route::patch('update-cart', [ShopController::class, 'update'])->name('update.cart');
    Route::delete('remove', [ShopController::class, 'remove'])->name('remove.from.cart');
    Route::get('check-out', [ShopController::class, 'checkOut'])->name('check-out');
    Route::post('check-out', [ShopController::class, 'AddNewOrder']);
});
// product detail
Route::get('home/shop/product-detail/{id}', [ShopController::class, 'productDetail'])->name('product-detail');
