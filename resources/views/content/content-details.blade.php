@extends('layouts.details')

@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('assets/img/breadcrumb.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Vegetable’s Package</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <a href="./index.html">Vegetables</a>
                            <span>{{$product->name}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large"
                                src="{{asset('assets/img/product/details/product-details-1.jpg')}}" alt="">
                        </div>
                        <div class="product__details__pic__slider owl-carousel">
                            <img data-imgbigurl="{{asset('assets/mg/product/details/product-details-2.jpg')}}"
                                src="{{asset('assets/img/product/details/thumb-1.jpg')}}" alt="">
                            <img data-imgbigurl="{{asset('assets/img/product/details/product-details-3.jpg')}}"
                                src="{{asset('assets/img/product/details/thumb-2.jpg')}}" alt="">
                            <img data-imgbigurl="{{asset('assets/mg/product/details/product-details-5.jpg')}}"
                                src="{{asset('assets/img/product/details/thumb-3.jpg')}}" alt="">
                            <img data-imgbigurl="{{asset('assets/img/product/details/product-details-4.jpg')}}"
                                src="{{asset('assets/img/product/details/thumb-4.jpg')}}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3><a href="/products/{{$product->id}}" style="color: brown">{{$product->name}}</a></h3>
                        <div class="product__details__rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                            <span>(18 reviews)</span>
                        </div>
                        <div class="product__details__price">{{ $product->price }}</div>
                        <p>Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam
                            vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet
                            quam vehicula elementum sed sit amet dui. Proin eget tortor risus.</p>
                        <form>
                            @csrf
                            <input type="hidden" value="{{$product->id}}" class="cart_product_id_{{$product->id}}">
                            <input type="hidden" value="{{$product->price}}" class="cart_product_price_{{$product->id}}">
                            <input type="hidden" value="{{$product->name}}" class="cart_product_name_{{$product->id}}">
                            <input type="hidden" value="{{$product->image}}" class="cart_product_image_{{$product->id}}">
                            <div class="product__details__quantity">
                                <div class="quantity">
                                    <div class="pro-qty">
                                        <input type="number" value="1" class="cart_product_quantity_{{$product->id}}">
                                    </div>
                                </div>
                            </div>
                            <a href="#" class="primary-btn add-to-cart" data-id="{{$product->id}}">ADD TO CARD</a>
                            <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
                        </form>

                        <ul>
                            <li><b>Availability</b> <span>In Stock</span></li>
                            <li><b>Shipping</b> <span>01 day shipping. <samp>Free pickup today</samp></span></li>
                            <li><b>Weight</b> <span>0.5 kg</span></li>
                            <li><b>Share on</b>
                                <div class="share">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                                    aria-selected="true">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab"
                                    aria-selected="false">Information</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab"
                                    aria-selected="false">Reviews <span>(1)</span></a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Products Infomation</h6>
                                    <p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.
                                        Pellentesque in ipsum id orci porta dapibus. Proin eget tortor risus. Vivamus
                                        suscipit tortor eget felis porttitor volutpat. Vestibulum ac diam sit amet quam
                                        vehicula elementum sed sit amet dui. Donec rutrum congue leo eget malesuada.
                                        Vivamus suscipit tortor eget felis porttitor volutpat. Curabitur arcu erat,
                                        accumsan id imperdiet et, porttitor at sem. Praesent sapien massa, convallis a
                                        pellentesque nec, egestas non nisi. Vestibulum ac diam sit amet quam vehicula
                                        elementum sed sit amet dui. Vestibulum ante ipsum primis in faucibus orci luctus
                                        et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam
                                        vel, ullamcorper sit amet ligula. Proin eget tortor risus.</p>
                                        <p>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Lorem
                                        ipsum dolor sit amet, consectetur adipiscing elit. Mauris blandit aliquet
                                        elit, eget tincidunt nibh pulvinar a. Cras ultricies ligula sed magna dictum
                                        porta. Cras ultricies ligula sed magna dictum porta. Sed porttitor lectus
                                        nibh. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.
                                        Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed
                                        porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum
                                        sed sit amet dui. Proin eget tortor risus.</p>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-2" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Products Infomation</h6>
                                    <p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.
                                        Pellentesque in ipsum id orci porta dapibus. Proin eget tortor risus.
                                        Vivamus suscipit tortor eget felis porttitor volutpat. Vestibulum ac diam
                                        sit amet quam vehicula elementum sed sit amet dui. Donec rutrum congue leo
                                        eget malesuada. Vivamus suscipit tortor eget felis porttitor volutpat.
                                        Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Praesent
                                        sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum ac
                                        diam sit amet quam vehicula elementum sed sit amet dui. Vestibulum ante
                                        ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;
                                        Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula.
                                        Proin eget tortor risus.</p>
                                    <p>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Lorem
                                        ipsum dolor sit amet, consectetur adipiscing elit. Mauris blandit aliquet
                                        elit, eget tincidunt nibh pulvinar a. Cras ultricies ligula sed magna dictum
                                        porta. Cras ultricies ligula sed magna dictum porta. Sed porttitor lectus
                                        nibh. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.</p>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-3" role="tabpanel">

                                <div class="product__details__tab__desc all-comment">

                                    <div class="cmt"  style="padding-bottom: 30px;">
                                        <img src="/assets/img/anonymous.png" class="rounded-circle" alt="Cinque Terre" width="40px" height="40px"style="position: absolute;">
                                        <div class="write-cmt" style="left: 50px;position: relative;">
                                            <input hidden type="text" id="productID" class="product-class" value="{{$product->id}}">
                                            <input type="text" id="cmt" class="cmt-class" style="width:100%; outline:none;border: none; border-bottom: 1px solid grey;"/>
                                            <input hidden type="text" id="parentID" class="parent-class" value="0">
                                            <button class="btn btn-secondary post-cmt" style="margin:5px;">Post</button>
                                            <button  style="border-style:none;background:none;margin:5px;" >Cancel</button>
                                        </div>
                                    </div>

                                    @foreach ($cmts as $key=>$value)
                                        <div class="read-cmt"style="padding-bottom: 15px;">
                                            <div class="user-cmt">
                                                <img src="/assets/img/anonymous.png" class="rounded-circle" alt="Cinque Terre" width="40px" height="40px"style="position: absolute;">
                                                <div class="list-respone" style="left: 50px;position: relative;">
                                                    <p style="margin-bottom:unset; font-weight:bold;" >{{$value->user->name}}</p>

                                                    <span>{{$value->comment}}</span>
                                                    <div class="emoji-like" style="padding-top: 5px;">
                                                        <i class="fa fa-thumbs-up">1000</i>
                                                        <i class="fa fa-thumbs-down">10</i>
                                                        <button  class="respone"  style="border-style:none;background:none;">Phản Hồi</button>

                                                    </div>
                                                    <input type="text" class="commentator-class" id="userID" value="{{$value->user->id}}" hidden />

                                                    <?php
                                                        $length= count($repCmt[$key]);
                                                    ?>

                                                    @for ($i=0; $i<$length; $i++)
                                                        <div class="user-rep-cmt">
                                                            <img src="/assets/img/anonymous.png" class="rounded-circle" alt="Cinque Terre" width="40px" height="40px"style="position: absolute;">
                                                            <div  style="left: 50px;position: relative;">
                                                                <p style="margin-bottom:unset; font-weight:bold;">{{$repCmt[$key][$i]->user->name}}</p>
                                                                <span>{{$repCmt[$key][$i]->comment}}</span>
                                                                <div class="emoji-like">
                                                                    <i class="fa fa-thumbs-up">1000</i>
                                                                    <i class="fa fa-thumbs-down">10</i>
                                                                    <button  class="respone" style="border-style:none;background:none;" >Phản hồi</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endfor
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

        <!-- Product Details Section End -->

    <!-- Related Product Section Begin -->
    <section class="related-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related__product__title">
                        <h2>Related Product</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="img/product/product-1.jpg">
                            <ul class="product__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">Crab Pool Security</a></h6>
                            <h5>$30.00</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="img/product/product-2.jpg">
                            <ul class="product__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">Crab Pool Security</a></h6>
                            <h5>$30.00</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="img/product/product-3.jpg">
                            <ul class="product__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">Crab Pool Security</a></h6>
                            <h5>$30.00</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="img/product/product-7.jpg">
                            <ul class="product__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">Crab Pool Security</a></h6>
                            <h5>$30.00</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
<script>
    $(document).ready(function(){

        $('.respone').click(function(){
        var commentator = $(this).parentsUntil('div.user-cmt').find('.commentator-class').val();
        console.log(commentator );
        // console.log($(this).next().is('.rep-cmt'));
        if($(this).next().is('.cmt')==false)// kiểm tra có lớp rep-cmt chưa sửa đổi đường link hình là user đang đăng nhập.prevUntil('.commentator-class')
            $(this).parent().append(' <div class="cmt"  >\
                <img src="/assets/img/anonymous.png" class="rounded-circle" alt="Cinque Terre" width="40px" height="40px"style="position: absolute;">\
                <div class="write-cmt" style="left: 50px;position: relative;">\
                    <input type="text" id="cmtContent" class="cmt-class" style="width:100%; outline:none;border: none; border-bottom: 1px solid grey;"/>\
                    <input hidden type="text" id="productID" class="product-class" value="{{$product->id}}">\
                    {{-- <input type="text" id="cmt" style="width:100%; outline:none;border: none; border-bottom: 1px solid grey;"/> --}}\
                    <input hidden type="text" id="parentID" class="parent-class" value="'+commentator+'">\
                    <button class="btn btn-secondary post-cmt" style="margin:5px;">Post</button>\
                    <button  style="border-style:none;background:none;margin:5px;" >Cancel</button>\
                </div>\
            </div>');
        // else{console.log("emoji-like !=null");}
    })

    $('body').on('click', '.post-cmt', function() {

        // var i=$('.post-cmt').index(this);
        console.log("content");
        var index=$('.post-cmt').index(this);
        console.log(index+" aaaaaa");
        //var productID=$(this).parent().find($(".cmt-class")).val();
        var productID=$(this).parentsUntil('.cmt').find($(".product-class")).val();
        var content =$(this).parentsUntil('.cmt').find($(".cmt-class")).val();
        var parentID =$(this).parentsUntil('.cmt').find($(".parent-class")).val();
        // console.log(productID+" "+content );
        //  console.log($('.account').is(".login"));
        //  console.log($('.account').is(".user"));
        if(content=="")
        {
            alert("bạn cần ghi vào trc khi gửi");

        }else{

            if($('#userlogin').text()!="")
            {

                var userID =$("#user").attr("title");

                $.ajax({
                    url: "/api/createCmt",
                    method: 'POST',
                    data: {
                        productID: productID,//nội dung, userID
                        content: content,
                        parent: parentID,//id comment cha
                        userID: userID,

                    },
                    async: false,
                    success: function(data){
                        console.log(data.res);
                        if(data.res==true){
                            PrintCmt(this,content,index);
                        }
                    }
                })
            }
            if($('#login').text()!="")
            {
                alert("bạn cần đăng nhập trc khi gửi");
            }
        }
    });


    });


    function PrintCmt(indexElCmt,content, index){

        var name=$('#userlogin').text();
        var userID=$('#userlogin').attr('title');
        // var index =$(indexElCmt).index(indexElCmt);
        // console.log(index);



        if(index==0){
            var text ='\
            <div class="read-cmt"style="padding-bottom: 15px;">\
                <div class="user-cmt">\
                    <img src="/assets/img/anonymous.png" class="rounded-circle" alt="Cinque Terre" width="40px" height="40px"style="position: absolute;">\
                        <div class="list-respone" style="left: 50px;position: relative;">\
                        <p style="margin-bottom:unset; font-weight:bold;" >'+name+'</p>\
                        <span>'+content+'</span>\
                        <div class="emoji-like" style="padding-top: 5px;">\
                            <i class="fa fa-thumbs-up">1000</i>\
                            <i class="fa fa-thumbs-down">10</i>\
                            <button  class="respone"  style="border-style:none;background:none;">Phản Hồi</button>\
                        </div>\
                        <input type="text" class="commentator-class" id="userID" value="'+userID+'" hidden />\
                    </div>\
                </div>\
                </div>';
            $('.all-comment').append(text);
            console.log("if");
        }else{
            var repCmt = $(indexElCmt).parentsUntil('.list-respone').last();
            console.log(repCmt);
            // repCmt.append("<p>fffaaaa</p>")
            var text ='\
            <div class="user-rep-cmt">\
                <img src="/assets/img/anonymous.png" class="rounded-circle" alt="Cinque Terre" width="40px" height="40px"style="position: absolute;">\
                <div  style="left: 50px;position: relative;">\
                <p style="margin-bottom:unset; font-weight:bold;">'+name+'</p>\
                    <span>'+content+'</span>\
                    <div class="emoji-like">\
                        <i class="fa fa-thumbs-up">1000</i>\
                        <i class="fa fa-thumbs-down">10</i>\
                    <button  class="respone" style="border-style:none;background:none;" >Phản hồi</button>\
                    </div>\
                </div>\
            </div>';
            repCmt.append(text);

            console.log("else");

        }
    }

</script>


@endsection





{{--
    <div class="see-cmt">
        <p style="color:DodgerBlue;"><i class="fa fa-caret-down" style="color:DodgerBlue;"></i> xem thêm bình luận</p>
    </div> --}}





