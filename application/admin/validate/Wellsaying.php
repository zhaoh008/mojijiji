<?php
/**
 * Created by PhpStorm.
 * User: zhaoh
 * Date: 2017/11/26
 * Time: 7:20
 */

namespace app\admin\validate;
use think\Validate;

class wellsaying extends Validate
{
    protected $rule=[
        ['content','require','内容不能为空' ],

    ];

}