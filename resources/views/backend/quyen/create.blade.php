@extends('backend.layout.master')

@section('title')
Thêm mới quyền
@endsection

@section('feature-title')
Thêm mới quyền   
@endsection

@section('feature-description')
Thêm mới quyền. Vui lòng nhập thông tin và bấm Lưu.
@endsection

@section('content')
<form id="frmQuyen" name="frmQuyen" method="post" action="{{ route('backend.quyen.store') }}">
@csrf
    <div class="form-group">
        <label for="q_ten">Tên quyền</label>
        <input type="text" class="form-control" id="q_ten" name="q_ten" aria-describedby="q_tenHelp" placeholder="Nhập tên quyền">
        <small id="q_tenHelp" class="form-text text-muted">Nhập tên quyền. Giới hạn trong 50 ký tự.</small>
    </div>
    
    <div class="form-group">
        <label for="q_dienGiai">Diễn giải</label>
        <input type="text" class="form-control" id="q_dienGiai" name="q_dienGiai" aria-describedby="q_dienGiaiHelp" placeholder="Nhập diễn giải ">
        <small id="q_dienGiaiHelp" class="form-text text-muted">Nhập diễn giải. </small>
    </div>
    <button class="btn btn-primary">Lưu</button>
</form>
@endsection

@section('custom-scripts')
<script>
    $(document).ready(function () {
        $("#frmQuyen").validate({
            rules: {
                q_ten: {
                    required: true,
                    minlength: 3,
                    maxlength: 50
                },
                q_dienGiai: {
                    required: true,
                    minlength: 3,
                    maxlength: 100
                },
            },
            messages: {
                q_ten: {
                    required: "Vui lòng nhập tên quyền",
                    minlength: "Tên quyền phải có ít nhất 3 ký tự",
                    maxlength: "Tên quyền không được vượt quá 50 ký tự"
                },
                q_dienGiai: {
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