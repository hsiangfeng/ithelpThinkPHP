<?php

use think\migration\Seeder;

class NewUser extends Seeder
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
        $data = [
            [
                'email'=>'admin@gmail.com',
                'password'=>'123456',
                'name'=>'管理者',
                'nikename'=>'管理者'
            ],
        ];
        $posts = $this->table('new_user');
        $posts->insert($data)->save();
    }
}