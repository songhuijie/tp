<?php

use think\migration\Migrator;
use think\migration\db\Column;

class CreateUser extends Migrator
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
     * 创建表
     */
    public function up(){

        $table = $this->table('user', ['id' => 'user_id', 'comment' => '用户表', 'engine' => 'InnoDB', '']);
        $table->addColumn('user_name', 'string', ['limit' => 15, 'default' => '', 'comment' => '用户名'])
              ->addColumn('password', 'string', ['limit' => 15, 'default' => '', 'comment' => '密码',])
              ->addColumn('status', 'boolean', ['limit' => 1, 'default' => 0, 'comment' => '状态'])
              ->addIndex(['user_name'], ['unique' => true])//为user_name创建索引并设置唯一(唯一索引)
              ->addTimestamps()//默认生成create_time和update_time两个字段
              ->create();
    }

    /**
     * 删除表
     */
    public function down()
    {
        $this->table('user')->drop();
    }



}
