<?php
/**
 * table: categories
 * author: guosenlin
 * date: 2017/09/13
*/
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pid')->nullable()->comment('父id');
            $table->string('name', 50)->comment('名称');
            $table->string('desc', 255)->nullable()->comment('描述');
            $table->string('ico', 50)->nullable()->comment('图标');
            $table->string('img', 50)->nullable()->comment('图片');
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
        Schema::dropIfExists('categories');
    }
}
