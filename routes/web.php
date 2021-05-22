<?php

use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index']);

Route::get('/details', function () {
    return view('content.content-details');
});

Route::get('/cart', function () {
    return view('content.content-cart');
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

Route::get('/grid', function () {
    return view('content.content-grid');
});

Route::get('/contact', function () {
    return view('content.content-contact');
});


