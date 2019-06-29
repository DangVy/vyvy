<a href="{{ route('chude.create') }}">Thêm mới</a>
<table>
    <thead>
        <tr>Mã chủ đề</tr>
        <tr>Tên chủ đề</tr>
    </thead>
    <tbody>
        @foreach($danhsachchude as $chude)
        <tr>
            <td>{{ $chude->cd_ma }}</td>
            <td>{{ $chude->cd_ten }}</td>
        </tr>
        @endforeach
    </tbody>
</table>