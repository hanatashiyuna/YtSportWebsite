@extends('admin.manager')

@section('content-admin')
        <div class="cardBox">
            <div class="card">
                <div>
                    <div class="numbers">{{$viewPost}}</div>
                    <div class="cardName">Views</div>
                </div>
                <div class="iconBox">
                    <i class="fas fa-eye"></i>
                </div>
            </div>
            <div class="card">
                <div>
                    <div class="numbers">0</div>
                    <div class="cardName">Like</div>
                </div>
                <div class="iconBox">
                    <i class="fa-solid fa-heart"></i>
                </div>
            </div>
            <a href="{{route('post.index')}}" style="text-decoration: none; color: black;">
                <div class="card">
                    <div>
                        <div class="numbers">{{$news}}</div>
                        <div class="cardName">Post</div>
                    </div>
                    <div class="iconBox">
                        <i class="fa-solid fa-scroll"></i>
                    </div>
                </div>
            </a>
            <div class="card">
                <div>
                    <div class="numbers">0</div>
                    <div class="cardName">Video</div>
                </div>
                <div class="iconBox">
                    <i class="fa-solid fa-photo-film"></i>
                </div>
            </div>
        </div>

        <div class="graphBox">
            <div class="box"><canvas id="myChart"></canvas></div>
            <div class="box"><canvas id="earning"></canvas></div>
        </div>
@endsection
