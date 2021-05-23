<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function show(Product $product){
        dd($product);
    }
    public function index(){

        // dd( Controller::ChangePage());
        $products = Controller::ChangePage();

        //         // var_dump($paginator->count());
        //     $urlCurrent =Route::current()->uri;

        //    // var_dump($urlCurrent);
        //     //dd();
        //     $urlCurrent=parse_url($urlCurrent);
        //     //dd($urlCurrent);
        //     if($products->currentPage()!=1)
        //     {

            return view('content.content-grid', compact('products'));
        //     }
        //     else{


        //return response()->json(compact('products'));
        //     }
    }

}
