<?php
/**
 * table: products
 * author: guosenlin
 * date: 2017/09/13
*/
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->comment('分类id');
            $table->string('name', 50)->comment('名称');
            $table->string('desc', 255)->nullable()->comment('描述');
            $table->string('img', 50)->nullable()->comment('图片');
            $table->string('thumb', 50)->nullable()->comment('缩略图');
            $table->string('address', 100)->comment('地址');
            $table->string('meridian', 30)->nullable()->comment('经度');
            $table->string('weft', 30)->nullable()->comment('纬度');
            $table->integer('heat')->default(0)->comment('关注度');
            $table->integer('comment')->default(0)->comment('好评率');
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
        Schema::dropIfExists('products');
    }
}
