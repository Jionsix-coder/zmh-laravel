
@extends('layout2')

@section('title', 'Checkout')

@section('extra-css')
@endsection

@section('content')

@section('breadcrumb')
	<div class="breadcrumbs">
		<ol class="breadcrumb">
			<li><a href="/home">ပင်မ</a></li>
			<li><a href="{{ route('shop.index') }}">စျေးဝယ်ရန် ></a></li>
			<li>{{ $product->name }}</li>
		</ol>
	</div>
@endsection
				
	<div class="col-sm-12 padding-right">
		<div class="product-details"><!--product-details-->
			<div class="col-sm-5 col-md-5">
				<div class="col-md-12">
					<div class="view-product">
						<a href="{{ productImage($product->image) }}" data-lightbox="images" data-title="{{ $product->name }}">
						   <img src="{{ productImage($product->image) }}" alt="" class="active" id="currentImage" />
						</a>
					</div>
					<div class="product-section-images">
						<div class="product-section-thumbnail selected">
							<a href="{{ productImage($product->image) }}" data-lightbox="images" data-title="{{ $product->name }}">
								<img src="{{ productImage($product->image) }}" alt="" width="95px" height="82px" />
							</a>
						</div>
						@if ($product->images)
							@foreach (json_decode($product->images,true) as $image)
								<div class="product-section-thumbnail selected">
									<a href="{{ productImage($image) }}" data-lightbox="images" data-title="{{ $product->name }}">
										<img src="{{ productImage($image) }}" width="95px" height="82px" alt="">
									</a>
								</div>
							@endforeach
						@endif
					</div>
				</div>
			</div>
			<div class="col-sm-7">
				<div class="product-information"><!--/product-information-->
					<h2>{!! $product->name !!}</h2>
					<p>{!! nl2br($product->details) !!}</p>
					<p>{!! nl2br(Str::limit($product->description,200,' ...')) !!}</p>b
					<br>
					<span>
						<p style="color:#FE980F;font-weight:bold;font-size:20px;">{{ $product->presentPrice() }}</p>
						@php
							$colour = $product->colour;
							$product_colour = explode(',',$colour);
						@endphp
						<p style="display:block">ရရှိနိုင်သောအရောင်များ</p>
						<select name="colour" id="">
							@foreach ($product_colour as $colour)
								<option value="{{ $colour }}">{{ $colour }}</option>
							@endforeach
						</select>
						@if($product->quantity > 0)
						<form action="{{ route('cart.store') }}" method="POST" style="display: inline">
							@csrf
							<input type="hidden" name="id" value="{{ $product->id }}">
							<input type="hidden" name="name" value="{{ $product->name }}">
							<input type="hidden" name="price" value="{{ $product->price }}">
							<button type="submit" class="btn btn-default cart"><i class="fa fa-md fa-shopping-basket"></i> ခြင်းထဲထည့်ရန်</button>	
						 </form>
						@endif
					</span>
					<p><b>ရရှိနိုင်:</b>{!! $stockLevel !!}</p>
				</div><!--/product-information-->
			</div>
		</div><!--/product-details-->
		
		<div class="category-tab shop-details-tab"><!--category-tab-->
			<div class="col-sm-12">
				<ul class="nav nav-tabs">
					<li class="active"><a href="#details" data-toggle="tab">အသေးစိတ်</a></li>
					<li><a href="#tag" data-toggle="tab">အမျိုးအစား</a></li>
					<li><a href="#reviews" data-toggle="tab">သုံးသပ်ချက်များ</a></li>
				</ul>
			</div>
			<div class="tab-content">
				<div class="tab-pane fade active in" id="details" >
					<p>{!! nl2br($product->description) !!}</p>
				</div>
				<div class="tab-pane fade" id="tag" >
					<p>{{ $CategoryName }}</p>
				</div>
				
				<div class="tab-pane fade " id="reviews" >
					<p style="color: red;">Still in Development</p>
					{{-- <div class="col-sm-12">
						<ul>
							<li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
							<li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
							<li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
						</ul>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
						<p><b>
							သင်၏သုံးသပ်ချက်ကိုရေးပါ</b></p>
						
						<form action="#">
							<span>
								<input type="text" placeholder="အမည်"/>
								<input type="email" placeholder="Email">
							</span>
							<textarea name="" ></textarea>
							<b>Rating: </b> <img src="{{ asset('images/product-details/rating.png') }}" alt="" />
							<button type="button" class="btn btn-default pull-right">
								Submit
							</button>
						</form>
					</div> --}}
				</div>
				
			</div>
		</div><!--/category-tab-->
		
		@include('partials.recommended-items')
		
	</div>
@endsection

@section('extra-js')
<script>
    (function(){
        const currentImage = document.querySelector('#currentImage');
        const images = document.querySelectorAll('.product-section-thumbnail');

        images.forEach((element) => element.addEventListener('click', thumbnailClick));

        function thumbnailClick(e) {

            currentImage.classList.remove('active');

            currentImage.addEventListener('transitionend',() => {
                currentImage.src = this.querySelector('img').src;
                currentImage.classList.add('active');
            })

            images.forEach((element) => element.classList.remove('selected'));
            this.classList.add('selected');
        }
    })();
</script>

<script>
    lightbox.option({
      'resizeDuration': 200,
      'wrapAround': true,
	  'maxHeight' : 100%,
    })
</script>

@endsection