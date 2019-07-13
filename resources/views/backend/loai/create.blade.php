@extends('backend.layout.master')

@section('title')
Thêm mới loại sản phẩm
@endsection

@section('feature-title')
Thêm mới loại sản phẩm    
@endsection

@section('feature-description')
Thêm mới loại sản phẩm. Vui lòng nhập thông tin và bấm Lưu.
@endsection

@section('content')
<form method="post" action="{{ route('backend.loai.store') }}">
@csrf
    <div class="form-group">
        <label for="l_ten">Tên loại sản phẩm</label>
        <input type="text" class="form-control" id="l_ten" name="l_ten" aria-describedby="l_tenHelp" placeholder="Nhập tên loại sản phẩm">
        <small id="l_tenHelp" class="form-text text-muted">Nhập tên loại sản phẩm. Giới hạn trong 50 ký tự.</small>
    </div>
    <button class="btn btn-primary">Lưu</button>
</form>
@endsection