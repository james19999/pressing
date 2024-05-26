<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PrecingController;
use App\Http\Controllers\PersmissionController;

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
    return view('welcome');
});

Auth::routes();

Route::resource('pressings',PrecingController::class);
Route::resource('orders',OrderController::class);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('users', UserController::class);

Route::resource('permissions',PersmissionController::class);
Route::resource('roles',RoleController::class);
Route::get('role-permission/{id}',[RoleController::class,'add_role_to_permission'])->name('add-role-permission');
Route::put('give-permission-to-role/{id}',[RoleController::class,'give_permission_to_role'])->name('give-permission-to-role');
