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
Route::get('/feedback/{id}', [\App\Http\Controllers\AtsiliepimasController::class, 'getEventFeedback'])->name('feedback');

//----------------------------Admin based routes--------------------------------------
Route::get('/admin', [\App\Http\Controllers\AdminController::class, 'indexAdmin']);
Route::get('/admin/getEvents', [\App\Http\Controllers\AdminController::class, 'getEventsAdmin']);
Route::get('/admin/getUsers', [\App\Http\Controllers\AdminController::class, 'getUsersAdmin']);
Route::get('/admin/promoteEvent', [\App\Http\Controllers\AdminController::class, 'promoteEventAdmin']);

//----------------------------Cart based routes--------------------------------------
Route::get('/cart/{id_cart}', [\App\Http\Controllers\KrepselisController::class, 'getTickets'])->name('cart');
Route::get('/admin/blockEvent', [\App\Http\Controllers\AdminController::class, 'blockEventAdmin']);
Route::get('/admin/unconfirmedAccounts', [\App\Http\Controllers\AdminController::class, 'getUnconfirmedAccounts']);
Route::get('/admin/confirmAccount', [\App\Http\Controllers\AdminController::class, 'confirmAccount']);
Route::get('/admin/editUserPirkejas', [\App\Http\Controllers\AdminController::class, 'getDataForEditPirkejasAdmin']);
Route::get('/admin/deleteUser', [\App\Http\Controllers\AdminController::class, 'deleteUserAdmin']);
Route::get('/admin/editUserPardavejas', [\App\Http\Controllers\AdminController::class, 'getDataForEditPardavejasAdmin']);
Route::post('confirmEditPardavejas', [\App\Http\Controllers\AdminController::class, 'confirmEditPardavejas']);

//----------------------------User based routes----------------------------------------
Route::get('login', [\App\Http\Controllers\VartotojasController::class, 'loginload']);
Route::post('loginconfirm', [\App\Http\Controllers\VartotojasController::class, 'login']);
Route::get('logout', [\App\Http\Controllers\VartotojasController::class, 'logout']);
Route::get('register', [\App\Http\Controllers\VartotojasController::class, 'registerload']);
Route::post('naujasVartotojas', [\App\Http\Controllers\VartotojasController::class, 'registerNew']);

//-----------------------------Pardavejas based routes---------------------------------
Route::get('settings2', [\App\Http\Controllers\PardavejasController::class, 'settings']);
//-----------------------------Pirkejas based routes---------------------------------
Route::get('settings3', [\App\Http\Controllers\PirkejasController::class, 'settings']);
Route::post('keistiDuomenis3', [\App\Http\Controllers\PirkejasController::class, 'keistiDuomenis']);
//-----------------------------Adminas based routes---------------------------------
Route::get('settings1', [\App\Http\Controllers\AdminController::class, 'settings']);
