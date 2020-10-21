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
								<h4 style="line-height: 40px;font-weight:bold;">{{ __('text.Address') }}</h4>
								<h4> +95-9-898155551,+95-9-775545655</h4>
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
		<h2 class="title text-center">{{ __('text.For_You') }}</h2>
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div class="col-sm-6 col-md-6 col-xs-6">
					<h2 class="title-popular">{{ __('text.Most_Like_Product') }}</h2>
				</div>
				<div class="col-sm-6 col-md-6 col-xs-6">
					<a href="{{ route('shop.index') }}" class="btn btn-seemore get">{{ __('text.See_More') }}</a>
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
								   <button type="submit" class="btn btn-default add-to-cart"><i class="fa fa-lg  fa-lg fa-shopping-basket"></i>{{ __('text.Add_To_Cart') }}</button>	
								</form>
								
							</div>
					</div>
				</div>
			</a>
		</div>							
		@endforeach
	</div><!--features_items-->
	
	
	@include('partials.recommended-items')
	
</div>

@endsection
