@extends('print.layouts.paper')

@section('title')
Biểu mẫu Phiếu in danh sách nhân vien
@endsection

@section('paper-size') A4 @endsection
@section('paper-class') A4 @endsection

@section('custom-css')
<style>
.nhanvien-thumbnail {
    width: 100px;
    height: 100px;
}
.logo {
    width: 200px;
    height: 200px;
}
</style>
@endsection

@section('content')
<section class="sheet padding-10mm">
    <article>
        <table border="0" align="center" cellspacing="0">
            <tr>
                <td class="companyInfo" align="center">
                    Công ty TNHH Sunshine<br />
                    http://sunshine.com/<br />
                    (0292)3.888.999 # 01.222.888.999<br />
                    <img src="{{ asset('img/logo-nentang.jpg') }}" class="logo" />
                </td>
            </tr>
        </table>
        <br />
        <br />
        <?php 
        $tongSoTrang = ceil(count($danhsachnhanvien)/5);
            ?>
        <table border="1" align="center" cellpadding="5">
            <caption>Danh sách nhân viên</caption>
            <tr>
                <th colspan="6" align="center">Trang 1 / {{ $tongSoTrang }}</th>
            </tr>
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
            </tr>
            @foreach ($danhsachnhanvien as $nv)
            <tr>
                <td align="center">{{ $loop->index + 1 }}</td>
                <td align="left">{{ $nv->nv_taiKhoan }}</td>
                <td align="left">{{ $nv->nv_hoTen }}</td>
                <td align="left">{{ $nv->nv_gioiTinh }}</td>
                <td align="right">{{ $nv->nv_email }}</td>
                <td align="right">{{ $nv->nv_ngaySinh }}</td>
                <td align="left">{{ $nv->nv_diaChi }}</td>
                <td align="left">{{ $nv->nv_dienThoai }}</td>
                @foreach ($danhsachquyen as $q)
                @if ($nv->q_ma == $q->q_ma)
                <td align="left">{{ $q->q_ten }}</td>
                @endif
                @endforeach
            </tr>
            @if (($loop->index + 1) % 5 == 0)
        </table>
        <div class="page-break"></div>
        <table border="1" align="center" cellpadding="5">
            <tr>
                <th colspan="6" align="center">Trang {{ 1 + floor(($loop->index + 1) / 5) }} / {{ $tongSoTrang }}</th>
            </tr>
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
            </tr>
            @endif
            @endforeach
        </table>
    </article>
</section>
@endsection