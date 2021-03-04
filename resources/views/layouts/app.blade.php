<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'PropertyHub') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}" />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        .avatar-picture {
            width: 30px;
            height: 30px;
            background-size: cover;
            background-position: top center;
            border-radius: 50%;
        }

        .user-space {
            position: relative;
        }
    </style>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                @if(Auth::check())
                    @if(Auth::user()->is_admin == 'admin')
                        <a class="navbar-brand" href="{{ url('/users') }}">
                            {{ config('app.name', 'PropertyHub') }}
                        </a>
                    @else
                        <a class="navbar-brand" href="{{ url('/properties') }}">
                            {{ config('app.name', 'PropertyHub') }}
                        </a>
                    @endif
                @endif
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @if(Auth::check())
                            <li class="nav-item">
                                <a class="nav-link" href="/">Home</a>
                            </li>
                            @if (Auth::user()->is_admin == 'superadmin')
                                <li class="nav-item">
                                    <a class="nav-link" href="/users/create">Add Admin</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/reports">View Report</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/users/report">Admin List</a>
                                </li>
                            @elseif(Auth::user()->is_admin == 'admin')
                                <li class="nav-item">
                                    <a class="nav-link" href="/reports">View Report</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/users/report">Admin List</a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link" href="/properties/create">Add Properties</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/reports/create"">Complaint</a>
                                </li>
                            @endif
                        @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle user-space" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <img src="/uploads/avatars/{{Auth::user()->picture}}" class="avatar-picture" />
                                <b>{{ Auth::user()->name }}</b><span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                
                                <a class="dropdown-item" href="/users/{{ Auth::user()->id }}/edit"><i class="fa fa-user-circle-o"></i> My Profile</a>

                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i
                                        class="fa fa-sign-out"></i>
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
            @yield('scripts')
            @yield('scriptsEdit')
        </main>

    </div>
</body>
</html>