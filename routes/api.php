<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ProductAPI;
use App\Http\Controllers\API\HomeAPI;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\API\CommentAPI;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/grid', [ProductAPI::class, 'index']);

Route::POST('/my-shop', [ProductAPI::class, 'listShopProduct']);

Route::get('/bestSell', [HomeAPI::class, 'BestSell']);

Route::POST('/my-shop-category-product', [ProductAPI::class, 'myShopProductCategory']);
Route::POST('/createCmt',[CommentAPI::class, 'createComment']);

Route::get('/list-shop', [ProductAPI::class, 'listShop']);






