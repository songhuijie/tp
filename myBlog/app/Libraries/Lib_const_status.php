<?php
/**
 * Created by PhpStorm.
 * User: shj
 * Date: 2018/10/10
 * Time: 上午11:21
 */
namespace App\Libraries;

class Lib_const_status{
    const CORRECT = 0;
    const SUCCESS = 0;
    const SERVICE_ERROR = 1;
    const OTHER_ERROR = 2;
    //请求必要参数为空或者格式错误
    const ERROR_REQUEST_PARAMETER = 10;
    //请求过多,暂时被限制
    const ERROR_TOO_MUCH_REQUEST = 15;


    //必须为字符串
    const MUST_BE_A_STRING = 16;

    //超出最大限制
    const EXCEEDING_THE_MAXIMUM = 17;
    //邮箱格式错误
    const THE_MAILBOX_FORMAT_IS_NOT_CORRECT = 18;
    //邮箱已存在
    const MAILBOX_ALREADY_EXISTS = 19;
    //两次密码不匹配
    const TWO_PASSWORDS_DO_NOT_MATCH = 20;

    //验证码错误
    const VERIFICATION_CODE_ERROR = 21;

    //账号或密码错误
    const WRONG_ACCOUNT_OR_PASSWORD = 22;




}