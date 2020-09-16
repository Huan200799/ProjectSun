<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__left">
                        <ul>
                            <li><i class="fa fa-envelope"></i> {{ trans('message.emaill')}}</li>
                            <li>{{ trans('message.frees')}}</li>
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
                            <div>{{ trans('message.english')}}</div>
                            <span class="arrow_carrot-down"></span>
                            <ul>
                                <li><a href="#">{{ trans('message.spanis')}}</a></li>
                                <li><a href="#">{{ trans('message.english')}}</a></li>
                            </ul>
                        </div>
                        <div id="app" class="header__top__right__auth">
                                <!-- Authentication Links -->
                                @guest
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ trans('message.login') }}</a>
                                    </li>
                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('register') }}">{{ trans('message.register') }}</a>
                                        </li>
                                    @endif
                                @else
                                    <li class="nav-item dropdown ">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ trans('message.welcome') }}   {{ Auth::user()->name_user }}
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{asset('profile')}}">
                                                    {{ trans('message.MyProfile') }}
                                                </a>
                                            <a class="dropdown-item" id="logout_btn">
                                                {{ trans('message.logout') }}
                                            </a>
                                        </div>
                                    </li>
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
                    <a href="./index.html"><img src="img/logo.png" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6">
                <nav class="header__menu">
                    <ul>
                        <li class="active"><a href="./index.html">{{ trans('message.home')}}</a></li>
                        <li><a href="./shop-grid.html">Shop</a></li>
                        <li><a href="#">{{ trans('message.page')}}</a>
                            <ul class="header__menu__dropdown">
                                <li><a href="./shop-details.html">{{ trans('message.shopdetails')}}</a></li>
                                <li><a href="./shoping-cart.html">{{ trans('message.shopingcart')}}</a></li>
                                <li><a href="./checkout.html">{{ trans('message.checkout')}}</a></li>
                                <li><a href="./blog-details.html">{{ trans('message.blogdetails')}}</a></li>
                            </ul>
                        </li>
                        <li><a href="./contact.html">{{ trans('message.contact')}}</a></li>
                        @guest
                        @else
                        <li><a href="{{asset('suggest')}}">{{ trans('message.gopy')}}</a></li>
                        @endguest
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">
                <div class="header__cart">
                    <ul>
                        <li><a href="#"><i class="fa fa-heart"></i> <span>{{ trans('message.totalfavorite')}}</span></a></li>
                        <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>{{ trans('message.totalfavorite')}}</span></a></li>
                    </ul>
                    <div class="header__cart__price">item: <span>{{ trans('message.dolla')}}</span></div>
                </div>
            </div>
        </div>
        <div class="humberger__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>
