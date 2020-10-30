@extends('layout')

@section('title', 'Checkout')

@section('extra-css')

@endsection

@section('slider')
<section id="slider"><!--slider-->
	<div class="container">
		<div class="row">
			<div class="col-sm-6">
				<div class="item">
					<h1><span>ZAY MIN HTET</span> Co.Ltd</h1>
					<h4 style="line-height: 40px;font-weight:bold;">အမှတ်(၂၀၀/၂၀၆),(၉)လွှာ,၁၃၄လမ်းနှင့်၁၃၅လမ်းကြား,စက်ရုံလမ်း,မအူကုန်းရပ်ကွက်,တာမွေမြို့နယ်,ရန်ကုန်တိုင်းဒေသကြီး.</h4>
					<h4> +95-9-898155551,+95-9-775545655</h4>
				</div>
				<br>
			</div>
			<div class="col-sm-6 carousel-mp4">
				<div id="slider-carousel1" class="carousel slide" data-interval="false">
					<ol class="carousel-indicators">
						<li data-target="#slider-carousel1" data-slide-to="0" class="active"></li>
						<li data-target="#slider-carousel1" data-slide-to="1"></li>
						<li data-target="#slider-carousel1" data-slide-to="2"></li>
					</ol>
					
					<div class="carousel-inner">
						@foreach ($videos as $key => $video)
							<div class="item {{$key == 0 ? 'active' : '' }}" id="video">		
								<iframe class="video-fluid" src="https://player.vimeo.com/video/{{ $video->video_id }}?autoplay=1" frameborder="0" webkitallowfullscreen allow=autoplay	 mozallowfullscreen allowfullscreen></iframe>
							</div>	
						@endforeach					
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
<!--Modal Box-->
<div id="myModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h5 class="modal-title" style="font-size:18px;text-align:center;font-weight:bold;"> Welcome to ZayMinHtet Company Limited <br> ( မင်္ဂလာပါ။ ) <br> ( ဇေမင်းထက်ကုမ္ပဏီမှကြိုဆိုပါတယ်။ )</h5>
			</div>
			<div class="modal-body">
				<p>Memberများအနေဖြင့်သိရှိစေရန်များကိုဖတ်ကြားပေးပါရန်။<br>
				ဖတ်ကြားရန်နှိပ်ရန် <i class="fa fa-lg fa-angle-double-right"></i> <a href="{{ route('navbar.newmember') }}" style="font-size: 18px;font-weight:bold; color:#808000;padding:5px;">ဒီကိုနှိပ်ပါ။</a></p>
				<button type="submit" data-dismiss="modal" class="btn btn-primary">Close</button>
			</div>
		</div>
	</div>
</div>
<!-- end of modal box-->
<div class="col-sm-9 padding-right">
	<div class="features_items"><!--features_items-->
		<h2 class="title text-center">သင့်အတွက်</h2>
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
								   <button type="submit" class="btn btn-default add-to-cart"><i class="fa fa-lg  fa-lg fa-shopping-basket"></i>ခြင်းထဲထည့်ရန်</button>	
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
<script>
$(document).ready(function(){
	$("#myModal").modal('show');
});

$('#video').on('ended', function () {
  $('.carousel').carousel('next');
});

$('video').on('play', function (e) {
	$("#video").carousel('pause');
});

$('video').on('stop pause ended', function (e) {
	$("#video").carousel();
});

var iframe = document.querySelector('iframe');
var player = new Vimeo.Player(iframe);

player.on('play', function() {
	console.log('Played the video');
});

player.getVideoTitle().then(function(title) {
	console.log('title:', title);
});
</script>
<script src="https://player.vimeo.com/api/player.js"></script>

@endsection
