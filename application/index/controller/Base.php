<?php
/**
 * Created by PhpStorm.
 * User: zhaoh
 * Date: 2018/3/12
 * Time: 19:17
 */

namespace app\index\controller;
use think\Controller;

class Base extends Controller
{
    public function _initialize()
    {
        $islogin=$this->isLogin();
        if($islogin){
            $this->assign('user',$this->getLoginUser());
        }
    }
    public function isLogin(){
        $user=$this->getLoginUser();
        if($user&&$user->id){
            return true;
        }
        return false;
    }
    public  function getLoginUser()
    {
        $account=session('user','','index');
        return $account;
    }
}