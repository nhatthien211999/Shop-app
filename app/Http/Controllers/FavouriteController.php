<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavouriteController extends Controller
{
    function addFavourite(Request $request){
        $data = $request->all();

        $session_id = substr(md5(microtime()), rand(0, 25), 5);

        $favourite = session()->get('favourite');

        if($favourite){
            $is_vaiable = 0;
            foreach($favourite as $key => $val){
                if($val['product_id'] == $data['favourite_product_id']){                   
                    $is_vaiable++;
                    $favourite[$key]['product_quantity'] = $favourite[$key]['product_quantity'] + $data['favourite_product_quantity'];                               
                }
                session()->put('favourite', $favourite);
            }

            if($is_vaiable == 0){
                $favourite[] = array(
                    'session_id' => $session_id,
                    'product_id' => $data['favourite_product_id'],
                    'product_name' => $data['favourite_product_name'],
                    'product_image' => $data['favourite_product_image'],
                    'product_price' => $data['favourite_product_price'],
                    'product_quantity' => $data['favourite_product_quantity'],
                    '_token' => $data['_token']
                );
                session()->put('favourite', $favourite);

            }

        }else{
            $favourite[] = array(
                'session_id' => $session_id,
                'product_id' => $data['favourite_product_id'],
                'product_name' => $data['favourite_product_name'],
                'product_image' => $data['favourite_product_image'],
                'product_price' => $data['favourite_product_price'],
                'product_quantity' => $data['favourite_product_quantity'],
                '_token' => $data['_token']
            );
            session()->put('favourite', $favourite);
        }
        
        
        session()->save();

        $total = 0;
        $total_price = 0;
        foreach($favourite as $key => $val){
            $total += $val['product_quantity'];
            $total_price  += $val['product_price'] * $val['product_quantity'];
        }

        $data = [
            'total' => $total,
            'total_price' => $total_price 
        ];

        return $data;
    }

    function destroyAll(){

        $favourite = session()->get('favourite');
        if($favourite){
            session()->forget('favourite');
            return redirect()->back()->with('message', 'Xóa tất cả sản phẩm thành công');
        }

        return redirect()->back()->with('message', 'Xóa tất cả sản phẩm thất bại');
    }

    function destroy($session_id){

        $favourite = session()->get('favourite');
        if($favourite){
            if(count($favourite) == 1){
                session()->forget('favourite');
                return redirect()->back()->with('message', 'Xoa san pham thanh cong');
            }

            foreach($favourite as $key => $val){
                if( $val['session_id'] == $session_id){
                    unset($favourite[$key]);
                }
            }
            session()->put('favourite', $favourite);

            return redirect()->back()->with('message', 'Xoa san pham thanh cong');
        }else{
            return redirect()->back()->with('message', 'Xoa san pham that bai');
        }

    }
    
    function cartUpdate($session_id){

        $favourite = session()->get('favourite');

        $cart = session()->get('cart');

        
        if($favourite){

            foreach($favourite as $keyf => $value){
                if( $value['session_id'] == $session_id){

                    if($cart){

                        $is_vaiable = 0;
                        foreach($cart as $key => $val){
                            if($val['product_id'] == $value['product_id']){                   
                                $is_vaiable++;
                                $cart[$key]['product_quantity'] = $cart[$key]['product_quantity'] + $value['product_quantity'];                               
                            }
                            session()->put('cart', $cart);

                        }
            
                        if($is_vaiable == 0){  
                            $cart[] = $value;           
                            session()->put('cart', $cart);

                        }
            
                    }else{
                        $cart[] = $value;
                        
                        session()->put('cart', $cart);

                    }

                    //Delete favourite ?
                    if(count($favourite) == 1){

                        session()->forget('favourite');

                    }else{

                        foreach($favourite as $key => $val){
                            if( $val['session_id'] == $session_id){
                                unset($favourite[$keyf]);
                            }
                        }
                        session()->put('favourite', $favourite);                   
                        
                    }
                    session()->save();
                  
                }
                
                
            }
            
            return redirect()->back()->with('message', 'Them san pham vao gio hang thanh cong');
            
        }


    }
}
