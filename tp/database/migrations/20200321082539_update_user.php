<?php

use think\migration\Migrator;
use think\migration\db\Column;

class UpdateUser extends Migrator
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
    /**
     * 更新表 添加字段,改变或者删除字段
     */
    public function change(){

//        添加test字段
//        $this->table('user')
//            ->addColumn('test', 'string', ['limit' => 15, 'default' => '', 'comment' => '测试'])//在user表中增加一个test字段
//            ->update();

//        删除test字段
        $this->table('user')
            ->removeColumn('test')//删除user表中的test字段
            ->save();
    }
}
