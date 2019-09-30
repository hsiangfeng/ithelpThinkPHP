<?php

use think\migration\Migrator;
use think\migration\db\Column;

class ThinkNewUser extends Migrator
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function up()
    {
        $table = $this->table('new_user');
        $table->addColumn('email', 'string', ['limit'=> 125, 'default'=>'null', 'comment' => '信箱'])
        ->addColumn('password', 'string', ['limit'=> 32,'default'=>'null', 'comment' => '密碼'])
        ->addColumn('name', 'string', ['limit'=> 6, 'default'=>'null', 'comment' => '姓名'])
        ->addColumn('nikename', 'string', ['limit'=> 6, 'default'=>'null', 'comment' => '暱稱'])
        ->create();
    }
    public function down()
    {
        $this->dropTable('new_user');
    }
}
