<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>PropertyHub</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}"/>

    <!-- Styles -->
    <style>
    html, body {
        background-color: #fff;
        color: #636b6f;
        font-family: 'Nunito', sans-serif;
        font-weight: 200;
        height: 100vh;
        margin: 0;
    }
    .full-height {
        height: 50vh;
    }
    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
    }
    .position-ref {
        position: relative;
        margin-bottom: -54px;
    }
    .top-right {
        position: absolute;
        right: 10px;
        top: 18px;
    }
    .content {
        text-align: center;
    }
    .title {
        font-size: 84px;
    }
    .links > a {
        color: #636b6f;
        padding: 0 25px;
        font-size: 13px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }
    .m-b-md {
        margin-bottom: 30px;
    }
    .upper-img{
        background-image: url({{ asset('images/bg.jpg') }});
        background-position: center center;
        background-repeat: no-repeat;
        background-size: cover;
        height: 100vh;
        width: 100%;
    }
    
    /* .lower-img{
    } */
    </style>

</head>
<body>
    <div class="flex-center position-ref full-height upper-img">
        
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
                            <a href="#" class="site-logo"><img src="images/logo.png" style="width:30%;"></a> 
                            <div class="nav-switch">
                                <i class="fa fa-bars"></i>
                            </div>
                            <ul class="main-menu">
                                <li><a href="{{ url('/welcome') }}">Home</a></li>
                                <li><a href="{{ url('/listhouse') }}">FEATURED LISTING</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Header section end -->

        <!-- Hero section -->
        <section class="hero-section set-bg">
            <div class="container hero-text text-white">
                <h2>find your place with our local life style</h2>
                <p>Search real estate property records, houses, condos, land and more on propertyhub.com®.<br>Find property info from the most comprehensive source data.</p>
                <a href="{{ url('/listhouse') }}" class="site-btn">VIEW DETAIL</a>
            </div>
        </section>
        <!-- Hero section end -->
    </div>

    <!-- Filter form section -->
    <div class="filter-search">
        <div class="container">
            <form class="filter-form" action="/listhouse" method="get">
                <center>
                    <input type="text" name="search" placeholder="Enter a street name, address number or keyword">
                    <button class="site-btn fs-submit">SEARCH</button>
                </center>
            </form>
        </div>
    </div>
    <!-- Filter form section end -->

    <!-- feature section -->
    <section class="feature-section spad">
        <div class="container">
            <div class="section-title text-center">
                <h3>Featured Listings</h3>
                <p>Browse houses and flats for sale and to rent in your area</p>
            </div>
            <div class="row">
                @foreach ($properties as $property)
                    <div class="col-lg-4 col-md-6">
                        <!-- feature -->
                        <div class="feature-item">
                            <div class="feature-pic set-bg">
                                    <a href="{{ url('/singlehouse',['idProp' => $property->id]) }}"><img src="/uploads/properties/{{ $property->picture }}" style="height:100%"></a>
                            </div>
                            <div class="feature-text">
                                <div class="text-center feature-title">
                                    <h5 style="margin: 5%">{{ $property->address }}</h5>
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
                                <a href="#" class="room-price">RM{{ $property->price }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- feature section end -->

    @include('footer')
</body>
</html>