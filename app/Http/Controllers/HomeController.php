<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Menu;
use App\Models\Product;
use App\Models\User;
use Illuminate\Pagination\Paginator;

class HomeController extends Controller
{
    public function index(){
        $categories = Category::all()->take(3);

        $categoryID=null;
        foreach($categories as $value){
            if($categoryID==null)
                $categoryID=array($value->id);
            else{

               array_unshift($categoryID,$value->id);
            }
        }

        $menu=Menu::all();
        $menu=$menu->intersect(Menu::whereIn('category_id',$categoryID)->get());


        // dd($menu);

        $productCollection=array();

        foreach($menu as $value){
            var_dump($value->id);
            $products=Product::where('menu_id', $value->id)->paginate(1);

            if($productCollection==null){
                $productCollection=array($products);
            }
            else
            {
                array_unshift($productCollection,$products);
            }

        }



        return view('content.content-home', compact('menu', 'categories','productCollection'));
    }
}
