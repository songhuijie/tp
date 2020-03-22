<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/3/22
 * Time: 20:42
 */

namespace app\index\validate;

use think\Validate;

class User extends Validate
{
    protected $rule = [
        'name'  => 'require|max:25',
        'name2' => ['require', 'max' => 25, 'regex' => '/^[\w|\d]\w+/'],
        'age'   => 'number|between:1,120',
        'email' => 'email',
    ];

    protected $message  =   [
        'name.require' => '名称必须',
        'name.max'     => '名称最多不能超过25个字符',
        'age.number'   => '年龄必须是数字',
        'age.between'  => '年龄只能在1-120之间',
        'email'        => '邮箱格式错误',
    ];

    // 自定义验证规则
    protected function checkName($value,$rule,$data=[])
    {
        return $rule == $value ? true : '名称错误';
    }

/**
 *
 *     // 日期格式验证
Validate::dateFormat('2016-03-09','Y-m-d'); // true
// 验证是否有效的日期
Validate::isDate('2016-06-03'); // true
// 验证是否有效邮箱地址
Validate::isEmail('thinkphp@qq.com'); // true
// 验证是否在某个范围
Validate::in('a',['a','b','c']); // true
// 验证是否大于某个值
Validate::gt(10,8); // true
// 正则验证
Validate::regex(100,'\d+'); // true
 *
 *如果需要批量验证规则，可以使用
 * Validate::checkRule($value,'must|email');
 *
 *验证规则支持对表单的令牌验证，首先需要在你的表单里面增加下面隐藏域：
 * <input type="hidden" name="__token__" value="{$Request.token}" />
 * 或者
 * {:token()}
 *
 * 如果你的令牌名称不是__token__，则表单需要改为：

<input type="hidden" name="__hash__" value="{$Request.token.__hash__}" />
 *
 *
 * {:token('__hash__')}
 */
}