<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuscKhachhangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cusc_khachhang', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedBigInteger('kh_ma')->autoIncrement()->comment('Mã khách hàng');
            $table->string('kh_taiKhoan', 50)->comment('tài khoản khách hàng');
            $table->string('kh_matKhau', 32)->comment('mật khẩu');
            $table->string('kh_hoTen', 100)->comment('Họ tên khách hàng');
            $table->unsignedTinyInteger('kh_gioiTinh')->default('1')->comment('Giới tính');
            $table->string('kh_email', 100)->comment('Địa chỉ email');
            $table->dateTime('kh_ngaySinh')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Ngày sinh');
            $table->string('kh_diaChi', 250)->nullable()->default('NULL')->comment('Địa chỉ');
            $table->string('kh_dienThoai', 11)->nullable()->default('NULL')->comment('Số điện thoại');
            $table->timestamp('kh_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm đẩu tiên tạo khách hàng');
            $table->timestamp('kh_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm cập nhật khách hàng gần nhất');
            $table->unsignedTinyInteger('kh_trangThai')->default('3')->comment('Trạng thái khách hàng: 1- khóa, 2- khả dụng');
            $table->unique(['kh_taiKhoan', 'kh_email','kh_dienThoai']);
        });
        DB::statement("ALTER TABLE `cusc_khachhang` comment 'Các thanh toán quản lí'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cusc_khachhang');
    }
}
