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
                                {{-- @if ($key==3)
                                    @break;
                                @endif --}}
                            @endforeach


                        </ul>
                    </div>
                </div>
            </div>
            <div class="row featured__filter data_products">



                @foreach ($productCollection as $key => $item)

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
                                    <li><a href="#" class="add-to-favourite" data-id="{{$item->id}}"><i class="fa fa-heart"></i></a></li>
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





            </div>

            {{-- <nav class="text-right total-records pagination_div show_record num_page">
                {{$productCollection->links('pagination::bootstrap-4')}}
            </nav> --}}
            <div class="product__pagination num_page">

            </div>
        </div>
    </section>

    @include('includes.banner')
    @include('products.latest-product')
    @include('blog.blog')
@endsection

@section('js')
<script>
    var lastPage={{$productCollection->lastPage()}};
    var x=OutputPage(0);
    console.log('jjfjfjfjfjfjfjfj');
    // var listPage=
    function OutputPage(numberPage){
        console.log('jjjjjjjbestsell');
        if(numberPage==0)
        {
            var currentPage = {{$productCollection->currentPage()}};

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


        for ( i = 0; i < displayPage; i++) //tạo ra các paginate
        {

            elPage.push('<a  onclick="ChangePage('+parseInt( currentPage  + i) +')">'+ parseInt(currentPage  + i)  +'</a>');
            if(lastPage == numberPage + i)
            break;
        }
        if( numberPage != lastPage)
        {
            elPage.push('<a  onclick="ChangePage('+parseInt( currentPage  +1)  +')"> >> </a>');
        }
        console.log(elPage);
        $('.num_page').html(elPage);
        // result true;
    }

    function ChangePage(numberPage)//gọi api lấy dữ liệu các trang
    {
        var listProducts;
        var menu;
        $.ajax({url: "{{ url('api/bestSell') }}",
            async: false,
            data:{
                page: numberPage
            },
            type: "GET",
            success: function(result){
                listProducts = result.productCollection.data;
                menu=result.menu;
                //console.log(result['menu'])
            }
        });

        var QtyItem=listProducts.length;
        var elProduct=[];
        console.log(menu);

        for(var i=0; i< QtyItem; i++){
            var idmenu=[];
            idmenu=menu.find(menu=>menu.id==listProducts[i].menu_id);
            //     console.log(idmenu);
            //    console.log("-------------------------"+i);

            elProduct.push(' <div class="col-lg-3 col-md-4 col-sm-6 mix choose{{$item->menu->category_id+1}}'+listProducts[i]+'  choose{{$item->menu->category_id}}">{{-- mix choose{{$value->category->id+1}}  trộn 2 sự lựa chọn--}}\
                <div class="featured__item">\
                    <form>\
                        @csrf\
                        <input type="hidden" value="' + listProducts[i].id + '" class="cart_product_id_' + listProducts[i].id + '">\
                        <input type="hidden" value="' + listProducts[i].price  +'" class="cart_product_price_' + listProducts[i].id + '">\
                        <input type="hidden" value="' + listProducts[i].name + '" class="cart_product_name_' + listProducts[i].id  +'">\
                        <input type="hidden" value="' + listProducts[i].image +'" class="cart_product_image_' + listProducts[i].id + '">\
                    <div class="featured__item__pic set-bg" data-setbg="">\
                        <ul class="featured__item__pic__hover">\
                            <li><a href="#" class="add-to-favourite" data-id="' + listProducts[i].id + '"><i class="fa fa-heart"></i></a></li>\
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>\
                            <li><a href="#" class="add-to-cart" data-id="'+listProducts[i].id+'"><i class="fa fa-shopping-cart"></i></a></li>\
                        </ul>\
                    </div>\
                    <div class="featured__item__text">\
                        <h6><a href="/products/'+listProducts[i].id+'">'+listProducts[i].name+'</a></h6>\
                        <h5>'+listProducts[i].price+'</h5>\
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
