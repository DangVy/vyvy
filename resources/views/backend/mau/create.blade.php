@extends('backend.layout.master')

@section('title')
Thêm mới màu
@endsection

@section('feature-title')
Thêm mới màu    
@endsection

@section('feature-description')
Thêm mới màu. Vui lòng nhập thông tin và bấm Lưu.
@endsection

@section('content')
<form id="frmMau" name="frmMau" method="post" action="{{ route('backend.mau.store') }}">
@csrf
    <div class="form-group">
        <label for="m_ten">Tên màu</label>
        <input type="text" class="form-control" id="m_ten" name="m_ten" aria-describedby="m_tenHelp" placeholder="Nhập tên màu">
        <small id="m_tenHelp" class="form-text text-muted">Nhập tên màu. Giới hạn trong 50 ký tự.</small>
    </div>
    <button class="btn btn-primary">Lưu</button>
</form>
@endsection

@section('custom-scripts')
<script>
    $(document).ready(function () {
        $("#frmMau").validate({
            rules: {
                m_ten: {
                    required: true,
                    minlength: 3,
                    maxlength: 50
                },
            },
            messages: {
                m_ten: {
                    required: "Vui lòng nhập tên Màu",
                    minlength: "Tên Màu phải có ít nhất 3 ký tự",
                    maxlength: "Tên Màu không được vượt quá 50 ký tự"
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