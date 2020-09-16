<footer class="footer spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="footer__about">
                    <div class="footer__about__logo">
                        <a href="./index.html"><img src="img/logo.png" alt=""></a>
                    </div>
                    <ul>
                        <li>{{ trans('message.addresshome')}}</li>
                        <li>{{ trans('message.numberphone')}}</li>
                        <li>{{ trans('message.emaill')}}</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                <div class="footer__widget">
                    <h6>{{ trans('message.usefullinks')}}</h6>
                    <ul>
                        <li><a href="#">{{ trans('message.aboutus')}}About Us</a></li>
                        <li><a href="#">{{ trans('message.aboutourshop')}}</a></li>
                        <li><a href="#">{{ trans('message.secureshopping')}}</a></li>
                        <li><a href="#">{{ trans('message.deliveryinfomation')}}</a></li>
                        <li><a href="#">{{ trans('message.privacypolicy')}}</a></li>
                        <li><a href="#">{{ trans('message.title')}}Our Sitemap</a></li>
                    </ul>
                    <ul>
                        <li><a href="#">{{ trans('message.whoweare')}}</a></li>
                        <li><a href="#">{{ trans('message.ourservices')}}</a></li>
                        <li><a href="#">{{ trans('message.projects')}}</a></li>
                        <li><a href="#">{{ trans('message.contact')}}</a></li>
                        <li><a href="#">{{ trans('message.innovation')}}</a></li>
                        <li><a href="#">{{ trans('message.testimonials')}}</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="footer__widget">
                    <h6>{{ trans('message.joinour')}}</h6>
                    <p>{{ trans('message.gete')}}</p>
                    <form action="#">
                        <input type="text" placeholder="Enter your mail">
                        <button type="submit" class="site-btn">{{ trans('message.subscribe')}}</button>
                    </form>
                    <div class="footer__widget__social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-pinterest"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="footer__copyright">
                    <div class="footer__copyright__text">
                        <p>{{ trans('message.copyright')}}  &copy;<script>document.write(new Date().getFullYear());</script>{{ trans('message.allr')}}<i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a></p></div>
                    <div class="footer__copyright__payment"><img src="img/payment-item.png" alt=""></div>
                </div>
            </div>
        </div>
    </div>
</footer>
