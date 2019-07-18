@extends('backend.layout.master')

@section('title')
Thêm mới quyền
@endsection

@section('feature-title')
Thêm mới quyền    
@endsection

@section('feature-description')
Thêm mới quyền. Vui lòng nhập thông tin và bấm Lưu.
@endsection

@section('content')
<form method="post" action="{{ route('backend.quyen.update', ['id' => $quyen->q_ma]) }}">
@csrf
    <input type="hidden" name="_method" value="PUT" />
    <div class="form-group">
        <label for="q_ten">Tên quyền</label>
        <input type="text" class="form-control" id="q_ten" name="q_ten" aria-describedby="q_tenHelp" placeholder="Nhập tên quyền" value="{{  $quyen->q_ten }}">
        <small id="q_tenHelp" class="form-text text-muted">Nhập tên quyền. Giới hạn trong 50 ký tự.</small>
    </div>
    
    <div class="form-group">
        <label for="q_dienGiai">Diễn giải</label>
        <input type="text" class="form-control" id="q_dienGiai" name="q_dienGiai" aria-describedby="q_dienGiaiHelp" placeholder="Nhập diễn giải" value="{{  $quyen->q_dienGiai }}">
        <small id="q_dienGiaiHelp" class="form-text text-muted">Nhập diễn giải.</small>
    </div>
    <button class="btn btn-primary">Lưu</button>
</form>
@endsection