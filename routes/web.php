<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;

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

// Route::get('/test', function () {
//     return view('test');
// });

Route::get('/', function () {
    return redirect('/customers');
});

Route::resource('customers', CustomerController::class);

// Route::get('/products', function () {
//     return view('products', [ProductController::class, 'index']);
// })->name('products');

Route::get('/products',[ProductController::class,'index'])->name('products');

Route::get('/orders', [OrderController::class, 'index'])->name('orders');

Route::get('/productnames', [ProductController::class, 'productnames'])->name('productnames');


