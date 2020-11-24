@extends('layout')

@section('title', 'Thanks You')

@section('extra-css')

@endsection

@section('content')
<div class="ps-breadcrumb">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="{{ route('landing.page') }}">ပင်မ</a></li>
            <li>Thanks You</li>
        </ul>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12 thankyou">
            <h3>ဝယ်ယူအားပေးမူအတွက်အထူးပင်ကျေးဇူးတင်ရှိပါသည်။</h3>
            <h3>ကျွန်တော်တို့ဇေမင်းထက်ကုမ္ပဏီမှပြန်လည်အကြောင်းကြားဆက်သွယ်ပေးပါမည်။</h3>
            <a href="{{ route('landing.page') }}"><h4>ပင်မသို့ပြန်သွားရန်</h4></a>
        </div>
    </div>
</div>
@endsection

@section('extra-js')

@endsection