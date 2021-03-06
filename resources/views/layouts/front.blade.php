<!DOCTYPE html>
<html lang="en">
  
<!--  27:02-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>Chikery | HTML Template</title><link href="https://fonts.googleapis.com/css?family=Cormorant+Garamond:300i,400,400i,500,500i,600,600i,700&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('plugins/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/bootstrap4/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/owl-carousel/assets/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/slick/slick/slick.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/lightGallery-master/dist/css/lightgallery.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/jquery-ui/jquery-ui.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/select2/dist/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/chikery-icon/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    @yield('styles')
  </head>
  <body>
  <header class="header header--default header--home-4 line" data-sticky="true">
      <div class="header__left">
        <ul class="ps-list--social">
          <li><a href="#"><i class="fa fa-facebook"></i></a></li>
          <li><a href="#"><i class="fa fa-twitter"></i></a></li>
          <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
          <li><a href="#"><i class="fa fa-instagram"></i></a></li>
        </ul>
      </div>
      <div class="header__center">
        <nav class="header__navigation left">
          <ul class="menu">
            <li class="menu-item-has-children"><a href="index-2.html">Home</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
              
            </li>
            <li class="menu-item-has-children"><a href="{{route('products')}}">Shop</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
              <ul class="sub-menu">
                <li class="current-menu-item "><a href="shop-default.html">Shop Default</a>
                </li>
                <li class="current-menu-item "><a href="shop-fullwidth.html">Shop Fullwidth</a>
                </li>
                <li class="current-menu-item "><a href="shop-fullwidth-no-sidebar.html">Shop Fullwidth No Sidebar</a>
                </li>
                <li class="current-menu-item "><a href="shop-no-sidebar.html">Shop No Sidebar</a>
                </li>
                <li class="current-menu-item "><a href="shop-sidebar-right.html">Shop Sidebar Right</a>
                </li>
                <li class="current-menu-item "><a href="shop-horizontal.html">Shop Horizontal</a>
                </li>
                <li class="menu-item-has-children"><a href="product-default.html">Product</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
                  <ul class="sub-menu">
                    <li class="current-menu-item "><a href="product-default.html">Product Default</a>
                    </li>
                    <li class="current-menu-item "><a href="product-background.html">Product Background</a>
                    </li>
                    <li class="current-menu-item "><a href="product-background-center.html">Product Background Center</a>
                    </li>
                    <li class="current-menu-item "><a href="product-background-center-2.html">Product Background Center 2</a>
                    </li>
                    <li class="current-menu-item "><a href="product-sticky.html">Product Sticky</a>
                    </li>
                    <li class="current-menu-item "><a href="product-thumbnail-left.html">Product Thumbnail Left</a>
                    </li>
                  </ul>
                </li>
              </ul>
            </li>
            <li class="current-menu-item "><a href="{{ route('about-us')}} ">About</a>
            </li>
          </ul>
        </nav>
        <div class="header__logo"><a class="ps-logo" href="index-2.html"><img src="img/logo.png" alt=""></a></div>
        <nav class="header__navigation right">
          <ul class="menu">
            <li class="current-menu-item "><a href="{{ route('contact-us') }}">Contact</a>
            </li>
          </ul>
        </nav>
      </div>
      <div class="header__right">
        <div class="header__actions"><a class="ps-search-btn" href="#"><i class="fa fa-search"></i></a><a href="#"><i class="fa fa-heart-o"></i></a>
          <div class="ps-cart--mini"><a class="ps-cart__toggle" href="#"><i class="fa fa-shopping-basket"></i><span><i id="cart_total_elements">0</i></span></a>
            <div class="ps-cart__content">
              <div class="ps-cart__items">
              </div>
              <div class="ps-cart__footer">
                <h3>Sub Total:<strong id="total-cart">$0.00</strong></h3>
                <figure class="cart-figure"><a class="ps-btn" href="{{ route('cart') }}">View Cart</a></figure>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
    <header class="header header--mobile" data-sticky="false">
      <div class="header__content">
        <div class="header__left"><a class="ps-toggle--sidebar" href="#navigation-mobile"><i class="fa fa-bars"></i></a></div>
        <div class="header__center"><a class="ps-logo" href="#"><img src="img/logo.png" alt=""></a></div>
        <div class="header__right">
          <div class="header__actions"><a href="#"><i class="fa fa-heart-o"></i></a></div>
        </div>
      </div>
    </header>
    <div class="ps-panel--sidebar" id="cart-mobile">
      <div class="ps-panel__header">
        <h3>Shopping Cart</h3>
      </div>
      <div class="navigation__content">
        <div class="ps-cart--mobile">
          <div class="ps-cart__content">
            <div class="ps-cart__items">
              
            </div>
            <div class="ps-cart__footer">
              <h3>Sub Total:<strong id="total-cart">$0.00</strong></h3>
              <figure><a class="ps-btn" href="{{ route('cart') }}">View Cart</a><a class="ps-btn ps-btn--dark" href="checkout.html">Checkout</a></figure>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="ps-panel--sidebar" id="navigation-mobile">
      <div class="ps-panel__header">
        <h3>Menu</h3>
      </div>
      <div class="ps-panel__content">
        <ul class="menu--mobile">
          <li class="menu-item-has-children"><a href="index-2.html">Home</a><span class="sub-toggle"></span>
            <ul class="sub-menu">
              <li class="current-menu-item "><a href="index-2.html">Homepage 1</a>
              </li>
              <li class="current-menu-item "><a href="homepage-2.html">Homepage 2</a>
              </li>
              <li class="current-menu-item "><a href="homepage-3.html">Homepage 3</a>
              </li>
              <li class="current-menu-item "><a href="homepage-4.html">Homepage 4</a>
              </li>
              <li class="current-menu-item "><a href="homepage-5.html">Homepage 5</a>
              </li>
              <li class="current-menu-item "><a href="homepage-6.html">Homepage 6</a>
              </li>
            </ul>
          </li>
          <li class="menu-item-has-children"><a href="shop-default.html">Shop</a><span class="sub-toggle"></span>
            <ul class="sub-menu">
              <li class="current-menu-item "><a href="shop-default.html">Shop Default</a>
              </li>
              <li class="current-menu-item "><a href="shop-fullwidth.html">Shop Fullwidth</a>
              </li>
              <li class="current-menu-item "><a href="shop-fullwidth-no-sidebar.html">Shop Fullwidth No Sidebar</a>
              </li>
              <li class="current-menu-item "><a href="shop-no-sidebar.html">Shop No Sidebar</a>
              </li>
              <li class="current-menu-item "><a href="shop-sidebar-right.html">Shop Sidebar Right</a>
              </li>
              <li class="current-menu-item "><a href="shop-horizontal.html">Shop Horizontal</a>
              </li>
              <li class="menu-item-has-children"><a href="product-default.html">Product</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
                <ul class="sub-menu">
                  <li class="current-menu-item "><a href="product-default.html">Product Default</a>
                  </li>
                  <li class="current-menu-item "><a href="product-background.html">Product Background</a>
                  </li>
                  <li class="current-menu-item "><a href="product-background-center.html">Product Background Center</a>
                  </li>
                  <li class="current-menu-item "><a href="product-background-center-2.html">Product Background Center 2</a>
                  </li>
                  <li class="current-menu-item "><a href="product-sticky.html">Product Sticky</a>
                  </li>
                  <li class="current-menu-item "><a href="product-thumbnail-left.html">Product Thumbnail Left</a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
          <li class="current-menu-item "><a href="about-us.html">About</a>
          </li>
          <li class="menu-item-has-children"><a href="about-us.html">Pages</a><span class="sub-toggle"></span>
            <ul class="sub-menu">
              <li class="current-menu-item "><a href="about-us.html">About</a>
              </li>
              <li class="current-menu-item "><a href="homepage-2.html">Checkout</a>
              </li>
              <li class="current-menu-item "><a href="whishlist.html">Whishlist</a>
              </li>
              <li class="current-menu-item "><a href="homepage-4.html">Compare</a>
              </li>
            </ul>
          </li>
          <li class="menu-item-has-children"><a href="blog-grid.html">News</a><span class="sub-toggle"></span>
            <ul class="sub-menu">
              <li class="current-menu-item "><a href="blog-grid.html">Blog grid</a>
              </li>
              <li class="current-menu-item "><a href="blog-grid-full-width.html">Blog grid fullwidth</a>
              </li>
              <li class="current-menu-item "><a href="blog-list.html">Blog List</a>
              </li>
              <li class="current-menu-item "><a href="blog-detail.html">Blog Detail</a>
              </li>
            </ul>
          </li>
          <li class="current-menu-item "><a href="contact-us.html">Contact</a>
          </li>
        </ul>
      </div>
    </div>
    <div class="navigation--list">
      <div class="navigation__content"><a class="navigation__item active" href="index-2.html"><i class="fa fa-home"></i></a><a class="navigation__item ps-toggle--sidebar" href="#navigation-mobile"><i class="fa fa-bars"></i></a><a class="navigation__item ps-toggle--sidebar" href="#search-sidebar"><i class="fa fa-search"></i></a><a class="navigation__item ps-toggle--sidebar" href="#cart-mobile"><i class="fa fa-shopping-basket"></i></a></div>
    </div>
    <!--include search-sidebar-->
    <div id="homepage-1">
    @yield('content')
        
    </div>
    <footer class="ps-footer">
      <div class="ps-footer__content">
        <div class="container">
          <div class="ps-footer__left">
            <form class="ps-form--footer-subscribe" action="#" method="get">
              <h3>Get news & offer</h3>
              <p>Sign up for our mailing list to get latest update and offers</p>
              <div class="form-group--inside">
                <input class="form-control" type="text" placeholder="Your email...">
                <button><i class="fa fa-arrow-right"></i></button>
              </div>
              <p>* Don't worry, we never spam</p>
            </form>
          </div>
          <div class="ps-footer__center">
            <div class="ps-site-info"><a class="ps-logo" href="index-2.html"><img src="{{asset('img/logo.png')}}" alt=""></a>
              <p>004 Riley Street, Surry Hills 2050 Sydney, Australia</p>
              <p>Email:<a href="#"> <span class="__cf_email__" data-cfemail="4a23242c250a24253f3e222f272f3964292527">[email&#160;protected]</span></a></p>
              <p>Phone:<span class="ps-hightlight"> +455 45 454555</span></p>
            </div>
          </div>
          <div class="ps-footer__right">
            <aside class="widget widget_footer">
              <h3 class="widget-title">Opening Time</h3>
              <p>Monday - Friday:  <span>08:00 am - 08:30 pm</span></p>
              <p>Saturday - Sunday:  <span>10:00 am - 16:30 pm</span></p>
              <ul class="ps-list--payment-method">
                <li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
                <li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
                <li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
                <li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
              </ul>
            </aside>
          </div>
        </div>
      </div>
      <div class="ps-footer__bottom">
        <div class="container">
          <ul class="ps-list--social">
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
            <li><a href="#"><i class="fa fa-youtube-play"></i></a></li>
          </ul>
          <p><a href="https://www.templateshub.net" target="_blank">Templates Hub</a></p>
        </div>
      </div>
    </footer>
   
    <div id="back2top"><i class="pe-7s-angle-up"></i></div>
    <div class="ps-site-overlay"></div>
    <div id="loader-wrapper">
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
    </div>
    <div class="ps-search" id="site-search"><a class="ps-btn--close" href="#"></a>
      <div class="ps-search__content">
        <form class="ps-form--primary-search" action="#" method="post">
          <input class="form-control" type="text" placeholder="Search for...">
          <button><i class="fa fa-search"></i></button>
        </form>
      </div>
    </div>
    <!-- Plugins-->
    <script src="{{asset('plugins/jquery-1.12.4.min.js')}}"></script>
    <script src="{{asset('plugins/owl-carousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('plugins/bootstrap4/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('plugins/imagesloaded.pkgd.js')}}"></script>
    <script src="{{asset('plugins/masonry.pkgd.min.js')}}"></script>
    <script src="{{asset('plugins/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('plugins/jquery.matchHeight-min.js')}}"></script>
    <script src="{{asset('plugins/slick/slick/slick.min.js')}}"></script>
    <script src="{{asset('plugins/jquery-bar-rating/dist/jquery.barrating.min.js')}}"></script>
    <script src="{{asset('plugins/slick-animation.min.js')}}"></script>
    <script src="{{asset('plugins/lightGallery-master/dist/js/lightgallery-all.min.js')}}"></script>
    <script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    <script src="{{asset('plugins/sticky-sidebar/dist/sticky-sidebar.min.js')}}"></script>
    <script src="{{asset('plugins/jquery.slimscroll.min.js')}}"></script>
    <script src="{{asset('plugins/select2/dist/js/select2.full.min.js')}}"></script>
    <script src="{{asset('plugins/gmap3.min.js')}}"></script>
    <script src="{{asset('/js/cart.js')}}" defer></script>
    <!-- Custom scripts-->
    <script src="{{asset('js/main.js')}}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDxflHHc5FlDVI-J71pO7hM1QJNW1dRp4U&amp;region=GB"></script>
    @yield('scripts')
  </body>
<!--  29:51-->
</html>