
@extends('layout')

@section('title', 'Checkout')

@section('extra-css')

@endsection

@section('content')

@section('breadcrumb')
	<div class="breadcrumbs">
		<ol class="breadcrumb">
			<li><a href="/">ပင်မ</a></li>
			<li><a href="{{ route('shop.index') }}">စျေးဝယ်ရန် ></a></li>
			<li>{{ $product->name }}</li>
		</ol>
	</div>
@endsection
				
	<div class="col-sm-9 padding-right">
		<div class="product-details"><!--product-details-->
			<div class="col-sm-5">
				<div class="view-product">
					<img src="{{ productImage($product->image) }}" alt="" />
					<h3>ZOOM</h3>
				</div>

				<div class="slide">
					@if ($product->images)
						@foreach (json_decode($product->images,true) as $image)
							<img src="{{ productImage($image) }}" alt="">
						@endforeach
					@endif
				</div>

				
				{{-- <div id="similar-product" class="carousel slide" data-ride="carousel">
					
						<!-- Wrapper for slides -->
						<div class="carousel-inner">
							<div class="item active">
								<a href=""><img src="{{ asset('images/product-details/similar1.jpg') }}" alt=""></a>
								<a href=""><img src="{{ asset('images/product-details/similar2.jpg') }}" alt=""></a>
								<a href=""><img src="{{ asset('images/product-details/similar3.jpg') }}" alt=""></a>
							</div>
							<div class="item">
								<a href=""><img src="{{ asset('images/product-details/similar1.jpg') }}" alt=""></a>
								<a href=""><img src="{{ asset('images/product-details/similar2.jpg') }}" alt=""></a>
								<a href=""><img src="{{ asset('images/product-details/similar3.jpg') }}" alt=""></a>
							</div>
							<div class="item">
								<a href=""><img src="{{ asset('images/product-details/similar1.jpg') }}" alt=""></a>
								<a href=""><img src="{{ asset('images/product-details/similar2.jpg') }}" alt=""></a>
								<a href=""><img src="{{ asset('images/product-details/similar3.jpg') }}" alt=""></a>
							</div>
							
						</div>
				</div> --}}

			</div>
			<div class="col-sm-7">
				<div class="product-information"><!--/product-information-->
					<img src="{{ asset('images/product-details/new.jpg') }}" class="newarrival" alt="" />
					<h2>{!! $product->name !!}</h2>
					<p>{!! $product->details !!}</p>
					<p>{!! $product->description !!}</p>
					<img src="images/product-details/rating.png" alt="" />
					<span>
						<span>{{ $product->presentPrice() }}</span>
						<label>အရေအတွက်:</label>
						<input type="text" value="3" />
						<button type="button" class="btn btn-fefault cart">
							<i class="fa fa-lg fa-shopping-cart"></i>
							ခြင်းထဲထည့်ရန်
						</button>
					</span>
					<p><b>ရရှိနိုင်:</b> In Stock</p>
					<p><b>အခြေအနေ:</b> New</p>
					<p><b>Brand:</b> Levis</p>
				</div><!--/product-information-->
			</div>
		</div><!--/product-details-->
		
		<div class="category-tab shop-details-tab"><!--category-tab-->
			<div class="col-sm-12">
				<ul class="nav nav-tabs">
					<li><a href="#details" data-toggle="tab">အသေးစိတ်</a></li>
					<li><a href="#tag" data-toggle="tab">အမျိုးအစား</a></li>
					<li class="active"><a href="#reviews" data-toggle="tab">သုံးသပ်ချက်များ</a></li>
				</ul>
			</div>
			<div class="tab-content">
				<div class="tab-pane fade" id="details" >
					<p>{{ $product->description }}</p>
				</div>
				
				<div class="tab-pane fade" id="companyprofile" >
					<div class="col-sm-3">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="{{ asset('images/home/gallery1.jpg') }}" alt="" />
									<h2>12,000Ks</h2>
									<p>Easy Polo Black Edition</p>
									<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-lg fa-shopping-cart"></i>ခြင်းထဲထည့်ရန်</button>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="{{ asset('images/home/gallery3.jpg') }}" alt="" />
									<h2>12,000Ks</h2>
									<p>Easy Polo Black Edition</p>
									<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-lg fa-shopping-cart"></i>ခြင်းထဲထည့်ရန်</button>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="{{ asset('images/home/gallery2.jpg') }}" alt="" />
									<h2>12,000Ks</h2>
									<p>Easy Polo Black Edition</p>
									<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-lg fa-shopping-cart"></i>ခြင်းထဲထည့်ရန်</button>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="{{ asset('images/home/gallery4.jpg') }}" alt="" />
									<h2>12,000Ks</h2>
									<p>Easy Polo Black Edition</p>
									<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-lg fa-shopping-cart"></i>ခြင်းထဲထည့်ရန်</button>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="tab-pane fade" id="tag" >
					<div class="col-sm-3">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="{{ asset('images/home/gallery1.jpg') }}" alt="" />
									<h2>12,000Ks</h2>
									<p>Easy Polo Black Edition</p>
									<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-lg fa-shopping-cart"></i>ခြင်းထဲထည့်ရန်</button>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="{{ asset('images/home/gallery2.jpg') }}" alt="" />
									<h2>12,000Ks</h2>
									<p>Easy Polo Black Edition</p>
									<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-lg fa-shopping-cart"></i>ခြင်းထဲထည့်ရန်</button>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="{{ asset('images/home/gallery3.jpg') }}" alt="" />
									<h2>12,000Ks</h2>
									<p>Easy Polo Black Edition</p>
									<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-lg fa-shopping-cart"></i>ခြင်းထဲထည့်ရန်</button>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="{{ asset('images/home/gallery4.jpg') }}" alt="" />
									<h2>12,000Ks</h2>
									<p>Easy Polo Black Edition</p>
									<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-lg fa-shopping-cart"></i>ခြင်းထဲထည့်ရန်</button>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="tab-pane fade active in" id="reviews" >
					<div class="col-sm-12">
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
					</div>
				</div>
				
			</div>
		</div><!--/category-tab-->
		
		@include('partials.recommended-items')
		
	</div>
@endsection