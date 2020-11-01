<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	<title>Login | Zay Min Htet Co.Ltd</title>
	 <!--Bootsrap 4 CDN-->
	 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	 <!--Custom css-->
	 <link rel="stylesheet" href="css/login.css">
	 <!--Fontawesome CDN-->
	 <script src="https://kit.fontawesome.com/270fe78054.js" crossorigin="anonymous"></script>
</head><!--/head-->

<body>
	<div class="container">
		<div class="d-flex justify-content-center h-100">
			<div class="card">
				<div class="card-header">
					<h3><i class="fa fa-lg fa-lock" style="color: #800000;"></i> <strong>အကောင့်ထဲသို့ဝင်ရန်</strong></h3>
					<hr>
					<h3><b>Zay Min Htet Co.Ltd</b></h3>
					<h4><i><b>(Memberအဖြဲ႕ဝင္မ်ားအတြက္သာ)</b></i></h4>
					<hr>
					<p>ဆက္သြယ္ရန္ : +95-9-898155551 ,<br> +95-9-775545655</p>
				</div>
				<div class="card-body">
					@if(count($errors) > 0)
						<div class="alert alert-danger" style="height:70px;">
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
					<form action="{{ route('user.checkzawgyi') }}" method="POST">
						@csrf
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" value="{{ old('Name') }}" name="Name" class="form-control" placeholder="အမည္" required>				
						</div>
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-id-badge"></i></span>
							</div>
							<input type="text" value="{{ old('PositionDepartment') }}" name="PositionDepartment" class="form-control" placeholder="ရာထူး | ႒ာန" required>
						</div>
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-map-marked"></i></span>
							</div>
							<input type="text" value="{{ old('CityTineState') }}" name="CityTineState" class="form-control" placeholder="ၿမိဳ႕ | တိုင္း | ျပည္နယ္" required>
						</div>
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
							</div>
							<input type="text" value="{{ old('PersonalNumber') }}" name="PersonalNumber" class="form-control" placeholder="ကိုယ်ပိုင်အမှတ်" required>
						</div>
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-id-card"></i></span>
							</div>
							<input type="text" value="{{ old('NationalNumber') }}" name="NationalNumber" class="form-control" placeholder="ကိုယ္ပိုင္အမွတ္" required>
						</div>
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-building"></i></span>
							</div>
							<input type="text" value="{{ old('CurrentOffice') }}" name="CurrentOffice" class="form-control" placeholder="လက္ရွိတာဝန္ထမ္းေဆာင္ေသာ႐ုံး" required>
						</div>
						<div class="form-group">
							<input type="submit" value="Login" class="btn float-right login_btn">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
  
	
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
</body>
</html>