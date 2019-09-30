<?php

use think\migration\Migrator;
use think\migration\db\Column;

class HwTable extends Migrator
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
        $table = $this->table('hw_table');
        $table->addColumn('name', 'string', ['limit'=> 10, 'default'=>'null', 'comment' => '姓名'])
        ->addColumn('weight', 'integer', ['limit'=> 5, 'default'=>'0', 'comment' => '體重'])
        ->addColumn('height', 'float', ['limit'=> 5, 'default'=>'0', 'comment' => '身高'])
        ->create();
    }
    public function down()
    {
        $this->dropTable('hw_table');
    }
}
