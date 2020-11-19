@extends('layout')

@section('title', 'WhishList')

@section('extra-css')

@endsection

@section('content')
    <div class="ps-page--simple">
        <div class="ps-breadcrumb">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="{{ route('landing.page') }}">ပင်မ</a></li>
                    <li><a href="{{ route('shop.index') }}">စျေးဝယ်ရန်</a></li>
                    <li>ရွှေးချယ်ပစ္စည်း</li>
                </ul>
            </div>
        </div>
        <div class="ps-section--shopping ps-whishlist">
            <div class="container">
                <div class="ps-section__header">
                    <h1>ရွှေးချယ်ပစ္စည်း({{ Cart::instance('saveCart')->count() }})</h1>
                </div>
                @if(Cart::instance('saveCart')->count() > 0)
                <div class="ps-section__content">
                    <div class="table-responsive">
                        <table class="table ps-table--whishlist">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>ဓာတ်ပုံပစ္စည်းအမည်</th>
                                    <th>စျေးနှုန်း</th>
                                    <th>အခြေအနေ</th>
                                    <th>ဈေးခြင်းသို့</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (Cart::instance('saveCart')->content() as $item)
                                <tr>
                                    <td>
                                        <form action="{{ route('saveCart.destroy',$item->rowId) }}" method="POST">
                                        @csrf
                                        @method('DELETE') 
                                            <button type="submit" class="cross-button"><i class="icon-cross"></i></button>
                                        </form>
                                    </td>
                                    <td>
                                        <div class="ps-product--cart">
                                            <div class="ps-product__thumbnail"><a href="{{ route('shop.show', $item->model->slug) }}"><img src="{{ productImage($item->model->image)}}" alt="{{ $item->model->name }}"></a></div>
                                            <div class="ps-product__content"><a href="{{ route('shop.show', $item->model->slug) }}">{{ $item->model->name }}</a></div>
                                        </div>
                                    </td>
                                    <td class="price" style="text-align: center">{{ $item->model->presentPrice() }}</td>
                                    <td style="text-align: center"><span class="ps-tag {{ $item->model->quantity > 0 ? 'ps-tag--in-stock' : 'ps-tag--out-stock' }}">{{ $item->model->quantity > 0 ? 'In Stock' : 'Out Of Stock' }}</span></td>
                                    @if($item->model->quantity > 0)
                                        <td style="text-align: center">
                                            <form action="{{ route('cart.store') }}" method="POST">
                                            @csrf
                                                <input type="hidden" name="id" value="{{ $item->model->id }}">
                                                <input type="hidden" name="name" value="{{ $item->model->name }}">
                                                <input type="hidden" name="price" value="{{ $item->model->price * (1 - $item->model->discountPercent / 100) }}">
                                                <button class="ps-btn">ခြင်းထဲထည့်ရန်</buttton>
                                            </form>
                                        </td>
                                    @endif
                                </tr>
                                @endforeach
                                @else				
                                    <h3 style="text-align:center;color:red;font-weight:bold;border:4px double black;padding:20px;">ရွှေးချယ်ထားသောပစ္စည်းမရှိပါ။</h3>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('extra-js')

@endsection