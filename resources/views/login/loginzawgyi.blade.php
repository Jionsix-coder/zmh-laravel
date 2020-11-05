<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
	<meta name="author" content="">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	
	<title>Login | Zay Min Htet Co.Ltd</title>
	 <!--Bootsrap 4 CDN-->
	 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	 <!--Custom css-->
	 <link rel="stylesheet" href="css/login.css">
	 <!--Fontawesome CDN-->
	 <script src="https://kit.fontawesome.com/270fe78054.js" crossorigin="anonymous"></script>>
</head><!--/head-->

<body>
	<!--Modal Box-->
		<div id="myModal" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" style="font-size:18px;text-align:center;font-weight:bold;"> Welcome to ZayMinHtet Company Limited <br> ( မင်္ဂလာပါ။ ) <br> ( ဇေမင်းထက်ကုမ္ပဏီမှကြိုဆိုပါတယ်။ )</h5>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body">
						<p>သင်၏ဖုန်းအား unicode font အသုံးပြုထားပါက	<b><a href="{{ route('user.login') }}">ဤနေရာ</a></b> ကိုနှိပ်ပါ။</p>
                        <p>သင္၏ဖုန္းအား zawgyi font အသုံးျပဳထားပါက <b><a href="{{route('user.loginzawgyi')}}">ဤေနရာ</a></b> ကိုႏွိပ္ပါ။</p>
                        <p>Englishလိုရိုက်ထည့်လိုပါက <b><a href="{{route('user.loginenglish')}}">ဤေနရာ</a></b> ကိုႏွိပ္ပါ။</p>
					</div>
					<button type="submit" data-dismiss="modal" class="btn btn-primary">Close</button>
				</div>
			</div>
		</div>
	<!-- end of modal box-->
	<div class="container">
		<div class="d-flex justify-content-center h-100">
			<div class="card">
				<div class="card-header">
					<h3><i class="fa fa-lg fa-lock" style="color: #800000;"></i> <strong>အကောင့်ထဲသို့ဝင်ရန်</strong></h3>
					<hr>
					<h3><b>Zay Min Htet Co.Ltd</b></h3>
					<h4><i><b>(Memberအဖွဲ့ဝင်များအတွက်သာ)</b></i></h4>
					<hr>
					<p>ဆက်သွယ်ရန် : +95-9-898155551 ,<br> +95-9-775545655</p>
					<hr>
					<h3><b>English Form</b></h3>
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
							<input type="text" name="Name" class="form-control" placeholder="Name" required>				
						</div>
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-id-badge"></i></span>
							</div>
							<input type="text" name="PositionDepartment" class="form-control" placeholder="PositionDepartment" required>
						</div>
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-map-marked"></i></span>
							</div>
							<input type="text" name="CityTineState" class="form-control" placeholder="City | Tine | State" required>
						</div>
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
							</div>
							<input type="text" name="PersonalNumber" class="form-control" placeholder="Personal Number" required>
						</div>
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-id-card"></i></span>
							</div>
							<input type="text" name="NationalNumber" class="form-control" placeholder="National Number" required>
						</div>
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-building"></i></span>
							</div>
							<input type="text" name="CurrentOffice" class="form-control" placeholder="CurrentOffice" required>
						</div>
						<div class="form-group">
							<input type="submit" value="Login" class="btn float-right login_btn">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
<script>
	$(document).ready(function(){
		$("#myModal").modal('show');
	});
</script>
</html>