<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

//Route::bind('index/group/blog');


Route::get('think', function () {
    return 'hello,ThinkPHP5!';
});

Route::get('hello/:name', 'index/hello');


//Route::rule('test','test/test');
//Route::rule('test','test/test','GET');
//Route::rule('test','test/test','POST');
//Route::get('test','test/test');
//Route::post('test','test/test');
//Route::put('test','test/test');
//Route::delete('test','test/test');
Route::any('test/index','test/index');
Route::any('test','test/test');
Route::any('hello','test/hello');

Route::get('blog/:year/[:month]','Blog/archive');
//变量用[ ]包含起来后就表示该变量是路由匹配的可选变量。
//以上定义路由规则后，下面的URL访问地址都可以被正确的路由匹配：
//http://serverName/index.php/blog/2015
//http://serverName/index.php/blog/2015/12


Route::get('group/test','index/group.test/index');
Route::get('group/blog/test/:id','index/group.blog.test/index');
Route::get('group/blog/hello','index/group.blog.test/hello');
return [

];


\think\facade\Url::root('/');
\think\facade\Url::build('group/blog/test','id=5');


Route::any('home/first','index/home/first');
Route::any('home/second','index/home/second');
Route::any('home/three','index/home/three');
Route::any('home/index','index/home/index');
Route::any('home/hello','index/home/hello');
Route::any('home/data','index/home/data');