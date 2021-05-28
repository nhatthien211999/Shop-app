<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Category;
class HomeAPI extends Controller
{
    public function BestSell()
    {
        $categoryID = Category::all('id')->take(3);
        // $categories=Category::whereIn('id',$categoryID)->get();
        $menu=Menu::whereIn('category_id',$categoryID);
        //dd($menu->get());
        $productCollection=Product::whereIn('menu_id',$menu->get('id'))->paginate(8);
        $menu=$menu->get();
        // dd($menu);
        return response()->json(array('productCollection'=>$productCollection ,'menu'=>$menu),200);


    }




}
