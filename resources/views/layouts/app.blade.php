<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{url('img/YtSport.jpg')}}">
    <link rel="stylesheet" href="{{url('css/app-web.css')}}">
    <link rel="stylesheet" href="{{url('css/main-content.css')}}">
    <link rel="stylesheet" href="{{url('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('css/style.css')}}">
</head>
<body>
    <div id="app">
        <div class="main">
            <div class="header">
                @section('header')
                    <nav class="navbar-header">
                        <a class="navbar-brand" href="{{route('home')}}">
                            <img class="logo" src="{{url('img/YtSport.jpg')}}" alt="photo" width="30" height="24">
                        </a>
                        <p>Kênh tin tức | Chào mừng bạn tới với kênh Y.T SPORT  của chúng tôi</p>
                    </nav>
                    <div class="menu">
                        <ul class="menu-list">
                            <li class="home"><a href="{{route('home')}}">Trang chủ</a></li>
                            <li class="home"><a href="{{route('basketball')}}">Bóng rổ</a></li>
                            <li class="home"><a href="{{route('football')}}">Bóng đá</a></li>
                            <li class="home"><a href="{{route('volleyball')}}">Bóng chuyền</a></li>
                            <li class="home"><a href="{{route('esport')}}">esport</a></li>
                            <li class="search">
                                <form class="d-flex search" >
                                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                    <button class="btn btn-search" style="border: none" type="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                    </svg>
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @show
            </div>
            <div class="content">
                @yield('content')
            </div>
            <div class="footer">
                @yield('footer')
            </div>

        </div>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
