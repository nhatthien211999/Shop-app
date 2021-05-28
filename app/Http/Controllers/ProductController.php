<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Menu;


class ProductController extends Controller
{
    function show($id){
        $product = Product::find($id);
        return view('content.content-details', compact('product'));
    }
    public function index(){
        $products = Controller::allProduct();
        return view('content.content-grid', compact('products'));
    }
    public function listProducts($idCategory){
        $menuID = Menu::where('category_id',$idCategory)->get('id');

        $products= Product::whereIn('menu_id',$menuID)->paginate(15);

        return view('content.content-grid', compact('products'));
    }


}
