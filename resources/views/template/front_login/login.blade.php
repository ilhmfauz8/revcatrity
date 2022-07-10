<!DOCTYPE html>
<html lang="en">
<head>
	<title>LOGIN</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{ asset('assets_backend/img/favicon.png') }}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="asset_login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="asset_login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="asset_login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="asset_login/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="asset_login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="asset_login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="asset_login/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="asset_login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="asset_login/css/util.css">
	<link rel="stylesheet" type="text/css" href="asset_login/css/main.css">
<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-75 p-r-75 p-t-20 p-b-55">
				<form class="login100-form validate-form flex-sb flex-w" method="POST" action="{{ route('login') }}">
				@csrf
					<div class="login100-form-avatar">
						<a href="{{ url('/') }}"><img src="{{ asset('assets/images/shapes/logo_cat.png') }}" alt="AVATAR"></a>
					</div>

					{{-- <span class="login100-form-title p-b-32">
						CONTENT MANAGEMENT SYSTEM
					</span> --}}

					{{-- <span class="txt1 p-b-11">
						Username
					</span> --}}
					<div class="wrap-input100 validate-input m-b-25" data-validate = "Email is required">
						<input class="input100" type="email" maxlength="250" name="email" id="email" placeholder="Email">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-12" data-validate = "Password is required">
						<span class="btn-show-pass">
							<i class="fa fa-eye"></i>
						</span>
						<input class="input100" type="password" maxlength="250" name="password" placeholder="Password">
						<span class="focus-input100"></span>
					</div>

					<div class="flex-sb-m w-full p-b-48">
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Log In
						</button>
					</div>
                    <div class="container-home-form-btn">
						<a href="{{ url('/') }}" class="home-form-btn">
							Back to HOME
						</a>
					</div>

				</form>
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="asset_login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="asset_login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="asset_login/vendor/bootstrap/js/popper.js"></script>
	<script src="asset_login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="asset_login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="asset_login/vendor/daterangepicker/moment.min.js"></script>
	<script src="asset_login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="asset_login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
    <!-- SweetAlert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="asset_login/js/main.js"></script>
	@if(Session::has('error'))
		<script type="text/javascript">
			Swal.fire({
			icon: 'error',
			text: '{{Session::get("error")}}',
			showConfirmButton: false,
			timer: 1500
		});
		</script>
		<?php
			Session::forget('error');
		?>
	@endif
</body>
</html>
