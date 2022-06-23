@extends('admin.manager')

@section('content-admin')
<div class="details" style="grid-template-columns: 1fr; margin-top: 25px;">
    <div class="recentOrders">
        <div class="cardHeader">
            <h2>Recent Post</h2>
            <a href="#" class="btn">View All</a>
        </div>
        <table>
            <thead>
                <tr>
                    <td>Thứ Tự</td>
                    <td>Tiêu Đề</td>
                    <td>Nội Dung</td>
                    <td>Tóm Tắt</td>
                    <td>Ảnh</td>
                    <td>Lượt Xem</td>
                    <td>Tình Trạng</td>
                    <td>Ngày tạo</td>
                    <td>Ngày Sửa Cuối</td>
                    <td>Quản Lý</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($news as $key => $new)
                <tr>
                    <td>{{$key + 1}}</td>
                    <td>{{$new->title}}</td>
                    <td>{{$new->content}}</td>
                    <td>{{$new->summary}}</td>
                    <td><img style="width: 40px; height: 40px;" src="{{url('uploads/post').'/'.$new->img_post }}" alt="photo"></td>
                    <td>{{$new->post_view}}</td>
                    <td>
                        @if ($new->status == 0)
                            <span class="status return">Return</span>
                        @elseif($new->status == 1)
                            <span class="status delivered">Delivered</span>
                        @else
                            <span class="status pending">Pending</span>
                        @endif
                    </td>
                    <td>
                        <?php
                            $daytime  = $new->created_at;
                            $day = explode(" ", $daytime);
                            echo $day[0];
                        ?>
                    </td>
                    <td>
                        <?php
                            $daytime  = $new->updated_at;
                            $day = explode(" ", $daytime);
                            echo $day[0];
                        ?>
                    </td>
                    <td>
                        <form action="{{route('post.destroy',[$new -> post_id])}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn" onclick="return confirm('Bạn có chắc muốn xóa {{$new->title}} này không?');">DELETE</button>
                        </form>
                        <form action="{{route('post.edit',[$new -> post_id])}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn" onclick="return confirm('Bạn có chắc muốn xóa {{$new->title}} này không?');">REPAIR</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
