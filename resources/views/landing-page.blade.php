@extends('layout')

@section('title', 'Checkout')

@section('extra-css')

@endsection

@section('slider')
<section id="slider"><!--slider-->
	<div class="container">
		<div class="row">
			<div class="col-sm-6">
				<h1><span>ZAY MIN HTET</span> Co.Ltd</h1>
				<h4 style="line-height: 40px;font-weight:bold;">{{ __('text.Address') }}</h4>
				<h4> +95-9-898155551,+95-9-775545655</h4>
			</div>
			<div class="col-sm-6 carousel-mp4">
				<div id="slider-carousel1" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#slider-carousel1" data-slide-to="0" class="active"></li>
						<li data-target="#slider-carousel1" data-slide-to="1"></li>
						<li data-target="#slider-carousel1" data-slide-to="2"></li>
					</ol>
					
					<div class="carousel-inner">
						<div class="item active">
							<video class="video-fluid" autoplay loop style="max-height:100%;max-width:100%;">
								<source src="https://mdbootstrap.com/img/video/Lines.mp4" type="video/mp4" />
							</video>
						</div>
						<div class="item">
							<video class="video-fluid" autoplay loop style="max-height:100%;max-width:100%;">
								<source src="https://mdbootstrap.com/img/video/animation-intro.mp4" type="video/mp4" />
							</video>
						</div>
						
						<div class="item">
							<video class="video-fluid" autoplay loop style="max-height:100%;max-width:100%;">
								<source src="https://mdbootstrap.com/img/video/Tropical.mp4" type="video/mp4" />
							</video>
						</div>
						
					</div>
					
					<a href="#slider-carousel1" class="left control-carousel " data-slide="prev">
						<i class="fa fa-angle-left"></i>
					</a>
					<a href="#slider-carousel1" class="right control-carousel " data-slide="next">
						<i class="fa fa-angle-right"></i>
					</a>
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
								<div class="productinfo-img">
									<img src="{{ productImage($product->image) }}" alt="" class="img-fluid" />
								</div>
								<h2>{{ $product->presentPrice() }}</h2>
								<p><a href="{{ route('shop.show', $product->slug) }}">{{ $product->name }}</a></p>

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

@section('extra-js')
<!-- CSS -->

<!-- jQuery and JS bundle w/ Popper.js -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>
@endsection
