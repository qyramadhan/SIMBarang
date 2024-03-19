<!doctype html>
<html lang="en" dir="ltr">
<head>

	<!-- META DATA -->
	<meta charset="UTF-8">
	<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Yoha –  HTML5 Bootstrap Admin Template">
	<meta name="author" content="Spruko Technologies Private Limited">
	<meta name="keywords"
		content="admin dashboard html template, admin dashboard template bootstrap 4, analytics dashboard templates, best admin template bootstrap 4, best bootstrap admin template, bootstrap 4 template admin, bootstrap admin template premium, bootstrap admin ui, bootstrap basic admin template, cool admin template, dark admin dashboard, dark admin template, dark dashboard template, dashboard template bootstrap 4, ecommerce dashboard template, html5 admin template, light bootstrap dashboard, sales dashboard template, simple dashboard bootstrap 4, template bootstrap 4 admin">
	
	<!-- FAVICON -->
	<link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/brand/unperba.png') }}" />

	<!-- TITLE -->
	<title>@yield('title')</title>

	<!-- BOOTSTRAP CSS -->
	<link id="style"  href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />

	<!-- STYLE CSS -->
	<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
	<link href="{{ asset('assets/css/plugins.css') }}" rel="stylesheet" />

	<!--- FONT-ICONS CSS -->
	<link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" />

    @yield('css')
</head>

<body class="app sidebar-mini ltr light-mode">

	<!-- GLOBAL-LOADER -->
	<div id="global-loader">
		<img src="{{ asset('assets/images/loader.svg') }}" class="loader-img" alt="Loader">
	</div>
	<!-- /GLOBAL-LOADER -->

	<!-- PAGE -->
	<div class="page">
		<div class="page-main">

            @include('layouts.header')

            @include('layouts.sidebar')
			
			@yield('content')
		</div>

		<!-- FOOTER -->
		<footer class="footer">
			<div class="container">
				<div class="row align-items-center flex-row-reverse">
					<div class="col-md-12 col-sm-12 text-center">
						Copyright © 2024 <a href="javascript:void(0);"><a href="javascript:void(0);"> Q </a> All rights reserved.
					</div>
				</div>
			</div>
		</footer>
		<!-- FOOTER END -->
	</div>

	<!-- BACK-TO-TOP -->
	<a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

	<!-- JQUERY JS -->
	<script src="{{ asset('assets/js/jquery.min.js') }}"></script>

	<!-- BOOTSTRAP JS -->
	<script src="{{ asset('assets/plugins/bootstrap/js/popper.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- Sticky js -->
    <script src="{{ asset('assets/js/sticky.js') }}"></script>

	<!-- INTERNAL CHARTJS CHART JS -->
	<script src="{{ asset('assets/plugins/chart/Chart.bundle.js') }}"></script>
	<script src="{{ asset('assets/plugins/chart/utils.js') }}"></script>

	<!-- PERFECT SCROLL BAR js-->
	<script src="{{ asset('assets/plugins/p-scroll/perfect-scrollbar.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/sidemenu/sidemenu-scroll.js') }}"></script>

	<!-- SIDE-MENU JS-->
	<script src="{{ asset('assets/plugins/sidemenu/sidemenu.js') }}"></script>

	<!-- SIDEBAR JS -->
	<script src="{{ asset('assets/plugins/sidebar/sidebar.js') }}"></script>

	<!--INTERNAL  INDEX JS -->
	<script src="{{ asset('assets/js/index1.js') }}"></script>

	<!-- THEMECOLORS JS -->
	<script src="{{ asset('assets/js/themeColors.js') }}"></script>

	<!-- CUSTOM JS -->
	<script src="{{ asset('assets/js/custom.js') }}"></script>
    @yield('js')
</body>

</html>
