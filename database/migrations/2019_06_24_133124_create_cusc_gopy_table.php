<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuscGopyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cusc_gopy', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('gy_ma')->comment('Mã góp ý');
            $table->dateTime('gy_thoiGian')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm góp ý');
            $table->text('gy_noiDung')->comment('Nội dung góp ý');
            $table->unsignedBigInteger('kh_ma')->comment('Mã khách hàng');
            $table->unsignedBigInteger('sp_ma')->comment('Mã sản phẩm');
            $table->unsignedTinyInteger('gy_trangThai')->default('3')->comment('Trạng thái góp ý: 1-khóa, 2-hiển thị, 3-chờ duyệt');
            $table->foreign('sp_ma')->references('sp_ma')->on('cusc_sanpham')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('kh_ma')->references('kh_ma')->on('cusc_khachhang')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
        DB::statement("ALTER TABLE `cusc_gopy` comment 'Góp ý'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cusc_gopy');
    }
}
