<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductAPI extends Controller
{
    public function index(){

        $products = Controller::AllProduct();

        return response()->json(compact('products'));

    }


    public function listShopProduct(Request $request)
    {
        // $shop = Auth::user()->shop;
        //Nhom all Menu
        $menus = Menu::where('shop_id', $request['shopID'])->get('id');
        // dd($menus);
        $products = Product::whereIn('menu_id', $menus)->paginate(9);   

        return response()->json(compact('products'));

    }

    public function myShopProductCategory(Request $request)
    {

        $products = Product::where('menu_id', $request['menuID'])->paginate(9);   

        return response()->json(compact('products'));

    }

    public function listShop(Request $request)
    {

        $shops = DB::table('shops')->paginate(8);

        return response()->json(compact('shops'));

    }

}
