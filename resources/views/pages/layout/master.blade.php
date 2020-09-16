<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ trans('message.title')}}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>
<!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
        </div>
            <div class="humberger__menu__overlay"></div>
            <div class="humberger__menu__wrapper">
                <div class="humberger__menu__logo">
                    <a href="#"><img src="img/logo.png" alt=""></a>
                </div>
                <div class="humberger__menu__cart">
                    <ul>
                        <li><a href="#"><i class="fa fa-heart"></i> <span>{{ trans('message.totalfavorite')}}</span></a></li>
                        <li><a href="{{route('showcart')}}"><i class="fa fa-shopping-bag"></i> <span>{{ trans('message.totalfavorite')}}</span></a></li>
                    </ul>
                    <div class="header__cart__price"><span>{{ trans('message.price')}}</span></div>
                </div>
                <div class="humberger__menu__widget">
                    <div class="header__top__right__language">
                        <img src="img/language.png" alt="">
                        <div>{{ trans('message.english')}}</div>
                        <span class="arrow_carrot-down"></span>
                        <ul>
                            <li><a href="#">{{ trans('message.spanis')}}</a></li>
                            <li><a href="#">{{ trans('message.price')}}</a></li>
                        </ul>
                    </div>
                    <div class="header__top__right__auth">
                        <a href="#"><i class="fa fa-user"></i> {{ trans('message.login')}}</a>
                    </div>
                </div>
                <nav class="humberger__menu__nav mobile-menu">
                    <ul>
                        <li class="active"><a href="{{route('showcart')}}">{{ trans('message.home')}}</a></li>
                        <li><a href="./shop-grid.html">{{ trans('message.shop')}}</a></li>
                        <li><a href="#">{{ trans('message.pages')}}</a>
                            <ul class="header__menu__dropdown">
                                <li><a href="./shop-details.html">{{ trans('message.shopdetails')}}</a></li>
                                <li><a href="./shoping-cart.html">{{ trans('message.shopingcart')}}</a></li>
                                <li><a href="./checkout.html">{{ trans('message.checkout')}}</a></li>
                                <li><a href="./blog-details.html">{{ trans('message.blogdetails')}}</a></li>
                            </ul>
                        </li>
                        <li><a href="./blog.html">{{ trans('message.blogdetails')}}</a></li>
                        <li><a href="./contact.html">{{ trans('message.contact')}}</a></li>
                    </ul>
                </nav>
                <div id="mobile-menu-wrap"></div>
                <div class="header__top__right__social">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-linkedin"></i></a>
                    <a href="#"><i class="fa fa-pinterest-p"></i></a>
                </div>
                <div class="humberger__menu__contact">
                    <ul>
                        <li><i class="fa fa-envelope"></i> {{ trans('message.emaill')}}</li>
                        <li>{{ trans('message.frees')}}</li>
                    </ul>
                </div>
            </div>

            @include('pages.components.header')

            @include('pages.components.navigation')

            @yield('content')

            @include('pages.components.footer')

        </div>
    </div>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main2.js"></script>
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
