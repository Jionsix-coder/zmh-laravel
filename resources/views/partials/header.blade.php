<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> +95-9-898155551 <i class="fa fa-phone"></i> +95-9-775545655</a></li>
                        </ul>
                        <p class="delivery-p">{ <b>(4)လအရစ်ကျငွေပေးချေရန် | ဝယ်ယူသူမှပို့ခပေးရမည်</b> }</p>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                    <div class="pocket-money">
                        <p>လက်ကျန်ငွေ : <b>{{ $user->MoneyLeft }} Ks</b></p>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->
    
    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="btn-group">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                ဘာသာစကား
                                <span class="caret"></span>
                            </button>
                                <ul class="dropdown-menu">
                                    <li><a href="/home">ယူနီကုဒ်</a></li>
                                    <li><a href="{{ route('switch.zawgyi') }}">ေဇာ္ဂ်ီ</a></li>
                                </ul>
                        </div>
                        
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                MMK
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="#">Dollar</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="{{ route('profile.index') }}"><i class="fa fa-lg fa-user"></i> {{ __('text.Account') }}</a></li>
                            <li>
                                <a href="{{ route('cart.save') }}"><i class="fa fa-lg fa-shopping-cart"></i> {{ __('text.Basket') }} 
                                @if (Cart::instance('saveCart')->count() > 0)
                                <span class="badge"> {{ Cart::instance('saveCart')->count() }}</span>
                                @endif
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('cart.index') }}"><i class="fa fa-lg fa-shopping-basket"></i> {{ __('text.Cart') }} 
                                    @if (Cart::instance('default')->count() > 0)
                                    <span class="badge"> {{ Cart::instance('default')->count() }}</span>
                                    @endif
                                </a>
                            </li>	
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        {!! menu('main','partials.menus.main') !!}
                        {{-- <ul class="nav navbar-nav collapse navbar-collapse">
                            {{-- <li><a href="/" class="">ပင်မ</a></li>
                            <li class="dropdown"><a href="{{ route('shop.index') }}">စျေးဝယ်ရန်<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="{{ route('shop.index') }}"><i class="fa fa-shopping-cart"></i> ပစ္စည်းများ</a></li>
                                    <li><a href="{{ route('cart.index') }}"><i class="fa fa-star"></i>  စျေးလှည်း</a></li> 
                                    <li><a href=""><i class="fa fa-user"></i>  အကောင့်</a></li> 
                                </ul>
                            </li> 
                            <li><a href="">အာမခံ</a></li>
                            <li><a href="">စည်းမျဉ်စည်းကမ်း</a></li>
                            <li><a href="contact-us.html">ဆက်သွယ်ရန်</a></li>
                        </ul> --}}
                    </div>
                </div>
                <div class="col-sm-3">
                    <form action="{{ route('shop.search') }}" method="GET">
                        <div class="search_box pull-right">
                            <input type="text" name="query" value="{{ request()->input('query') }}" id="query" placeholder="{{ __('text.SearchBar') }}"/>
                        </div>
                    </form>
                </div>
            </div>
                @yield('breadcrumb')
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->