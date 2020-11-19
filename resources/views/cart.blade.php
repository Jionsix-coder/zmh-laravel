@extends('layout')

@section('title', 'Cart')

@section('extra-css')

@endsection

@section('content')
    <div class="ps-page--simple">
        <div class="ps-breadcrumb">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="{{ route('landing.page') }}">ပင်မ</a></li>
                    <li><a href="{{ route('shop.index') }}">စျေးဝယ်ရန်</a></li>
                    <li>ဈေးခြင်း</li>
                </ul>
            </div>
        </div>
        <div class="ps-section--shopping ps-shopping-cart">
            <div class="container">
                <div class="ps-section__header">
                    <h1>Shopping Cart({{ Cart::count() }})</h1>
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
                </div>
                @if(Cart::count() > 0)
                <div class="ps-section__content">
                    <div class="table-responsive">
                        <table class="table ps-table--shopping-cart">
                            <thead>
                                <tr>
                                    <th>ဓာတ်ပုံပစ္စည်းအမည်</th>
                                    <th>စျေးနှုန်း</th>
                                    <th>အရေအတွက်</th>
                                    <th>လှည်းသို့ထှည့်ရန်</th>
                                    <th>အရောင်</th>
                                    <th>စုစုပေါင်း</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (Cart::content() as $item)
                                @php
                                    $colour = $item->model->colour;
                                    $product_colour = explode(',',$colour);
                                @endphp
                                    <tr>
                                        <td>
                                            <div class="ps-product--cart">
                                                <div class="ps-product__thumbnail"><a href="{{ route('shop.show', $item->model->slug) }}"><img src="{{ productImage($item->model->image)}}" alt=""></a></div>
                                                <div class="ps-product__content"><a href="{{ route('shop.show', $item->model->slug) }}">{{ $item->model->name }}</a></div>
                                            </div>
                                        </td>
                                        <td class="price" style="text-align: center;">{{ $item->model->presentPrice() }}</td>
                                        <td style="text-align: center;">
                                            <select class="cart_quantity_select" data-id="{{ $item->rowId }}" data-productQuantity="{{ $item->model->quantity }}">
                                                @for($i = 1; $i < $item->model->quantity + 1 ; $i++)
                                                <option {{ $item->qty == $i ? 'selected' : '' }}>{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </td>
                                        <td>
                                            <form action="{{ route('cart.switchToSaveCart', $item->rowId) }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $item->rowId }}">
                                                <button class="savecart-btn" style="width:100%;height:50%">လှည်းသို့ထှည့်ရန်</button>
                                            </form>
                                        </td>
                                        <td style="text-align: center;">
                                            <select name="colour" id="">
                                                @foreach ($product_colour as $colour)
                                                    <option value="{{ $colour }}">{{ $colour }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td style="text-align: center;">{{ presentPrice($item->subtotal()) }} ( -{{ $item->model->discountPercent > 0 ? $item->model->discountPercent : '0'  }}%)</td>
                                        <td>
                                            <form action="{{ route('cart.destroy',$item->rowId) }}" method="POST">
                                            @csrf
                                            @method('DELETE') 
                                                <button type="submit" class="cross-button"><i class="icon-cross"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                @else				
                                    <h3 style="text-align:center;color:red;font-weight:bold;border:4px double black;padding:20px;">ဈေးခြင်းတွင်ပစ္စည်းမရှိပါ။</h3>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="ps-section__cart-actions"><a class="ps-btn" href="{{ route('shop.index') }}"><i class="icon-arrow-left"></i> Back to Shop</a></div>
                </div>
                <div class="ps-section__footer">
                    <div class="row">
                        @if (! session()->has('coupon'))
                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 ">
                            <form action="{{ route('coupon.store') }}" method="POST">
                            @csrf
                                <figure>
                                    <figcaption>Coupon Discount</figcaption>
                                    <div class="form-group">
                                        <input class="form-control" type="text" placeholder="ကူပွန်ကုဒ်ရိုက်ထည့်ရန်နေရာ" name="coupon_code">
                                    </div>
                                    <div class="form-group">
                                        <button class="ps-btn ps-btn--outline">Apply</button>
                                    </div>
                                </figure>
                            </form>
                        </div>
                        @endif
                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 ">
                            <div class="ps-block--shopping-total">
                                @if (session()->has('coupon'))
                                <div class="ps-block__header">
                                    <p style="display: inline;font-size:12px;">Discount ({{ session()->get('coupon')['name'] }}) :
                                        <span>
                                            <form action="{{ route('coupon.destroy') }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                                <button type="submit" class="btn">Remove</button> 
                                            </form>
                                            - {{ presentPrice($discount) }}
                                       </span>
                                    </p>
                                </div>
                                @endif
                                <div class="ps-block__header">
                                    <p>အရေအတွက်စုစုပေါင်း <span>{{ Cart::count() > 0 ? Cart::count() : 0 }}</span></p>
                                </div>
                                <div class="ps-block__header">
                                    <p style="color: red;">လက်ကျန်ငွေ <span>{{ $user->MoneyLeft }}</span></p>
                                </div>
                                <div class="ps-block__header">
                                    <p>တစ်လချင်းပေးရမည့်ငွေ <span>{{ presentPrice($newTotal / 4) }}</span></p>
                                </div>
                                <div class="ps-block__content">
                                    <h3>စုစုပေါင်း  <span>{{ presentPrice($newTotal) }}</span></h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 ">
                            <form action="{{ route('order.store') }}" method="POST">
                            @csrf
                                <figure>
                                    <figcaption>တာဝန်ခံကုဒ်</figcaption>
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="ordercode" placeholder="တာဝန်ခံကုဒ်ရိုက်ထည့်ရန်နေရာ" required>
                                    </div>
                                </figure>
                                <button class="ps-btn ps-btn--fullwidth" type="submit" >အော်ဒါတင်ရန်</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('extra-js')
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
@endsection