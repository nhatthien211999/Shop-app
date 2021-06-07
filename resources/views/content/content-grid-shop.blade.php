@extends('layouts.details')

@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('assets/img/breadcrumb.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Cửa hàng</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Blog</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Blog Section Begin -->
    <section class="blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5">
                    <div class="blog__sidebar">
                        <div class="blog__sidebar__search">
                            <form action="#">
                                <input type="text" placeholder="Search...">
                                <button type="submit"><span class="icon_search"></span></button>
                            </form>
                        </div>
                        <div class="blog__sidebar__item">
                            <h4>Categories</h4>
                            <ul>
                                <li><a href="#">All</a></li>
                                <li><a href="#">Beauty (20)</a></li>
                                <li><a href="#">Food (5)</a></li>
                                <li><a href="#">Life Style (9)</a></li>
                                <li><a href="#">Travel (10)</a></li>
                            </ul>
                        </div>
                        <div class="blog__sidebar__item">
                            <h4>Recent News</h4>
                            <div class="blog__sidebar__recent">
                                <a href="#" class="blog__sidebar__recent__item">
                                    <div class="blog__sidebar__recent__item__pic">
                                        <img src="img/blog/sidebar/sr-1.jpg" alt="">
                                    </div>
                                    <div class="blog__sidebar__recent__item__text">
                                        <h6>09 Kinds Of Vegetables<br /> Protect The Liver</h6>
                                        <span>MAR 05, 2019</span>
                                    </div>
                                </a>
                                <a href="#" class="blog__sidebar__recent__item">
                                    <div class="blog__sidebar__recent__item__pic">
                                        <img src="img/blog/sidebar/sr-2.jpg" alt="">
                                    </div>
                                    <div class="blog__sidebar__recent__item__text">
                                        <h6>Tips You To Balance<br /> Nutrition Meal Day</h6>
                                        <span>MAR 05, 2019</span>
                                    </div>
                                </a>
                                <a href="#" class="blog__sidebar__recent__item">
                                    <div class="blog__sidebar__recent__item__pic">
                                        <img src="img/blog/sidebar/sr-3.jpg" alt="">
                                    </div>
                                    <div class="blog__sidebar__recent__item__text">
                                        <h6>4 Principles Help You Lose <br />Weight With Vegetables</h6>
                                        <span>MAR 05, 2019</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="blog__sidebar__item">
                            <h4>Search By</h4>
                            <div class="blog__sidebar__item__tags">
                                <a href="#">Apple</a>
                                <a href="#">Beauty</a>
                                <a href="#">Vegetables</a>
                                <a href="#">Fruit</a>
                                <a href="#">Healthy Food</a>
                                <a href="#">Lifestyle</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-7">
                    <div class="row data_products" >
                        @foreach ($shops as $shop)
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="blog__item">
                                    <div class="blog__item__pic">
                                        <img src="{{asset('assets/img/blog/blog-1.jpg')}}" alt="">
                                    </div>
                                    <div class="blog__item__text">
                                        <h5><a href="{{route('shopDetails', ['id' => $shop->id])}}">{{$shop->shop_name}}</a></h5>
                                        <p><b>Address: </b> {{$shop->address}}</p>
                                        <a href="{{route('shopDetails', ['id' => $shop->id])}}" class="blog__btn">WATCH MORE <span class="arrow_right"></span></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>

                    <div class="col-lg-12">
                        <div class="product__pagination blog__pagination num_page">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->
@endsection

@section('js')
    <script>
        var lastPage={{$shops->lastPage()}};
        var x = OutputPage(0);

        function OutputPage(numberPage){
            if(numberPage==0)
            {
                var currentPage = {{$shops->currentPage()}};

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

            for ( i = 0; i < displayPage; i++)
            {

                elPage.push('<a  onclick="ChangePage('+parseInt( currentPage  + i) +')">'+ parseInt(currentPage  + i)  +'</a>');
                if(lastPage == numberPage + i)
                break;
            }

            
            if( currentPage != lastPage)
            {
                elPage.push('<a  onclick="ChangePage('+parseInt( currentPage  +1)  +')"> >> </a>');
            }

            console.log(elPage);

            $('.num_page').html(elPage); //?????????
            // result true;
        }

        function ChangePage(numberPage)//gọi api lấy dữ liệu các trang
        {
            var listShop;

            $.ajax({url: "{{ url('api/list-shop') }}",
                async: false,
                data:{
                    page: numberPage,
                },
                type: "GET",
                success: function(result){
                    listShop = result.shops.data;
                    console.log(listShop);
                }
            });

            var QtyItem=listShop.length;
            var elProduct=[];
            for(var i=0; i< QtyItem; i++){
                elProduct.push('<div class="col-lg-6 col-md-6 col-sm-6">\
                                    <div class="blog__item">\
                                        <div class="blog__item__pic">\
                                            <img src="{{asset("assets/img/blog/blog-1.jpg")}}" alt="">\
                                        </div>\
                                        <div class="blog__item__text">\
                                            <h5><a href="/shop/' + listShop[i].id + '">'+ listShop[i].shop_name +'</a></h5>\
                                            <p><b>Address: </b>' + listShop[i].address +'</p>\
                                            <a href="/shop/' + listShop[i].id + '" class="blog__btn">watch MORE <span class="arrow_right"></span></a>\
                                        </div>\
                                    </div>\
                                </div>');
            }
            console.log(numberPage);
            $('.data_products').html(elProduct);
            
            OutputPage(numberPage);
        }

    </script>
@endsection
