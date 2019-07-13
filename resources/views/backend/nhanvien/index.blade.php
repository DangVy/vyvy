@extends('backend.layout.master')

@section('title')
Danh sách Nhân viên
@endsection

@section('feature-title')
Danh sách Nhân viên   
@endsection

@section('feature-description')
Danh sách các Nhân viên có trong Hệ thống. Bạn có thể CRUD!
@endsection

@section('content')
<a href="{{ route('backend.nhanvien.create') }}" class="btn btn-primary">Thêm mới Nhân viên</a>
<a href="{{ route('backend.nhanvien.print') }}" class="btn btn-success">In danh sách Nhân viên</a>
<a href="{{ route('backend.nhanvien.pdf') }}" class="btn btn-danger">Xuất PDF Nhân viên</a>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>STT</th>
            <th>Tài khoản</th>
            <th>Họ tên</th>
            <th>Giới tính</th>
            <th>Email</th>
            <th>Ngày sinh</th>
            <th>Địa chỉ</th>
            <th>Điện thoại</th>
            <th>Quyền</th>
            <th>Sửa</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $stt = 1;
        ?>
        @foreach($danhsachnhanvien as $nv)
        <tr>
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ $nv->nv_taiKhoan }}</td>
            <td>{{ $nv->nv_hoTen }}</td>
            <td>{{ $nv->nv_gioiTinh}}</td>
            <td>{{ $nv->nv_email}}</td>
            <td>{{ $nv->nv_ngaySinh}}</td>
            <td>{{ $nv->nv_diaChi}}</td>
            <td>{{ $nv->nv_dienThoai}}</td>
            <td>{{ $nv->quyen->q_ten }}</td>
            <td>
                <a href="{{ route('backend.nhanvien.edit', ['id' => $nv->nv_ma]) }}" class="btn btn-success">Sửa</a>
                <form class="d-inline" method="post" action="{{ route('backend.nhanvien.destroy', ['id' => $nv->nv_ma]) }}">
                @csrf
                    <input type="hidden" name="_method" value="DELETE" />
                    <button class="btn btn-danger">Xóa</button>
                </form>
            </td>
        </tr>
        <?php
        $stt++;
        ?>
        @endforeach
    </tbody>
</table>
@endsection