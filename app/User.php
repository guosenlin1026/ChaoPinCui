<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    protected $dates = ['deleted_at']; //开启deleted_at
    protected $table='users';  //绑定表
    protected $fillable = ['name', 'email', 'password', 'phone']; // 可填充字段
    protected $hidden = ['password', 'remember_token']; // 隐藏字段
}
