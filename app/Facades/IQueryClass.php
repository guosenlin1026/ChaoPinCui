<?php

/*
 * @version: 1.0 Iquery Facade
 * @author: guosenlin
 * @date: 2017/9/14
 *
 */

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class IQueryClass extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'iquery';
    }
}