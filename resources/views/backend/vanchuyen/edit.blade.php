@extends('backend.layout.master')

@section('title')
Thêm mới vận chuyển
@endsection

@section('feature-title')
Thêm mới vận chuyển    
@endsection

@section('feature-description')
Thêm mới vận chuyển. Vui lòng nhập thông tin và bấm Lưu.
@endsection

@section('content')
<form method="post" action="{{ route('backend.vanchuyen.update', ['id' => $vanchuyen->vc_ma]) }}">
@csrf
    <input type="hidden" name="_method" value="PUT" />
    <div class="form-group">
        <label for="vc_ten">Tên vận chuyển</label>
        <input type="text" class="form-control" id="vc_ten" name="vc_ten" aria-describedby="vc_tenHelp" placeholder="Nhập tên vận chuyển" value="{{  $vanchuyen->vc_ten }}">
        <small id="vc_tenHelp" class="form-text text-muted">Nhập tên vận chuyển. Giới hạn trong 50 ký tự.</small>
    </div>
    <div class="form-group">
        <label for="vc_chiPhi">Chi phí vận chuyển</label>
        <input type="text" class="form-control" id="vc_chiPhi" name="vc_chiPhi" aria-describedby="vc_chiPhiHelp" placeholder="Nhập chi phí vận chuyển" value="{{  $vanchuyen->vc_chiPhi }}">
        <small id="vc_chiPhiHelp" class="form-text text-muted">Nhập chi phí vận chuyển.</small>
    </div>
    <div class="form-group">
        <label for="vc_dienGiai">Diễn giải</label>
        <input type="text" class="form-control" id="vc_dienGiai" name="vc_dienGiai" aria-describedby="vc_dienGiaiHelp" placeholder="Nhập tên diễn giải" value="{{  $vanchuyen->vc_dienGiai }}">
        <small id="vc_dienGiaiHelp" class="form-text text-muted">Nhập diễn giải.</small>
    </div>
    <button class="btn btn-primary">Lưu</button>
</form>
@endsection