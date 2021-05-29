<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
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

Route::get('/', [HomeController::class, 'index']);

Route::get('/details', function () {
    return view('content.content-details');
});



Route::get('/checkout', function () {
    return view('content.content-checkout');
});

Route::get('/blog', function () {
    return view('content.content-blog');
});

Route::get('/blogdetails', function () {
    return view('content.content-blogdetails');
});

//Route::get('/grid',[ProductController::class, 'index']);
//Route::get('/listProduct/{idCategory}',[ProductController::class, 'listProducts']);

Route::get('/contact', function () {
    return view('content.content-contact');
});

Route::get('/myshop', function () {
    return view('content.content-myshop');
});


Route::prefix('products')->namespace('Products')->name('products.')->group(function(){
    Route::get('/',[ProductController::class, 'index']);
    Route::get('/{id}', [ProductController::class, 'show'])->name('dashboard');
    Route::get('/categories/{id}',[ProductController::class, 'listProducts'])->name('category');


});

Route::prefix('carts')->namespace('Carts')->name('carts.')->group(function(){
    Route::get('/cart', function () {
        return view('content.content-cart');
    })->name('view');
    Route::post('/add-to-cart', [CartController::class, 'addCart']);
    Route::get('/update-cart', [CartController::class, 'update']);
    Route::get('/delete/{session_id}', [CartController::class, 'destroy']);
    Route::get('/delete', [CartController::class, 'destroyAll']);
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
