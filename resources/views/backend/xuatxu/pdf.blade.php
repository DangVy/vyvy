<!DOCTYPE html>
<html>

<head>
    <title><h3>Danh sách xuất xứ</h3></title>
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
            width: 100px;
            height: 100px;
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
        $tongSoTrang = ceil(count($danhsachxuatxu)/5);
         ?>
        <table border="1" align="center" cellpadding="5">
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
                <td align="center">{{ $loop->index + 1 }}</td>
                <td align="left">{{ $xuatxu->xx_ma }}</td>
                <td align="right">{{ $xuatxu->xx_ten }}</td>
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
                <th>Mã xuất xứ</th>
                <th>Tên xuất xứ</th>
            </tr>
            @endif
            @endforeach
        </table>
    </div>
</body>

</html>