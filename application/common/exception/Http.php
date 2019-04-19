<?php

namespace app\common\exception;

use Exception;
use think\exception\Handle;

/**
 * Class Http
 * @package app\common\exception
 * 异常类自定义
 */
class Http extends Handle
{

    public function render(\Exception $e){
        if(config('app_debug')){
            //如果开启debug则正常报错
            return parent::render($e);
        }else{
            //404页面  自行定义
            header("Location:".url('index/index/page404'));
        }
    }

}