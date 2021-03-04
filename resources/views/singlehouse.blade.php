<!DOCTYPE html>
<html lang="en">

<head>
	<title>LERAMIZ - Landing Page Template</title>
	<meta charset="UTF-8">
	<meta name="description" content="LERAMIZ Landing Page Template">
	<meta name="keywords" content="LERAMIZ, unica, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
	<link href="img/favicon.ico" rel="shortcut icon" />

	<!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/font-awesome.min.css" />
	<link rel="stylesheet" href="css/animate.css" />
	<link rel="stylesheet" href="css/owl.carousel.css" />
	<link rel="stylesheet" href="css/magnific-popup.css" />
	<link rel="stylesheet" href="css/style.css" />


	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

	<style>
		.top-img-bg {
			background-image: url({{ asset('images/page-top-bg.jpg')}});
		}
	</style>

</head>

<body>

	<!-- Header section -->
	<header class="header-section">
		<div class="header-top">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 header-top-left">
						<div class="top-info">
							<i class="fa fa-phone"></i>
							(+60) 366 121432
						</div>
						<div class="top-info">
							<i class="fa fa-envelope"></i>
							propertyhub@gmail.com
						</div>
					</div>
					<div class="col-lg-6 text-lg-right header-top-right">
						<div class="top-social">
							<a href=""><i class="fa fa-facebook"></i></a>
							<a href=""><i class="fa fa-twitter"></i></a>
							<a href=""><i class="fa fa-instagram"></i></a>
							<a href=""><i class="fa fa-pinterest"></i></a>
							<a href=""><i class="fa fa-linkedin"></i></a>
						</div>
						@if (Route::has('login'))
						<div class="user-panel">
							@auth

							@foreach ($user as $role)
								@if ($role->is_admin == 'superadmin')
									<a href="/users"><i class="fa fa-user-circle-o"></i> Dashboard</a>
								@elseif ($role->is_admin == 'admin')
									<a href="/users"><i class="fa fa-user-circle-o"></i> Dashboard</a>
								@else
									<a href="/properties"><i class="fa fa-user-circle-o"></i>Dashboard</a>
								@endif
							@endforeach

							<a href="{{ route('logout') }}"><i class="fa fa-sign-out"></i>{{ __('Logout') }}</a>

							@else
								<a href="{{ route('login') }}"><i class="fa fa-sign-in"></i> Login</a>

							@if (Route::has('register'))
								<a href="{{ route('register') }}"><i class="fa fa-user-circle-o"></i> Register</a>
							@endif
							@endauth
						</div>
						@endif
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="site-navbar">
						<a href="#" class="site-logo"><img src="img/logo.png" alt=""></a>
						<div class="nav-switch">
							<i class="fa fa-bars"></i>
						</div>
						<ul class="main-menu">
							<li><a href="{{ url('/') }}">Home</a></li>
							<li><a href="{{ url('/listhouse') }}">FEATURED LISTING</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</header>
	<!-- Header section end -->


	<!-- Page top section -->
	<section class="page-top-section set-bg top-img-bg">
		<div class="container text-white">
			<h2>SINGLE LISTING</h2>
		</div>
	</section>
	<!--  Page top end -->

	<!-- Breadcrumb -->
	<div class="site-breadcrumb">
		<div class="container">
			<a href=""><i class="fa fa-home"></i>Home</a>
			<span><i class="fa fa-angle-right"></i>Single Listing</span>
		</div>
	</div>

	<!-- Page -->
	@foreach($properties as $property)
	<section class="page-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 single-list-page">
					<div class="single-list-slider owl-carousel" id="sl-slider">
						<div class="sl-item set-bg">
							<img src="/uploads/properties/{{ $property->picture }}" style="height:100%">
						</div>
					</div>
					<div class="single-list-content">
						<div class="row">
							<div class="col-xl-8 sl-title">
								<h2>{{ $property->address }}</h2>
							</div>
							<div class="col-xl-4">
								<a href="#" class="price-btn"> RM {{ $property->price }}</a>
							</div>
						</div>
						<h3 class="sl-sp-title">Property Details</h3>
						<div class="row property-details-list">
							<div class="col-md-4 col-sm-6">
								<p><i class="fa fa-th-large"></i> {{ $property->area }} Square Foot</p>
								<p><i class="fa fa-bed"></i> {{ $property->bedroom }} Bedrooms</p>
							</div>
							<div class="col-md-4 col-sm-6">
								<p><i class="fa fa-building-o"></i> {{ $property->type }}</p>
							</div>
							<div class="col-md-4">
								<p><i class="fa fa-bath"></i> {{ $property->bathroom }} Bathrooms</p>
							</div>
						</div>
						<h3 class="sl-sp-title">Description</h3>
						<div class="description">
							<p>{{ $property->description }}</p>
						</div>
						<div class="col-md-12">
							<input type="hidden" id="address-input" name="address_address"
								class="form-control map-input" value="{{ $property->address }}">
							<input type="hidden" name="address_latitude" id="address-latitude"
								value="{{ $property->lat }}" />
							<input type="hidden" name="address_longitude" id="address-longitude"
								value="{{ $property->lng }}" />
						</div>
						<h3 class="sl-sp-title bd-no">Location</h3>
						<div id="address-map-container" style="width:100%;height:400px; ">
							<div style="width: 100%; height: 100%" id="address-map"></div>
						</div>
					</div>
				</div>
				<!-- sidebar -->
				<div class="col-lg-4 col-md-7 sidebar">
					<div class="author-card">
						<div class="author-img set-bg">
							<img src="/uploads/avatars/{{ $property->userPic }}">
						</div>
						<div class="author-info">
							<h5>{{ $property->name }}</h5>
						</div>
						<div class="author-contact">
							<p><i class="fa fa-phone"></i> {{ $property->phone_no }}</p>
							<p><i class="fa fa-envelope"></i> {{ $property->email }}</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	@endforeach
	<!-- Page end -->

	<!-- Clients section end -->

	@include('footer')

	<!--====== Javascripts & Jquery ======-->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/masonry.pkgd.min.js"></script>
	<script src="js/magnific-popup.min.js"></script>
	<script src="js/main.js"></script>


	<!-- load for map -->
	<script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initialize" async defer></script>
	<script src="{{ asset('js/mapInput.js') }}" defer></script>

</body>

</html>