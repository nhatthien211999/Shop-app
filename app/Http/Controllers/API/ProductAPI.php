<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;

class ProductAPI extends Controller
{
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

            //return view('content.content-grid', compact('products'));
        //     }
        //     else{


        return response()->json(compact('products'));
        //     }
    }


}
