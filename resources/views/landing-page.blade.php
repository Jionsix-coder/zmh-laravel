@extends('layout')

@section('title', 'Checkout')

@section('extra-css')

@endsection

@section('slider')
<section id="slider"><!--slider-->
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div id="slider-carousel" class="carousel slide" data-ride="carousel">
					<!-- <div class="cover-img">
						<img src="images/home/cover.jpg" alt="">
					</div> -->
					<!-- <ol class="carousel-indicators">
						<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
						<li data-target="#slider-carousel" data-slide-to="1"></li>
						<li data-target="#slider-carousel" data-slide-to="2"></li>
					</ol> -->
					
					<div class="carousel-inner">
						<div class="item active">
							<div class="col-sm-6">
								<h1><span>ZAY MIN HTET</span> Co.Ltd</h1>
								<h4>No.(200/206), 9<sup>th</sup> Floor, Bet: 134x135 Street, Sat Yone Road, Ma-U-Gone Quarter, Tarmwe Township, Yangon, Myanmar.</h4>
								<h3> +95-9-898155551,+95-9-775545655</h3>
								<p></p>
							</div>
							<div class="col-sm-6 cover-img">
								<img src="{{ asset('images/home/cover.jpg') }}" class="" alt="" />
							</div>
						</div>
					</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
</section><!--/slider-->
@endsection

