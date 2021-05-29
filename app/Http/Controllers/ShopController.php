<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class ShopController extends Controller
{

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
                'address' => $request->input('address')
                ]);
        }
        else
        {
            $shop = Shop::create([                    
                'shop_name' => $request->input('name'),
                'user_id' => $user_id,
                'background' => '/',
                'status' => 'active',
                'address' => $request->input('address')
                ]);
        }

        if($shop){
            return redirect(route('menus.index'))->with('message', 'Tao shop thanh cong');
        }
        return redirect(route('menus.index'))->with('message', 'Tao shop that bai');
    }
}
