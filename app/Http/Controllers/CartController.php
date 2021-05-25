<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class CartController extends Controller
{
    function addCart(Request $request){
        $data = $request->all();

        $session_id = substr(md5(microtime()), rand(0, 25), 5);

        $cart = session()->get('cart');

        if($cart){
            //kiểm tra sản phẩm có trong giỏ hàng chưa ???
            $is_vaiable = 0;
            foreach($cart as $key => $val){
                if($val['product_id'] == $data['card_product_id']){                   
                    $is_vaiable++;
                    $cart[$key]['product_quantity'] = $cart[$key]['product_quantity'] + $data['cart_product_quantity'];                               
                }
                session()->put('cart', $cart);
            }

            if($is_vaiable == 0){
                $cart[] = array(
                    'session_id' => $session_id,
                    'product_id' => $data['card_product_id'],
                    'product_name' => $data['cart_product_name'],
                    'product_image' => $data['cart_product_image'],
                    'product_price' => $data['cart_product_price'],
                    'product_quantity' => $data['cart_product_quantity'],
                    '_token' => $data['_token']
                );
                session()->put('cart', $cart);

            }

        }else{
            $cart[] = array(
                'session_id' => $session_id,
                'product_id' => $data['card_product_id'],
                'product_name' => $data['cart_product_name'],
                'product_image' => $data['cart_product_image'],
                'product_price' => $data['cart_product_price'],
                'product_quantity' => $data['cart_product_quantity'],
                '_token' => $data['_token']
            );
        }
        session()->put('cart', $cart);
        session()->save();

        $total = 0;
        $total_price = 0;
        foreach($cart as $key => $val){
            $total += $val['product_quantity'];
            $total_price  += $val['product_price'] * $val['product_quantity'];
        }

        $data = [
            'total' => $total,
            'total_price' => $total_price 
        ];

        return $data;
    }

    function destroy($session_id){

        $cart = session()->get('cart');
        if($cart){
            if(count($cart) == 1){
                session()->forget('cart');
                return redirect()->back()->with('message', 'Xoa san pham thanh cong');
            }
            foreach($cart as $key => $val){
                if( $val['session_id'] == $session_id){
                    unset($cart[$key]);
                }
            }
            session()->put('cart', $cart);

            return redirect()->back()->with('message', 'Xoa san pham thanh cong');
        }else{
            return redirect()->back()->with('message', 'Xoa san pham that bai');
        }

    }   

    function update(Request $request){
        $data = $request->all();
        $cart = session()->get('cart');
        if($cart == true){
            foreach($data['cart_quatity'] as $session_id => $val_quantity){
                foreach($cart as $session => $val){
                    if($val['session_id'] == $session_id){
                        $cart[$session]['product_quantity'] = $val_quantity;
                    }
                }              
            }
            session()->put('cart', $cart);
            return redirect()->back()->with('message', 'Cap nhap san pham thanh cong');
            
        }
        return redirect()->back()->with('message', 'Cap nhap san pham that bai');

    }

    function destroyAll(){

        $cart = session()->get('cart');
        if($cart){
            session()->forget('cart');
            return redirect()->back()->with('message', 'Xóa tất cả sản phẩm thành công');
        }

        return redirect()->back()->with('message', 'Xóa tất cả sản phẩm thất bại');
    }
    

}
