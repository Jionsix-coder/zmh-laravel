@extends('layout')

@section('title', 'Shop')

@section('extra-css')

@endsection

@section('content')
    <div class="ps-breadcrumb">
        <div class="ps-container">
            <ul class="breadcrumb">
                <li><a href="{{ route('landing.page') }}">ပင်မ</a></li>
                <li>Promotion Items</li>
            </ul>
        </div>
    </div>
    <div class="ps-page--shop" id="shop-sidebar">
        <div class="container">
            <div class="ps-layout--shop">
                <div class="ps-layout__left">
                    <aside class="widget widget_shop">
                        <h4 class="widget-title">Categories</h4>
                        <ul class="ps-list--categories">
                            @foreach (App\Models\Category::with('childs')->where('p_id',0)->get() as $item)
                                <li class="current-menu-item menu-item-has-children"><a href="{{ route('shop.index',['category' => $item->slug]) }}">{{ $item->name }}</a><span class="sub-toggle" style="{{ $item->childs->count() > 0 ? 'display:initial' : 'display:none;'}}"><i class="fa fa-angle-down"></i></span>
                                    <ul class="sub-menu">
                                        @foreach ($item->childs as $itemChilds)
                                            <li class="current-menu-item "><a href="{{ route('shop.index',['category' => $itemChilds->slug]) }}">{{ $itemChilds->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach
                        </ul>
                    </aside>
                    <aside class="widget widget_shop">
                        <h4 class="widget-title">ပစ္စည်းများရှာရန်</h4>
                        <form class="ps-form--widget-search" action="{{ route('shop.search') }}" method="GET">
                            <input class="form-control" type="text" placeholder="ပစ္စည်းများရှာရန်" name="query" value="{{ request()->input('query') }}" id="query">
                            <button><i class="icon-magnifier"></i></button>
                        </form>
                        {{-- <figure>
                            <h4 class="widget-title">By Price</h4>
                            <div id="nonlinear"></div>
                            <p class="ps-slider__meta">Price:<span class="ps-slider__value">$<span class="ps-slider__min"></span></span>-<span class="ps-slider__value">$<span class="ps-slider__max"></span></span></p>
                        </figure> --}}
                    </aside>
                </div>
                <div class="ps-layout__right">
                    <div class="ps-page__header">
                        <h1>Promotions Items</h1>
                        <div class="ps-carousel--nav-inside owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on">
                        @if ($promotion)
                            @foreach ($promotion as $item)
                                 <a href="#"><img src="{{ productImage($item->image) }}" alt=""></a>
                            @endforeach
                        @endif
                        </div>
                    </div>
                    <div class="ps-block--shop-features">
                        <div class="ps-block__header">
                            <h3>Best Sale Items</h3>
                            <div class="ps-block__navigation"><a class="ps-carousel__prev" href="#bestsale"><i class="icon-chevron-left"></i></a><a class="ps-carousel__next" href="#bestsale"><i class="icon-chevron-right"></i></a></div>
                        </div>
                        <div class="ps-block__content">
                            <div class="owl-slider" id="bestsale" data-owl-auto="true" data-owl-loop="true" data-owl-speed="10000" data-owl-gap="30" data-owl-nav="false" data-owl-dots="false" data-owl-item="4" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="2" data-owl-item-lg="3" data-owl-item-xl="4" data-owl-duration="1000" data-owl-mousedrag="on">
                                @foreach ($bestsaleproducts as $product)
                                <div class="ps-product">
                                    <div class="ps-product__thumbnail"><a href="{{ route('shop.show', $product->slug) }}"><img src="{{ productImage($product->image) }}" alt=""></a>
                                        @if ($product->quantity == 0)
                                            <div class="ps-product__badge out-stock" style="{{ $product->quantity == 0 ? 'display:initial': 'display:none' }}">Out Of Stock</div>
                                        @endif
                                        @if ($product->discountPercent != null)
                                            <div class="ps-product__badge" style="{{ $product->discountPercent != null & $product->quantity != 0 ? 'display:initial': 'display:none' }}">-{{ $product->discountPercent }}%</div>
                                        @endif
                                        @if ($product->quantity <= 2)
                                        <div class="ps-product__badge hot" style="{{ $product->quantity <= 2 & $product->discountPercent == null & $product->quantity != 0 ? 'display:initial': 'display:none' }}">hot</div>
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
                                        <div class="ps-product__content"><a class="ps-product__title" href="{{ route('shop.show', $product->slug) }}">{{ $product->name }}</a>
                                            <p class="ps-product__price"><p style="color:green">{{ presentPrice($product->price * (1 - $product->discountPercent / 100)) }}</p> <del style="{{ $product->discountPercent > 0 ? 'display:initial' : 'display:none' }}">{{ presentPrice($product->price) }} </del></p>
                                        </div>
                                        <div class="ps-product__content hover"><a class="ps-product__title" href="{{ route('shop.show', $product->slug) }}">{{ $product->name }}</a>
                                            <p class="ps-product__price"><p style="color:green">{{ presentPrice($product->price * (1 - $product->discountPercent / 100)) }}</p> <del style="{{ $product->discountPercent > 0 ? 'display:initial' : 'display:none' }}">{{ presentPrice($product->price) }} </del></p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="ps-shopping ps-tab-root">
                        <div class="ps-shopping__header">
                            <p><strong> {{ $products->total() }}</strong> Products found</p>
                            <div class="ps-shopping__actions">
                                <select class="ps-select" data-placeholder="Sort Items">
                                    <option>Sort by latest</option>
                                    <option>Sort by popularity</option>
                                    <option>Sort by price: low to high</option>
                                    <option>Sort by price: high to low</option>
                                </select>
                                <div class="ps-shopping__view">
                                    <p>View</p>
                                    <ul class="ps-tab-list">
                                        <li class="active"><a href="#tab-1"><i class="icon-grid"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="ps-tabs">
                            <div class="ps-tab active" id="tab-1">
                                <div class="ps-shopping-product">
                                    <div class="infinite-scroll">
                                        <div class="row">
                                            @forelse ($products as $product)
                                                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6 ">
                                                    <div class="ps-product">
                                                        <div class="ps-product__thumbnail"><a href="{{ route('shop.show', $product->slug) }}"><img src="{{ productImage($product->image) }}" alt=""></a>
                                                            @if ($product->quantity == 0)
                                                                <div class="ps-product__badge out-stock" style="{{ $product->quantity == 0 ? 'display:initial': 'display:none' }}">Out Of Stock</div>
                                                            @endif
                                                            @if ($product->discountPercent != null)
                                                                <div class="ps-product__badge" style="{{ $product->discountPercent != null & $product->quantity != 0 ? 'display:initial': 'display:none' }}">-{{ $product->discountPercent }}%</div>
                                                            @endif
                                                            @if ($product->quantity <= 2)
                                                            <div class="ps-product__badge hot" style="{{ $product->quantity <= 2 & $product->discountPercent == null & $product->quantity != 0 ? 'display:initial': 'display:none' }}">hot</div>
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
                                                            <div class="ps-product__content"><a class="ps-product__title" href="{{ route('shop.show', $product->slug) }}">{{ $product->name }}</a>
                                                                <p class="ps-product__price"><p style="color:green">{{ presentPrice($product->price * (1 - $product->discountPercent / 100)) }}</p> <del style="{{ $product->discountPercent > 0 ? 'display:initial' : 'display:none' }}">{{ presentPrice($product->price) }} </del></p>
                                                            </div>
                                                            <div class="ps-product__content hover"><a class="ps-product__title" href="{{ route('shop.show', $product->slug) }}">{{ $product->name }}</a>
                                                                <p class="ps-product__price"><p style="color:green">{{ presentPrice($product->price * (1 - $product->discountPercent / 100)) }}</p> <del style="{{ $product->discountPercent > 0 ? 'display:initial' : 'display:none' }}">{{ presentPrice($product->price) }} </del></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @empty
							                        <div><h2>No items found</h2></div>
                                            @endforelse
                                            {{ $products->appends(request()->input())->links('partials.pagination.default') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('extra-js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="/js/jquery.jscroll.min.js"></script>

<script type="text/javascript">
    $('ul.pagination').hide();
    var options = {
        autoTrigger: true,
        loadingHtml: '<img class="center-block" style="width:100px;height:100px;margin:36%;" src="/images/loading.gif" alt="Loading..." />', // MAKE SURE THAT YOU PUT THE CORRECT IMG PATH
        padding: 0,
        nextSelector: '.pagination li.active + li a',
        contentSelector: 'div.infinite-scroll',
        callback: function() {
            $('ul.pagination').remove();
        }
    };

    $('.infinite-scroll').jscroll(options);
</script>
@endsection