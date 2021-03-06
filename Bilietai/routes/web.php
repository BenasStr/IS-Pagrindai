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
Route::get('settings1', [\App\Http\Controllers\AdminController::class, 'settings']);
Route::get('/admin/blockEvent', [\App\Http\Controllers\AdminController::class, 'blockEventAdmin']);
Route::get('/admin/unconfirmedAccounts', [\App\Http\Controllers\AdminController::class, 'getUnconfirmedAccounts']);
Route::get('/admin/confirmAccount', [\App\Http\Controllers\AdminController::class, 'confirmAccount']);
Route::get('/admin/editUserPirkejas', [\App\Http\Controllers\AdminController::class, 'getDataForEditPirkejasAdmin']);
Route::get('/admin/deleteUserPirkejas', [\App\Http\Controllers\AdminController::class, 'deleteUserPirkejasAdmin']);
Route::get('/admin/editUserPardavejas', [\App\Http\Controllers\AdminController::class, 'getDataForEditPardavejasAdmin']);
Route::post('confirmEditPardavejas', [\App\Http\Controllers\AdminController::class, 'confirmEditPardavejas']);
Route::post('confirmEditPirkejas', [\App\Http\Controllers\AdminController::class, 'confirmEditPirkejas']);
Route::get('/admin/deleteUserPardavejas', [\App\Http\Controllers\AdminController::class, 'deleteUserPardavejasAdmin']);
Route::post('/admin/filteredUserRequest', [\App\Http\Controllers\AdminController::class, 'getFilteredUsersAdmin']);
Route::get('admin/getReviewsAdmin', [\App\Http\Controllers\AdminController::class, 'getReviewAdmin']);
Route::get('admin/deleteReview', [\App\Http\Controllers\AdminController::class, 'deleteReviewsAdmin']);

//----------------------------Cart based routes--------------------------------------
Route::get('/cart/{id_cart}', [\App\Http\Controllers\KrepselisController::class, 'getTickets'])->name('cart');

//----------------------------Cart based routes--------------------------------------
Route::get('/cart/{id_cart}', [\App\Http\Controllers\KrepselisController::class, 'getTickets'])->name('cart');
Route::get('/addToCart/{id}', [\App\Http\Controllers\KrepselisController::class, 'addToCart'])->name('addToCart');
Route::get('/deleteCart/{id}', [\App\Http\Controllers\KrepselisController::class, 'deleteCart'])->name('deleteCart');
Route::get('/addTicket/{id}', [\App\Http\Controllers\KrepselisController::class, 'addTicket'])->name('addTicket');
Route::get('/removeTicket/{id}', [\App\Http\Controllers\KrepselisController::class, 'removeTicket'])->name('removeTicket');

//----------------------------User based routes----------------------------------------
Route::get('login', [\App\Http\Controllers\VartotojasController::class, 'loginload']);
Route::post('loginconfirm', [\App\Http\Controllers\VartotojasController::class, 'login']);
Route::get('logout', [\App\Http\Controllers\VartotojasController::class, 'logout']);
Route::get('register', [\App\Http\Controllers\VartotojasController::class, 'registerload']);
Route::post('naujasVartotojas', [\App\Http\Controllers\VartotojasController::class, 'registerNew']);

//-----------------------------Pardavejas based routes---------------------------------
Route::get('settings2', [\App\Http\Controllers\PardavejasController::class, 'settings']);
Route::post('keistiDuomenis2', [\App\Http\Controllers\PardavejasController::class, 'keistiDuomenis']);
//-----------------------------Pirkejas based routes---------------------------------
Route::get('settings3', [\App\Http\Controllers\PirkejasController::class, 'settings']);
Route::post('keistiDuomenis3', [\App\Http\Controllers\PirkejasController::class, 'keistiDuomenis']);
//-----------------------------Adminas based routes---------------------------------
Route::get('settings1', [\App\Http\Controllers\AdminController::class, 'settings']);
Route::post('keistiDuomenis1', [\App\Http\Controllers\AdminController::class, 'keistiDuomenis']);


//-----------------------------Istorija based routes---------------------------------
Route::get('Istorija', [\App\Http\Controllers\IstorijaController::class, 'rodytiIstorija']);
Route::post('perziuretiDetaliau', [\App\Http\Controllers\IstorijaController::class, 'perziuretiDetaliau']);
Route::post('atsiliepimai', [\App\Http\Controllers\IstorijaController::class, 'atsiliepimai']);
Route::post('naujasAtsiliepimas', [\App\Http\Controllers\IstorijaController::class, 'naujasAtsiliepimas']);
//-----------------------------Pirkejas based routes---------------------------------
Route::get('settings3', [\App\Http\Controllers\PirkejasController::class, 'settings']);
Route::post('keistiDuomenis3', [\App\Http\Controllers\PirkejasController::class, 'keistiDuomenis']);


//-----------------------------Renginys based routes---------------------------------
Route::get('renginiulangas', [\App\Http\Controllers\RenginysController::class, 'atidarytilanga']);
Route::post('rengkurimas', [\App\Http\Controllers\RenginysController::class, 'rkurimas']);
Route::get('/eventedit/{id}', [\App\Http\Controllers\RenginysController::class, 'rredagavimas'])->name('rredagavimas');
Route::post('/renginionaujinimas/{id}', [\App\Http\Controllers\RenginysController::class, 'naujinimas']);
Route::get('/salintirengini/{id}', [\App\Http\Controllers\RenginysController::class, 'delete'])->name('delete');
Route::post('kurtinuolaida/{id}', [\App\Http\Controllers\RenginysController::class, 'kurtinuolaida'])->name('kurtinuolaida');
Route::get('nuolaidoslangas/{id}', [\App\Http\Controllers\RenginysController::class, 'nuolaidoslangas'])->name('nuolaidoslangas');

//-----------------------------Bilietas based routes---------------------------------
Route::get('/bilietulangas/{id}', [\App\Http\Controllers\BilietasController::class, 'atidarytilangab'])->name('bilietulangas');
Route::post('bilietukurimas/{id}', [\App\Http\Controllers\BilietasController::class, 'bkurimas']);
