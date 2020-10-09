<div class="recommended_items"><!--recommended_items-->
    <h2 class="title text-center">recommended items</h2>
    
    <div id="recommended-item-carousel1" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="item active">
                @foreach ($recommendedItems as $item)
                    <div class="col-sm-4">
                        <a href="{{ route('shop.show', $item->slug) }}">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{ asset('images/products/'.$item->slug.'.jpg') }}" alt="Images" />
                                        <h2>{{ $item->presentPrice() }}</h2>
                                        <p>{{ $item->name }}</p>
                                        <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-lg fa-shopping-cart"></i>ခြင်းထဲထည့်ရန်</button>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach	
            </div>
            <div class="item">	
                @foreach ($recommendedItems2 as $item2)
                    <div class="col-sm-4">
                        <a href="{{ route('shop.show', $item2->slug) }}">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{ asset('images/products/'.$item2->slug.'.jpg') }}" alt="Images" g" />
                                        <h2>{{ $item2->presentPrice() }}</h2>
                                        <p>{{ $item2->name }}</p>
                                        <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-lg fa-shopping-cart"></i>ခြင်းထဲထည့်ရန်</button>
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
</div><!--/recommended_items-->