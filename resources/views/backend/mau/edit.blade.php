@extends('backend.layout.master')

@section('title')
Thêm mới Màu
@endsection

@section('feature-title')
Thêm mới màu    
@endsection

@section('feature-description')
Thêm mới màu. Vui lòng nhập thông tin và bấm Lưu.
@endsection

@section('content')
<form method="post" action="{{ route('backend.mau.update', ['id' => $mau->m_ma]) }}">
@csrf
    <input type="hidden" name="_method" value="PUT" />
    <div class="form-group">
        <label for="m_ten">Tên màu</label>
        <input type="text" class="form-control" id="m_ten" name="m_ten" aria-describedby="m_tenHelp" placeholder="Nhập tên màu" value="{{  $mau->m_ten }}">
        <small id="m_tenHelp" class="form-text text-muted">Nhập tên màu. Giới hạn trong 50 ký tự.</small>
    </div>
    <button class="btn btn-primary">Lưu</button>
</form>
@endsection