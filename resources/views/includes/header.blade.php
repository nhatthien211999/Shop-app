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
                            <div class="header__top__right__auth">
                                {{-- @if()
                                <a href="{{ route('login') }}"><i class="fa fa-user"></i> Login</a>
                                <a href="{{ route('register') }}"><i class="fa fa-user"></i> register</a> --}}

                                <!-- Authentication Links -->
                                @guest
                                    @if (Route::has('login'))
                                        <a  href="{{ route('login') }}">{{ __('Login') }}</a>
                                    @endif

                                    @if (Route::has('register'))
                                        <a  href="{{ route('register') }}">{{ __('Register') }}</a>
                                    @endif
                                @else
                                    <a  href="#"> {{ Auth::user()->name }}</a>
                                    <a  href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
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
                            <li><a href="/myshop">Shop</a></li>
                            <li><a href="#">Pages</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="./shop-details.html">Shop Details</a></li>
                                    <li><a href="carts/cart">Shoping Cart</a></li>
                                    <li><a href="./checkout.html">Check Out</a></li>
                                    <li><a href="./blog-details.html">Blog Details</a></li>
                                </ul>
                            </li>
                            <li><a href="./blog.html">Blog</a></li>
                            <li><a href="./contact.html">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
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
