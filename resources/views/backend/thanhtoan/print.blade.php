@extends('print.layouts.paper')

@section('title')
Biểu mẫu Phiếu in danh sách thanh toán
@endsection

@section('paper-size') A4 @endsection
@section('paper-class') A4 @endsection

@section('custom-css')
<style>
.thanhtoan-thumbnail {
    width: 600px;
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
        <table border="0" align="center" cellspacing="0" class="thanhtoan-thumbnail">
            <tr>
                <td class="companyInfo" align="center" >
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
        $tongSoTrang = ceil(count($danhsachthanhtoan)/5);
            ?>
        <table border="1" align="center" cellpadding="5" class="thanhtoan-thumbnail">
            <caption>Danh sách thanh toán</caption>
            <tr>
                <th colspan="6" align="center">Trang 1 / {{ $tongSoTrang }}</th>
            </tr>
            <tr>
            <th>STT</th>
                <th>Mã thanh toán</th>
                <th>Tên thanh toán</th>
                <th>Diễn giải</th>
            </tr>
            @foreach ($danhsachthanhtoan as $thanhtoan)
            <tr>
                <td align="center" style="width:10%">{{ $loop->index + 1 }}</td>
                <td align="left" style="width:30%">{{ $thanhtoan->tt_ma }}</td>
                <td align="left">{{ $thanhtoan->tt_ten }}</td>
                <td align="left">{{ $thanhtoan->tt_dienGiai }}</td>
            </tr>
            @if (($loop->index + 1) % 5 == 0)
        </table>
        <div class="page-break"></div>
        <table border="1" align="center" cellpadding="5" class="thanhtoan-thumbnail">
            <tr>
                <th colspan="6" align="center">Trang {{ 1 + floor(($loop->index + 1) / 5) }} / {{ $tongSoTrang }}</th>
            </tr>
            <tr>
            <th>STT</th>
                <th>Mã thanh toán</th>
                <th>Tên thanh toán</th>
                <th>Diễn giải</th>
            </tr>
            @endif
            @endforeach
        </table>
    </article>
</section>
@endsection