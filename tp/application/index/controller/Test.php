<?php
namespace app\index\controller;

use app\index\model\User;
use think\Controller;
use think\facade\Log;
use think\Request;

class Test extends Controller
{
    // 是否批量验证
    protected $batchValidate = true;

    // 验证失败是否抛出异常
//    protected $failException = true;

    public function index($name = 'ThinkPHP5')
    {

        $news = $list = [
            [
                'id' =>'1',
                'title'=>'imooc@qq.com',
                'content'=>'imooc@qq.com',
                'name'=>'',
                'sub'=>[
                    [
                        'name'=>'2'
                    ],
                ],
            ],
            [
                'id' =>'2',
                'title'=>'104@qq.com',
                'content'=>'104@qq.com',
                'name'=>'12',
                'sub'=>[
                    [
                        'name'=>'3'
                    ],
                ],
            ],
            [
                'id'=>'3',
                'title'=>'cjk@qq.com',
                'content'=>'cjk@qq.com',
                'name'=>'23',
                'sub'=>[
                    [
                        'name'=>'4'
                    ],
                ],
            ]

        ];
        $lists = [];

        $title = '这就是标题';
        $name = '5';
        $vo = new \stdClass;
        $vo->name = 5;

        $id = 5;
        $this->assign('empty','<span class="empty">没有数据</span>');
        $this->assign('list',$list);
        $this->assign('lists',$lists);
        $this->assign('title',$title);
        $this->assign('id',$id);
        $this->assign('name',$name);
        $this->assign('vo',$vo);
        $this->assign('list',$list);
        $this->assign('news',$news);
        Log::record('测试日志信息');
        Log::record('测试日志信息，这是警告级别','notice');
        Log::write('测试日志信息，这是警告级别，并且实时写入','notice');
        Log::error('错误信息');
        Log::info('日志信息');
// 和下面的用法等效
        Log::record('错误信息','error');
        Log::record('日志信息','info');

        trace('错误信息','error');
        trace('日志信息','info');
        Log::info('日志信息{user}', ['user'=>'流年']);
        return $this->fetch();
//        return view('index',['title'=>$title,'list'=>$list,'news'=>$news]);
//        return 'index,' . $name;
    }

    public function test(){




        $name = 'hello2';
        $data['time'] = '1584866273';
        $data['number'] = '中 文';
        $data['name'] = '杰大哥123';

        cache('name','1');
        return view('test',['name'=>$name,'data'=>$data]);
//        return $this->fetch();
//        return User::get(1);
    }

    public function hello(){



        $data = [
            'name'  => 'thinkphpthinkphpthinkphpthinkphp',
            'email' => 'thinkphm',
        ];
        $result = $this->validate(
            $data ,
            'app\index\validate\User');

        if (true !== $result) {
            // 验证失败 输出错误信息
            dump($result);

        }

        $validate = new \app\index\validate\User;
        $results = $validate->check($data);
        dump($results);
        echo $validate->getError();

//        $this->assign("name", '你好');
//        return $this->fetch();

    }
}
