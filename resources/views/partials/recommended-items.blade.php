<div class="recommended_items"><!--recommended_items-->
    <h2 class="title text-center">recommended items</h2>
    
    <div class="row">
        <div class="col-sm-12 col-xs-6 col-md-12 col-lg-12">
            <div id="recommended-item-carousel1" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="item active">
                        @foreach ($recommendedItems as $item)
                            <div class="col-sm-4">
                                <a href="{{ route('shop.show', $item->slug) }}">
                                    <div class="product-image-wrapper" id="recommened-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo rmd text-center">
                                                <img class="promotionsimg" src="{{ productImage($item->image) }}" alt="Images" />
                                                <p class="recommended-p">{{ $item->presentPrice() }}</p>
                                                <p>{{ $item->name }}</p>
                                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-lg fa-shopping-cart"></i>{{ __('text.Add_To_Cart') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach	
                    </div>
                    <div class="item">	
                        @foreach ($latestItems as $lstitem)
                            <div class="col-sm-4">
                                <a href="{{ route('shop.show', $lstitem->slug) }}">
                                    <div class="product-image-wrapper" id="recommened-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo rmd text-center">
                                                <img class="promotionsimg" src="{{ productImage($lstitem->image) }}" alt="Images" g" />
                                                <p class="recommended-p">{{ $lstitem->presentPrice() }}</p>
                                                <p>{{ $lstitem->name }}</p>
                                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-lg fa-shopping-cart"></i>{{ __('text.Add_To_Cart') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach	
                    </div>
                    <div class="item">	
                        @foreach ($ExpensiveItems as $expitem)
                            <div class="col-sm-4">
                                <a href="{{ route('shop.show', $expitem->slug) }}">
                                    <div class="product-image-wrapper" id="recommened-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo rmd text-center">
                                                <img class="promotionsimg" src="{{ productImage($expitem->image) }}" alt="Images" g" />
                                                <p class="recommended-p">{{ $expitem->presentPrice() }}</p>
                                                <p>{{ $expitem->name }}</p>
                                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-lg fa-shopping-cart"></i>{{ __('text.Add_To_Cart') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach	
                    </div>
                </div>
                <a class="left recommended-item-control" href="#recommended-item-carousel1" data-slide="prev">
                <i class="fa fa-angle-left"></i>
                </a>
                <a class="right recommended-item-control" href="#recommended-item-carousel1" data-slide="next">
                <i class="fa fa-angle-right"></i>
                </a>			
            </div>
        </div>
        <div class="col-sm-12 col-xs-6 col-md-12 col-lg-12 new-product-2nd">
            <div id="recommended-item-carousel2" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="item active">
                        @foreach ($recommendedItems as $item)
                            <div class="col-sm-4">
                                <a href="{{ route('shop.show', $item->slug) }}">
                                    <div class="product-image-wrapper" id="recommened-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo rmd text-center">
                                                <img class="promotionsimg" src="{{ productImage($item->image) }}" alt="Images" />
                                                <p class="recommended-p">{{ $item->presentPrice() }}</p>
                                                <p>{{ $item->name }}</p>
                                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-lg fa-shopping-cart"></i>{{ __('text.Add_To_Cart') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach	
                    </div>
                    <div class="item">	
                        @foreach ($latestItems as $lstitem)
                            <div class="col-sm-4">
                                <a href="{{ route('shop.show', $lstitem->slug) }}">
                                    <div class="product-image-wrapper" id="recommened-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo rmd text-center">
                                                <img class="promotionsimg" src="{{ productImage($lstitem->image) }}" alt="Images" g" />
                                                <p class="recommended-p">{{ $lstitem->presentPrice() }}</p>
                                                <p>{{ $lstitem->name }}</p>
                                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-lg fa-shopping-cart"></i>{{ __('text.Add_To_Cart') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach	
                    </div>
                    <div class="item">	
                        @foreach ($ExpensiveItems as $expitem)
                            <div class="col-sm-4">
                                <a href="{{ route('shop.show', $expitem->slug) }}">
                                    <div class="product-image-wrapper" id="recommened-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo rmd text-center">
                                                <img class="promotionsimg" src="{{ productImage($expitem->image) }}" alt="Images" g" />
                                                <p class="recommended-p">{{ $expitem->presentPrice() }}</p>
                                                <p>{{ $expitem->name }}</p>
                                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-lg fa-shopping-cart"></i>{{ __('text.Add_To_Cart') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach	
                    </div>
                </div>
                <a class="left recommended-item-control" href="#recommended-item-carousel2" data-slide="prev">
                <i class="fa fa-angle-left"></i>
                </a>
                <a class="right recommended-item-control" href="#recommended-item-carousel2" data-slide="next">
                <i class="fa fa-angle-right"></i>
                </a>			
            </div>
        </div>
    </div>
    {{-- <div id="recommended-item-carousel1" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="item active">
                @foreach ($recommendedItems as $item)
                    <div class="col-sm-4">
                        <a href="{{ route('shop.show', $item->slug) }}">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo rmd text-center">
                                        <img class="promotionsimg" src="{{ productImage($item->image) }}" alt="Images" />
                                        <h2>{{ $item->presentPrice() }}</h2>
                                        <p>{{ $item->name }}</p>
                                        <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-lg fa-shopping-cart"></i>{{ __('text.Add_To_Cart') }}</button>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach	
            </div>
            <div class="item">	
                @foreach ($latestItems as $lstitem)
                    <div class="col-sm-4">
                        <a href="{{ route('shop.show', $lstitem->slug) }}">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo rmd text-center">
                                        <img class="promotionsimg" src="{{ productImage($lstitem->image) }}" alt="Images" g" />
                                        <h2>{{ $lstitem->presentPrice() }}</h2>
                                        <p>{{ $lstitem->name }}</p>
                                        <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-lg fa-shopping-cart"></i>{{ __('text.Add_To_Cart') }}</button>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach	
            </div>
            <div class="item">	
                @foreach ($ExpensiveItems as $expitem)
                    <div class="col-sm-4">
                        <a href="{{ route('shop.show', $expitem->slug) }}">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo rmd text-center">
                                        <img class="promotionsimg" src="{{ productImage($expitem->image) }}" alt="Images" g" />
                                        <h2>{{ $expitem->presentPrice() }}</h2>
                                        <p>{{ $expitem->name }}</p>
                                        <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-lg fa-shopping-cart"></i>{{ __('text.Add_To_Cart') }}</button>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach	
            </div>
        </div>
        <a class="left recommended-item-control" href="#recommended-item-carousel1" data-slide="prev">
        <i class="fa fa-angle-left"></i>
        </a>
        <a class="right recommended-item-control" href="#recommended-item-carousel1" data-slide="next">
        <i class="fa fa-angle-right"></i>
        </a>			
    </div>

    <div id="recommended-item-carousel1" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="item active">
                @foreach ($recommendedItems as $item)
                    <div class="col-sm-4">
                        <a href="{{ route('shop.show', $item->slug) }}">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo rmd text-center">
                                        <img class="promotionsimg" src="{{ productImage($item->image) }}" alt="Images" />
                                        <h2>{{ $item->presentPrice() }}</h2>
                                        <p>{{ $item->name }}</p>
                                        <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-lg fa-shopping-cart"></i>{{ __('text.Add_To_Cart') }}</button>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach	
            </div>
            <div class="item">	
                @foreach ($latestItems as $lstitem)
                    <div class="col-sm-4">
                        <a href="{{ route('shop.show', $lstitem->slug) }}">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo rmd text-center">
                                        <img class="promotionsimg" src="{{ productImage($lstitem->image) }}" alt="Images" g" />
                                        <h2>{{ $lstitem->presentPrice() }}</h2>
                                        <p>{{ $lstitem->name }}</p>
                                        <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-lg fa-shopping-cart"></i>{{ __('text.Add_To_Cart') }}</button>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach	
            </div>
            <div class="item">	
                @foreach ($ExpensiveItems as $expitem)
                    <div class="col-sm-4">
                        <a href="{{ route('shop.show', $expitem->slug) }}">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo rmd text-center">
                                        <img class="promotionsimg" src="{{ productImage($expitem->image) }}" alt="Images" g" />
                                        <h2>{{ $expitem->presentPrice() }}</h2>
                                        <p>{{ $expitem->name }}</p>
                                        <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-lg fa-shopping-cart"></i>{{ __('text.Add_To_Cart') }}</button>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach	
            </div>
        </div>
        <a class="left recommended-item-control" href="#recommended-item-carousel1" data-slide="prev">
        <i class="fa fa-angle-left"></i>
        </a>
        <a class="right recommended-item-control" href="#recommended-item-carousel1" data-slide="next">
        <i class="fa fa-angle-right"></i>
        </a>			
    </div> --}}
</div><!--/recommended_items-->