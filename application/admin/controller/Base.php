<?php
/**
 * Created by PhpStorm.
 * User: zhaoh
 * Date: 2017/12/1
 * Time: 9:32
 */

namespace app\admin\controller;


use think\Controller;

class Base extends Controller
{
    public function _initialize()
    {
        $islogin=$this->isLogin();
        if(!$islogin){
            return $this->redirect('admin/login/index');
        }else{
              $this->assign('admin',$this->getLoginUser());
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
        $account=session('adminusr','','admin');
        return $account;
    }
}