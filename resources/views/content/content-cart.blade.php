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
                        <form action="{{ url('/update-cart') }}">
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
                                                <input type="text" value="{{ $cart['product_quantity']}}" name="cart_quatity[{{ $cart['session_id'] }}]">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="shoping__cart__total">
                                        {{ $cart['product_quantity'] * $cart['product_price']}}
                                    </td>
                                    <td class="shoping__cart__item__close">
                                        {{-- delete --}}
                                        <a href="{{ url('/delete/'.$cart['session_id']) }}"><span  class="icon_close" style="color: red"} ></span></a>                                     
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
                                    <a href="/delete" class="primary-btn cart-btn cart-btn-right" style="margin-right: 10px; background-color: #FE2E64">
                                    <span class="icon_close"></span>
                                    Xóa tất cả</a>  
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
                            <form action="#">
                                <input type="text" placeholder="Enter your coupon code">
                                <button type="submit" class="site-btn">APPLY COUPON</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            <li>Subtotal <span>$454.98</span></li>
                            <li>Total <span>$454.98</span></li>
                        </ul>
                        <a href="#" class="primary-btn">PROCEED TO CHECKOUT</a>
                    </div>
                </div>
            </div>
        
        </div>
    </section>
    <!-- Shoping Cart Section End -->
@endsection