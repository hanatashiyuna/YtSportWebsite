@extends('admin.manager')

@section('content-admin')
<div class="details" style="grid-template-columns: 1fr; margin-top: 25px;">
    <div class="recentOrders">
        <div class="cardHeader">
            <h2>Recent Post/Bài viết hiện tại</h2>
        </div>
        <table>
            <thead>
                <tr>
                    <td>Thứ Tự</td>
                    <td>Tiêu Đề</td>
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
                        <form action="{{route('post.destroy',[$new -> post_id])}}" method="POST"  style="margin-bottom: 10px;">
                            @method('DELETE')
                            @csrf
                            <button style="border: 2px solid #03a9f4;" class="btn btn-manager" onclick="return confirm('Bạn có chắc muốn xóa {{$new->title}} này không?');">DELETE</button>
                        </form>
                        <a href="{{route('post.edit',[$new -> post_id])}}" class="btn btn-manager">REPAIR</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
