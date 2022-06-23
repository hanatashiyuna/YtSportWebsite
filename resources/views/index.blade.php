<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Kênh Thể Thao </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{url('css/main.css')}}">
    <link rel="stylesheet" href="css/error.css">
    <link rel="shortcut icon" type="image/x-icon" href="img/YtSport.jpg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
</head>

<body>
    @section('header-user')
    <header>
        <div class="header">
            <div class="header-left">
                <img src="img/YtSport.jpg" alt="photo">
                <p>Kênh Thể Thao</p>
                <p>Chào mừng các bạn đã đến với kênh của chúng tôi</p>
            </div>
            <div class="header-right">
                <img src="" alt="photo">
                <p>+0123456</p>
            </div>
        </div>
    </header>
    @show
    @section('sticky-header-user')
    <div class="sticky-header">
        <div class="sticky-header-left">
            <ul>
                <li><a href="/">TRANG CHỦ</a></li>
                <li><a href="">TIN BÓNG ĐÁ</a></li>
                <li><a href="">TIN BÓNG RỔ</a></li>
                <li><a href="">ESPORT</a></li>
            </ul>
        </div>
        <div class="sticky-header-between">
            <i class="fa-brands fa-facebook-f"></i>
            <i class="fa-brands fa-twitter"></i>
            <i class="fa-brands fa-instagram"></i>
            <i class="fa-brands fa-youtube"></i>
        </div>

        <div class="search">
            <i class="fa-solid fa-magnifying-glass"></i>
        </div>
    </div>
    @show
    @yield('content-user')
</body>
</html>
