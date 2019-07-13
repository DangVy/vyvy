@extends('backend.layout.master')

@section('title')
Sửa thông tin nhân viên
@endsection

@section('feature-title')
Sửa thông tin nhân viên   
@endsection

@section('feature-description')
Sửa thông tin nhân viên. Vui lòng nhập thông tin và bấm Lưu.
@endsection

@section('content')
<form method="post" action="{{ route('backend.nhanvien.update', ['id' => $nv->nv_ma]) }}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="_method" value="PUT" />
    <div class="form-group">
        <label for="q_ma">Quyền</label>
        <select name="q_ma" class="form-control">
            @foreach($danhsachquyen as $quyen)
                @if(old('q_ma', $nv->q_ma) == $quyen->q_ma)
                <option value="{{ $quyen->q_ma }}" selected>{{ $quyen->q_ten }}</option>
                @else
                <option value="{{ $quyen->q_ma }}">{{ $quyen->q_ten }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="nv_taiKhoan">Tài khoản nhân viên</label>
        <input type="text" class="form-control" id="nv_taiKhoan" name="nv_taiKhoan" value="{{ old('nv_taiKhoan', $nv->nv_taiKhoan) }}">
    </div>
    <div class="form-group">
        <label for="nv_matKhau">Mật khẩu</label>
        <input type="text" class="form-control" id="nv_matKhau" name="nv_matKhau" value="{{ old('nv_matKhau', $nv->nv_matKhau) }}">
    </div>
    <div class="form-group">
        <label for="nv_hoTen">Họ tên nhân viên</label>
        <input type="text" class="form-control" id="nv_hoTen" name="nv_hoTen" value="{{ old('nv_hoTen', $nv->nv_hoTen) }}">
    </div>
    <div class="form-group">
        <label for="nv_gioiTinh">Giới tính</label>
        <input type="number" class="form-control" id="nv_gioiTinh" name="nv_gioiTinh" value="{{ old('nv_gioiTinh', $nv->nv_gioiTinh) }}">
    </div>
    <div class="form-group">
        <label for="nv_email">Email</label>
        <input type="text" class="form-control" id="nv_email" name="nv_email" value="{{ old('nv_email', $nv->nv_email) }}">
    </div>
    <div class="form-group">
        <label for="nv_ngaySinh">ngày sinh</label>
        <input type="text" class="form-control" id="nv_ngaySinh" name="nv_ngaySinh" value="{{ old('nv_ngaySinh', $nv->nv_ngaySinh) }}" data-mask-datetime>
    </div>
    <div class="form-group">
        <label for="nv_diaChi">địa chỉ</label>
        <input type="text" class="form-control" id="nv_diaChi" name="nv_diaChi" value="{{ old('nv_diaChi', $nv->nv_diaChi) }}">
    </div>
    <div class="form-group">
        <label for="nv_dienThoai">điện thoại</label>
        <input type="text" class="form-control" id="nv_dienThoai" name="nv_dienThoai" value="{{ old('nv_dienThoai', $nv->nv_dienThoai) }}">
    </div>
    <div class="form-group">
        <label for="nv_taoMoi">Ngày tạo mới</label>
        <input type="text" class="form-control" id="nv_taoMoi" name="nv_taoMoi" value="{{ old('nv_taoMoi', $nv->nv_taoMoi) }}" data-mask-datetime>
    </div>
    <div class="form-group">
        <label for="nv_capNhat">Ngày cập nhật</label>
        <input type="text" class="form-control" id="nv_capNhat" name="nv_capNhat" value="{{ old('nv_capNhat', $nv->nv_capNhat) }}" data-mask-datetime>
    </div>
    <select name="nv_trangThai" class="form-control">
        <option value="1" {{ old('nv_trangThai', $nv->nv_trangThai) == 1 ? "selected" : "" }}>Khóa</option>
        <option value="2" {{ old('nv_trangThai', $nv->nv_trangThai) == 2 ? "selected" : "" }}>Khả dụng</option>
    </select>
    <button class="btn btn-primary">Lưu</button>
</form>
@endsection