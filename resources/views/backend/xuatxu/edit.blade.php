@extends('backend.layout.master')

@section('title')
Sửa xuất xứ
@endsection

@section('feature-title')
Sửa xuất xứ
@endsection

@section('feature-description')
Chỉnh sửa thông tin xuất xứ. vui lòng nhập thông tin và bấm lưu
@endsection

@section('content')
<form method="post" action="{{ route('backend.xuatxu.update', ['id'=>$xuatxu->xx_ma]) }}">
    @csrf
    <input type="hidden" name="_method" value="PUT"/>
    <div class="form-group">
        <label for="xx_ten">Tên xuất xứ</label>
        <input type="text" class="form-control" id="xx_ten" name="xx_ten" aria-describedby="xx_tenHelp" placeholder="Nhập tên xuất xứ" value="{{  $xuatxu->xx_ten }}">
        <small id="xx_tenHelp" class="form-text text-muted">Nhập tên xuất xứ. giới hạn trong 50 ký tự</small>
    </div>
    <button class="btn btn-primary">Lưu</button>
</form>
@endsection