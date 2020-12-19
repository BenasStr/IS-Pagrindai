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

Route::get('login', [\App\Http\Controllers\VartotojasController::class, 'loginload']);
Route::post('loginconfirm', [\App\Http\Controllers\VartotojasController::class, 'login']);
Route::get('logout', [\App\Http\Controllers\VartotojasController::class, 'logout']);
Route::get('register', [\App\Http\Controllers\VartotojasController::class, 'registerload']);
Route::post('naujasVartotojas', [\App\Http\Controllers\VartotojasController::class, 'registerNew']);
