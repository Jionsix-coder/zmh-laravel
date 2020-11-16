@extends('layout')

@section('title', 'Home')

@section('extra-css')

@endsection

@section('content')
    <div id="homepage-1">
        <div class="ps-home-banner ps-home-banner--1">
            <div class="ps-container">
                <div class="ps-section__left">
                    <div class="ps-carousel--nav-inside owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on">
                        <div class="ps-banner"><a href="#"><img src="img/slider/home-1/slide-1.jpg" alt=""></a></div>
                        <div class="ps-banner"><a href="#"><img src="img/slider/home-1/slide-2.jpg" alt=""></a></div>
                        <div class="ps-banner"><a href="#"><img src="img/slider/home-1/slide-3.jpg" alt=""></a></div>
                    </div>
                </div>
                <div class="ps-section__right"><a class="ps-collection" href="#"><img src="img/slider/home-1/promotion-1.jpg" alt=""></a><a class="ps-collection" href="#"><img src="img/slider/home-1/promotion-2.jpg" alt=""></a></div>
            </div>
        </div>
        <div class="ps-site-features">
            <div class="ps-container">
                <div class="ps-block--site-features">
                    <div class="ps-block__item">
                        <div class="ps-block__left"><i class="icon-rocket"></i></div>
                        <div class="ps-block__right">
                            <h4>Free Delivery</h4>
                            <p>For all oders on Yangon Only</p>
                        </div>
                    </div>
                    <div class="ps-block__item">
                        <div class="ps-block__left"><i class="icon-credit-card"></i></div>
                        <div class="ps-block__right">
                            <h4>Installment Payment</h4>
                            <p>4 Months Payment</p>
                        </div>
                    </div>
                    <div class="ps-block__item">
                        <div class="ps-block__left"><i class="icon-bubbles"></i></div>
                        <div class="ps-block__right">
                            <h4>24/7 Support</h4>
                            <p>Dedicated support</p>
                        </div>
                    </div>
                    <div class="ps-block__item">
                        <div class="ps-block__left"><i class="icon-phone"></i></div>
                        <div class="ps-block__right">
                            <h4>Hot Line</h4>
                            <p>+95-9-89815551</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ps-deal-of-day">
            <div class="ps-container">
                <div class="ps-section__header">
                    <div class="ps-block--countdown-deal">
                        <div class="ps-block__left">
                            <h3>Promotions</h3>
                        </div>
                    </div><a href="#">View all</a>
                </div>
                <div class="ps-section__content">
                    <div class="ps-carousel--nav owl-slider" data-owl-auto="false" data-owl-loop="false" data-owl-speed="10000" data-owl-gap="30" data-owl-nav="true" data-owl-dots="true" data-owl-item="7" data-owl-item-xs="2" data-owl-item-sm="3" data-owl-item-md="4" data-owl-item-lg="5" data-owl-item-xl="6" data-owl-duration="1000" data-owl-mousedrag="on">
                        @foreach ($promotionsItems as $product)
                        <div class="ps-product ps-product--inner">
                            <div class="ps-product__thumbnail"><a href="{{ route('shop.show', $product->slug) }}"><img src="{{ productImage($product->image) }}" alt="{{ $product->name }}"></a>
                                @if ($product->quantity == 0)
                                    <div class="ps-product__badge out-stock" style="{{ $product->quantity == 0 ? 'display:initial': 'display:none' }}">Out Of Stock</div>
                                @endif
                                @if ($product->discountPercent != null)
                                    <div class="ps-product__badge" style="{{ $product->discountPercent != null & $product->quantity != 0 ? 'display:initial': 'display:none' }}">-{{ $product->discountPercent }}%</div>
                                @endif
                                <ul class="ps-product__actions">
                                    <li><a href="{{ route('shop.show', $product->slug) }}" data-toggle="tooltip" data-placement="top" title="ကြည့်ရန်"><i class="icon-bag2"></i></a></li>
                                    <li><a href="{{ route('shop.show', $product->slug) }}" data-placement="top" title="အမြန်ကြည့်ရန်" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                    <form action="{{ route('cart.store') }}" method="POST">
                                    @csrf
                                        <input type="hidden" name="id" value="{{ $product->id }}">
                                        <input type="hidden" name="name" value="{{ $product->name }}">
                                        <input type="hidden" name="price" value="{{ $product->price * (1 - $product->discountPercent / 100) }}">
                                        <li><button href="" data-toggle="tooltip" data-placement="top" title="ခြင်းထဲထည့်ရန်"><i class="icon-heart"></i></button></li>	
                                    </form>
                                </ul>
                            </div>
                            <div class="ps-product__container">
                                <p class="ps-product__price sale" style="font-size:13px;">{{ presentPrice($product->price * (1 - $product->discountPercent / 100)) }} <del>{{ presentPrice($product->price) }} </del><small style="{{ $product->discountPercent != null ? 'display:initial;': 'display:none;' }} font-size:14px;">{{ $product->discountPercent }}% off</small></p>
                                <div class="ps-product__content"><a class="ps-product__title" href="{{ route('shop.show', $product->slug) }}">{{ $product->name }}</a>
                                    <div class="ps-product__progress-bar ps-progress" data-value="{{ $product->quantity }}">
                                        <div class="ps-progress__value"><span></span></div>
                                        <p>Sold:{{ 10-$product->quantity}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="ps-home-ads">
            <div class="ps-container">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 "><a class="ps-collection" href="#"><img src="img/collection/home-1/1.jpg" alt=""></a>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 "><a class="ps-collection" href="#"><img src="img/collection/home-1/2.jpg" alt=""></a>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 "><a class="ps-collection" href="#"><img src="img/collection/home-1/3.jpg" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="ps-top-categories">
            <div class="ps-container">
                <h3>Top categories of the month</h3>
                <div class="row">
                    @foreach($categories as $category)
                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 col-6 ">
                        <div class="ps-block--category"><a class="ps-block__overlay" href="shop-default.html"></a><img src="{{ productImage($category->image) }}" alt="">
                            <p>{{ $category->name }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="ps-product-list ps-clothings">
            <div class="ps-container">
                <div class="ps-section__header">
                    <h3>Consumer Electronics</h3>
                    <ul class="ps-section__links">
                        <li><a href="#new">New Arrivals</a></li>
                        <li><a href="#best">Best seller</a></li>
                        <li><a href="#popular">Must Popular</a></li>
                        <li><a href="#">View All</a></li>
                    </ul>
                </div>
                <div class="ps-section__content">
                    <div class="ps-carousel--nav owl-slider" data-owl-auto="false" data-owl-loop="false" data-owl-speed="10000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="7" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="4" data-owl-item-xl="6" data-owl-duration="1000" data-owl-mousedrag="on">
                        @foreach ($categoryProduct1 as $item1)
                            <div class="ps-product">
                                <div class="ps-product__thumbnail"><a href="{{ route('shop.show', $item1->slug) }}"><img src="{{ productImage($item1->image) }}" alt="{{ $item1->name }}"></a>
                                    @if ($item1->quantity == 0)
                                    <div class="ps-product__badge out-stock" style="{{ $item1->quantity == 0 ? 'display:initial': 'display:none' }}">Out Of Stock</div>
                                @endif
                                @if ($item1->discountPercent != null)
                                    <div class="ps-product__badge" style="{{ $item1->discountPercent != null & $item1->quantity != 0 ? 'display:initial': 'display:none' }}">-{{ $item1->discountPercent }}%</div>
                                @endif
                                    <ul class="ps-product__actions">
                                        <li><a href="{{ route('shop.show', $item1->slug) }}" data-toggle="tooltip" data-placement="top" title="ကြည့်ရန်"><i class="icon-bag2"></i></a></li>
                                        <li><a href="{{ route('shop.show', $item1->slug) }}" data-placement="top" title="အမြန်ကြည့်ရန်" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                        <form action="{{ route('cart.store') }}" method="POST">
                                        @csrf
                                            <input type="hidden" name="id" value="{{ $item1->id }}">
                                            <input type="hidden" name="name" value="{{ $item1->name }}">
                                            <input type="hidden" name="price" value="{{ $item1->price * (1 - $item1->discountPercent / 100) }}">
                                            <li><button href="" data-toggle="tooltip" data-placement="top" title="ခြင်းထဲထည့်ရန်"><i class="icon-heart"></i></button></li>	
                                        </form>
                                    </ul>
                                </div>
                                <div class="ps-product__container">
                                    <div class="ps-product__content"><a class="ps-product__title" href="{{ route('shop.show', $item1->slug) }}">{{ $item1->name }}</a>
                                        <p class="ps-product__price sale">{{ presentPrice($item1->price * (1 - $item1->discountPercent / 100)) }} <del>{{ presentPrice($item1->price) }} </del></p>
                                    </div>
                                    <div class="ps-product__content hover"><a class="ps-product__title" href="{{ route('shop.show', $item1->slug) }}">{{ $item1->name }}</a>
                                        <p class="ps-product__price sale">{{ presentPrice($item1->price * (1 - $item1->discountPercent / 100)) }} <del>{{ presentPrice($item1->price) }} </del></p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="ps-product-list ps-clothings">
            <div class="ps-container">
                <div class="ps-section__header">
                    <h3>Apparels & Clothings</h3>
                    <ul class="ps-section__links">
                        <li><a href="shop-grid.html">New Arrivals</a></li>
                        <li><a href="shop-grid.html">Best seller</a></li>
                        <li><a href="shop-grid.html">Must Popular</a></li>
                        <li><a href="shop-grid.html">View All</a></li>
                    </ul>
                </div>
                <div class="ps-section__content">
                    <div class="ps-carousel--responsive owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="10000" data-owl-gap="0" data-owl-nav="false" data-owl-dots="true" data-owl-item="7" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="2" data-owl-item-lg="4" data-owl-item-xl="6" data-owl-duration="1000" data-owl-mousedrag="on">
                        @foreach ($categoryProduct2 as $item2)
                            <div class="ps-product">
                                <div class="ps-product__thumbnail"><a href="{{ route('shop.show', $item2->slug) }}"><img src="{{ productImage($item2->image) }}" alt="{{ $item2->name }}"></a>
                                    @if ($item2->quantity == 0)
                                    <div class="ps-product__badge out-stock" style="{{ $item2->quantity == 0 ? 'display:initial': 'display:none' }}">Out Of Stock</div>
                                @endif
                                @if ($item2->discountPercent != null)
                                    <div class="ps-product__badge" style="{{ $item2->discountPercent != null & $item2->quantity != 0 ? 'display:initial': 'display:none' }}">-{{ $item2->discountPercent }}%</div>
                                @endif
                                    <ul class="ps-product__actions">
                                        <li><a href="{{ route('shop.show', $item2->slug) }}" data-toggle="tooltip" data-placement="top" title="ကြည့်ရန်"><i class="icon-bag2"></i></a></li>
                                        <li><a href="{{ route('shop.show', $item2->slug) }}" data-placement="top" title="အမြန်ကြည့်ရန်" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                        <form action="{{ route('cart.store') }}" method="POST">
                                        @csrf
                                            <input type="hidden" name="id" value="{{ $item2->id }}">
                                            <input type="hidden" name="name" value="{{ $item2->name }}">
                                            <input type="hidden" name="price" value="{{ $item2->price * (1 - $item2->discountPercent / 100) }}">
                                            <li><button href="" data-toggle="tooltip" data-placement="top" title="ခြင်းထဲထည့်ရန်"><i class="icon-heart"></i></button></li>	
                                        </form>
                                    </ul>
                                </div>
                                <div class="ps-product__container">
                                    <div class="ps-product__content"><a class="ps-product__title" href="{{ route('shop.show', $item2->slug) }}">{{ $item2->name }}</a>
                                        <p class="ps-product__price sale">{{ presentPrice($item2->price * (1 - $item2->discountPercent / 100)) }} <del>{{ presentPrice($item2->price) }} </del></p>
                                    </div>
                                    <div class="ps-product__content hover"><a class="ps-product__title" href="{{ route('shop.show', $item2->slug) }}">{{ $item2->name }}</a>
                                        <p class="ps-product__price sale">{{ presentPrice($item2->price * (1 - $item2->discountPercent / 100)) }} <del>{{ presentPrice($item2->price) }} </del></p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="ps-product-list ps-garden-kitchen">
            <div class="ps-container">
                <div class="ps-section__header">
                    <h3>Home, Garden & Kitchen</h3>
                    <ul class="ps-section__links">
                        <li><a href="shop-grid.html">New Arrivals</a></li>
                        <li><a href="shop-grid.html">Best seller</a></li>
                        <li><a href="shop-grid.html">Must Popular</a></li>
                        <li><a href="shop-grid.html">View All</a></li>
                    </ul>
                </div>
                <div class="ps-section__content">
                    <div class="ps-carousel--responsive owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="10000" data-owl-gap="0" data-owl-nav="false" data-owl-dots="true" data-owl-item="7" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="4" data-owl-item-xl="6" data-owl-duration="1000" data-owl-mousedrag="on">
                        @foreach ($categoryProduct3 as $item3)
                            <div class="ps-product">
                                <div class="ps-product__thumbnail"><a href="{{ route('shop.show', $item3->slug) }}"><img src="{{ productImage($item3->image) }}" alt="{{ $item3->name }}"></a>
                                    @if ($item3->quantity == 0)
                                    <div class="ps-product__badge out-stock" style="{{ $item3->quantity == 0 ? 'display:initial': 'display:none' }}">Out Of Stock</div>
                                @endif
                                @if ($item3->discountPercent != null)
                                    <div class="ps-product__badge" style="{{ $item3->discountPercent != null & $item3->quantity != 0 ? 'display:initial': 'display:none' }}">-{{ $item3->discountPercent }}%</div>
                                @endif
                                    <ul class="ps-product__actions">
                                        <li><a href="{{ route('shop.show', $item3->slug) }}" data-toggle="tooltip" data-placement="top" title="ကြည့်ရန်"><i class="icon-bag2"></i></a></li>
                                        <li><a href="{{ route('shop.show', $item3->slug) }}" data-placement="top" title="အမြန်ကြည့်ရန်" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                        <form action="{{ route('cart.store') }}" method="POST">
                                        @csrf
                                            <input type="hidden" name="id" value="{{ $item3->id }}">
                                            <input type="hidden" name="name" value="{{ $item3->name }}">
                                            <input type="hidden" name="price" value="{{ $item3->price * (1 - $item3->discountPercent / 100) }}">
                                            <li><button href="" data-toggle="tooltip" data-placement="top" title="ခြင်းထဲထည့်ရန်"><i class="icon-heart"></i></button></li>	
                                        </form>
                                    </ul>
                                </div>
                                <div class="ps-product__container">
                                    <div class="ps-product__content"><a class="ps-product__title" href="{{ route('shop.show', $item3->slug) }}">{{ $item3->name }}</a>
                                        <p class="ps-product__price sale">{{ presentPrice($item3->price * (1 - $item3->discountPercent / 100)) }} <del>{{ presentPrice($item3->price) }} </del></p>
                                    </div>
                                    <div class="ps-product__content hover"><a class="ps-product__title" href="{{ route('shop.show', $item3->slug) }}">{{ $item3->name }}</a>
                                        <p class="ps-product__price sale">{{ presentPrice($item3->price * (1 - $item3->discountPercent / 100)) }} <del>{{ presentPrice($item3->price) }} </del></p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="ps-home-ads">
            <div class="ps-container">
                <div class="row">
                    <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12 "><a class="ps-collection" href="#"><img src="img/collection/home-1/ad-1.jpg" alt=""></a>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 "><a class="ps-collection" href="#"><img src="img/collection/home-1/ad-2.jpg" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="ps-download-app">
            <div class="ps-container">
                <div class="ps-block--download-app">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                                <div class="ps-block__thumbnail"><img src="img/app.png" alt=""></div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                                <div class="ps-block__content">
                                    <h3>Download Zay Min Htet App Now!</h3>
                                    <p>လျင်မြန်လွယ်ကူစွာနဲ့ဈေးဝယ်နိုင်ရန်အတွက်ကျွန်တော်တို့applicationကိုdownloadဆွဲလိုက်ပါ။</p>
                                    <p class="download-link"><a href="https://play.google.com/store/apps/details?id=com.zayminhtet.coltd.user"><img src="img/google-play.png" alt="" style="margin-left:27%"></a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ps-product-list ps-new-arrivals">
            <div class="ps-container">
                <div class="ps-section__header">
                    <h3>Hot New Arrivals</h3>
                    <ul class="ps-section__links">
                        <li><a href="{{ route('shop.index') }}">View All</a></li>
                    </ul>
                </div>
                <div class="ps-section__content">
                    <div class="row">
                        @foreach ($latestItems as $latestItem)
                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12 ">
                                <div class="ps-product--horizontal">
                                    <div class="ps-product__thumbnail"><a href="{{ route('shop.show', $latestItem->slug) }}"><img src="{{ productImage($latestItem->image) }}" alt=""></a></div>
                                    <div class="ps-product__content"><a class="ps-product__title" href="{{ route('shop.show', $latestItem->slug) }}">{{ $latestItem->name }}</a>
                                        <p class="ps-product__price">{{ presentPrice($latestItem->price) }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ps-popup" id="subscribe" data-time="500">
        <div class="ps-popup__content bg--cover" data-background="img/bg/subscribe.jpg"><a class="ps-popup__close" href="#"><i class="icon-cross"></i></a>
            <form class="ps-form--subscribe-popup" action="index.html" method="get">
                <div class="ps-form__content">
                    <h4 style="font-size: medium;"> Welcome to <strong style="color: #734d26;">ZayMinHtet</strong> Company Limited </h4>
                    <b>(တာဝန်ခံကုဒ်တောင်းရမည့်သူ)</b>
                    <hr>
                    <p style="font-weight: bold; font-size: small; color: #000;">အမည် - <b>ဒေါ်ခင်သီတာလင်း</b></p>
                    <p style="font-weight: bold; font-size: small; color: #000;">ဖုန်းနံပါတ် - <b>+959255752566</b></p>
                    <p style="font-weight: bold; font-size: small; color: #000;">ရာထူး - <b>ဉီးစီးမှူး</b></p>
                </div>
            </form>
        </div>
    </div>
@endsection('content')

@section('extra-js')
<script>
$('#video').on('ended', function () {
    $('.carousel').carousel('next');
});

$('#video').on('play', function (e) {
    $("#video").carousel('pause');
});

$('#video').on('stop pause ended', function (e) {
    $("#video").carousel();
});

var iframe = document.querySelector('iframe');
var player = new Vimeo.Player(iframe);

player.on('play', function() {
    console.log('Played the video');
});

player.getVideoTitle().then(function(title) {
    console.log('title:', title);
});
</script>
<script src="https://player.vimeo.com/api/player.js"></script>
  
@endsection
    