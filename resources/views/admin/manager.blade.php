<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shorcut icon" href="{{url('img/YtSport.jpg')}}">
    <link rel="stylesheet" href="{{url('css/admin.css')}}">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/> -->
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.1.1/css/all.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Admin Management</title>
    <style>
        html,
        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
    </style>
    <script src="{{url('js/chart.js')}}"></script>
</head>

<body>
    @section('header-admin')
    <div class="header">
        <header>
            <div class="header__icon">
                <a href="{{ url('/admin') }}">Y.T Sport</a>
            </div>
            <div style="display: flex; justify-content: center; align-items: center; margin-right: 20px;">
                <span>
                    Welcome {{ Auth::user()->name }}
                </span>
            </div>
        </header>
    </div>
    @show
    @section('menu-admin')
    <div class="container">
        <div class="nav">
            <ul>
                <li>
                    <a href="{{ url('/admin') }}">
                        <span class="icon"><img src="{{url('img/YtSport.jpg')}}" alt="photo"></span>
                        <span class="title"><h2>Admin Menu</h2></span>
                    </a>
                </li>
                <li class="item">
                    <a href="{{ url('/admin') }}">
                        <span class="icon"><i class="fas fa-home"></i></span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li class="item">
                    <a href="{{route('post.index')}}">
                        <span class="icon"><i class="fa-solid fa-newspaper"></i></span>
                        <span class="title">Post</span>
                    </a>
                </li>
                <li class="item">
                    <a href="{{ route('post.create') }}">
                        <span class="icon"><i class="fa-solid fa-folder-plus"></i></span>
                        <span class="title">Add New Post</span>
                    </a>
                </li>
                <li class="item">
                    <a href="">
                        <span class="icon"><i class="fa-solid fa-folder-minus"></i></span>
                        <span class="title">Remove Post</span>
                    </a>
                </li>
                <li class="item">
                    <a href="{{url('/admin')}}">
                        <span class="icon"><i class="fa-solid fa-folder-gear"></i></span>
                        <span class="title">Repair Post</span>
                    </a>
                </li>
                <li class="item">
                    <a href="{{url('/admin')}}">
                        <span class="icon"><i class="fas fa-cog"></i></span>
                        <span class="title">Setting</span>
                    </a>
                </li>
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="item">
                            <a href="{{ route('login') }}">
                                <span><i class="fas fa-sign-in-alt"></i></span>
                                <span>{{ __('Login') }}</span>
                            </a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="item">
                            <a class="link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="item">
                        <div aria-labelledby="navbarDropdown">
                            <a class="" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();
                                        return confirm('Bạn có chắc muốn đăng xuất không?');">
                                <span class="icon"><i class="fas fa-sign-in-alt"></i></span>
                                <span class="title">{{ __('Log out') }}</span>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
        <script>
            // thêm class hovered khi select list nav ở menu dọc
            const list = document.querySelectorAll('.nav li.item');

            function activeLink() {
                list.forEach((item) =>
                    item.classList.remove('hovered'));
                this.classList.toggle('hovered');
            }
            list.forEach((item) => item.addEventListener('click', activeLink));
        </script>
    </div>
    @show
    <div class="main">
        <div class="topbar">
                <div class="toggle" onclick="toggleMenu()"><i class="fa-solid fa-bars"></i></div>
                <div class="search">
                    <label for="">
                        <input type="text" placeholder="Search post here">
                        <i class="fas fa-search"></i>
                    </label>
                </div>
            </div>
        @yield('content-admin')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.6.2/dist/chart.min.js"></script>
    <script src="{{url('js/chart.js')}}"></script>
    <script type="text/javascript">
        const list1 = document.querySelectorAll('.repair');
        const list2 = document.querySelectorAll('.delete');
        var btnRepair = document.querySelectorAll('.btn-repair');
        var btnDlt = document.querySelectorAll('.btn-dlt');
        var btnOut = document.querySelectorAll('.btn-out');

        function adminToolsrepair() {
            list1.forEach(element => element.classList.add('active'));
        }

        function adminToolsdlt() {
            list2.forEach(element => element.classList.add('active'));
        }

        function adminToolsout() {
            list1.forEach(item => item.classList.remove('active'));
            list2.forEach(item => item.classList.remove('active'));
        }
        btnRepair.forEach((item) => item.addEventListener('click', adminToolsrepair));
        btnDlt.forEach((item) => item.addEventListener('click', adminToolsdlt));
        btnOut.forEach((item) => item.addEventListener('click', adminToolsout));;

        //menu admin tools
        let tools = document.querySelector('.tools');
        let toolsbtn = document.querySelector('.toolsbtn');

        toolsbtn.onclick = function() {
            tools.classList.toggle('activetools');
        }

        function ChangeToSlug()
        {
            var slug;

            //Lấy text từ thẻ input title
            slug = document.getElementById("slug").value;
            slug = slug.toLowerCase();
            //Đổi ký tự có dấu thành không dấu
                slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
                slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
                slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
                slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
                slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
                slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
                slug = slug.replace(/đ/gi, 'd');
                //Xóa các ký tự đặt biệt
                slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
                //Đổi khoảng trắng thành ký tự gạch ngang
                slug = slug.replace(/ /gi, "-");
                //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
                //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
                slug = slug.replace(/\-\-\-\-\-/gi, '-');
                slug = slug.replace(/\-\-\-\-/gi, '-');
                slug = slug.replace(/\-\-\-/gi, '-');
                slug = slug.replace(/\-\-/gi, '-');
                //Xóa các ký tự gạch ngang ở đầu và cuối
                slug = '@' + slug + '@';
                slug = slug.replace(/\@\-|\-\@|\@/gi, '');
                //In slug ra textbox có id “slug”
            document.getElementById('convert_slug').value = slug;
        }
    </script>
</body>

</html>
