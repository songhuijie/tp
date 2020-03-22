<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/1/13
 * Time: 20:52
 */

namespace App\Model;

use App\Libraries\Lib_config;
use DemeterChain\C;
use Illuminate\Database\Eloquent\Model;

class Article extends Model{


    protected $table = 'article';


    public  function getArticle($param){

        $page = isset($param['page'])?$param['page']:Lib_config::PAGE;
        $limit = isset($param['limit'])?$param['limit']:Lib_config::LIMIT;


        return $this->orderBy('browse','desc')->skip(($page-1)*$limit)->take($limit)->paginate(5);
    }

    public function cateName(){
        return $this->belongsTo(Category::class,'cate_id','id');
    }
}