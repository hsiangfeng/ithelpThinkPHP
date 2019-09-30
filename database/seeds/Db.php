<?php

use think\migration\Seeder;

class Db extends Seeder
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
                'name'=>'王孝明',
            ],
            [
                'name'=>'陳志明',
            ],
        ];
        $posts = $this->table('db');
        $posts->insert($data)->save();
    }
}