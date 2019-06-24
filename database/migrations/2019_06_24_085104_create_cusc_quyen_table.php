<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuscQuyenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cusc_quyen', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedTinyInteger('q_ma')->autoIncrement()->comment('Mã quyền:  1- Giám đốc, 2- Quản trị, 3-Quản lí kho, 4-Kế toán, 5-Nhân viên bán hàng, 6-Nhân viên giao hàng');
            $table->string('q_ten', 30)->comment('Tên quyền');
            $table->string('q_dienGiai', 250)->comment('Diễn giải về quyền');
            $table->timestamp('q_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm đầu tiên tạo quyền');
            $table->timestamp('q_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm cập nhật quyền gần nhất');
            $table->unsignedTinyInteger('q_trangThai')->default('2')->comment('Trạng thái quyền: 1-Khóa, 2-Khả dụng');
            $table->unique(['q_ten']);
        });
        DB::statement("ALTER TABLE `cusc_quyen` comment 'Các quyền quản lí'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cusc_quyen');
    }
}
