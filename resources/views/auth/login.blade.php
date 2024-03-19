<!doctype html>
<html lang="en" dir="ltr">
    <head>

		<!-- META DATA -->
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="Yoha –  HTML5 Bootstrap Admin Template">
		<meta name="author" content="Spruko Technologies Private Limited">
		<meta name="keywords" content="admin dashboard html template, admin dashboard template bootstrap 4, analytics dashboard templates, best admin template bootstrap 4, best bootstrap admin template, bootstrap 4 template admin, bootstrap admin template premium, bootstrap admin ui, bootstrap basic admin template, cool admin template, dark admin dashboard, dark admin template, dark dashboard template, dashboard template bootstrap 4, ecommerce dashboard template, html5 admin template, light bootstrap dashboard, sales dashboard template, simple dashboard bootstrap 4, template bootstrap 4 admin">

		<!-- FAVICON -->
		<link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/brand/unperba.png') }}" />

		<!-- TITLE -->
		<title>Login - Sistem Inventory</title>

		<!-- BOOTSTRAP CSS -->
		<link id="style" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}') }}" rel="stylesheet" />

		<!-- STYLE CSS -->
		<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet"/>
		<link href="{{ asset('assets/css/plugins.css') }}" rel="stylesheet" />

		<!--- FONT-ICONS CSS -->
		<link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet"/>

	</head>

	<body class="app sidebar-mini login-img">

		<!-- BACKGROUND-IMAGE -->
		<div class="error-image">

			<!-- GLOABAL LOADER -->
			<div id="global-loader">
				<img src="{{ asset('assets/images/loader.svg') }}" class="loader-img" alt="Loader">
			</div>
			<!-- /GLOABAL LOADER -->

			<!-- PAGE -->
			<div class="page">
				<div>
					
					<!-- CONTAINER OPEN -->
					<div class="col col-login mx-auto mt-7">
					</div>
					<div class="container-login100">
						<div class="wrap-login100 p-6">
							<form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
								<div class="text-center">
									<a href="index.html"><img src="{{ asset('assets/images/brand/unperba.png') }}" class="header-brand-img" alt=""></a>
										<span class="login100-form-title mt-3">
											Sistem Inventory
										</span>
								</div>
								<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
									<input class="input100" type="text" name="email" placeholder="Email" value="{{ old('email') }}">
									<span class="focus-input100"></span>
									<span class="symbol-input100">
										<i class="fe fe-mail"></i>
									</span>
								</div>
								<div class="wrap-input100 validate-input" data-validate = "Password is required">
									<input class="input100" type="password" name="password" placeholder="Password">
									<span class="focus-input100"></span>
									<span class="symbol-input100">
										<i class="fe fe-lock"></i>
									</span>
								</div>
								
								<div class="container-login100-form-btn">
									<button type="submit" class="login100-form-btn btn-primary">
                                        @csrf
										Login
									</button>
								</div>
								
							</form>
						</div>
					</div>
					<!-- CONTAINER CLOSED -->

				</div>
			</div>
			<!-- End PAGE -->

		</div>
		<!-- BACKGROUND-IMAGE CLOSED -->

		<!-- JQUERY JS -->
		<script src="{{ asset('assets/js/jquery.min.js') }}"></script>

		<!-- BOOTSTRAP JS -->
		<script src="{{ asset('assets/plugins/bootstrap/js/popper.min.js') }}"></script>
		<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

		<!-- Sticky js -->
		<script src="{{ asset('assets/js/sticky.js') }}"></script>

		<!-- PERFECT SCROLL BAR js-->
		<script src="{{ asset('assets/plugins/p-scroll/perfect-scrollbar.min.js') }}"></script>

		<!-- THEMECOLORS JS -->
		<script src="{{ asset('assets/js/themeColors.js') }}"></script>

		<!-- CUSTOM JS -->
		<script src="{{ asset('assets/js/custom.js') }}"></script>

	</body>
</html>
