<?php

use think\migration\Seeder;

class Message extends Seeder
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
                'title'=>'留言板1',
                'content'=>'留言訊息123456789',
                'author'=>'admin',
                'email'=>'admin@gmail.com',
                'create_time'=>'2019-09-30 17:30:18'
            ],
            [
                'title'=>'留言板2',
                'content'=>'留言訊息123456789',
                'author'=>'admin',
                'email'=>'admin@gmail.com',
                'create_time'=>'2019-09-30 17:36:26'
            ],
            [
                'title'=>'留言板3',
                'content'=>'留言訊息123456789',
                'author'=>'admin',
                'email'=>'admin@gmail.com',
                'create_time'=>'2019-09-30 17:37:37'
            ],
            [
                'title'=>'留言板4',
                'content'=>'留言訊息123456789',
                'author'=>'admin',
                'email'=>'admin@gmail.com',
                'create_time'=>'2019-09-30 17:40:18'
            ],
            [
                'title'=>'留言板5',
                'content'=>'留言訊息123456789',
                'author'=>'admin',
                'email'=>'admin@gmail.com',
                'create_time'=>'2019-09-30 18:36:17'
            ],
        ];
        $posts = $this->table('message');
        $posts->insert($data)->save();
    }
}