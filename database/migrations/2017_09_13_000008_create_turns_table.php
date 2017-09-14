<?php
/**
 * table: turns
 * author: guosenlin
 * date: 2017/09/13
*/
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTurnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('turns', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->comment('特色id');
            $table->integer('sort')->default(100)->comment('排序');
            $table->tinyInteger('state')->default(1)->comment('状态 0关闭');
            $table->string('img', 50)->comment('原图');
            $table->string('url', 100)->nullable()->comment('链接地址');
            $table->softDeletes();
            $table->timestamps();
        });
        
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('turns');
    }
}
