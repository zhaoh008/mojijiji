<?php
/**
 * Created by PhpStorm.
 * User: zhaoh
 * Date: 2017/12/1
 * Time: 16:23
 */

namespace app\common\model;


use think\Model;

class Lmessage extends Model
{
    public function getLmessage(){
        return $this->where('')->paginate(24);
    }
    public function add($data){
        return $this->save($data);
    }
}