<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categoryID = Category::all('id')->take(3);
        $categories=Category::whereIn('id',$categoryID)->get();
        $menu=Menu::whereIn('category_id',$categoryID);
        //dd($menu->get());
        $productCollection=Product::whereIn('menu_id',$menu->get('id'))->paginate(8);
        $menu=$menu->get();
        // dd($menu);
        //return response()->json(array('productCollection'=>$productCollection ,'menu'=>$menu),200);
        return view('content.content-home', compact('menu', 'categories','productCollection'));
        //return view('home');
    }
    
    public function home() {
        return view('home');
    }
}
