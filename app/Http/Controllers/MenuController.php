<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Menu;
use App\Models\Product;

class MenuController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->only('index');
    }

    function index($id = null){
        $products = [];
        if($id != null){
            $shop = Auth::user()->shop;
            
            if($shop){
                $menus = Menu::where('shop_id', $shop->id)->get('id');
                $products = Product::whereIn('menu_id', $menus)->paginate(9);  
            }
            return view('content.content-myshop', compact('products'));  
              
        }
        return view('content.content-myshop', compact('products'));
    }

    function create()
    {
        $categories = Category::all();
        return view('form-create.create-menu', compact('categories'));
    }

    function store(Request $request, $id){

        $menu = Menu::create([
            'shop_id' => $id,
            'category_id' => $request->input('category_id'),
            'type' => $request->input('type')
        ]);

        if($menu){
            return redirect()->back()->with('message', 'Tao Menu thanh cong');
        }
        return redirect()->back()->with('message', 'Tao Menu that bai');
    }
}
