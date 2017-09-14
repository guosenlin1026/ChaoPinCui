<?php
/**
 * table: systems
 * author: guosenlin
 * date: 2017/09/13
*/
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSystemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('systems', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',50)->default('潮品萃')->comment('网站名称');
            $table->string('logo', 50)->nullable()->comment('系统logo');
            $table->string('icp',100)->nullable()->comment('网站备案号');
            $table->string('copy',100)->nullable()->comment('@copyright');
            $table->string('keywords')->nullable()->default('潮品萃')->comment('关键字');
            $table->string('address', 100)->nullable()->comment('地址');
            $table->string('email', 50)->nullable()->comment('邮箱');
            $table->string('phone', 20)->nullable()->comment('手机');
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
        Schema::dropIfExists('systems');
    }
}
