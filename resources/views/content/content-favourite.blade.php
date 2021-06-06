@extends('layouts.details')

@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('assets/img/breadcrumb.jpg') }}">
        <div class="container">1
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Favourite Cart</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Favourite Cart</span>
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
                                @if (session('favourite') !== null)
                                @foreach (session('favourite') as $key => $favourite)
                                <tr>
                                    <td class="shoping__cart__item">
                                        <img src="{{ asset('assets/img/cart/cart-1.jpg') }}" alt="">
                                        <h5>{{$favourite['product_name']}}</h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                        {{$favourite['product_price']}}
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input type="number" value="{{ $favourite['product_quantity']}}" name="favourite_quatity[{{ $favourite['session_id'] }}]" readonly>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="shoping__cart__total">
                                        {{ $favourite['product_quantity'] * $favourite['product_price']}}
                                    </td>
                                    <td class="shoping__cart__item__close">
                                        <a href="{{ url('favourites/cart/'.$favourite['session_id']) }}"><span  class="fa fa-shopping-cart" style="color: green"} ></span></a>   
                                        <a href="{{ url('favourites/delete/'.$favourite['session_id']) }}"><span  class="icon_close" style="color: red"} ></span></a> 
                                 
                                    </td>
                                </tr>

                                @endforeach
                                @endif
                                
                            </tbody>
                            
                        </table>
                        <div class="col-lg-12">
                            <div class="shoping__cart__btns">
                                <a href="/" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                                @if (session('favourite') !== null)
                                    <a href="{{route('favourites.deleteAll')}}" class="primary-btn cart-btn cart-btn-right" style="margin-right: 10px; background-color: #FE2E64">
                                    <span class="icon_close"></span>
                                    Xóa tất cả</a>  
                                @endif
                            </div>
                        </div>
                    </form>

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
    </script>
@endsection