<?php

use Illuminate\Database\Seeder;
use App\Model\System;

class SystemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (empty(System::first())) {
            $model = new System;
            $model->name = '潮品萃';
            $model->email = 'admin@qq.com';
            $model->phone = 13632214480;
            $model->address = '重庆市铜梁县';
            $model->save();
        }
    }
}
