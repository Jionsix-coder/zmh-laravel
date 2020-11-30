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
    <link rel="stylesheet" href="{{ asset('css/color.css')}}">
</head>

<body>
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
                    </div><a class="ps-logo" href="{{ route('landing.page') }}"><img src="{{ asset('img/bg/logo.png') }}" width="30px" height="30px" alt="" style="margin-right: 5px;"><img src="{{ asset('img/logo.png') }}" alt="logo.png" width="35px" height="35px" style="width:70%;"></a>
                </div>
                <div class="header__center">
                    <form class="ps-form--quick-search" action="{{ route('shop.search') }}" method="GET">
                        <input class="form-control" type="text" placeholder="ပစ္စည်းများရှာရန်" name="query" value="{{ request()->input('query') }}" id="input-search query">
                        <button>Search</button>
                    </form>
                </div>
                <div class="header__right">
                    <div class="header__actions"><a class="header__extra" href="{{ route('cart.save') }}"><i class="icon-heart"></i><span><i>{{ Cart::instance('saveCart')->count() }}</i></span></a>
                        <div class="ps-cart--mini"><a class="header__extra" href="#"><i class="icon-bag2"></i><span><i>{{ Cart::instance('default')->count() }}</i></span></a>
                            <div class="ps-cart__content">
                                @foreach (Cart::instance('default')->content() as $item)
                                <div class="ps-cart__items">
                                    <div class="ps-product--cart-mobile">
                                        <div class="ps-product__thumbnail"><a href="{{ route('shop.show', $item->model->slug) }}"><img src="{{ productImage($item->model->image) }}" alt="{{ $item->model->name }}"></a></div>
                                        <div class="ps-product__content">
                                            <form action="{{ route('cart.destroy',$item->rowId) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                                <button class="ps-product__remove" ><i class="icon-cross"></i></button>
                                            </form>
                                            <a href="{{ route('shop.show', $item->model->slug) }}">{{ $item->model->name }}</a>
                                            <small>(1 x {{ presentPrice($item->model->price) }})</small>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <div class="ps-cart__footer">
                                    @if(Cart::instance('default')->count() > 0)
                                    <h3>Sub Total:<strong>{{ presentPrice(Cart::instance('default')->subtotal()) }}</strong></h3>
                                    <figure><a href="#"></a><a class="ps-btn" href="{{ route('cart.index') }}">ဈေးခြင်းသို့</a></figure>
                                    @else
                                        <h3 style="text-align:center;color:red;font-weight:bold;margin:30px;">ဈေးခြင်းတွင်ပစ္စည်းမရှိပါ။</h3>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="ps-block--user-header">
                            <div class="ps-block__left"><a href="{{ route('profile.index') }}"><i class="icon-user"></i></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navigation">
            <div class="ps-container">
                <div class="navigation__left">
                    <div class="menu--product-categories">
                        <div class="menu__toggle"><i class="icon-menu"></i><span>အမျိုးအစားများ</span></div>
                        <div class="menu__content">
                            <ul class="menu--dropdown">
                                @foreach (App\Models\Category::with('childs')->where('p_id',0)->get() as $item)
                                <li class="current-menu-item menu-item-has-children has-mega-menu"><a href="#"><img src="{{ productImage($item->image) }}" width="25px" height="25px" alt=""> {{ $item->name }}</a>
                                    <div class="mega-menu">
                                        <div class="mega-menu__column">
                                            <h4><a href="{{ route('shop.index',['category' => $item->slug]) }}" style="font-weight: bolder;">{{ $item->name }}</a></h4>
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
                    </div>
                </div>
                <div class="navigation__right">
                    <ul class="menu">
                        <li class="menu-item-has-children"><a href="{{ route('landing.page') }}">ပင်မ</a></li>
                        <li class="menu-item-has-children has-mega-menu"><a href="{{ route('shop.index') }}">စျေးဝယ်ရန်</a></li>
                        <li class="menu-item-has-children has-mega-menu"><a href="{{ route('navbar.discipline') }}">စည်းမျဉ်းစည်းကမ်း</a></li>
                        <li class="menu-item-has-children has-mega-menu"><a href="{{ route('pages.contactUs') }}">ဆက်သွယ်ရန်</a></li>
                    </ul>
                    <ul class="navigation__extra">
                        <li><a href="{{ route('navbar.aboutmember') }}">အဖွဲ့ဝင်များသိထားရန်</a></li>
                        <li><a href="{{ route('navbar.newmember') }}">အဖွဲ့ဝင်သစ်လိုအပ်ချက်</a></li>
                        <li><a href="{{ route('navbar.armakhan') }}">အာမခံ</a></li>
                        <li><a href="{{ route('profile.index') }}">အကောင့်</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <header class="header header--mobile" data-sticky="true">
        <div class="header__top">
            <div class="header__left">
                <p>Welcome to ZMH-OnlineShop!</p>
            </div>
            <div class="header__right">
                <ul class="navigation__extra">
                    <li><a href="#">Sell on Martfury</a></li>
                    <li><a href="#">Tract your order</a></li>
                    <li>
                        <div class="ps-dropdown"><a href="#">US Dollar</a>
                            <ul class="ps-dropdown-menu">
                                <li><a href="#">Us Dollar</a></li>
                                <li><a href="#">Euro</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <div class="ps-dropdown language"><a href="#"><img src="img/flag/en.png" alt="">English</a>
                            <ul class="ps-dropdown-menu">
                                <li><a href="#"><img src="img/flag/germany.png" alt=""> Germany</a></li>
                                <li><a href="#"><img src="img/flag/fr.png" alt=""> France</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="navigation--mobile">
            <div class="navigation__left"><a class="header__back" href="{{ route('shop.index') }}"><i class="icon-chevron-left"></i><strong> Back to Shop</strong></a></div>
            <div class="navigation__right">
                <div class="header__actions">
                    <div class="ps-cart--mini"><a class="header__extra" href="#"><i class="icon-bag2"></i><span><i>{{ Cart::count() }}</i></span></a>
                        <div class="ps-cart__content">
                            <div class="ps-cart__items">
                                @foreach (Cart::content() as $item)
                                    <div class="ps-product--cart-mobile">
                                        <div class="ps-product__thumbnail"><a href="{{ route('shop.show', $item->model->slug) }}"><img src="{{ productImage($item->model->image) }}" alt="{{ $item->model->name }}"></a></div>
                                        <div class="ps-product__content">
                                            <form action="{{ route('cart.destroy',$item->rowId) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                                <button class="ps-product__remove" ><i class="icon-cross"></i></button>
                                            </form>
                                            <a href="{{ route('shop.show', $item->model->slug) }}">{{ $item->model->name }}</a>
                                            
                                            <small>1 x {{ presentPrice($item->model->price) }} (-{{ $item->model->discountPercent > 0 ? $item->model->discountPercent : '0'  }}%)</small>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="ps-cart__footer">
                                @if(Cart::count() > 0)
                                <h3>Sub Total:<strong>{{ presentPrice(Cart::subtotal()) }}</strong></h3>
                                <figure><a href="#"></a><a class="ps-btn" href="{{ route('cart.index') }}">ဈေးခြင်းသို့</a></figure>
                                @else
                                    <h3 style="text-align:center;color:red;font-weight:bold;">ဈေးခြင်းတွင်ပစ္စည်းမရှိပါ။</h3>
                                @endif
                            </div>         
                        </div>
                    </div>
                    <div class="ps-block--user-header">
                        <div class="ps-block__left"><a href="{{ route('profile.index') }}"><i class="icon-user"></i></a></div>
                        <div class="ps-block__right"><a href="{{ route('profile.index') }}" style="text-align: center;">My</a><a href="{{ route('profile.index') }}">Account</a></div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    @yield('content')

    @include('partials.footer')

    @yield('extra-js')