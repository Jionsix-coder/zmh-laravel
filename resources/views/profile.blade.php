<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
	<meta name="author" content="">
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Cart | E-Shopper</title>
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
    
    <div class="container">
        <div class="row profile-box">
            <div class="col-md-12">
                <div class="col-md-6 col-sm-12 profile-box-1">
                    <br>
                      <form>
                        <div class="form-group">
                          <label for="Name">အမည်</label>
                          <input type="text" class="form-control" id="Name" aria-describedby="Name" value="{{ $user->Name }}" readonly>
                          <small id="Name" class="form-text text-muted">We'll never share your information with anyone else.</small>
                        </div>
                        <div class="form-group">
                          <label for="PositionDepartment">ရာထူး | ဋ္ဌာန</label>
                          <input type="text" class="form-control" id="PositionDepartment" value="{{ $user->PositionDepartment }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="CityTineState">မြို့ | တိုင်း | ပြည်နယ်</label>
                            <input type="text" class="form-control" id="CityTineState" value="{{ $user->CityTineState }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="PersoanlNumber">ကိုယ်ပိုင်အမှတ်</label>
                            <input type="text" class="form-control" id="PersoanlNumber" value="{{ $user->PersonalNumber }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="NationalNumber">မှတ်ပုံတင်အမှတ်</label>
                            <input type="text" class="form-control" id="NationalNumber" value="{{ $user->NationalNumber }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="CurrentOffice">လက်ရှိတာဝန်ထမ်းဆောင်သောရုံး</label>
                            <input type="text" class="form-control" id="CurrentOffice" value="{{ $user->CurrentOffice }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="MoneyLeft">လက်ကျန်ငွေ</label>
                            <input type="text" class="form-control" id="MoneyLeft" value="{{ $user->MoneyLeft }}" readonly>
                        </div>
                      </form>
                </div>
                <div class="col-md-6 col-sm-12 profile-box-2">
                    <br>
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
                    <p>အော်ဒါတင်ရရန်အတွက်ဤနေရာတွင်သင့်အချက်အလက်များအားဖြည့်သွင်းပါ(တစ်ကြိမ်သာဖြည့်ညွင်းရန်လိုအပ်ပါသည်။</p>
                    <form action="{{ route('basicuser.update') }}" method="POST">
                    @csrf
                    <label for="Name">Phone Number</label>
                      <div class="form-group">
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon">+95</div>
                            <input type="text" name="PhNumber" class="form-control" id="inlineFormInputGroup" placeholder="9253888809" required>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="AddressLine1">Address Line 1</label>
                        <input type="text" name="AddressLine1" class="form-control" id="AddressLine1" placeholder="Address Line 1" required>
                      </div>
                      <div class="form-group">
                          <label for="AddressLine2">Address Line 2</label>
                          <input type="text" name="AddressLine2" class="form-control" id="AddressLine2" placeholder="Address Line 2" required>
                      </div>
                      <div class="form-group">
                          <label for="City">City</label>
                          <input type="text" name="City" class="form-control" id="City" placeholder="City" required>
                      </div>
                      <div class="form-group">
                          <label for="State">State</label>
                          <input type="text" name="State" class="form-control" id="State" placeholder="State" required>
                      </div>
                      <button class="btn btn-default btn-primary btn-block" type="submit" {{ $user->AddressLine1 != null ? 'disabled' : ''  }}>Submit</button>
                    </form>
              </div>
            </div>
        </div>
    </div>
   @include('partials.footer')

