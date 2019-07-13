@extends('print.layouts.paper')

@section('title')
Biểu mẫu Phiếu in danh sách vận chuyển
@endsection

@section('paper-size') A4 @endsection
@section('paper-class') A4 @endsection

@section('custom-css')
<style>
.vanchuyen-thumbnail {
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
        <table border="0" align="center" cellspacing="0" class="vanchuyen-thumbnail">
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
        $tongSoTrang = ceil(count($danhsachvanchuyen)/5);
            ?>
        <table border="1" align="center" cellpadding="5" class="vanchuyen-thumbnail">
            <caption>Danh sách vận chuyển</caption>
            <tr>
                <th colspan="6" align="center">Trang 1 / {{ $tongSoTrang }}</th>
            </tr>
            <tr>
            <th>STT</th>
                <th>Mã vận chuyển</th>
                <th>Tên vận chuyển</th>
                <th>Chi phí vận chuyển</th>
                <th>Diễn giải</th>
            </tr>
            @foreach ($danhsachvanchuyen as $vanchuyen)
            <tr>
                <td align="center" style="width:10%">{{ $loop->index + 1 }}</td>
                <td align="left" style="width:30%">{{ $vanchuyen->vc_ma }}</td>
                <td align="left">{{ $vanchuyen->vc_ten }}</td>
                <td align="left" style="width:30%">{{ $vanchuyen->vc_chiPhi }}</td>
                <td align="left">{{ $vanchuyen->vc_dienGiai }}</td>
            </tr>
            @if (($loop->index + 1) % 5 == 0)
        </table>
        <div class="page-break"></div>
        <table border="1" align="center" cellpadding="5" class="vanchuyen-thumbnail">
            <tr>
                <th colspan="6" align="center">Trang {{ 1 + floor(($loop->index + 1) / 5) }} / {{ $tongSoTrang }}</th>
            </tr>
            <tr>
            <th>STT</th>
                <th>Mã vận chuyển</th>
                <th>Tên vận chuyển</th>
                <th>Chi phí vận chuyển</th>
                <th>Diễn giải</th>
            </tr>
            @endif
            @endforeach
        </table>
    </article>
</section>
@endsection