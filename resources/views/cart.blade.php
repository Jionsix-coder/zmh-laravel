<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
	<meta name="author" content="">
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Cart | ZMH-OnlineShop</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ asset('css/price-range.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
	<link href="{{ asset('css/main.css') }}" rel="stylesheet">
	<link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head><!--/head-->

<body>
	@include('partials.header')

	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="/home">ပင်မ</a></li>
				  <li style="font-weight: bolder;"><i class="fa fa-md fa-shopping-basket"></i> စျေးခြင်း</li>
				</ol>
			</div>
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

			@if(Cart::count() > 0)

			<h2>{{ Cart::count() }} item(s) in Shopping Cart</h2>

			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">ဓာတ်ပုံ</td>
							<td class="description">ပစ္စည်းအမည်</td>
							<td class="saveCart">လှည်းသို့ထှည့်ရန်</td>
							<td class="price">စျေးနှုန်း</td>
							<td class="quantity">အရေအတွက်</td>
							<td class="total">စုစုပေါင်း</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
				@foreach (Cart::content() as $item)
						<tr>
							<td class="cart_product">
								<a href=""><img src="{{ productImage($item->model->image)}}" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="{{ route('shop.show', $item->model->slug) }}">{{ $item->model->name }}</a></h4>
								<p>{!! Str::limit($item->model->details, 70, '...') !!}</p>
							</td>
							<td class="cart_savecart">
								<form action="{{ route('cart.switchToSaveCart', $item->rowId) }}" method="POST">
								@csrf
								<input type="hidden" name="id" value="{{ $item->rowId }}">
								<button class="btn btn-default cart_save_cart">လှည်းသို့ထှည့်ရန်</button>
								</form>
							</td>
							<td class="cart_price">
								<p>{{ $item->model->presentPrice() }}</p>
							</td>
							<td class="cart_quantity">
								<select class="cart_quantity_select" data-id="{{ $item->rowId }}" data-productQuantity="{{ $item->model->quantity }}">
									@for($i = 1; $i < 5 + 1 ; $i++)
									<option {{ $item->qty == $i ? 'selected' : '' }}>{{ $i }}</option>
									@endfor
							    </select>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">{{ presentPrice($item->subtotal()) }} ( -{{ $item->model->discountPercent > 0 ? $item->model->discountPercent : '0'  }}%)</p>
							</td>
							<td class="cart_delete">
								<form action="{{ route('cart.destroy',$item->rowId) }}" method="POST">
									@csrf
									@method('DELETE')
									
									<button type="submit" class="cart_quantity_delete"><i class="fa fa-times"></i></button>
								</form>
							</td>
						</tr>
				@endforeach
				@else
					
					<h3 class="no-item-h3">ဈေးခြင်းတွင်ပစ္စည်းမရှိပါ။</h3>
					<a href="{{ route('shop.index') }}" class="btn btn-primary btn-cs">Contine Shopping</a>

				@endif
			</tbody>
		</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			
			<div class="row">
				<div class="col-sm-6">
					@if (! session()->has('coupon'))
					<div class="total_area">
						<form action="{{ route('coupon.store') }}" method="POST">
							@csrf
							<ul>
								<li class="code-box">ကူပွန်ကုဒ်<span><input placeholder="ကူပွန်ကုဒ်ရိုက်ထည့်ရန်နေရာ" type="text" name="coupon_code" id="coupon_code"></span></li>
							</ul>
							<button class="btn btn-default update" href="">Continue</button>
					    </form>
					</div>
					@endif 
				</div>
				<div class="col-sm-6">
					<div class="total_area">
						
						<ul>
							<li>စုစုပေါင်းခွဲ <span>{{ presentPrice(Cart::subtotal()) }}</span></li>
							@if (session()->has('coupon'))
								<li>Discount ({{ session()->get('coupon')['name'] }}) :
									<form action="{{ route('coupon.destroy') }}" method="POST" style="display: inline">
									@csrf
									@method('DELETE')
										<button type="submit" href="" class="btn btn-xs btn-default remove">Remove</button> 
									</form>
									<span>- {{ presentPrice($discount) }} </span>
								</li>
								<div class="line"></div>
							    <li>စုစုပေါင်းခွဲ New<span>{{ presentPrice($newSubtotal) }}</span></li>
							@endif
							<div class="line"></div>
							<li>အရေအတွက်စုစုပေါင်း<span>{{ Cart::count() > 0 ? Cart::count() : 0 }} </span></li>
							<li>စုစုပေါင်း <span>{{ presentPrice($newTotal) }}</span></li>
							<li style="color: red;">လက်ကျန်ငွေ : <span>{{ $user->MoneyLeft }}</span></li>
							<li style="color: black; font-size:13px;">တစ်လချင်းပေးရမည့်ငွေ : <span>{{ presentPrice($newTotal / 4) }}</span></li>
							<form action="{{ route('order.store') }}" method="POST">
							@csrf
							<li class="code-box">တာဝန်ခံကုဒ်<span><input type="text" name="ordercode" placeholder="တာဝန်ခံကုဒ်ရိုက်ထည့်ရန်နေရာ" required></span></li>
						</ul>
						       <button class="btn btn-default update" type="submit">အော်ဒါတင်ရန်</button>
						    </form>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->


   @include('partials.footer')


<script src="{{ asset('js/app.js') }}"></script>
<script>
	(function(){
		const classname = document.querySelectorAll('.cart_quantity_select')

		Array.from(classname).forEach(function(element){
			element.addEventListener('change',function(){
				const id = element.getAttribute('data-id')
				const productQuantity = element.getAttribute('data-productQuantity')
				axios.patch(`/cart/${id}`, {
					quantity : this.value,
					productQuantity : productQuantity
				})
				.then(function (response) {
					// console.log(response);
					window.location.href = '{{ route('cart.index') }}'
				})
				.catch(function (error) {
					//console.log(error);
					window.location.href = '{{ route('cart.index') }}'
				});
			})
		})
	})();
</script>
