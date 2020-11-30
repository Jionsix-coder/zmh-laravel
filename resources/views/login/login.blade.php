<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>@yield('title', '') | ZMH-OnlineShop</title>
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700&amp;amp;subset=latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('plugins/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('fonts/Linearicons/Linearicons/Font/demo-files/demo.css')}}">
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('plugins/owl-carousel/assets/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('plugins/owl-carousel/assets/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{ asset('plugins/slick/slick/slick.css')}}">
    <link rel="stylesheet" href="{{ asset('plugins/nouislider/nouislider.min.css')}}">
    <link rel="stylesheet" href="{{ asset('plugins/lightGallery-master/dist/css/lightgallery.min.css')}}">
    <link rel="stylesheet" href="{{ asset('plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css')}}">
    <link rel="stylesheet" href="{{ asset('plugins/select2/dist/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">

    {{-- Google Analytics --}}
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-180642710-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-180642710-1');
    </script>

    <!-- end of google analytics -->

    <!-- extra css -->
    @yield('extra-css')
    <!-- end of extra css -->
</head>
<body>


      <!--Modal Box-->
      <div id="myModal" class="modal fade" style="margin-top:40%;z-index:999999;">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" style="font-size:18px;text-align:center;font-weight:bold;"> Welcome to ZayMinHtet Company Limited <br> ( မင်္ဂလာပါ။ ) <br> ( ဇေမင်းထက်ကုမ္ပဏီမှကြိုဆိုပါတယ်။ )</h5>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">

            </div>
            <button type="submit" data-dismiss="modal" class="btn btn-primary" style="height: 30px;font-size:14px;">Close</button>
          </div>
        </div>
      </div>
      <!-- end of modal box-->
      <header class="header header--1" data-sticky="true">
        <div class="header__top">
            <div class="ps-container">
                <div class="header__left">
                    <div class="menu--product-categories">
                        <div class="menu__toggle"><i class="icon-menu"></i><span>အမျိုးအစားများ</span></div>
                        <div class="menu__content">
                            <ul class="menu--dropdown">
                                @foreach (App\Models\Category::with('childs')->where('p_id',0)->get() as $item)
                                <li class="current-menu-item menu-item-has-children has-mega-menu"><a href="{{ route('shop.index',['category' => $item->slug]) }}"><img src="{{ productImage($item->image) }}" width="25px" height="25px" alt=""> {{ $item->name }}</a>
                                    <div class="mega-menu">
                                        <div class="mega-menu__column">
                                            <h4>{{ $item->name }}<span class="sub-toggle"></span></h4>
                                            <ul class="mega-menu__list">
                                                @foreach ($item->childs as $itemChilds)
                                                <li class="current-menu-item "><a href="{{ route('shop.index',['category' => $itemChilds->slug]) }}">{{ $itemChilds->name }}</a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div><a class="ps-logo" href="#"><img src="{{ asset('img/bg/logo.png') }}" width="30px" height="30px" alt="" style="margin-right: 5px;"><img src="{{ asset('img/logo.png') }}" alt="logo.png" width="35px" height="35px" style="width:70%;"></a>
                </div>
                <div class="header__center">
                </div>
                <div class="header__right">
                    <div class="header__actions"><a class="header__extra" href="#"><i class="icon-heart"></i><span><i>{{ Cart::instance('saveCart')->count() }}</i></span></a>
                        <div class="ps-cart--mini"><a class="header__extra" href="#"><i class="icon-bag2"></i><span><i>{{ Cart::instance('default')->count() }}</i></span></a>
                            <div class="ps-cart__content">
                                <div class="ps-cart__footer">
                                  <h3 style="text-align:center;color:red;font-weight:bold;margin:30px;">Login to account</h3>
                                </div>
                            </div>
                        </div>
                        <div class="ps-block--user-header">
                            <div class="ps-block__left"><a href="#"><i class="icon-user"></i></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </header>
      <header class="header header--mobile" data-sticky="true">
          <div class="navigation--mobile">
              <div class="navigation__left">
                <a class="ps-logo" href="#"><img src="{{ asset('img/bg/logo.png') }}" width="30px" height="30px" alt="" style="margin-right: 5px;"><img src="{{ asset('img/logo.png') }}" alt="logo.png" width="35px" height="35px" style="width:70%;"></a>
              </div>
              <div class="navigation__right">
                  <div class="header__actions">
                      <div class="ps-cart--mini"><a class="header__extra" href="#"><i class="icon-bag2"></i><span><i>{{ Cart::instance('default')->count() }}</i></span></a>
                          <div class="ps-cart__content">
                              <div class="ps-cart__items">
                              </div>
                              <div class="ps-cart__footer">
                                <h3 style="text-align:center;color:red;font-weight:bold;">Login to account</h3>
                              </div>         
                          </div>
                      </div>
                      <div class="ps-block--user-header">
                          <div class="ps-block__left"><a href="#"><i class="icon-user"></i></a></div>
                      </div>
                  </div>
              </div>
          </div>
      </header>
      <div class="ps-page--my-account">
        <div class="ps-my-account">
          <div class="container">
            <div class="ps-form--account ps-tab-root">
              <ul class="ps-tab-list" id="tabMenu">
                <li class="{{ old('tabname') == "account" ? 'active' : '' }}"><a href="#account">Login</a></li>
                <li class="{{ old('tabname') == "unicode" ? 'active' : '' }}"><a href="#unicode">Unicode</a></li>
                <li class="{{ old('tabname') == "english" ? 'active' : '' }}"><a href="#english">English</a></li>
              </ul>
              <div class="ps-tabs">
                <div class="ps-tab active" id="account">
                  <form action="{{ route('user.checklogin') }}" method="POST">
                  @csrf
                    <div class="ps-form__content">
                      <h3 style="text-align: center;border:4px double red;padding:20px;">Login Your Account</h3>
                      <br>
                      @if (session()->has('success_message'))
                        <div class="alert alert-success">
                            {{ session()->get('success_message') }}
                        </div>
                      @endif
                      @if(count($errors) > 0)
                        <div class="alert alert-danger" style="height:50px;">
                          <ul>
                            @foreach ($errors->all() as $error)
                              <li style="text-align: center">{{ $error }}</li>
                            @endforeach
                          </ul>
                        </div>
                      @endif
                      <div class="form-group">
                        <input class="form-control" name="Username" type="text" placeholder="Username" value="{{ old('Username') }}" required>
                      </div>
                      <div class="form-group">
                        <input class="form-control" name="Password" type="password" placeholder="Password" required>
                      </div>
                      <div class="form-group">
                        <input type="hidden" name="tabname" class="form-control" placeholder="CurrentOffice" value="account">
                      </div>
                      <div class="form-group submtit">
                        <button class="ps-btn ps-btn--fullwidth" type="submit" value="Login">Login</button>
                      </div>
                    </div>
                  </form>
                </div>
                <div class="ps-tab" id="unicode">
                  <form action="{{ route('user.check') }}" method="POST">
                  @csrf
                    <div class="ps-form__content">
                      <h3 style="text-align: center;border:4px double red;padding:20px;">Login with Unicode</h3>
                      <br>
                      @if (session()->has('success_message'))
                        <div class="alert alert-success">
                            {{ session()->get('success_message') }}
                        </div>
                      @endif
                      @if(count($errors) > 0)
                        <div class="alert alert-danger" style="height:50px;">
                          <ul>
                            @foreach ($errors->all() as $error)
                              <li style="text-align: center">{{ $error }}</li>
                            @endforeach
                          </ul>
                        </div>
                      @endif
                      <div class="form-group">
                        <input type="text" name="Name" class="form-control" placeholder="အမည်" value="{{ old('Name') }}" required>
                      </div>
                      <div class="form-group">
                        <input type="text" name="PositionDepartment" class="form-control" placeholder="ရာထူး | ဋ္ဌာန" value="{{ old('PositionDepartment') }}" required>
                      </div>
                      <div class="form-group">
                        <input type="text" name="CityTineState" class="form-control" placeholder="မြို့ | တိုင်း | ပြည်နယ်" value="{{ old('CityTineState') }}" required>
                      </div>
                      <div class="form-group">
                        <input type="text" name="PersonalNumber" class="form-control" placeholder="ကိုယ်ပိုင်အမှတ်" value="{{ old('PersonalNumber') }}" required>
                      </div>
                      <div class="form-group">
                        <input type="text" name="NationalNumber" class="form-control" placeholder="မှတ်ပုံတင်အမှတ်" value="{{ old('NationalNumber') }}" required>
                      </div>
                      <div class="form-group">
                        <input type="text" name="CurrentOffice" class="form-control" placeholder="လက်ရှိတာဝန်ထမ်းဆောင်သောရုံး" value="{{ old('CurrentOffice') }}" required>
                      </div>
                      <div class="form-group">
                        <input type="hidden" name="tabname" class="form-control" placeholder="CurrentOffice" value="unicode">
                      </div>
                      <div class="form-group submtit">
                        <button class="ps-btn ps-btn--fullwidth" type="submit" value="Login">Login</button>
                      </div>
                    </div>
                  </form>
                </div>
                <div class="ps-tab" id="english">
                  <form action="{{ route('user.checkenglish') }}" method="POST">
                  @csrf
                    <div class="ps-form__content">
                      <h3 style="text-align: center;border:4px double red;padding:20px;">Login with English</h3>
                      <br>
                      @if (session()->has('success_message'))
                        <div class="alert alert-success">
                            {{ session()->get('success_message') }}
                        </div>
                      @endif
                      @if(count($errors) > 0)
                        <div class="alert alert-danger" style="height:50px;">
                          <ul>
                            @foreach ($errors->all() as $error)
                              <li style="text-align: center">{{ $error }}</li>
                            @endforeach
                          </ul>
                        </div>
                      @endif
                      <div class="form-group">
                        <input type="text" name="Name" class="form-control" placeholder="Name" value="{{ old('Name') }}" required>				
                      </div>
                      <div class="form-group">
                        <input type="text" name="PositionDepartment" class="form-control" placeholder="PositionDepartment" value="{{ old('PositionDepartment') }}" required>
                      </div>
                      <div class="form-group">
                        <input type="text" name="CityTineState" class="form-control" placeholder="City | Tine | State" value="{{ old('CityTineState') }}" required>
                      </div>
                      <div class="form-group">
                        <input type="text" name="PersonalNumber" class="form-control" placeholder="Personal Number" value="{{ old('PersonalNumber') }}" required>
                      </div>
                      <div class="form-group">
                        <input type="text" name="NationalNumber" class="form-control" placeholder="National Number" value="{{ old('NationalNumber') }}" required>
                      </div>
                      <div class="form-group">
                        <input type="text" name="CurrentOffice" class="form-control" placeholder="CurrentOffice" value="{{ old('CurrentOffice') }}" required>
                      </div>
                      <div class="form-group">
                        <input type="hidden" name="tabname" class="form-control" placeholder="CurrentOffice" value="english">
                      </div>
                      <div class="form-group submtit">
                        <button class="ps-btn ps-btn--fullwidth" type="submit" value="Login">Login</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="ps-footer">
        <div class="ps-container">
            <div class="ps-footer__widgets">
                <aside class="widget widget_footer widget_contact-us">
                    <h4 class="widget-title">Contact us</h4>
                    <div class="widget_content">
                        <p>Call us 24/7</p>
                        <h3>+95-9-898155551</h3>
                        <p>အမှတ်(၂၀၀/၂၀၆),(၉)လွှာ,၁၃၄လမ်းနှင့်၁၃၅လမ်းကြား,စက်ရုံလမ်း,မအူကုန်းရပ်ကွက်,တာမွေမြို့နယ်,ရန်ကုန်တိုင်းဒေသကြီး. <br><br><a href="mailto:zayminhtetcompanylimited@gmail.com">zayminhtetcompanylimited@gmail.com</a></p>
                        <ul class="ps-list--social">
                            <li><a class="facebook" href="https://www.facebook.com/Zay-Min-Htet-Company-Limited-575814903055402"><i class="fa fa-facebook"></i></a></li>
                            <li><a class="google-plus" href="mailto:zayminhtetcompanylimited@gmail.com"><i class="fa fa-google-plus"></i></a></li>
                            <li><a class="instagram" href="#"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </aside>
            </div>
            <div class="ps-footer__copyright" style="margin-bottom:40px;">
                <p>© 2020 ZayMinHtet. All Rights Reserved</p>
                <p><a href="https://m.facebook.com/jionsix.hacknh/">Web Design By Night Hunter</a></p>
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
              <form class="ps-form--primary-search" action="do_action" method="post">
                  <input class="form-control" type="text" placeholder="Search for...">
                  <button><i class="aroma-magnifying-glass"></i></button>
              </form>
          </div>
      </div>
      <div class="modal fade" id="product-quickview" tabindex="-1" role="dialog" aria-labelledby="product-quickview" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content"><span class="modal-close" data-dismiss="modal"><i class="icon-cross2"></i></span>
                  <article class="ps-product--detail ps-product--fullwidth ps-product--quickview">
                      <div class="ps-product__header">
                          <div class="ps-product__thumbnail" data-vertical="false">
                              <div class="ps-product__images" data-arrow="true">
                                  <div class="item"><img src="img/products/detail/fullwidth/1.jpg" alt=""></div>
                                  <div class="item"><img src="img/products/detail/fullwidth/2.jpg" alt=""></div>
                                  <div class="item"><img src="img/products/detail/fullwidth/3.jpg" alt=""></div>
                              </div>
                          </div>
                          <div class="ps-product__info">
                              <h1>Marshall Kilburn Portable Wireless Speaker</h1>
                              <div class="ps-product__meta">
                                  <p>Brand:<a href="shop-default.html">Sony</a></p>
                              </div>
                              <h4 class="ps-product__price">$36.78 – $56.99</h4>
                              <div class="ps-product__desc">
                                  <p>Sold By:<a href="shop-default.html"><strong> Go Pro</strong></a></p>
                                  <ul class="ps-list--dot">
                                      <li> Unrestrained and portable active stereo speaker</li>
                                      <li> Free from the confines of wires and chords</li>
                                      <li> 20 hours of portable capabilities</li>
                                      <li> Double-ended Coil Cord with 3.5mm Stereo Plugs Included</li>
                                      <li> 3/4″ Dome Tweeters: 2X and 4″ Woofer: 1X</li>
                                  </ul>
                              </div>
                              <div class="ps-product__shopping"><a class="ps-btn ps-btn--black" href="#">Add to cart</a><a class="ps-btn" href="#">Buy Now</a>
                                  <div class="ps-product__actions"><a href="#"><i class="icon-heart"></i></a><a href="#"><i class="icon-chart-bars"></i></a></div>
                              </div>
                          </div>
                      </div>
                  </article>
              </div>
          </div>
      </div>


  <script src="{{ asset('plugins/jquery.min.js')}}"></script>
  <script src="{{ asset('plugins/nouislider/nouislider.min.js')}}"></script>
  <script src="{{ asset('plugins/popper.min.js')}}"></script>
  <script src="{{ asset('plugins/owl-carousel/owl.carousel.min.js')}}"></script>
  <script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js')}}"></script>
  <script src="{{ asset('plugins/imagesloaded.pkgd.min.js')}}"></script>
  <script src="{{ asset('plugins/masonry.pkgd.min.js')}}"></script>
  <script src="{{ asset('plugins/isotope.pkgd.min.js')}}"></script>
  <script src="{{ asset('plugins/jquery.matchHeight-min.js')}}"></script>
  <script src="{{ asset('plugins/slick/slick/slick.min.js')}}"></script>
  <script src="{{ asset('plugins/jquery-bar-rating/dist/jquery.barrating.min.js')}}"></script>
  <script src="{{ asset('plugins/slick-animation.min.js')}}"></script>
  <script src="{{ asset('plugins/lightGallery-master/dist/js/lightgallery-all.min.js')}}"></script>
  <script src="{{ asset('plugins/sticky-sidebar/dist/sticky-sidebar.min.js')}}"></script>
  <script src="{{ asset('plugins/select2/dist/js/select2.full.min.js')}}"></script>
  <script src="{{ asset('plugins/gmap3.min.js')}}"></script>
  <!-- custom scripts-->
  <script src="{{ asset('js/main.js')}}"></script>
</body>
<script>
	$(document).ready(function(){
		$("#myModal").modal('show');
	});
  //redirect to specific tab
  $(document).ready(function () {
  $('#tabMenu a[href="#{{ old('tabname') }}"]').tab('show')
  });
</script>
</html>
  