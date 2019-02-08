<?php
/**
 * Created by PhpStorm.
 * User: zhaoh
 * Date: 2017/12/1
 * Time: 7:50
 */

namespace app\common\model;

use think\Model;

class Admin extends Model
{
        public function getAdmin($name){
            return $this->where('name',$name)->find();
        }


}