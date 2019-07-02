@extends('backend.layout.master')

@section('title')
Thêm mới Chủ đề
@endsection

@section('feature-title')
Thêm mới chủ đề    
@endsection

@section('feature-description')
Thêm mới Chủ đề. Vui lòng nhập thông tin và bấm Lưu.
@endsection

@section('content')
<form method="post" action="{{ route('backend.chude.store') }}">
@csrf
    <div class="form-group">
        <label for="cd_ten">Tên chủ đề</label>
        <input type="text" class="form-control" id="cd_ten" name="cd_ten" aria-describedby="cd_tenHelp" placeholder="Nhập tên chủ đề">
        <small id="cd_tenHelp" class="form-text text-muted">Nhập tên chủ đề. Giới hạn trong 50 ký tự.</small>
    </div>
    <button class="btn btn-primary">Lưu</button>
</form>
@endsection