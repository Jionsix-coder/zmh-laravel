@extends('layout')

@section('title', 'Profile')

@section('extra-css')

@endsection

@section('content')
    <main class="ps-page--my-account">
        <div class="ps-breadcrumb">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="{{ route('landing.page') }}">ပင်မ</a></li>
                    <li>အကောင့်</li>
                </ul>
            </div>
        </div>
        <section class="ps-section--account">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="ps-section__left">
                            <aside class="ps-widget--account-dashboard">
                                <div class="ps-widget__header"><img src="img/users/3.jpg" alt="">
                                    <figure>
                                        <figcaption>{{ $user->Name }}</figcaption>
                                        <p><a href="#">{{ $user->PersonalNumber }}</a></p>
                                    </figure>
                                </div>
                                <div class="ps-widget__content">
                                    <ul class="ps-tab-list">
                                        <li class="active"><a href="#profile"><i class="icon-user"></i> အကောင့်</a></li>
                                        <li><a href="#invoices"><i class="icon-papers"></i> အော်ဒါများ</a></li>
                                        <li><a href="#whishlist"><i class="icon-heart"></i> ရွှေးချယ်ပစ္စည်း</a></li>
                                        <li>
                                            <form action="{{ route('user.logout') }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                                <a type="submit"><button class="cross-button" style="font-weight:bold;margin-right:10px;"><i class="icon-power-switch"></i> ထွက်ရန်</button></a>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </aside>
                        </div>
                    </div>
                    <div class="ps-tabs col-lg-8">
                        <div class="ps-section__right ps-tab active" id="profile">
                            <form class="ps-form--account-setting" action="{{ route('basicuser.update') }}" method="POST">
                            @csrf
                                <div class="ps-form__header">
                                    <br>
                                    <p style="font-size:medium;background-color:black;color:red;font-weight:bold;text-align:center;border-radius: 20px;padding:15px 15px;">အော်ဒါတင်ရရန်အတွက်ဤနေရာတွင်သင့်အချက်အလက်များအားဖြည့်သွင်းပါ(တစ်ကြိမ်သာဖြည့်ညွင်းရန်လိုအပ်ပါသည်။)</p>
                                    <br>
                                    <h3>User Information</h3>
                                </div>
                                <div class="ps-form__content">
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input class="form-control" name="PhNumber" type="text" placeholder="Please enter your phone number...">
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Address Line 1</label>
                                                <input class="form-control" name="AddressLine1" type="text" placeholder="Please enter your address...">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Address Line 2</label>
                                                <input class="form-control" name="AddressLine2" type="text" placeholder="Please enter your address...">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>City</label>
                                                <input class="form-control" name="City" type="text" placeholder="Please enter your city...">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>State</label>
                                                <input class="form-control" name="State" type="text" placeholder="Please enter your state...">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group submit">
                                    <button class="ps-btn" type="submit" {{ $user->PhNumber != null ? 'disabled' : ''  }}>Submit</button>
                                </div>
                            </form>
                            <div class="ps-section__content">
                                <div class="table-responsive">
                                    <table class="table ps-table">
                                        <thead>
                                            <tr>
                                                <th>အမည်</th>
                                                <th>ရာထူး | ဋ္ဌာန</th>
                                                <th>မြို့ | တိုင်း | ပြည်နယ်</th>
                                                <th>ကိုယ်ပိုင်အမှတ်</th>
                                                <th>မှတ်ပုံတင်အမှတ်</th>
                                                <th>လက်ရှိတာဝန်ထမ်းဆောင်သောရုံး</th>
                                                <th>လက်ကျန်ငွေ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{ $user->Name }}</td>
                                                <td>{{ $user->PositionDepartment }}</td>
                                                <td>{{ $user->CityTineState }}</td>
                                                <td>{{ $user->PersonalNumber }}</td>
                                                <td>{{ $user->NationalNumber }}</td>
                                                <td>{{ $user->CurrentOffice }}</td>
                                                <td>{{ $user->MoneyLeft }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="ps-section__right ps-tab" id="invoices">
                            <br>
                            <div class="ps-section--account-setting">
                                <div class="ps-section__header">
                                    <h3>အော်ဒါများ</h3>
                                </div>
                                <div class="ps-section__content">
                                    <div class="table-responsive">
                                        <table class="table ps-table ps-table--invoices">
                                            <thead>
                                                <tr>
                                                    <th>အော်ဒါအမှတ်</th>
                                                    <th>ပစ္စည်းအမည်</th>
                                                    <th>ရက်စွဲ</th>
                                                    <th>စုစုပေါင်း</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($orders as $order)
                                                    <tr>
                                                        <td><a href="invoice-detail.html">{{ $order->id }}</a></td>
                                                        <td>
                                                            @foreach ($order->products as $item)
                                                            <a href="{{ route('shop.show', $item->slug) }}">{{ $item->name }}(x{{ $item->pivot->quantity }}) <br></a>
                                                            @endforeach
                                                        </td>
                                                        <td>{{ $order->created_at->toDateString() }}</td>
                                                        <td>{{ $order->total }}</td>
                                                        <td style="background-color: {{ $order->delivered == 1 ? 'green' : 'red' }};font-weight:bold;color:black;text-align:center;">{{ $order->delivered == 1 ? 'Delivered' : 'Not Delivered' }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ps-section__right ps-tab" id="whishlist">
                            <br>
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
                                                            <button class="ps-btn">ခြင်းထဲထည့်ရန်</button>	
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
            </div>
        </section>
    </main>
@endsection('content')

@section('extra-js')

@endsection