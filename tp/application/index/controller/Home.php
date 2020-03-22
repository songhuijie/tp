<?php
namespace app\index\controller;

use think\Controller;

class Home extends Controller
{


    protected $beforeActionList = [
        'first',
        'second' =>  ['except'=>'index,data'],
        'three'  =>  ['only'=>'index,hello,data'],
    ];

    public function first(){

        echo 'first<br/>';

    }

    public function second(){

        echo 'second<br/>';

    }

    public function three(){

        echo 'three<br/>';

    }
    public function index()
    {
        echo 'index<br/>';
    }

    public function hello()
    {
        echo 'hello<br/>';
    }

    public function data()
    {
        echo 'data<br/>';
    }
}
