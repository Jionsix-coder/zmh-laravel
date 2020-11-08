
@extends('layout2')

@section('title', 'Search results')

@section('content')

@section('breadcrumb')
	<div class="breadcrumbs">
		<ol class="breadcrumb">
		<li><a href="/home">ပင်မ</a></li>
		<li style="font-weight: bolder; padding-left:10px;">{{ request()->input('query') }} ({{ $products->total() }})</li>
		</ol>
	</div>
@endsection
		<div class="col-sm-9 padding-right">
            <div class="features_items"><!--features_items-->
                <h2 class="title text-center">Search Result</h2>
                @if (session()->has('success_message'))
                    <div class="alert alert-success">
                        {{ session()->get('success_message') }}
                    </div>
                @endif

                @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <h4 style="text-align: center;margin:10px;padding:5px;border:4px double black;">{{ $products->total() }} result(s) for '{{ request()->input('query') }}'</h4>

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
									   <button type="submit" class="btn btn-default add-to-cart"><i class="fa fa-lg fa-shopping-basket"></i>ခြင်းထဲထည့်ရန်</button>	
									</form>
									
								</div>
						    </div>
						</div>
					</a> 
				</div>
                @endforeach
				{{-- @empty
					<div><h2>No items found</h2></div>
				@endforelse --}}

			</div><!--features_items-->
			{{ $products->appends(request()->input())->links('partials.pagination.default') }}
		</div>
	
@endsection