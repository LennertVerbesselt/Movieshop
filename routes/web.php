<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Account\AccountController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\CartController;

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
Route::get('/', [GenreController::class, 'index'])->name('moviesbygenre');
Route::get('/dashboard', [GenreController::class, 'index'])->name('dashboard');

Route::post('/filter', [GenreController::class, 'filter']);

Route::post('addcart', [CartController::class, 'addToCart'])->name('addcart');
Route::post('deletecart', [CartController::class, 'deleteCart'])->name('deletecart');

Route::get('/account', [AccountController::class, 'index'])->middleware('auth')->name('account');

Route::get('/updatedeliveryaddress', [AccountController::class, 'updateDeliveryAddressForm'])->middleware('auth')->name('updatedeliveryaddressform');

Route::post('/updatedeliveryaddress', [AccountController::class, 'updateDeliveryAddress'])->middleware('auth')->name('updatedeliveryaddress');




require __DIR__.'/auth.php';
