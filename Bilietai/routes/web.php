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
Route::get('/event/{id}', [\App\Http\Controllers\RenginysController::class, 'getEvent'])->name('event');
Route::post('/search', [\App\Http\Controllers\RenginysController::class, 'getFilteredEvents']);

//----------------------------Admin based routes--------------------------------------
Route::get('/admin', [\App\Http\Controllers\AdminController::class, 'indexAdmin']);
Route::get('/admin/getEvents', [\App\Http\Controllers\AdminController::class, 'getEventsAdmin']);
Route::get('/admin/getUsers', [\App\Http\Controllers\AdminController::class, 'getUsersAdmin']);
Route::get('/admin/promoteEvent', [\App\Http\Controllers\AdminController::class, 'promoteEventAdmin']);

//----------------------------Cart based routes--------------------------------------
Route::get('/cart/{id_cart}', [\App\Http\Controllers\KrepselisController::class, 'getTickets'])->name('cart');
