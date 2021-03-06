<header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
                                <li>Free Shipping for all Order of $99</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div>
                            <div class="header__top__right__language">
                                <img src="img/language.png" alt="">
                                <div>English</div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="#">Spanis</a></li>
                                    <li><a href="#">English</a></li>
                                </ul>
                            </div>
                            <div class="header__top__right__auth account">
                                {{-- @if()
                                <a href="{{ route('login') }}"><i class="fa fa-user"></i> Login</a>
                                <a href="{{ route('register') }}"><i class="fa fa-user"></i> register</a> --}}

                                <!-- Authentication Links -->
                                @guest
                                    @if (Route::has('login'))
                                        <a id="login" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    @endif

                                    @if (Route::has('register'))
                                        <a id="register" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    @endif
                                @else
                                    <a id="userlogin" title="{{ Auth::user()->id}}" href="#"> {{ Auth::user()->name }}</a>
                                    <a id="logout" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>

                                @endguest


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="#"><img src="" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="/">Home</a></li>
                            @if (Auth::user())

                                <li><a href="{{route('shops.listShop')}}">Shop</a></li>

                            @else
                                <li><a href="{{route('login')}}">Shop</a></li>
                            @endif

                            <li><a href="#">Pages</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="./shop-details.html">Shop Details</a></li>
                                    <li><a href="carts/cart">Shoping Cart</a></li>
                                    <li><a href="./checkout.html">Check Out</a></li>
                                    <li><a href="./blog-details.html">Blog Details</a></li>
                                </ul>
                            </li>
                            <li><a href="./blog.html">Blog</a></li>
                            @if (Auth::user())
                                @if(Auth::user()->shop)
                                    <li><a href="{{route('menus.index', ['id' => Auth::user() ? Auth::user()->id : null])}}">My Shop</a></li>   
                                @else
                                    <li><a href="{{route('shops.create')}}">My Shop</a></li>
                                @endif
                            @else 
                                <li><a href="{{route('login')}}">My Shop</a></li>
                            @endif
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li><a href="{{ route('favourites.view') }}"><i class="fa fa-heart"></i>
                                <span id="total_favourite">
                                    <?php
                                        $total = 0;
                                        $favourite = session()->get('favourite');
                                        if($favourite){
                                            foreach($favourite as $key => $val){
                                                $total += $val['product_quantity'];
                                            }
                                        }
                                        echo $total;
                                    ?>
                                </span>
                            </a></li>

                            <li><a href="{{route('carts.view')}}">
                                <i class="fa fa-shopping-bag"></i>
                                <span id="total">
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
                                </span>
                            </a></li>
                        </ul>
                        <div class="header__cart__price">Price:
                            <span id="total_price">
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
                        </div>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
