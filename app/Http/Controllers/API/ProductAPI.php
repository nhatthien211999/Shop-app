<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use App\Models\Menu;

class ProductAPI extends Controller
{
    public function index(){


        $products = Controller::AllProduct();

        return response()->json(compact('products'));

    }
    public function listProducts($idCategory){
        $menuID = Menu::where('category_id',$idCategory)->get('id');

        $products= Product::whereIn('menu_id',$menuID)->paginate(15);

        return view('content.content-grid', compact('products'));
    }



}
