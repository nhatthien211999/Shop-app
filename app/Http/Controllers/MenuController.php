<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Menu;

class MenuController extends Controller
{
    function index(){
        
        return view('content.content-myshop');
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
