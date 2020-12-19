<?php

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

//----------------------------Event based routes--------------------------------------
Route::get('/', [\App\Http\Controllers\RenginysController::class, 'getAllEvents']);

//----------------------------Admin based routes--------------------------------------
Route::get('/admin', [\App\Http\Controllers\AdminController::class, 'index']);
Route::get('/admin/getEvents', [\App\Http\Controllers\AdminController::class, 'getEvents']);
Route::get('/admin/getUsers', [\App\Http\Controllers\AdminController::class, 'getUsers']);
