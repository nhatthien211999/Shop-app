@extends('layouts.home')

@section('content')
    @include('categories.category')

    {{-- @include('products.product-featured', ['categories'=>$category]) --}}

    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Featured Product</h2>
                    </div>
                    <div class="featured__controls">
                        <ul>
                            <li class="active" data-filter="*">All</li>
                            {{-- <li data-filter=".oranges">Oranges</li>
                            <li data-filter=".fresh-meat">Fresh Meat</li>
                            <li data-filter=".vegetables">Vegetables</li>
                            <li data-filter=".fastfood">Fastfood</li> --}}
                            @foreach ($categories as $key => $item)
                                <li data-filter=".choose{{$item->id}}">{{$item->type}}</li>
                                @if ($key==3)
                                    @break;
                                @endif
                            @endforeach


                        </ul>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">

                @foreach ($productCollection as $value )

                    @foreach ($value as $key => $item)
                        
                            <div class="col-lg-3 col-md-4 col-sm-6 mix choose{{$item->menu->category_id+1}}  choose{{$item->menu->category_id}}">{{-- mix choose{{$value->category->id+1}}  trộn 2 sự lựa chọn--}}
                                <div class="featured__item">
                                    <form>
                                        @csrf
                                        <input type="hidden" value="{{$item->id}}" class="cart_product_id_{{$item->id}}">
                                        <input type="hidden" value="{{$item->price}}" class="cart_product_price_{{$item->id}}">
                                        <input type="hidden" value="{{$item->name}}" class="cart_product_name_{{$item->id}}">
                                        <input type="hidden" value="{{$item->image}}" class="cart_product_image_{{$item->id}}">

                                    <div class="featured__item__pic set-bg" data-setbg="{{asset ('assets/img/featured/feature-1.jpg') }}">
                                        <ul class="featured__item__pic__hover">
                                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                            <li><a href="#" class="add-to-cart" data-id="{{$item->id}}"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="featured__item__text">
                                        <h6><a href="/products/{{$item->id}}">{{$item->name}}</a></h6>
                                        <h5>{{$item->price}}</h5>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        
                    @endforeach


                @endforeach


            </div>

            <nav class="text-right total-records pagination_div show_record">
                {{$productCollection[0]->links('pagination::bootstrap-4')}}
            </nav>

        </div>
    </section>



    @include('includes.banner')
    @include('products.latest-product')
    @include('blog.blog')
@endsection
