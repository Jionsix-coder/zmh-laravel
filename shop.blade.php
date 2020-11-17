
@extends('layout')

@section('title', 'Checkout')

@section('extra-css')

@endsection


@section('content')

@section('breadcrumb')
	<div class="breadcrumbs">
		<ol class="breadcrumb">
		<li><a href="/home">ပင်မ</a></li>
		<li style="font-weight: bolder;">{{ request()->category != null ? $categoryName : 'စျေးဝယ်ရန်' }}</li>
		</ol>
	</div>
@endsection
		<div class=" {{ (request()->category || Request::url() === 'https://zayminhtet.com/shop') !=  null ? 'col-sm-12' : 'col-sm-9' }} padding-right">
			<div class="features_items"><!--features_items-->
				<h2 class="title text-center">{{ $categoryName }}</h2>

				<div class="infinite-scroll">
					@forelse ($products as $product)
						<div class="col-md-3 col-xs-6 col-sm-4">
							<a href="{{ route('shop.show', $product->slug) }}">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<div class="productinfo-img">
												<img src="{{ productImage($product->image) }}" alt="" />
											</div>
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
					{{ $products->appends(request()->input())->links('partials.pagination.default') }}
				</div>
			</div><!--features_items-->
		</div>
	
@endsection

@section('extra-js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="/js/jquery.jscroll.min.js"></script>
{{-- MAKE SURE THAT YOU PUT THE CORRECT PATH FOR jquery.jscroll.min.js --}}

<script type="text/javascript">
	$('ul.pagination').hide();
	$(function() {
		$('.infinite-scroll').jscroll({
			autoTrigger: true,
			loadingHtml: '<img class="center-block" src="/images/loading.gif" alt="Loading..." />', // MAKE SURE THAT YOU PUT THE CORRECT IMG PATH
			padding: 0,
			nextSelector: '.pagination li.active + li a',
			contentSelector: 'div.infinite-scroll',
			callback: function() {
				$('ul.pagination').remove();
			}
		});
	});
</script>
@endsection