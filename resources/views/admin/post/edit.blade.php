@extends('admin.manager')

@section('content-admin')

<table>
    <thead>
        <tr>
            <th>thu tu</th>
            <th>title</th>
            <th>content</th>
            <th>summary</th>
            <th>img</th>
            <th>post view</th>
            <th>creator</th>
            <th>status</th>
            <th>create at</th>
            <th>update at</th>
            <th>Quan ly</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($news as $key => $new)
        <tr>
            <td>{{$key + 1}}</td>
            <td>{{$new->title}}</td>
            <td>{{$new->content}}</td>
            <td>{{$new->summary}}</td>
            <td><img src="{{$new->img_post}}" alt="photo"></td>
            <td>{{$new->post_view}}</td>
            <td>{{$new->creator_id}}</td>
            <td>{{$new->status}}</td>
            <td>{{$new->created_at}}</td>
            <td>{{$new->updated_at}}</td>
            <td>
                <form action="{{route('post.destroy', ['title' => $new -> post_id])}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger">DELETE</button>
                </form>
            </td>
        </tr>

        @endforeach
    </tbody>
</table>
@endsection
