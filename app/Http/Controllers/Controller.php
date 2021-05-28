<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Product;
use App\Models\Menu;
use App\Models\Category;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function allProduct(){
        $products = Product::paginate(12);
        return $products;
    }
    public function listProduct($idCategory){
        $products = Product::menu()->where('category_id', $idCategory)->paginate(12);
        return $products;
    }


}
