<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuscThanhtoanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cusc_thanhtoan', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedTinyInteger('tt_ma')->autoIncrement()->comment('Mã thanh toán');
            $table->string('tt_ten')->comment('Tên thanh toán');
            $table->string('tt_dienGiai')->comment('Diễn giải');
            $table->timestamp('tt_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm đầu tiên tạo thanh toán');
            $table->timestamp('tt_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm cập nhật thanh toán gần nhất');
            $table->unsignedTinyInteger('tt_trangThai')->default('2')->comment('Trạng thái thanh toán: 1-Khóa, 2-Khả dụng');
            $table->unique(['tt_ten']);
        });
        DB::statement("ALTER TABLE `cusc_thanhtoan` comment 'Các thanh toán quản lí'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cusc_thanhtoan');
    }
}
