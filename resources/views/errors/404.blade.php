@extends('index')
@section('content-user')
    <div class="error404">
        <div class="content-error">
            <h1>Page Not Found</h1>
            <h2>Something went wrong?</h2>
            <div class="giveback">
                <a href="{{url('/home')}}">Back to Homepage</a>
                <a href="{{url('/admin')}}">Back to Adminpage</a>
            </div>
        </div>
    </div>
@endsection
