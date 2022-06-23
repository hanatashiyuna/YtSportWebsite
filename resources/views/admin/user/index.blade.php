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
            
        </table>
    </div>
</div>
@endsection
