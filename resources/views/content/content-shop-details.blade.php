@extends('layouts.details')

@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('assets/img/breadcrumb.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>{{$shop->shop_name}}</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Shop</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    <div class="sidebar">

                        <div class="sidebar__item">
                            <h4>Menu</h4>
                            @if ($menus)
                                <ul>
                                    @foreach ($menus as $menu)
                                        <li><a href="{{route('showProductOfCategory', ['id' => $menu->id])}}">{{$menu->type}}</a></li>
                                    @endforeach
                                    
                                </ul>
                            @endif                     
                        </div>

                        <div class="sidebar__item">
                            <h4>Price</h4>
                            <div class="price-range-wrap">
                                <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                    data-min="10" data-max="540">
                                    <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                </div>
                                <div class="range-slider">
                                    <div class="price-input">
                                        <input type="text" id="minamount">
                                        <input type="text" id="maxamount">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-7">
                    <div class="product__discount">

                    </div>
                    <div class="filter__item">
                        <div class="row">
                            <div class="col-lg-4 col-md-5">
                                <div class="filter__sort">
                                    <span>Sort By</span>
                                    <select>
                                        <option value="0">Default</option>
                                        <option value="0">Default</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="filter__found">
                                    <h6><a href="{{route('mapShop', ['id' => $shop->id])}}" class="btn btn-success">Map</a></h6>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-3">
                                <div class="filter__option">
                                    <span class="icon_grid-2x2"></span>
                                    <span class="icon_ul"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <x-alert/>
                        

                            <div>                               
                                <div class="product__discount">
                                </div>
                                <div class="row data_products" >
                                    @foreach ($products as $item)
                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <div class="product__item" >
                                            @csrf
                                                <input type="hidden" value="{{$item->id}}" class="cart_product_id_{{$item->id}}">
                                                <input type="hidden" value="{{$item->price}}" class="cart_product_price_{{$item->id}}">
                                                <input type="hidden" value="{{$item->name}}" class="cart_product_name_{{$item->id}}">
                                                <input type="hidden" value="{{$item->image}}" class="cart_product_image_{{$item->id}}">

                                                <div class="product__item__pic set-bg" data-setbg="{{asset ('assets/img/featured/feature-1.jpg') }}">
                                                    <ul class="product__item__pic__hover">
                                                        <li><a href="#" class="add-to-favourite" data-id="{{$item->id}}"><i class="fa fa-heart"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                                        <li><a href="#" class="add-to-cart" data-id="{{$item->id}}"  ><i class="fa fa-shopping-cart" ></i></a></li>
                                                    </ul>
                                                </div>
                                                
                                                <div class="product__item__text">
                                                    <h6><a href="/products/{{$item->id}}">{{$item->name}}</a></h6>
                                                    <h5>{{$item->price}}</h5>
                                                </div>
                                        
                                            </div>
                                        </div>
                                    @endforeach
                            </div>



                    <div class="product__pagination num_page">
                    </div>

                    <div class="section-title product__discount__title">
                        <h2>Sale Off</h2>
                    </div>
                    <div class="row">
                        <div class="product__discount__slider owl-carousel">
                            <div class="col-lg-4">
                                <div class="product__discount__item">
                                    <div class="product__discount__item__pic set-bg"
                                        data-setbg="img/product/discount/pd-1.jpg">
                                        <div class="product__discount__percent">-20%</div>
                                        <ul class="product__item__pic__hover">
                                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__discount__item__text">
                                        <span>Dried Fruit</span>
                                        <h5><a href="#">Raisin’n’nuts</a></h5>
                                        <div class="product__item__price">$30.00 <span>$36.00</span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="product__discount__item">
                                    <div class="product__discount__item__pic set-bg"
                                        data-setbg="img/product/discount/pd-2.jpg">
                                        <div class="product__discount__percent">-20%</div>
                                        <ul class="product__item__pic__hover">
                                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__discount__item__text">
                                        <span>Vegetables</span>
                                        <h5><a href="#">Vegetables’package</a></h5>
                                        <div class="product__item__price">$30.00 <span>$36.00</span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="product__discount__item">
                                    <div class="product__discount__item__pic set-bg"
                                        data-setbg="img/product/discount/pd-3.jpg">
                                        <div class="product__discount__percent">-20%</div>
                                        <ul class="product__item__pic__hover">
                                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__discount__item__text">
                                        <span>Dried Fruit</span>
                                        <h5><a href="#">Mixed Fruitss</a></h5>
                                        <div class="product__item__price">$30.00 <span>$36.00</span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="product__discount__item">
                                    <div class="product__discount__item__pic set-bg"
                                        data-setbg="img/product/discount/pd-4.jpg">
                                        <div class="product__discount__percent">-20%</div>
                                        <ul class="product__item__pic__hover">
                                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__discount__item__text">
                                        <span>Dried Fruit</span>
                                        <h5><a href="#">Raisin’n’nuts</a></h5>
                                        <div class="product__item__price">$30.00 <span>$36.00</span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="product__discount__item">
                                    <div class="product__discount__item__pic set-bg"
                                        data-setbg="img/product/discount/pd-5.jpg">
                                        <div class="product__discount__percent">-20%</div>
                                        <ul class="product__item__pic__hover">
                                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__discount__item__text">
                                        <span>Dried Fruit</span>
                                        <h5><a href="#">Raisin’n’nuts</a></h5>
                                        <div class="product__item__price">$30.00 <span>$36.00</span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="product__discount__item">
                                    <div class="product__discount__item__pic set-bg"
                                        data-setbg="img/product/discount/pd-6.jpg">
                                        <div class="product__discount__percent">-20%</div>
                                        <ul class="product__item__pic__hover">
                                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__discount__item__text">
                                        <span>Dried Fruit</span>
                                        <h5><a href="#">Raisin’n’nuts</a></h5>
                                        <div class="product__item__price">$30.00 <span>$36.00</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- Product Section End -->
@endsection
@section('js')
    <script>
        var lastPage={{$products->lastPage()}};
        var x=OutputPage(0);
        // var listPage=
        function OutputPage(numberPage){
            if(numberPage==0)
            {
                var currentPage = {{$products->currentPage()}};

            }
            else{
                var currentPage = numberPage;
            }

            var elPage=[];
            if( currentPage != 1)
            {
                elPage.push('<a  onclick="ChangePage('+ parseInt(currentPage - 1)  +')"> << </a>');
            }

            var displayPage;

            if(lastPage>3)
                displayPage=3;
            if(lastPage<=3||lastPage>1)
                displayPage=lastPage;

            // console.log(displayPage);


            for ( i = 0; i < displayPage; i++) //tạo ra các paginate {{$products->lastPage()}}
            {

                elPage.push('<a  onclick="ChangePage('+parseInt( currentPage  + i) +')">'+ parseInt(currentPage  + i)  +'</a>');
                if(lastPage == numberPage + i)
                break;
            }
            if( currentPage != lastPage)
            {
                elPage.push('<a  onclick="ChangePage('+parseInt( currentPage  +1)  +')"> >> </a>');
            }
            $('.num_page').html(elPage);
            // result true;
        }

        function ChangePage(numberPage)//gọi api lấy dữ liệu các trang
        {
            var listProducts;

            $.ajax({url: "{{ url('api/my-shop') }}",
                async: false,
                data:{
                    {{ $products->getPageName() }}: numberPage,
                    shopID: {{$shop->id}}
                },
                type: "POST",
                success: function(result){
                    listProducts = result.products.data;
                    console.log(listProducts);
                }
            });

            var QtyItem=listProducts.length;
            var elProduct=[];
            for(var i=0; i< QtyItem; i++){
                elProduct.push('<div class="col-lg-4 col-md-6 col-sm-6">\
                                    <div class="product__item">\
                                        <form>\
                                            @csrf\
                                            <input type="hidden" value="' + listProducts[i].id + '" class="cart_product_id_' + listProducts[i].id + '">\
                                            <input type="hidden" value="' + listProducts[i].price  +'" class="cart_product_price_' + listProducts[i].id + '">\
                                            <input type="hidden" value="' + listProducts[i].name + '" class="cart_product_name_' + listProducts[i].id  +'">\
                                            <input type="hidden" value="' + listProducts[i].image +'" class="cart_product_image_' + listProducts[i].id + '">\
                                            <div class="product__item__pic set-bg" data-setbg="">\
                                                <ul class="product__item__pic__hover">\
                                                    <li><a href="#" class="add-to-favourite" data-id="' + listProducts[i].id + '"><i class="fa fa-heart"></i></a></li>\
                                                    <li><a href="#"><i class="fa fa-retweet"></i></a></li>\
                                                    <li><a  href="#" class="add-to-cart" data-id="' + listProducts[i].id+ '"><i class="fa fa-shopping-cart"></i></a></li>\
                                                </ul>\
                                            </div>\
                                            <div class="product__item__text">\
                                                <h6><a href="/products/'+listProducts[i].id+'" >'+ listProducts[i].name+'</a></h6>\
                                                <h5 class="jjj">'+listProducts[i].price+'</h5>\
                                            </div>\
                                        </form>\
                                    </div>\
                                </div>');
            }

            $('.data_products').html(elProduct);

            OutputPage(numberPage);
        }

    </script>
@endsection
