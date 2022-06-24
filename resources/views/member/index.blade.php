@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="hot-news">
            @foreach ($members as $member )
                <div class="page-hot-news{{$i++}}" style="background-image: url('uploads/post/{{$member->img_post}}')" >
                    <div class="title-hot-news"><a href="blog-{{$member->post_id}}"><h2>{{ $member->title}}</h2></a></div>
                </div>
            @endforeach
        </div>
        <div class="whats-new">
            <div class="football-news">
                <h2>Tin tức bóng đá</h2>
                <div class="list-page-news">
                    @foreach ($football as $news )
                    <div class="page-news">
                        <img src="uploads/post/{{$news->img_post}}" alt="">
                        <a  href="blog-{{$news->post_id}}"><h3 class="title-page-news1">{{$news->title}}</h3></a>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="basketball-news">
                <h2>Tin tức bóng rổ</h2>
                <div class="list-page-news">
                @foreach ($basketball as $news )
                    <div class="page-news">
                    <img src="uploads/post/{{$news->img_post}}" alt="">
                        <a  href="blog-{{$news->post_id}}"><h3 class="title-page-news1">{{$news->title}}</h3></a>
                    </div>
                @endforeach
                </div>
            </div>

            <div class="esport-news">
                <h2>Tin tức thể thao điện tử</h2>
                <div class="list-page-news">
                @foreach ($esport as $news )
                    <div class="page-news">
                    <img src="uploads/post/{{$news->img_post}}" alt="">
                        <a  href="blog-{{$news->post_id}}"><h3 class="title-page-news1">{{$news->title}}</h3></a>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

