<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;

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
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Auth::routes();

Route::get('/checkout', function () {
    return view('content.content-checkout');
});

Route::get('/map-shop/{id}', [MapController::class, 'show'])->name('mapShop');

Route::get('/blog', function () {
    return view('content.content-blog');
});

Route::get('/blogdetails', function () {
    return view('content.content-blogdetails');
});


Route::get('/contact', function () {
    return view('content.content-contact');
});


Route::prefix('shops')->namespace('Shops')->name('shops.')->group(function(){

    Route::get('/create',[ShopController::class, 'create'])->name('create');

    Route::post('/store/{id}',[ShopController::class, 'store'])->name('store');
});

Route::prefix('menus')->namespace('Menus')->name('menus.')->group(function(){

    Route::get('/myshop/{id?}', [MenuController::class, 'index'])->name('index');

    Route::get('/create',[MenuController::class, 'create'])->name('create');

    Route::post('/store/{id}',[MenuController::class, 'store'])->name('store');
});

Route::prefix('products')->namespace('Products')->name('products.')->group(function(){

    Route::get('/',[ProductController::class, 'index'])->name('home');

    Route::get('/categories/{id}',[ProductController::class, 'listProducts'])->name('category');

    Route::get('/create',[ProductController::class, 'create'])->name('create');

    Route::post('/store',[ProductController::class, 'store'])->name('store');

    Route::get('delete/{id}', [ProductController::class, 'destroy'])->name('destroy');

    Route::get('edit/{id}', [ProductController::class, 'edit'])->name('edit');

    Route::post('/update/{id}',[ProductController::class, 'update'])->name('update');

    Route::get('/{id}', [ProductController::class, 'show'])->name('show');

});

Route::prefix('carts')->namespace('Carts')->name('carts.')->group(function(){
    Route::get('/cart', function () {
        return view('content.content-cart');
    })->name('view');
    Route::post('/add-to-cart', [CartController::class, 'addCart']);
    Route::get('/update-cart', [CartController::class, 'update']);
    Route::get('/delete/{session_id}', [CartController::class, 'destroy']);
    Route::get('/delete', [CartController::class, 'destroyAll'])->name('deleteAll');
});

Route::get('/shop-customer/{id}', [ShopController::class, 'categoryProduct'])->name('showProductOfCategory');

Route::get('/my-shop/{id}', [ShopController::class, 'categoryProductAuth'])->name('showProductOfCategoryAuth');

Route::get('/shop', [ShopController::class, 'index'])->name('listShop');



Route::get('/shop/{id}', [ShopController::class, 'show'])->name('shopDetails');

//Admin router
Route::prefix('admin')->namespace('Admin')->name('admin.')->group(function(){ 

});
