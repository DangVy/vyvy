@extends('backend.layout.master')

@section('title')
Thêm mới vận chuyển
@endsection

@section('feature-title')
Thêm mới vận chuyển   
@endsection

@section('feature-description')
Thêm mới vận chuyển. Vui lòng nhập thông tin và bấm Lưu.
@endsection

@section('content')
<form id="frmVanChuyen" name="frmVanChuyen" method="post" action="{{ route('backend.vanchuyen.store') }}">
@csrf
    <div class="form-group">
        <label for="vc_ten">Tên vận chuyển</label>
        <input type="text" class="form-control" id="vc_ten" name="vc_ten" aria-describedby="vc_tenHelp" placeholder="Nhập tên vận chuyển">
        <small id="vc_tenHelp" class="form-text text-muted">Nhập tên vận chuyển. Giới hạn trong 50 ký tự.</small>
    </div>
    <div class="form-group">
        <label for="vc_chiPhi">Chi phí vận chuyển</label>
        <input type="text" class="form-control" id="vc_chiPhi" name="vc_chiPhi" aria-describedby="vc_chiPhiHelp" placeholder="Nhập chi phí vận chuyển">
        <small id="vc_chiPhiHelp" class="form-text text-muted">Nhập chi phí vận chuyển. </small>
    </div>
    <div class="form-group">
        <label for="vc_dienGiai">Diễn giải</label>
        <input type="text" class="form-control" id="vc_dienGiai" name="vc_dienGiai" aria-describedby="vc_dienGiaiHelp" placeholder="Nhập diễn giải ">
        <small id="vc_dienGiaiHelp" class="form-text text-muted">Nhập diễn giải. </small>
    </div>
    <button class="btn btn-primary">Lưu</button>
</form>
@endsection
@section('custom-scripts')
<script>
    $(document).ready(function () {
        $("#frmVanChuyen").validate({
            rules: {
                vc_ten: {
                    required: true,
                    minlength: 3,
                    maxlength: 50
                },
                vc_chiPhi: {
                    required: true
                },
                vc_dienGiai: {
                    required: true,
                    minlength: 3,
                    maxlength: 100
                },
            },
            messages: {
                vc_ten: {
                    required: "Vui lòng nhập tên vận chuyển",
                    minlength: "Tên vận chuyển phải có ít nhất 3 ký tự",
                    maxlength: "Tên vận chuyển không được vượt quá 50 ký tự"
                },
                vc_chiPhi: {
                    required: "Vui lòng nhập chi phí"
                },
                vc_dienGiai: {
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