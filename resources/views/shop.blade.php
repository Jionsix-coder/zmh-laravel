
@extends('layout')

@section('title', 'Checkout')

@section('extra-css')

@endsection

@section('content')

@section('breadcrumb')
	<div class="breadcrumbs">
		<ol class="breadcrumb">
		<li><a href="/">ပင်မ</a></li>
		<li style="font-weight: bolder;">စျေးဝယ်ရန်</li>
		</ol>
	</div>
@endsection
		<div class="col-sm-9 padding-right">
			<div class="features_items"><!--features_items-->
				<h2 class="title text-center">{{ $categoryName }}</h2>

				@forelse ($products as $product)
				<div class="col-md-3 col-xs-6 col-sm-4">
					<a href="{{ route('shop.show', $product->slug) }}">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="{{ productImage($product->image) }}" alt="" />
									<h2>{{ $product->presentPrice() }}</h2>
									<p><a href="{{ route('shop.show', $product->slug) }}">{{ $product->name }}</a></p>
									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-lg fa-shopping-cart"></i>ခြင်းထဲထည့်ရန်</a>
								</div>
							</div>
						</div>
					</a> 
				</div>
				@empty
					<div><h2>No items found</h2></div>
				@endforelse

			</div><!--features_items-->
			{{ $products->appends(request()->input())->links('partials.pagination.default') }}
		</div>
	
@endsection