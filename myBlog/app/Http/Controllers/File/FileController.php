<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/1/12
 * Time: 13:38
 */

namespace App\Http\Controllers\File;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FileController extends Controller{

    /**
     * 图片上传
     * @param string video 上传的视频
     *
     **/
    public function img(Request $request)
    {

        $file = $request->file('file');

        if ($file->isValid()) {

            $dir = 'uploads/img/';/*上传目录 public目录下 uploads/thumb 文件夹*/
            /*文件名。格式：时间戳 + 6位随机数 + 后缀名*/
            $filename = time() . mt_rand(100000, 999999) . '.' . $file ->getClientOriginalExtension();
            $file->move($dir, $filename);
            $path = $dir . $filename;
            return [ 'code' => 0,'data' => $path];
        }

    }


}