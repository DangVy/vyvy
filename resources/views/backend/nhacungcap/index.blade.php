@extends('backend.layout.master')

@section('title')
Danh sách nhà cung cấp
@endsection

@section('feature-title')
Danh sách nhà cung cấp   
@endsection

@section('feature-description')
Danh sách các nhà cung cấp có trong Hệ thống. Bạn có thể CRUD!
@endsection

@section('content')
<a href="{{ route('backend.nhacungcap.create') }}" class="btn btn-primary">Thêm mới nhà cung cấp</a>
<a href="{{ route('backend.nhacungcap.print') }}" class="btn btn-success">In danh sách nhà cung cấp</a>
<a href="{{ route('backend.nhacungcap.pdf') }}" class="btn btn-danger">Xuất PDF nhà cung cấp</a>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>STT</th>
            <th>Tên nhà cung cấp</th>
            <th>Đại diện</th>
            <th>Địa chỉ</th>
            <th>Điện thoại</th>
            <th>Email</th>
            <th>Xuất xứ</th>
            <th>Sửa</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $stt = 1;
        ?>
        @foreach($danhsachnhacungcap as $ncc)
        <tr>
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ $ncc->ncc_ten }}</td>
            <td>{{ $ncc->ncc_daiDien }}</td>
            <td>{{ $ncc->ncc_diaChi}}</td>
            <td>{{ $ncc->ncc_dienThoai}}</td>
            <td>{{ $ncc->ncc_email}}</td>
            <td>{{ $ncc->xx_ma }}</td>
            <td>
                <a href="{{ route('backend.nhacungcap.edit', ['id' => $ncc->ncc_ma]) }}" class="btn btn-success">Sửa</a>
                <form class="d-inline" method="post" action="{{ route('backend.nhacungcap.destroy', ['id' => $ncc->ncc_ma]) }}">
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