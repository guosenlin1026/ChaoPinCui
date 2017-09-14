<?php
 /*
  V1.0
  function：Product Model
  author：guosenlin
  date：2017-09-14
 */
namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at']; //开启deleted_at
    protected $table='products';  //绑定表
}
