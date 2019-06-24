<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuscVanchuyenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cusc_vanchuyen', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedTinyInteger('vc_ma')->autoIncrement()->comment('Mã vận chuyển');
            $table->string('vc_ten', 200)->comment('Tên hình thức vận chuyển');
            $table->Integer('vc_chiPhi')->default('0')->comment('Chi phí vận chuyển');
            $table->string('vc_dienGiai')->comment('Diễn giải ');
            $table->timestamp('vc_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm đầu tiên tạo vận chuyển');
            $table->timestamp('vc_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm cập nhật vận chuyển gần nhất');
            $table->unsignedTinyInteger('vc_trangThai')->default('2')->comment('Trạng thái vận chuyển: 1-Khóa, 2-Khả dụng');
            $table->unique(['vc_ten']);
        });
        DB::statement("ALTER TABLE `cusc_vanchuyen` comment 'Các vận chuyển quản lí'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cusc_vanchuyen');
    }
}
