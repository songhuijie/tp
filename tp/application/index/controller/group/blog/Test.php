<?php
namespace app\index\controller\group\blog;

use think\Controller;
use think\Request;

class Test extends Controller
{


    //只对特定方法起效
    protected $middleware = [
        'Hello' => ['only'=> ['hello'] ],
    ];
    //所有的都能起效
//    protected $middleware = ['Hello'];


    protected function initialize()
    {
        echo 'init<br/>';
    }

    public function index($name = 'ThinkPHP5',$id,Request $request)
    {


        dump($id);
        dump($request->hello);
        return 'group.blog.index,' . $name;
    }


    public function hello(Request $request)
    {

        dump($request->hello);
    }

}
