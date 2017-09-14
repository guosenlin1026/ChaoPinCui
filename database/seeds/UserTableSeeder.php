<?php

use Illuminate\Database\Seeder;
use App\Model\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (empty(User::first())) {
            $model = new User;
            $model->name = 'user';
            $model->password = bcrypt('user');
            $model->email = 'user@qq.com';
            $model->phone = 15266668888;
            $model->save();
        }
    }
}
