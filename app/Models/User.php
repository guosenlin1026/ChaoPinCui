<?php
 /*
  V1.0
  function：User Model
  author：guosenlin
  date：2017-09-14
 */
namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at']; //开启deleted_at
    protected $table='users';  //绑定表
    protected $fillable = ['name', 'email', 'password', 'phone']; // 可填充字段
    protected $hidden = ['password', 'remember_token']; // 隐藏字段
}
