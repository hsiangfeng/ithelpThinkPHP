<?php

use think\migration\Migrator;
use think\migration\db\Column;

class ThinkMessage extends Migrator
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
        $table = $this->table('message');
        $table->addColumn('title', 'string', ['limit'=> 15, 'default'=>'', 'comment' => '標題'])
        ->addColumn('content', 'text', ['default'=>'', 'comment' => '留言內容'])
        ->addColumn('author', 'string', ['limit'=> 20, 'default'=>'', 'comment' => '作者'])
        ->addColumn('email', 'string', ['limit'=> 128, 'default'=>'', 'comment' => '信箱'])
        ->addColumn('create_time', 'timestamp', ['default'=>'0000-00-00 00:00:00', 'comment' => '建立時間'])
        ->addColumn('last_modify_time', 'timestamp', ['default'=>'CURRENT_TIMESTAMP','update' => 'CURRENT_TIMESTAMP', 'comment' => '更新時間'])
        ->create();
    }
    public function down()
    {
        $this->dropTable('think_message');
    }
}
