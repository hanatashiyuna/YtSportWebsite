@extends('admin.manager')

@section('content-admin')
<div class="form-create-post">
@hasanyrole('admin|writer')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <h1 class="title-create-post">Tạo Post</h1>
    <form action="{{route('post.store')}}" method="POST" class="form-create-post-inside" enctype="multipart/form-data">
        @csrf
        <div class="form-create-item">
            <label for="" class="title-label">Tiêu đề Post</label>
            <input id="slug" class="title-input" type="text" name="title" placeholder="Tua de" onkeyup="ChangeToSlug()">
        </div>
        <div class="form-create-item">
            <label for="" class="title-label">Slug Post</label>
            <input id="convert_slug" class="title-input" type="text" name="slug" placeholder="Slug">
        </div>
        <div class="form-create-item">
            <label for="" class="title-label">Category</label>
            <select name="category">
                <option value="" default>Chọn thể loại tin tức:</option>
                <option value="basketball">Bóng rổ</option>
                <option value="football">Bóng đá</option>
                <option value="volleyball">Bóng chuyền</option>
                <option value="esport">Esport</option>
            </select>
        </div>
        <div class="form-create-item">
            <label for="">Mô Tả</label>
            <textarea class="title-input title-2" type="text" name="summary" placeholder="Mo ta" rows="4" style="resize: none;"></textarea>
        </div>
        <div class="form-create-item">
            <label for="" class="title-label">Nội Dung:</label>
            <textarea class="title-input title-2" name="content" cols="20" rows="7" placeholder="Nội dung" style="resize: none;"></textarea>
        </div>
        <div class="form-create-upload-file">
            <div>
                <input class="title-input upload-file" type="file" name="img">
            </div>
            <div class="btn-submit">
                <button type="submit">Lưu Post</button>
            </div>
        </div>
    </form>
@else
    <h1 style="display: flex; justify-content: center; align-items: center; color: #03a9f4;">Bạn không có quyền thêm bài viết</h1>
@endhasanyrole
</div>
@endsection
