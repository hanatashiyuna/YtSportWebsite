@extends('layouts.app')

@section('content')
    <div class="about-area2 gray-bg pt-60 pb-60">
        <div class="container">
                <div class="row flex-around">
                <div class="col-lg-8">
                    <div class="whats-news-wrapper">
                        <!-- Heading & Nav Button -->
                            <div class="row justify-content-between align-items-end mb-15">
                                <div class="col-xl-4">
                                    <div class="section-tittle mb-30">
                                        <h3>Tiêu đề</h3>
                                    </div>
                                </div>

                            </div>
                            <!-- Tab content -->
                            <div class="row ">
                                <div class="col-12">
                                    <!-- Nav Card -->
                                    <div class="tab-content" id="nav-tabContent">
                                        <!-- card one -->
                                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                            <div class="row " >
                                            @if (isset($category))
                                                @foreach ($category as $cate)
                                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                                        <div class="whats-news-single mb-40 mb-40">
                                                            <div class="whates-img">
                                                                <img src="{{url('uploads/post').'/'.$cate->img_post }}" alt="photo">
                                                            </div>
                                                            <div class="whates-caption whates-caption2">
                                                                <h4><a href="blog-{{$cate->post_id}}">{{$cate->title}}</a></h4>
                                                                <p>luot xem : {{$cate->post_view}}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
