@extends('backend.layout.master')

@section('title')
Thêm mới xuất xứ
@endsection

@section('feature-title')
Thêm mới xuất xứ
@endsection

@section('feature-description')
Thêm mới xuất xứ. Vui lòng nhập thông tin và bấm lưu.
@endsection

@section('content')
<form method='post' action="{{ route('backend.xuatxu.store') }}">
    @csrf 
        <div class="form-group">
            <label for="xx_ten">Tên xuất xứ</label>
            <input type="text" class="form-control" id="xx_ten" name="xx_ten" aria-describedby="xx_tenHelp" placeholder="Nhập tên xuất xứ">
            <small id="xx_tenHelp" class="form-text text-muted">Nhập tên xuất xứ. Giới hạn trong 50 ký tự.</small>
        </div>
        <button class="btb btn-primary">Lưu</button>
</form>
@endsection