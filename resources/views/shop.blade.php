
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
				@empty
					<div><h2>No items found</h2></div>
				@endforelse

			</div><!--features_items-->
			{{ $products->appends(request()->input())->links('partials.pagination.default') }}
		</div>
	
@endsection