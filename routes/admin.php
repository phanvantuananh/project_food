<?php

use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('admin', [LoginController::class, 'formLogin'])->name('admin-login');
Route::post('admin', [LoginController::class, 'Login']);
Route::get('admin/logout', [loginController::class, 'logout'])->name('adminLogout');

Route::group(['prefix' => '/', 'middleware' => 'check.role.login'], function () {
    Route::get('admin/index', [LoginController::class, 'index'])->name('index');
    Route::get('admin/index/', function () {
        return view('admin.index');
    });
    Route::resource('admin/user', \Admin\ManagerUserController::class);
    Route::resource('admin/category', \Admin\ManagerCategoryController::class);
    Route::resource('admin/product', \Admin\ManagerProductController::class);
    Route::resource('admin/order', \Admin\ManagerOrderController::class);
    Route::resource('admin/order_item', \Admin\ManagerOrderItemController::class);
});
