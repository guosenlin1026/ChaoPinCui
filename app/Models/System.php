<?php
 /*
  V1.0
  function：System Model
  author：guosenlin
  date：2017-09-14
 */
namespace App\Model;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class System extends Model
{
    // use SoftDeletes;
    // protected $dates = ['deleted_at']; //开启deleted_at
    protected $table='systems';  //绑定表
}
