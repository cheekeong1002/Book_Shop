<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PurchaseHistoryController;

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

Route::get('/header', [MainController::class, 'header']);
Route::get('/auth/login', [MainController::class, 'login'])->name('auth.login');
Route::get('/auth/register', [MainController::class, 'register'])->name('auth.register');
Route::post('/auth/save', [MainController::class, 'save'])->name('auth.save');
Route::post('/auth/check', [MainController::class, 'check'])->name('auth.check');
Route::get('/auth/logout', [MainController::class, 'logout'])->name('auth.logout');

Route::get('/', [BookController::class, 'getBookData'])->name('home');
Route::get('/getNextPage', [BookController::class, 'getNextPage'])->name('getNextPage');
Route::get('/getPreviousPage', [BookController::class, 'getPreviousPage'])->name('getPreviousPage');
Route::get('/addToCart1', [BookController::class, 'addToCart1'])->name('addToCart1');
Route::get('/addToCart2', [BookController::class, 'addToCart2'])->name('addToCart2');
Route::get('/addToCart3', [BookController::class, 'addToCart3'])->name('addToCart3');
Route::get('/addToCart4', [BookController::class, 'addToCart4'])->name('addToCart4');
Route::get('/addToCart5', [BookController::class, 'addToCart5'])->name('addToCart5');
Route::get('/storeAddToCartDetails', [BookController::class, 'storeAddToCartDetails'])->name('storeAddToCartDetails');
Route::get('/displayCurrentPage', [BookController::class, 'displayCurrentPage'])->name('displayCurrentPage');
Route::get('/getCartIconInfo', [BookController::class, 'getCartIconInfo'])->name('getCartIconInfo');

Route::get('/viewCart', [CartController::class, 'viewCart'])->name('viewCart');
Route::get('/viewCart/{isbn}', [CartController::class, 'deleteBookInCart'])->name('deleteBookInCart');
Route::get('/incrementBook/{isbn}', [CartController::class, 'incrementBook'])->name('incrementBook');
Route::get('/decrementBook/{isbn}', [CartController::class, 'decrementBook'])->name('decrementBook');
Route::get('/clearCart', [CartController::class, 'clearCart'])->name('clearCart');

Route::get('/displayOrderDetail', [OrderController::class, 'displayOrderDetail'])->name('displayOrderDetail');
Route::get('/displayPaymentDetail', [OrderController::class, 'displayPaymentDetail'])->name('displayPaymentDetail');
Route::post('/checkout', [OrderController::class, 'checkout'])->name('checkout');

Route::get('/viewPurchaseHistory', [PurchaseHistoryController::class, 'viewPurchaseHistory'])->name('viewPurchaseHistory'); 