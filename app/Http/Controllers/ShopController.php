<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Menu;
use App\Models\Product;
class ShopController extends Controller
{
    function categoryProduct($menu_id){

        $products = Product::where('menu_id', $menu_id)->paginate(9);      

        return view('content.content-myshop-category-product', compact('products', 'menu_id'));
    }

    public function create(){
        return view('form-create.create-shop');
    }

    public function store(Request $request, $user_id){

        if($request->hasFile('image')){

            $filename = $request->file('image')->getClientOriginalName();

            $request->image->storeAs('images',$filename,'public');   

            $shop = Shop::create([                    
                'shop_name' => $request->input('name'),
                'user_id' => $user_id,
                'background' => $filename,
                'status' => 'active',
                'address' => $request->input('address'),
                'latitude' => $request->input('latitude'),
                'longitude' => $request->input('longitude'),
                ]);
        }
        else
        {
            $shop = Shop::create([                    
                'shop_name' => $request->input('name'),
                'user_id' => $user_id,
                'background' => '/',
                'status' => 'active',
                'address' => $request->input('address'),
                'latitude' => $request->input('latitude'),
                'longitude' => $request->input('longitude'),
                ]);
        }

        if($shop){
            return redirect(route('menus.create'))->with('message', 'Tao shop thanh cong');
        }
        return redirect()->back()->with('message', 'Tao shop that bai');
    }
}
