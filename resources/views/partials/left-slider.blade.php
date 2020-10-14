<div class="col-sm-3">
    <div class="left-sidebar">
        <h2>အမျိုးအစားများ</h2>
        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
            @foreach($categories as $category)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordian" href="#menus">
                            <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                            <a class="{{ setActiveCategory($category->slug) }}" href="{{ route('shop.index',['category' => $category->slug]) }}">{{ $category->name }}</a>
                        </a>
                    </h4>
                </div>
            </div>
            @endforeach
            
            {{-- <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordian" href="#womens">
                            <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                            မ ဝတ်
                        </a>
                    </h4>
                </div>
                <div id="womens" class="panel-collapse collapse">
                    <div class="panel-body">
                        <ol>
                            <li><a href="#">စွပ်ကျယ်အင်္ကျီများ</a></li>
                            <li><a href="#">တီရှပ်များ</a></li>
                            <li><a href="#">ဝမ်းဆက်များ</a></li>
                            <li><a href="#">တစ်ဆက်တည်းဝတ်စုံများ</a></li>
                            <li><a href="#">ဂျင်းဘောင်းဘီနှင့်စကတ်များ</a></li>
                            <li><a href="">ဘောင်းဘီနှင့်စကတ်တိုများ</a></li>
                            <li><a href="">အသားကပ်ဝတ်စုံနှင့်ခြေအိတ်များ</a></li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordian" href="#kids">
                            <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                            ကလေးအသုံးအဆောင်
                        </a>
                    </h4>
                </div>
                <div id="kids" class="panel-collapse collapse">
                    <div class="panel-body">
                        <ol>
                            <li><a href="#">ကလေးအဝတ်အစားများ</a></li>
                            <li><a href="#">ကလေးအိပ်ယာပစ္စည်းများ</a></li>
                            <li><a href="#">ကလေးပစ္စည်းများ</a></li>
                            <li><a href="#">ပွဲတော်ပစ္စည်းများ</a></li>
                            <li><a href="#">ရှူးဖိနပ်များ</a></li>
                            <li><a href="">ဆက်စပ်ပစ္စည်းများ</a></li>
                            <li><a href="">ဘရတ်ရှ်နှင့်ဘီးများ</a></li>
                        </ol>
                    </div>
                </div>
            </div>
            
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><a href="#">ဖုန်းနှင့်ဆက်စပ်ပစ္စည်း</a></h4>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><a href="#">လျှပ်စစ်ပစ္စည်း</a></h4>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><a href="#">ကွန်ပျူတာနှင့်ဆက်စပ်ပစ္စည်း</a></h4>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><a href="#">အားကစားနှင့်ခရီးသွားပစ္စည်း</a></h4>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><a href="#">မျက်မှန် နှင့် နာရီ</a></h4>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><a href="#">ပရိဘောဂ</a></h4>
                </div>
            </div> --}}
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

        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
            <h3 class="discount-h3">ပရိုမိုးရှင်းပစ္စည်းများ</h3>
            <div class="carousel-inner">

                @foreach ($promotionsItem as $key => $item)
                <div class="item {{$key == 0 ? 'active' : '' }}">	
                    <div class="col-sm-12">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo rmd text-center">
                                    <img src="images/home/product1.jpg" alt="" />
                                    <del><h2>{{ presentPrice($item->price) }}</h2></del>
                                    <h4 style="font-size: 25px;"><b>{{ presentPrice($item->price * (1 - $item->discountPercent / 100))  }}</b></h4>
                                    <p>{{ $item->details }}</p>
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
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                {{-- @foreach ($promotionsItem->last() as $item)
                <div class="item">	
                    <div class="col-sm-12">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo rmd text-center">
                                    <img src="images/home/product1.jpg" alt="" />
                                    <del><h2>{{ $item->price }}</h2></del>
                                    <h4 style="font-size: 25px;"><b>{{ $item->price }}</b></h4>
                                    <p>{{ $item->details }}</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa  fa-lg fa-shopping-basket"></i>ခြင်းထဲထည့်ရန်</a>
                                    <h5 class="discount-p">{{ $item->discountPercent }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach --}}
            </div>
             <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                <i class="fa fa-angle-left"></i>
              </a>
              <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                <i class="fa fa-angle-right"></i>
              </a>			
        </div>
    </div>
</div>