@section('content')
<div class="col-sm-9 padding-right">
	<div class="features_items"><!--features_items-->
		<h2 class="title text-center">သင့်အတွက်</h2>
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div class="col-sm-6 col-md-6 col-xs-6">
					<h2 class="title-popular">လူအများကြိုက်ထုတ်ကုန်များ</h2>
				</div>
				<div class="col-sm-6 col-md-6 col-xs-6">
					<a href="{{ route('shop.index') }}" class="btn btn-seemore get">အားလုံးကြည့်ရန်နှိပ်ပါ</a>
				</div>
			</div>	
		</div>
		@foreach ($products as $product)
		<div class="col-md-3 col-xs-6 col-sm-4">
			<a href="{{ route('shop.show', $product->slug) }}">
				<div class="product-image-wrapper">
					<div class="single-products">
							<div class="productinfo text-center">
								<img src="{{ productImage($product->image) }}" alt="" class="img-fluid" />
								<h2>{{ $product->presentPrice() }}</h2>
								<p><a href="<a href="{{ route('shop.show', $product->slug) }}">{{ $product->name }}</a></p>

								<form action="{{ route('cart.store') }}" method="POST">
								   @csrf
								   <input type="hidden" name="id" value="{{ $product->id }}">
								   <input type="hidden" name="name" value="{{ $product->name }}">
								   <input type="hidden" name="price" value="{{ $product->price }}">
								   <button type="submit" class="btn btn-default add-to-cart"><i class="fa fa-lg  fa-lg fa-shopping-basket"></i>ခြင်းထဲထည့်ရန်</button>	
								</form>
								
							</div>
					</div>
				</div>
			</a>
		</div>							
		@endforeach
	</div><!--features_items-->
	
	<div class="category-tab"><!--category-tab-->
		<div class="col-sm-12">
			<ul class="nav nav-tabs">
				<li class="active"><a href="#tshirt" data-toggle="tab">ကျားဝတ်</a></li>
				<li><a href="#blazers" data-toggle="tab">မ ဝတ်</a></li>
				<li><a href="#sunglass" data-toggle="tab">ကလေးအသုံးအဆောင်</a></li>
				<li><a href="#kids" data-toggle="tab">ဖုန်းနှင့်ဆက်စပ်ပစ္စည်း</a></li>
				<li><a href="#poloshirt" data-toggle="tab">TV</a></li>
				<li class="nav-tabs-seemore">
					<a href="" style="color:black;">
						<b> အားလုံးကြည့်ရန်နှိပ်ပါ</b>
					</a>
				</li>
			</ul>
		</div>
		<div class="tab-content">
			<div class="tab-pane fade active in" id="tshirt" >
				<div class="col-md-3 col-xs-6 col-sm-4">
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<img src="images/home/gallery1.jpg" alt="Images" class="tabs-img"  />
								<h2>12,000 Ks</h2>
								<p>Easy Polo Black Edition</p>
								<a href="#" class="btn btn-default add-to-cart"><i class="fa  fa-lg fa-shopping-basket"></i>ခြင်းထဲထည့်ရန်</a>
							</div>
							
						</div>
					</div>
				</div>
				<div class="col-md-3 col-xs-6 col-sm-4">
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<img src="images/home/gallery2.jpg" alt="Images" class="tabs-img" />
								<h2>12,000 Ks</h2>
								<p>Easy Polo Black Edition</p>
								<a href="#" class="btn btn-default add-to-cart"><i class="fa  fa-lg fa-shopping-basket"></i>ခြင်းထဲထည့်ရန်</a>
							</div>
							
						</div>
					</div>
				</div>
				<div class="col-md-3 col-xs-6 col-sm-4">
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<img src="images/home/gallery3.jpg" alt="Images" class="tabs-img" />
								<h2>12,000 Ks</h2>
								<p>Easy Polo Black Edition</p>
								<a href="#" class="btn btn-default add-to-cart"><i class="fa  fa-lg fa-shopping-basket"></i>ခြင်းထဲထည့်ရန်</a>
							</div>
							
						</div>
					</div>
				</div>
				<div class="col-md-3 col-xs-6 col-sm-4">
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<img src="images/home/gallery4.jpg" alt="Images" class="tabs-img" />
								<h2>12,000 Ks</h2>
								<p>Easy Polo Black Edition</p>
								<a href="#" class="btn btn-default add-to-cart"><i class="fa  fa-lg fa-shopping-basket"></i>ခြင်းထဲထည့်ရန်</a>
							</div>
							
						</div>
					</div>
				</div>
			</div>
			
			<div class="tab-pane fade" id="blazers" >
				<div class="col-md-3 col-xs-6 col-sm-4">
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<img src="images/home/gallery4.jpg" alt="Images" class="tabs-img" />
								<h2>12,000 Ks</h2>
								<p>Easy Polo Black Edition</p>
								<a href="#" class="btn btn-default add-to-cart"><i class="fa  fa-lg fa-shopping-basket"></i>ခြင်းထဲထည့်ရန်</a>
							</div>
							
						</div>
					</div>
				</div>
				<div class="col-md-3 col-xs-6 col-sm-4">
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<img src="images/home/gallery3.jpg" alt="Images" class="tabs-img" />
								<h2>12,000 Ks</h2>
								<p>Easy Polo Black Edition</p>
								<a href="#" class="btn btn-default add-to-cart"><i class="fa  fa-lg fa-shopping-basket"></i>ခြင်းထဲထည့်ရန်</a>
							</div>
							
						</div>
					</div>
				</div>
				<div class="col-md-3 col-xs-6 col-sm-4">
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<img src="images/home/gallery2.jpg" alt="Images" class="tabs-img" />
								<h2>12,000 Ks</h2>
								<p>Easy Polo Black Edition</p>
								<a href="#" class="btn btn-default add-to-cart"><i class="fa  fa-lg fa-shopping-basket"></i>ခြင်းထဲထည့်ရန်</a>
							</div>
							
						</div>
					</div>
				</div>
				<div class="col-md-3 col-xs-6 col-sm-4">
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<img src="images/home/gallery1.jpg" alt="Images" class="tabs-img" />
								<h2>12,000 Ks</h2>
								<p>Easy Polo Black Edition</p>
								<a href="#" class="btn btn-default add-to-cart"><i class="fa  fa-lg fa-shopping-basket"></i>ခြင်းထဲထည့်ရန်</a>
							</div>
							
						</div>
					</div>
				</div>
			</div>
			
			<div class="tab-pane fade" id="sunglass" >
				<div class="col-md-3 col-xs-6 col-sm-4">
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<img src="images/home/gallery3.jpg" alt="Images" class="tabs-img" />
								<h2>12,000 Ks</h2>
								<p>Easy Polo Black Edition</p>
								<a href="#" class="btn btn-default add-to-cart"><i class="fa  fa-lg fa-shopping-basket"></i>ခြင်းထဲထည့်ရန်</a>
							</div>
							
						</div>
					</div>
				</div>
				<div class="col-md-3 col-xs-6 col-sm-4">
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<img src="images/home/gallery4.jpg" alt="Images" class="tabs-img" />
								<h2>12,000 Ks</h2>
								<p>Easy Polo Black Edition</p>
								<a href="#" class="btn btn-default add-to-cart"><i class="fa  fa-lg fa-shopping-basket"></i>ခြင်းထဲထည့်ရန်</a>
							</div>
							
						</div>
					</div>
				</div>
				<div class="col-md-3 col-xs-6 col-sm-4">
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<img src="images/home/gallery1.jpg" alt="Images" class="tabs-img" />
								<h2>12,000 Ks</h2>
								<p>Easy Polo Black Edition</p>
								<a href="#" class="btn btn-default add-to-cart"><i class="fa  fa-lg fa-shopping-basket"></i>ခြင်းထဲထည့်ရန်</a>
							</div>
							
						</div>
					</div>
				</div>
				<div class="col-md-3 col-xs-6 col-sm-4">
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<img src="images/home/gallery2.jpg" alt="Images" class="tabs-img" />
								<h2>12,000 Ks</h2>
								<p>Easy Polo Black Edition</p>
								<a href="#" class="btn btn-default add-to-cart"><i class="fa  fa-lg fa-shopping-basket"></i>ခြင်းထဲထည့်ရန်</a>
							</div>
							
						</div>
					</div>
				</div>
			</div>
			
			<div class="tab-pane fade" id="kids" >
				<div class="col-md-3 col-xs-6 col-sm-4">
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<img src="images/home/gallery1.jpg" alt="Images" class="tabs-img" />
								<h2>12,000 Ks</h2>
								<p>Easy Polo Black Edition</p>
								<a href="#" class="btn btn-default add-to-cart"><i class="fa  fa-lg fa-shopping-basket"></i>ခြင်းထဲထည့်ရန်</a>
							</div>
							
						</div>
					</div>
				</div>
				<div class="col-md-3 col-xs-6 col-sm-4">
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<img src="images/home/gallery2.jpg" alt="Images" class="tabs-img" />
								<h2>12,000 Ks</h2>
								<p>Easy Polo Black Edition</p>
								<a href="#" class="btn btn-default add-to-cart"><i class="fa  fa-lg fa-shopping-basket"></i>ခြင်းထဲထည့်ရန်</a>
							</div>
							
						</div>
					</div>
				</div>
				<div class="col-md-3 col-xs-6 col-sm-4">
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<img src="images/home/gallery3.jpg" alt="Images" class="tabs-img" />
								<h2>12,000 Ks</h2>
								<p>Easy Polo Black Edition</p>
								<a href="#" class="btn btn-default add-to-cart"><i class="fa  fa-lg fa-shopping-basket"></i>ခြင်းထဲထည့်ရန်</a>
							</div>
							
						</div>
					</div>
				</div>
				<div class="col-md-3 col-xs-6 col-sm-4">
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<img src="images/home/gallery4.jpg" alt="Images" class="tabs-img" />
								<h2>12,000 Ks</h2>
								<p>Easy Polo Black Edition</p>
								<a href="#" class="btn btn-default add-to-cart"><i class="fa  fa-lg fa-shopping-basket"></i>ခြင်းထဲထည့်ရန်</a>
							</div>
							
						</div>
					</div>
				</div>
			</div>
			
			<div class="tab-pane fade" id="poloshirt" >
				<div class="col-md-3 col-xs-6 col-sm-4">
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<img src="images/home/gallery2.jpg" alt="Images" class="tabs-img" />
								<h2>12,000 Ks</h2>
								<p>Easy Polo Black Edition</p>
								<a href="#" class="btn btn-default add-to-cart"><i class="fa  fa-lg fa-shopping-basket"></i>ခြင်းထဲထည့်ရန်</a>
							</div>
							
						</div>
					</div>
				</div>
				<div class="col-md-3 col-xs-6 col-sm-4">
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<img src="images/home/gallery4.jpg" alt="Images" class="tabs-img" />
								<h2>12,000 Ks</h2>
								<p>Easy Polo Black Edition</p>
								<a href="#" class="btn btn-default add-to-cart"><i class="fa  fa-lg fa-shopping-basket"></i>ခြင်းထဲထည့်ရန်</a>
							</div>
							
						</div>
					</div>
				</div>
				<div class="col-md-3 col-xs-6 col-sm-4">
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<img src="images/home/gallery3.jpg" alt="Images" class="tabs-img" />
								<h2>12,000 Ks</h2>
								<p>Easy Polo Black Edition</p>
								<a href="#" class="btn btn-default add-to-cart"><i class="fa  fa-lg fa-shopping-basket"></i>ခြင်းထဲထည့်ရန်</a>
							</div>
							
						</div>
					</div>
				</div>
				<div class="col-md-3 col-xs-6 col-sm-4">
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<img src="images/home/gallery1.jpg" alt="Images" class="tabs-img" />
								<h2>12,000 Ks</h2>
								<p>Easy Polo Black Edition</p>
								<a href="#" class="btn btn-default add-to-cart"><i class="fa  fa-lg fa-shopping-basket"></i>ခြင်းထဲထည့်ရန်</a>
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div><!--/category-tab-->
	
	@include('partials.recommended-items')
	
</div>

@endsection
