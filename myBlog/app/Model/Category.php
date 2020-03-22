<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/1/13
 * Time: 20:52
 */

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model{


    protected $table = 'category';


    public function article(){
        return $this->hasMany(Article::class,'cate_id','id');
    }
}