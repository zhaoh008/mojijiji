<?php
/**
 * Created by PhpStorm.
 * User: zhaoh
 * Date: 2017/11/23
 * Time: 22:21
 */

namespace app\admin\validate;
use think\Validate;

class Category extends  Validate
{
    protected $rule=[
    ['name','require','分类名称不能为空' ],

];

}