<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Support\Facades\Auth;

class ProductAPI extends Controller
{
    public function index(){


        $products = Controller::AllProduct();

        return response()->json(compact('products'));

    }


    public function myShop(Request $request)
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



}
