<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    public function addPromotion(Request $request)
    {
        $cartTotal = session()->get('cartTotal');

        if($cartTotal){
            session()->forget('cartTotal');
        }

        $data = $request->all();

        $promotion = Promotion::find($data['promotion_id']);

        $discount = 0;
        $cart = session()->get('cart');

        if($cart){
            $total_quantity = 0;
            $total_price = 0;
            foreach($cart as $key => $val){
                $total_quantity += $val['product_quantity'];
                $total_price  += $val['product_price'] * $val['product_quantity'];
            }

            if($promotion){
                $discount = $promotion->price_discount;
                $totalPrice = $total_price - $promotion->price_discount;
            }else{
                $discount = 0;
                $totalPrice = $total_price;
            }



            $cartTotal = [
                'price' => $total_price ,
                'promotion_id' => $data['promotion_id'],
                'discount' => $discount,
                'totalPrice' => $totalPrice,
                'totalQuantity' => $total_quantity,
                '_token' => $data['_token']
            ];

            session()->put('cartTotal', $cartTotal);
            session()->save();

            return $cartTotal;
            
        }

        $cartTotal = [
            'promotion_id' => 0,
            'discount' => 0,
            'price' =>0,
            'totalPrice' => 0,
            'totalQuantity' => 0,
            '_token' => $data['_token']
        ];

        session()->put('cartTotal', $cartTotal);
        session()->save();

        return $cartTotal;

        
    }

    public function checkPromotion(Request $request){
        $cartTotal = session()->get('cartTotal');
        $data = $request->all();
        $cart = session()->get('cart');

        if($cartTotal){
            session()->forget('cartTotal');
        }

            if($cart){
                $total_quantity = 0;
                $total_price = 0;
                foreach($cart as $key => $val){
                    $total_quantity += $val['product_quantity'];
                    $total_price  += $val['product_price'] * $val['product_quantity'];
                }
       
                $cartTotal = [
                    'price' => $total_price ,
                    'promotion_id' => 0,
                    'discount' => 0,
                    'totalPrice' => $total_price,
                    'totalQuantity' => $total_quantity,
                    '_token' => $data['_token']
                ];
    
                session()->put('cartTotal', $cartTotal);
                session()->save();
    
                return $cartTotal;
                
            }else{
                $cartTotal = [
                    'price' => 0 ,
                    'promotion_id' => 0,
                    'discount' => 0,
                    'totalPrice' => 0,
                    'totalQuantity' => 0,
                    '_token' => $data['_token']
                ];

                return $cartTotal;
            }


    }
}
