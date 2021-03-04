<!DOCTYPE html>
<html lang="en">
<head>
	<title>List Houses</title>
	<meta charset="UTF-8">
	<meta name="description" content="LERAMIZ Landing Page Template">
	<meta name="keywords" content="LERAMIZ, unica, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->   
	<link href="img/favicon.ico" rel="shortcut icon"/>

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/animate.css"/>
	<link rel="stylesheet" href="css/owl.carousel.css"/>
	<link rel="stylesheet" href="css/style.css"/>


	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	<style>
	
	.top-img-bg{
		background-image: url({{ asset('images/page-top-bg.jpg') }});
	}


	</style>

</head>
<body>
	<!-- Page Preloder -->
	{{-- <div id="preloder">
		<div class="loader"></div>
	</div> --}}
	
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
						<a href="#" class="site-logo"><img src="images/logo.png" style="width:30%;"></a> {{-- Logo --}}
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
			<h2>Featured Listings</h2>
		</div>
	</section>
	<!--  Page top end -->

	<!-- Breadcrumb -->
	<div class="site-breadcrumb">
		<div class="container">
			<a href=""><i class="fa fa-home"></i>Home</a>
			<span><i class="fa fa-angle-right"></i>Featured Listings</span>
		</div>
	</div>

	<!-- page -->
	<section class="page-section categories-page">
		<div class="container">
			<div class="row">
				@foreach($properties as $property)
					@if($property->status == 'Available')
					<div class="col-lg-4 col-md-6">
						<!-- feature -->
							<div class="feature-item">
								<div class="feature-pic set-bg">
									<a href="{{ url('/singlehouse',['idProp' => $property->id]) }}"><img src="/uploads/properties/{{ $property->picture }}" style="height:100%"></a>
								</div>
								<div class="feature-text">
									<div class="text-center feature-title">
										<h5 style="margin: 5%">{{ $property->address }}</h5>
										
										{{-- <p><i class="fa fa-map-marker"></i> Los Angeles, CA 90034</p> --}}
									</div>
									<div class="room-info-warp">
										<div class="room-info">
											<div class="rf-left">
												<p><i class="fa fa-th-large"></i> {{ $property->area }} Square foot</p>
												<p><i class="fa fa-bed"></i> {{ $property->bedroom }} Bedrooms</p>
											</div>
											<div class="rf-right">
												<p><i class="fa fa-bath"></i> {{ $property->bathroom }} Bathrooms</p>
											</div>	
										</div>
										<div class="room-info">
											<div class="rf-left">
												<p><i class="fa fa-user"></i> {{ $property->name }}</p>
											</div>
										</div>
									</div>
									<a href="{{ url('/singlehouse',['idProp' => $property->id]) }}" class="room-price">RM{{ $property->price }}</a>									
								</div>
							</div>
						<!-- End Feature -->
					</div>
					@endif
				@endforeach
			</div>
		</div>
	</section>
	<!-- page end -->

	@include('footer')
                                        
	<!--====== Javascripts & Jquery ======-->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/masonry.pkgd.min.js"></script>
	<script src="js/magnific-popup.min.js"></script>
	<script src="js/main.js"></script>
</body>
</html>