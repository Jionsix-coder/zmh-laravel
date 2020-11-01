<div class="col-sm-3" style="{{ request()->category !=  null ? 'display:none;' : '' }}">
    <div class="left-sidebar">
        <h2>အမျိုးအစားများ</h2>
        <div class="panel-group category-products" id="accordian"><!--category-products-->
            {{-- @foreach($categories as $category)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordian" href="{{ route('shop.index',['category' => $category->slug]) }}">
                            <span class="badge pull-right"><i class="fa fa-arrow-right"></i></span>
                            <a class="{{ setActiveCategory($category->slug) }}" href="{{ route('shop.index',['category' => $category->slug]) }}">{{ $category->name }}</a>
                        </a>
                    </h4>
                </div>
            </div>
            @endforeach --}}
            @foreach (App\Models\Category::with('childs')->where('p_id',0)->get() as $item)
             <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordian" href="#{{ $item->slug }}">
                            <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                            {{ $item->name }}
                        </a>
                    </h4>
                </div>
                <div id="{{ $item->slug }}" class="panel-collapse collapse">
                    <div class="panel-body">
                        <ol>
                            @foreach ($item->childs as $itemChilds)
                                <li><a href="{{ route('shop.index',['category' => $itemChilds->slug]) }}">{{ $itemChilds->name }}</a></li>
                            @endforeach
                        </ol>
                    </div>
                </div>
            </div>
            @endforeach

        </div><!--/category-products-->
        {{-- <div class="brands_products"><!--brands_products-->
            <h2>Brands</h2>
            <div class="brands-name">
                <ul class="nav nav-pills nav-stacked">
                    <li><a href="#"> <span class="pull-right">(50)</span>Acne</a></li>
                    <li><a href="#"> <span class="pull-right">(56)</span>Grüne Erde</a></li>
                    <li><a href="#"> <span class="pull-right">(27)</span>Albiro</a></li>
                    <li><a href="#"> <span class="pull-right">(32)</span>Ronhill</a></li>
                    <li><a href="#"> <span class="pull-right">(5)</span>Oddmolly</a></li>
                    <li><a href="#"> <span class="pull-right">(9)</span>Boudestijn</a></li>
                    <li><a href="#"> <span class="pull-right">(4)</span>Rösch creative culture</a></li>
                </ul>
            </div>
        </div><!--/brands_products--> --}}
        
        {{-- <div class="price-range"><!--price-range-->
            <h2>Price Range</h2>
            <div class="well text-center">
                <input type="text" class="span2" value="" data-slider-min="1000" data-slider-max="15000000" data-slider-step="5" data-slider-value="[10000,10000]" id="sl2" ><br />
                <b class="pull-left">1000 Ks</b> <b class="pull-right">15,000,000 Ks</b>
            </div>
        </div><!--/price-range--> --}}

        <div class="price-range">
            <h2>Price Range</h2>
            <div class="well text-center">
                <a href="{{ route('shop.index',['category' => request()->category,'sort' => 'low_high']) }}">ဈေးအနိမ့်မှအမြင့်သို့</a><br>
                <a href="{{ route('shop.index',['category' => request()->category,'sort' => 'high_low']) }}">ဈေးအမြင့်မှအနိမ့်သို့</a>
            </div>
        </div>

        <div class="row new-product-row ">
            <div class="col-sm-12 col-xs-6 col-md-12 col-lg-12">
                <div id="new-product-carousel" class="carousel slide" data-ride="carousel" data-interval="1900">
                    <h3 class="new-product-h3">အသစ်ဝင်ပစ္စည်းများ</h3>
                    <div class="carousel-inner">
        
                        @foreach ($latestItemsAsc as $key => $item)
                        <div class="item {{$key == 0 ? 'active' : '' }}">	
                            <div class="col-sm-12">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <a href="{{ route('shop.show', $item->slug) }}">
                                            <div class="productinfo text-center">
                                                <div class="productinfo-img">
                                                    <img src="{{ productImage($item->image)}}" alt="" />
                                                </div>
                                                <h2>{{ presentPrice($item->price) }}</h2>
                                                <p>{{ $item->name }}</p>
                                                <form action="{{ route('cart.store') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                                    <input type="hidden" name="name" value="{{ $item->name }}">
                                                    <input type="hidden" name="price" value="{{ $item->price * (1 - $item->discountPercent / 100) }}">
                                                    <input type="hidden" name="discountPercent" value="{{ $item->discountPercent }}">
                                                    <button type="submit" class="btn btn-default add-to-cart"><i class="fa fa-lg  fa-lg fa-shopping-basket"></i>ခြင်းထဲထည့်ရန်</button>	
                                                </form>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
        
                    </div>
                    <a class="left recommended-item-control" href="#new-product-carousel" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a class="right recommended-item-control" href="#new-product-carousel" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>			
                </div>
            </div>
    
            <div class="col-sm-12 col-xs-6 col-md-12 col-lg-12 new-product-2nd">
                <div id="new-product-carousel1" class="carousel slide" data-ride="carousel" data-interval="3000">
                    <h3 class="new-product-h3">အသစ်ဝင်ပစ္စည်းများ</h3>
                    <div class="carousel-inner">
        
                        @foreach ($latestItemsDesc as $key => $item)
                        <div class="item {{$key == 0 ? 'active' : '' }}">	
                            <div class="col-sm-12">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <a href="{{ route('shop.show', $item->slug) }}">
                                            <div class="productinfo text-center">
                                                <div class="productinfo-img">
                                                    <img src="{{ productImage($item->image)}}" alt="" />
                                                </div>
                                                <h2>{{ presentPrice($item->price) }}</h2>
                                                <p>{{ $item->name }}</p>
                                                <form action="{{ route('cart.store') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                                    <input type="hidden" name="name" value="{{ $item->name }}">
                                                    <input type="hidden" name="price" value="{{ $item->price * (1 - $item->discountPercent / 100) }}">
                                                    <input type="hidden" name="discountPercent" value="{{ $item->discountPercent }}">
                                                    <button type="submit" class="btn btn-default add-to-cart"><i class="fa fa-lg  fa-lg fa-shopping-basket"></i>ခြင်းထဲထည့်ရန်</button>	
                                                </form>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
        
                    </div>
                    <a class="left recommended-item-control" href="#new-product-carousel1" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a class="right recommended-item-control" href="#new-product-carousel1" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>			
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-xs-6 col-md-12 col-lg-12">
                <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel" data-interval="1900">
                    <h3 class="discount-h3">ပရိုမိုးရှင်းပစ္စည်းများ</h3>
                    <div class="carousel-inner">
        
                        @foreach ($promotionsItemsAsc as $key => $item)
                        <div class="item {{$key == 0 ? 'active' : '' }}">	
                            <div class="col-sm-12">
                                <div class="product-image-wrapper" id="promotions-image-wrapper">
                                    <div class="single-products">
                                        <a href="{{ route('shop.show', $item->slug) }}">
                                            <div class="productinfo text-center">
                                                <div class="productinfo-img">
                                                    <img src="{{ productImage($item->image)}}" alt="" />
                                                </div>
                                                <del><h2 id="promotions-h2">{{ presentPrice($item->price) }}</h2></del>
                                                <p class="promotions-h3" style="font-size: 25px;color:black;"><b>{{ presentPrice($item->price * (1 - $item->discountPercent / 100))  }}</b></p>
                                                <p>{{ Str::limit($item->details, 25, ' ...') }}</p>
                                                <form action="{{ route('cart.store') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                                    <input type="hidden" name="name" value="{{ $item->name }}">
                                                    <input type="hidden" name="price" value="{{ $item->price * (1 - $item->discountPercent / 100) }}">
                                                    <input type="hidden" name="discountPercent" value="{{ $item->discountPercent }}">
                                                    <button type="submit" class="btn btn-default add-to-cart"><i class="fa fa-lg  fa-lg fa-shopping-basket"></i>ခြင်းထဲထည့်ရန်</button>	
                                                </form>
                                                <h5 class="discount-p">- {{ $item->discountPercent }}%</h5>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
        
                    </div>
                    <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>			
                </div>
            </div>

            <div class="col-sm-12 col-xs-6 col-md-12 col-lg-12 new-product-2nd">
                <div id="recommended-item-carousel1" class="carousel slide" data-ride="carousel" data-interval="3000">
                    <h3 class="discount-h3">ပရိုမိုးရှင်းပစ္စည်းများ</h3>
                    <div class="carousel-inner">
        
                        @foreach ($promotionsItemsDesc as $key => $item)
                        <div class="item {{$key == 0 ? 'active' : '' }}">	
                            <div class="col-sm-12">
                                <div class="product-image-wrapper" id="promotions-image-wrapper">
                                    <div class="single-products">
                                        <a href="{{ route('shop.show', $item->slug) }}">
                                            <div class="productinfo text-center">
                                                <div class="productinfo-img">
                                                    <img src="{{ productImage($item->image)}}" alt="" />
                                                </div>
                                                <del><h2 id="promotions-h2">{{ presentPrice($item->price) }}</h2></del>
                                                <p class="promotions-h3" style="font-size: 25px;color:black;"><b>{{ presentPrice($item->price * (1 - $item->discountPercent / 100))  }}</b></p>
                                                <p>{{ Str::limit($item->details, 25, ' ...') }}</p>
                                                <form action="{{ route('cart.store') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                                    <input type="hidden" name="name" value="{{ $item->name }}">
                                                    <input type="hidden" name="price" value="{{ $item->price * (1 - $item->discountPercent / 100) }}">
                                                    <input type="hidden" name="discountPercent" value="{{ $item->discountPercent }}">
                                                    <button type="submit" class="btn btn-default add-to-cart"><i class="fa fa-lg  fa-lg fa-shopping-basket"></i>ခြင်းထဲထည့်ရန်</button>	
                                                </form>
                                                <h5 class="discount-p">- {{ $item->discountPercent }}%</h5>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
        
                    </div>
                    <a class="left recommended-item-control" href="#recommended-item-carousel1" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a class="right recommended-item-control" href="#recommended-item-carousel1" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>			
                </div>
            </div>
        </div>
    </div>
</div>
