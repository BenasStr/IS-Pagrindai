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
