@extends('backend.layout.master')

@section('title')
Thêm mới thanh toán
@endsection

@section('feature-title')
Thêm mới thanh toán    
@endsection

@section('feature-description')
Thêm mới thanh toán. Vui lòng nhập thông tin và bấm Lưu.
@endsection

@section('content')
<form method="post" action="{{ route('backend.thanhtoan.update', ['id' => $thanhtoan->tt_ma]) }}">
@csrf
    <input type="hidden" name="_method" value="PUT" />
    <div class="form-group">
        <label for="tt_ten">Tên thanh toán</label>
        <input type="text" class="form-control" id="tt_ten" name="tt_ten" aria-describedby="tt_tenHelp" placeholder="Nhập tên thanh toán" value="{{  $thanhtoan->tt_ten }}">
        <small id="tt_tenHelp" class="form-text text-muted">Nhập tên thanh toán. Giới hạn trong 50 ký tự.</small>
    </div>
    
    <div class="form-group">
        <label for="tt_dienGiai">Diễn giải</label>
        <input type="text" class="form-control" id="tt_dienGiai" name="tt_dienGiai" aria-describedby="tt_dienGiaiHelp" placeholder="Nhập diễn giải" value="{{  $thanhtoan->tt_dienGiai }}">
        <small id="tt_dienGiaiHelp" class="form-text text-muted">Nhập diễn giải.</small>
    </div>
    <button class="btn btn-primary">Lưu</button>
</form>
@endsection