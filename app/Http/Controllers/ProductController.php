<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

class ProductController extends Controller
{
    public function index(){

        $products = Controller::ChangePage();

        return view('content.content-grid', compact('products'));

    }


}
