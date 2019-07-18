@extends('backend.layout.master')

@section('title')
Sửa thông tin nhà cung cấp
@endsection

@section('feature-title')
Sửa thông tin nhà cung cấp   
@endsection

@section('feature-description')
Sửa thông tin nhà cung cấp. Vui lòng nhập thông tin và bấm Lưu.
@endsection

@section('content')
<form method="post" action="{{ route('backend.nhacungcap.update', ['id' => $ncc->ncc_ma]) }}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="_method" value="PUT" />
    <div class="form-group">
        <label for="xx_ma">Xuất xứ</label>
        <select name="xx_ma" class="form-control">
            @foreach($danhsachxuatxu as $xuatxu)
                @if(old('xx_ma', $ncc->xx_ma) == $xuatxu->xx_ma)
                <option value="{{ $xuatxu->xx_ma }}" selected>{{ $xuatxu->xx_ten }}</option>
                @else
                <option value="{{ $xuatxu->xx_ma }}">{{ $xuatxu->xx_ten }}</option>
                @endif
            @endforeach
        </select>
    </div>
    
    <div class="form-group">
        <label for="ncc_ten">Tên nhà cung cấp</label>
        <input type="text" class="form-control" id="ncc_ten" name="ncc_ten" value="{{ old('ncc_ten', $ncc->ncc_ten) }}">
    </div>
    <div class="form-group">
        <label for="ncc_daiDien">Đại diện</label>
        <input type="text" class="form-control" id="ncc_daiDien" name="ncc_daiDien" value="{{ old('ncc_daiDien', $ncc->ncc_daiDien) }}">
    </div>
    <div class="form-group">
        <label for="ncc_diaChi">địa chỉ</label>
        <input type="text" class="form-control" id="ncc_diaChi" name="ncc_diaChi" value="{{ old('ncc_diaChi', $ncc->ncc_diaChi) }}">
    </div>
    <div class="form-group">
        <label for="ncc_dienThoai">điện thoại</label>
        <input type="text" class="form-control" id="ncc_dienThoai" name="ncc_dienThoai" value="{{ old('ncc_dienThoai', $ncc->ncc_dienThoai) }}">
    </div>
    <div class="form-group">
        <label for="ncc_email">Email</label>
        <input type="text" class="form-control" id="ncc_email" name="ncc_email" value="{{ old('ncc_email', $ncc->ncc_email) }}">
    </div>
    
    <div class="form-group">
        <label for="ncc_taoMoi">Ngày tạo mới</label>
        <input type="text" class="form-control" id="ncc_taoMoi" name="ncc_taoMoi" value="{{ old('ncc_taoMoi', $ncc->ncc_taoMoi) }}" data-mask-datetime>
    </div>
    <div class="form-group">
        <label for="ncc_capNhat">Ngày cập nhật</label>
        <input type="text" class="form-control" id="ncc_capNhat" name="ncc_capNhat" value="{{ old('ncc_capNhat', $ncc->ncc_capNhat) }}" data-mask-datetime>
    </div>
    <select name="ncc_trangThai" class="form-control">
        <option value="1" {{ old('ncc_trangThai', $ncc->ncc_trangThai) == 1 ? "selected" : "" }}>Khóa</option>
        <option value="2" {{ old('ncc_trangThai', $ncc->ncc_trangThai) == 2 ? "selected" : "" }}>Khả dụng</option>
    </select>
    <button class="btn btn-primary">Lưu</button>
</form>
@endsection