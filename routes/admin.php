<?php

use App\Http\Controllers\admin\LoginController;
use App\Http\Controllers\admin\AdminController;
use Illuminate\Support\Facades\Route;

//
//Route::get('admin', function () {
//    return view('admin/index');
//})->name('admin');

Route::get('admin', [LoginController::class, 'index'])->name('admin');
Route::post('admin', [LoginController::class, 'Login']);
Route::get('admin/logout', [loginController::class, 'logout'])->name('adminLogout');

Route::group(['prefix' => 'admin', 'middleware' => ['check.role.login', 'admin.auth']], function () {
    // Admin Dashboard
    Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');
});
