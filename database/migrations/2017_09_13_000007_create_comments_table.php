<?php
/**
 * table: comments
 * author: guosenlin
 * date: 2017/09/13
*/
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->comment('特色id');
            $table->integer('user_id')->comment('用户id');
            $table->text('content')->comment('内容');
            $table->integer('level')->default(60)->comment('评分');
            $table->string('img', 255)->nullable()->comment('原图 最多五张 用,隔开');
            $table->string('thumb', 255)->nullable()->comment('缩略图 最多五张');
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
        Schema::dropIfExists('comments');
    }
}
