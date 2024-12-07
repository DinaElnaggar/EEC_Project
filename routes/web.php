<?php

use App\Http\Controllers\ProductSearchController;
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
Route::get('/',function (){
    return redirect()->route('products.index');
})->name('frontend.index');

Route::get('/product/search', [ProductSearchController::class, 'search'])->name('product.search');

Route::resource('/products', \App\Http\Controllers\ProductController::class);

Route::resource('/pharmacies', \App\Http\Controllers\PharmacyController::class);

Route::resource('/products_search', \App\Http\Controllers\ProductSearchController::class);
