@extends('layouts.details')

@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('assets/img/breadcrumb.jpg') }}">
        <div class="container">1
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Shopping Cart</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            
            <div class="row">
                <div class="col-lg-12">
                    <div>
                        <x-alert/>
                    </div>
                    <div class="shoping__cart__table">
                        <form action="{{ url('carts/update-cart') }}">
                            @csrf
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Products</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (session('cart') !== null)
                                @foreach (session('cart') as $key => $cart)
                                <tr>
                                    <td class="shoping__cart__item">
                                        <img src="{{ asset('assets/img/cart/cart-1.jpg') }}" alt="">
                                        <h5>{{$cart['product_name']}}</h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                        {{$cart['product_price']}}
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input type="number" value="{{ $cart['product_quantity']}}" name="cart_quatity[{{ $cart['session_id'] }}]">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="shoping__cart__total">
                                        {{ $cart['product_quantity'] * $cart['product_price']}}
                                    </td>
                                    <td class="shoping__cart__item__close">
                                        {{-- delete --}}
                                        <a href="{{ url('carts/delete/'.$cart['session_id']) }}"><span  class="icon_close" style="color: red"} ></span></a>                                     
                                    </td>
                                </tr>

                                @endforeach
                                @endif
                                
                            </tbody>
                            
                        </table>
                        <div class="col-lg-12">
                            <div class="shoping__cart__btns">
                                <a href="/" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                                @if (session('cart') !== null)
                                    <input type="submit" class="primary-btn cart-btn cart-btn-right" value="Upadate Cart" style="background-color: #A9F5A9">
                                    <a href="{{route('carts.deleteAll')}}" class="primary-btn cart-btn cart-btn-right" style="margin-right: 10px; background-color: #FE2E64">
                                    <span class="icon_close"></span>
                                    X??a t???t c???</a>  
                                @endif
                            </div>
                        </div>
                    </form>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                            <h5>Discount Codes</h5>
                            <div>
                                <select id="promotion_id" class="form-control">
                                    <option value="" selected disabled hidden>Choose coupon code here</option>
                                      @foreach ($promotions as $promotion)
                                          <option value={{$promotion->id}}> {{$promotion->description}}</option>
                                      @endforeach
                                  </select>
                                  <br>
                                <button type="submit" class="site-btn">APPLY COUPON</button>
                                </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            <li>Subtotal <span>                            
                                <?php
                                    $total = 0;
                                    $cart = session()->get('cart');
                                    if($cart){
                                        foreach($cart as $key => $val){
                                            $total += $val['product_price'] * $val['product_quantity'];
                                        }
                                    }
                                    echo $total;
                                ?>
                            </span></li>
                            <li>Total Quantity 
                                <span id = "total-quantity">
                                    <?php
                                        $total = 0;
                                        $cart = session()->get('cart');
                                        if($cart){
                                            foreach($cart as $key => $val){
                                                $total += $val['product_quantity'];
                                            }
                                        }
                                        echo $total;
                                    ?>
                                </span></li>
                            <li>Discount <span id="discount">0</span></li>
                            <li>Total 
                                <span id = "total-price">
                                    <?php
                                        $total = 0;
                                        $cart = session()->get('cart');
                                        if($cart){
                                            foreach($cart as $key => $val){
                                                $total += $val['product_price'] * $val['product_quantity'];
                                            }
                                        }
                                        echo $total;
                                    ?>
                                </span>
                            </li>
                            
                        </ul>
                        <a href="#" id="btn-checkout" class="primary-btn">PROCEED TO CHECKOUT</a>
                    </div>
                </div>
            </div>
        
        </div>
    </section>
    <!-- Shoping Cart Section End -->
@endsection

@section('js')
    <script>
        setTimeout(() => document.getElementById('alert-display').style.display = 'none', 5000);
        
        $('body').on('click', '.site-btn', function(){
            var promotion_id = $('#promotion_id').val();
            console.log('promotion_id:' + promotion_id);

            $.ajax({
            url: "{{ url('promotions/add-promotion') }}",
            method: 'POST',
            data: { 
                    'promotion_id': promotion_id,
                    "_token": "{{ csrf_token() }}",
                },
            success: function(data){
                $("#discount").html(data['discount']);
                $("#total-price").html(data['totalPrice']);
                $("#total-quantity").html(data['totalQuantity']);
                console.log(data);
            },
            error: function (request, status, error) {
                console.log(request.responseText);
            }

        });  
        
        });

        $('body').on('click', '#btn-checkout', function(){
            var promotion_id = $('#promotion_id').val();

            if(promotion_id == null){
                $.ajax({
                    url: "{{ url('promotions/check-promotion') }}",
                    method: 'POST',
                    data: { 
                            "_token": "{{ csrf_token() }}",
                        },
                    success: function(data){
                        window.location.href = '{{ url('/checkout') }}';
                        console.log(data);
                    },
                    error: function (request, status, error) {
                        console.log(request.responseText);
                    }
                })
            }else{
                window.location.href = '{{ url('/checkout') }}';
            }
        })
    </script>
@endsection