@extends('backend.layout.master')

@section('title')
Danh sách màu
@endsection

@section('feature-title')
Danh sách màu   
@endsection

@section('feature-description')
Danh sách các loại màu có trong Hệ thống. Bạn có thể CRUD!
@endsection

@section('content')
<a href="{{ route('backend.mau.create') }}" class="btn btn-primary">Thêm mới Màu</a>
<a href="{{ route('backend.mau.print') }}" class="btn btn-success">In danh sách Các loại màu</a>
<a href="{{ route('backend.mau.pdf') }}" class="btn btn-danger">Xuất PDF danh sách các loại màu</a>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>STT</th>
            <th>Mã màu</th>
            <th>Tên màu</th>
            <th>Sửa</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $stt = 1;
        ?>
        @foreach($danhsachmau as $m)
        <tr>
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ $m->m_ma }}</td>
            <td>{{ $m->m_ten }}</td>
            <td>
                <a href="{{ route('backend.mau.edit', ['id' => $m->m_ma]) }}" class="btn btn-success">Sửa</a>
                <form class="d-inline" method="post" action="{{ route('backend.mau.destroy', ['id' => $m->m_ma]) }}">
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