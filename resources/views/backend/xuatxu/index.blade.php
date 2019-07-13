@extends('backend.layout.master')

@section('title')
Danh sách xuất xứ
@endsection

@section('feature-title')
Danh sách xuất xứ   
@endsection

@section('feature-description')
Danh sách xuất xứ có trong Hệ thống. Bạn có thể CRUD!
@endsection

@section('content')
<a href="{{ route('backend.xuatxu.create') }}" class="btn btn-primary">Thêm mới Xuất xứ</a>
<a href="{{ route('backend.xuatxu.print') }}" class="btn btn-success">In danh sách Xuất xứ</a>
<a href="{{ route('backend.xuatxu.pdf') }}" class="btn btn-danger">Xuất PDF danh sách Xuất xứ</a>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>STT</th>
            <th>Mã xuất xứ</th>
            <th>Tên xuất xứ</th>
            <th>Sửa</th>
        </tr>
    </thead>

    <tbody>
        <?php
        $stt = 1;
        ?>
        @foreach($danhsachxuatxu as $xx)
        <tr>
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ $xx->xx_ma }}</td>
            <td>{{ $xx->xx_ten }}</td>
            <td>
                <a href="{{ route('backend.xuatxu.edit', ['id' => $xx->xx_ma]) }}" class="btn btn-success">Sửa</a>
                <form class="d-inline" method="post" action="{{ route('backend.xuatxu.destroy', ['id' => $xx->xx_ma]) }}">
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