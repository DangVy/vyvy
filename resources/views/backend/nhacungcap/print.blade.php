@extends('print.layouts.paper')

@section('title')
Biểu mẫu Phiếu in danh sách nhà cung cấp
@endsection

@section('paper-size') A4 @endsection
@section('paper-class') A4 @endsection

@section('custom-css')
<style>
.nhacungcap-thumbnail {
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
        $tongSoTrang = ceil(count($danhsachnhacungcap)/5);
            ?>
        <table border="1" align="center" cellpadding="5">
            <caption>Danh sách nhà cung cấp</caption>
            <tr>
                <th colspan="6" align="center">Trang 1 / {{ $tongSoTrang }}</th>
            </tr>
            <tr>
                <th>STT</th>
                <th>Tên nhà cung cấp</th>
                <th>Đại diện</th>
                <th>Địa chỉ</th>
                <th>Điện thoại</th>
                <th>Email</th>
                <th>Xuất xứ</th>
            </tr>
            @foreach ($danhsachnhacungcap as $ncc)
            <tr>
                <td align="center">{{ $loop->index + 1 }}</td>
                <td align="left">{{ $ncc->ncc_ten }}</td>
                <td align="left">{{ $ncc->ncc_daiDien }}</td>
                <td align="left">{{ $ncc->ncc_diaChi }}</td>
                <td align="left">{{ $ncc->ncc_dienThoai }}</td>
                <td align="right">{{ $ncc->ncc_email }}</td>
                @foreach ($danhsachxuatxu as $xx)
                @if ($ncc->xx_ma == $xx->xx_ma)
                <td align="left">{{ $xx->xx_ten }}</td>
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
                <th>Tên nhà cung cấp</th>
                <th>Đại diện</th>
                <th>Địa chỉ</th>
                <th>Điện thoại</th>
                <th>Email</th>
                <th>Xuất xứ</th>
            </tr>
            @endif
            @endforeach
        </table>
    </article>
</section>
@endsection