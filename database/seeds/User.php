<?php

use think\migration\Seeder;

class User extends Seeder
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
                'name'=>'王大明',
                'weight'=>'50',
                'height'=>'162',
            ],
            [
                'name'=>'王陽明',
                'weight'=>'76',
                'height'=>'186',
            ],
            [
                'name'=>'小龍女',
                'weight'=>'40',
                'height'=>'152',
            ],
            [
                'name'=>'藍天',
                'weight'=>'55',
                'height'=>'167',
            ],
            [
                'name'=>'陳春嬌',
                'weight'=>'48',
                'height'=>'158',
            ],
        ];
        $posts = $this->table('user');
        $posts->insert($data)->save();
    }
}