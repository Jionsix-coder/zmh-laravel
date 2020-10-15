<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Cart | E-Shopper</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
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
				  <li><a href="/">ပင်မ</a></li>
				  <li style="font-weight: bolder;"><i class="fa fa-lg fa-shopping-cart"></i> စျေးခြင်း</li>
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

			@if(Cart::instance('saveCart')->count() > 0)

			<h2>{{ Cart::instance('saveCart')->count() }} item(s) in Shopping Cart</h2>

			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">ပစ္စည်း</td>
                            <td class="description">Name</td>
                            <td>switchToBasket</td>
							<td class="price">စျေးနှုန်း</td>
							<td class="quantity">အရေအတွက်</td>
							<td class="total">စုစုပေါင်း</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
				@foreach (Cart::instance('saveCart')->content() as $item)
						<tr>
							<td class="cart_product">
								<a href=""><img src="{{ productImage($item->model->image)}}" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="{{ route('shop.show', $item->model->slug) }}">{{ $item->model->name }}</a></h4>
								<p>{{ $item->model->details }}</p>
                            </td>
                            <td>
                                <form action="{{ route('saveCart.switchToCart', $item->rowId) }}" method="POST">
                                    @csrf
                                <input type="hidden" name="id" value="{{ $item->rowId }}">
                                <button class="btn btn-default"> Move to cart</button>
                                </form>
                            </td>
							<td class="cart_price">
								<p>{{ $item->model->presentPrice() }}</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<a class="cart_quantity_down" href=""> - </a>
									<input class="cart_quantity_input" type="text" name="quantity" value="1" autocomplete="off" size="2">
									<a class="cart_quantity_up" href=""> + </a>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">12,000 Ks</p>
							</td>
							<td class="cart_delete">
								<form action="{{ route('saveCart.destroy',$item->rowId) }}" method="POST">
									@csrf
									@method('DELETE')
									
									<button type="submit" class="cart_quantity_delete"><i class="fa fa-times"></i></button>
								</form>
							</td>
						</tr>
				@endforeach
				@else
					
					<h3>No Items In Cart!</h3>
					<a href="{{ route('shop.index') }}" class="btn btn-default">Contine Shopping</a>

				@endif
			</tbody>
		</table>
			</div>
		</div>
	</section> <!--/#cart_items-->


   @include('partials.footer')