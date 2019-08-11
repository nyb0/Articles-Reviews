<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--meta http-equiv="X-UA-Compatible" content="ie=edge"-->

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ARTICLES') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/media.css') }}">
    <title>ARTICLES</title>
</head>
<body>
    <div class="page-box">

        <div class="content">
            @yield('content')
        </div>

        <div class="header">
            <div class="menu">
                <a href="/">ARTICLES</a>
                @guest
                    <a href="{{ route('login') }}">LOGIN</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">REGISTRATION</a>
                    @endif
                @else
                    <a href="#" role="button">{{ Auth::user()->name }}</a>
                    
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        LOGOUT
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endguest
            </div>
        </div>

        <div class="feedback">        
            @yield('feedback')    
        </div>

        <div class="footer"></div>
    
    </div>
	
    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>

</body>
</html>