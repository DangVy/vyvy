@extends('backend.layout.master')

@section('title')
Thêm mới thanh toán
@endsection

@section('feature-title')
Thêm mới thanh toán   
@endsection

@section('feature-description')
Thêm mới thanh toán. Vui lòng nhập thông tin và bấm Lưu.
@endsection

@section('content')
<form id="frmThanhToan" name="frmThanhToan" method="post" action="{{ route('backend.thanhtoan.store') }}">
@csrf
    <div class="form-group">
        <label for="tt_ten">Tên thanh toán</label>
        <input type="text" class="form-control" id="tt_ten" name="tt_ten" aria-describedby="tt_tenHelp" placeholder="Nhập tên thanh toán">
        <small id="tt_tenHelp" class="form-text text-muted">Nhập tên thanh toán. Giới hạn trong 50 ký tự.</small>
    </div>
    
    <div class="form-group">
        <label for="tt_dienGiai">Diễn giải</label>
        <input type="text" class="form-control" id="tt_dienGiai" name="tt_dienGiai" aria-describedby="tt_dienGiaiHelp" placeholder="Nhập diễn giải ">
        <small id="tt_dienGiaiHelp" class="form-text text-muted">Nhập diễn giải. </small>
    </div>
    <button class="btn btn-primary">Lưu</button>
</form>
@endsection
@section('custom-scripts')
<script>
    $(document).ready(function () {
        $("#frmThanhToan").validate({
            rules: {
                tt_ten: {
                    required: true,
                    minlength: 3,
                    maxlength: 50
                },
                tt_dienGiai: {
                    required: true,
                    minlength: 3,
                    maxlength: 100
                },
            },
            messages: {
                tt_ten: {
                    required: "Vui lòng nhập tên thanh toán",
                    minlength: "Tên thanh toán phải có ít nhất 3 ký tự",
                    maxlength: "Tên thanh toán không được vượt quá 50 ký tự"
                },
                tt_dienGiai: {
                    required: "Vui lòng nhập diễn giải",
                    minlength: "Diễn giải phải có ít nhất 3 ký tự",
                    maxlength: "Diễn giải không được vượt quá 100 ký tự"
                },
            },
            errorElement: "em",
            errorPlacement: function (error, element) {
                // Thêm class `invalid-feedback` cho field đang có lỗi
                error.addClass("invalid-feedback");
                if (element.prop("type") === "checkbox") {
                    error.insertAfter(element.parent("label"));
                } else {
                    error.insertAfter(element);
                }
                // Thêm icon "Kiểm tra không Hợp lệ"
                if (!element.next("span")[0]) {
                    $("<span class='glyphicon glyphicon-remove form-control-feedback'></span>")
                        .insertAfter(element);
                }
            },
            success: function (label, element) {
                // Thêm icon "Kiểm tra Hợp lệ"
                if (!$(element).next("span")[0]) {
                    $("<span class='glyphicon glyphicon-ok form-control-feedback'></span>")
                        .insertAfter($(element));
                }
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass("is-invalid").removeClass("is-valid");
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).addClass("is-valid").removeClass("is-invalid");
            }
        });
    });
</script>
@endsection