<?php
namespace app\index\controller\group;

use think\Controller;

class Test extends Controller
{

    public function index($name = 'ThinkPHP5')
    {
        return 'group.index,' . $name;
    }

}
