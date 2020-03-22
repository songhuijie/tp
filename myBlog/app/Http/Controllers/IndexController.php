<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/1/12
 * Time: 12:53
 */
namespace App\Http\Controllers;

use App\Libraries\Lib_make;
use App\Model\Article;
use Illuminate\Http\Request;

class IndexController extends Controller{


    public $banner;
    public function __construct()
    {
        $this->banner = Lib_make::getBanner();
    }

    /**
     * 首页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request,Article $article){


        $param = $request->all();

        $banner = $this->banner;

        $articles = $article->getArticle($param);



        return view('index.index',compact('banner','articles'));
    }


    /**
     * 关于
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function about(){
        $banner = $this->banner;

        return view('index.about',compact('banner'));
    }

    /**
     * 新闻
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function NewView(){
        $banner = $this->banner;

        return view('index.new',compact('banner'));
    }


    /**
     * 新闻列表
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function newList(){

        $banner = $this->banner;
        return view('index.new_list',compact('banner'));
    }


    /**
     * 分享
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function share(){

        $banner = $this->banner;
        return view('index.share',compact('banner'));
    }
}