@extends('print.layouts.paper')

@section('title')
Biểu mẫu Phiếu in danh sách xuất xứ
@endsection

@section('paper-size') A4 @endsection
@section('paper-class') A4 @endsection

@section('custom-css')
<style>
.xuatxu-thumbnail {
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
        <table border="0" align="center" cellspacing="0" class="xuatxu-thumbnail">
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
        $tongSoTrang = ceil(count($danhsachxuatxu)/5);
            ?>
        <table border="1" align="center" cellpadding="5" class="xuatxu-thumbnail">
            <caption>Danh sách xuất xứ</caption>
            <tr>
                <th colspan="6" align="center">Trang 1 / {{ $tongSoTrang }}</th>
            </tr>
            <tr>
                <th>STT</th>
                <th>Mã xuất xứ</th>
                <th>Tên xuất xứ</th>
            </tr>
            @foreach ($danhsachxuatxu as $xuatxu)
            <tr>
                <td align="center" style="width:10%">{{ $loop->index + 1 }}</td>
                <td align="left" style="width:30%">{{ $xuatxu->xx_ma }}</td>
                <td align="left">{{ $xuatxu->xx_ten }}</td>
            </tr>
            @if (($loop->index + 1) % 5 == 0)
        </table>
        <div class="page-break"></div>
        <table border="1" align="center" cellpadding="5" class="xuatxu-thumbnail">
            <tr>
                <th colspan="6" align="center">Trang {{ 1 + floor(($loop->index + 1) / 5) }} / {{ $tongSoTrang }}</th>
            </tr>
            <tr>
                <th>STT</th>
                <th>Mã xuất xứ</th>
                <th>Tên xuất xứ</th>
            </tr>
            @endif
            @endforeach
        </table>
    </article>
</section>
@endsection