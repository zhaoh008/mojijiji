<?php
/**
 * Created by PhpStorm.
 * User: zhaoh
 * Date: 2017/11/23
 * Time: 22:20
 */

namespace app\admin\validate;
use think\Validate;

class Label extends  Validate
{
    protected $rule=[
        ['name','require','标签名称不能为空' ],

    ];
}