<?php

use think\migration\Seeder;

class Account extends Seeder
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
                'email'=>'123456@gmail.com',
                'password'=>'123456',
                'gender'=>'0',
            ],
            [
                'email'=>'456789@gmail.com',
                'password'=>'123456',
                'gender'=>'1',
            ],
        ];
        $posts = $this->table('account');
        $posts->insert($data)->save();
    }
}