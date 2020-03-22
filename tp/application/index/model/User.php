<?php

namespace app\index\model;

use think\Model;

class User extends Model
{
    //
    // 设置当前模型对应的完整数据表名称
    protected $table = 'user';

    // 设置当前模型的数据库连接
    protected $connection = 'think';


    protected $pk = 'user_id';
}
