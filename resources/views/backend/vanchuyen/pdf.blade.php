<!DOCTYPE html>
<html>

<head>
    <title><h3>Danh sách vận chuyển</h3></title>
    <!-- hỗ trợ tiếng việt khi hiển thị -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style type="text/css">
        * {
            /* font hỗ trợ tiếng việt */
            font-family: DejaVu Sans, sans-serif;
        }
        body {
            font-size: 10px;
        }
        table {
            border-collapse: collapse;
        }
        td {
            vertical-align: middle;
        }
        caption {
            font-size: 20px;
            font-weight: bold;
            text-align: center;
        }
        /* .hinhSanPham {
            width: 100px;
            height: 100px;
        } */
        .companyInfo {
            font-size: 13px;
            font-weight: bold;
            text-align: center;
        }
        .companyImg {
            width: 200px;
            height: 200px;
        }
        .page-break {
            page-break-after: always;
        }
    </style>
</head>

<body>
    <div class="row">
        <table border="0" align="center">
            <tr>
                <td class="companyInfo">
                    Công ty Nền tảng<br />
                    http://sunshine.com/<br />
                    (0292)3.888.999 # 01.222.888.999<br />
                    <img src="{{ asset('img/logo-nentang.jpg') }}" class="companyImg" />
                </td>
            </tr>
        </table>
        <br />
        <br />
        <?php 
        $tongSoTrang = ceil(count($danhsachvanchuyen)/5);
         ?>
        <table border="1" align="center" cellpadding="5">
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
                <td align="center">{{ $loop->index + 1 }}</td>
                <td align="left">{{ $vanchuyen->vc_ma }}</td>
                <td align="right">{{ $vanchuyen->vc_ten }}</td>
                <td align="left">{{ $vanchuyen->vc_chiPhi }}</td>
                <td align="right">{{ $vanchuyen->vc_dienGiai }}</td>
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
                <th>Mã vận chuyển</th>
                <th>Tên vận chuyển</th>
                <th>Chi phí vận chuyển</th>
                <th>Diễn giải</th>
            </tr>
            @endif
            @endforeach
        </table>
    </div>
</body>

</html>