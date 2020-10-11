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
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-6">
                      <form>
                        <div class="form-group">
                          <label for="Name">Name</label>
                          <input type="text" class="form-control" id="Name" aria-describedby="Name" value="{{ $user->Name }}" readonly>
                          <small id="Name" class="form-text text-muted">We'll never share your information with anyone else.</small>
                        </div>
                        <div class="form-group">
                          <label for="PositionDepartment">PositionDepartment</label>
                          <input type="text" class="form-control" id="PositionDepartment" value="{{ $user->PositionDepartment }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="CityTineState">CityTineState</label>
                            <input type="text" class="form-control" id="CityTineState" value="{{ $user->CityTineState }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="PersoanlNumber">PersoanlNumber</label>
                            <input type="text" class="form-control" id="PersoanlNumber" value="{{ $user->PersonalNumber }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="NationalNumber">NationalNumber</label>
                            <input type="text" class="form-control" id="NationalNumber" value="{{ $user->NationalNumber }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="CurrentOffice">CurrentOffice</label>
                            <input type="text" class="form-control" id="CurrentOffice" value="{{ $user->CurrentOffice }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="MoneyLeft">MoneyLeft</label>
                            <input type="text" class="form-control" id="MoneyLeft" value="{{ $user->MoneyLeft }}" readonly>
                        </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
   @include('partials.footer')

