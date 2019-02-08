<?php
/**
 * Created by PhpStorm.
 * User: zhaoh
 * Date: 2017/12/1
 * Time: 8:53
 */

namespace app\admin\controller;


use think\Controller;
use think\helper\hash\Md5;

class Login extends Controller
{
    public function index(){
        if($this->request->isPost()) {
            $data=input('post.');
            $name= $data['name'];
            $rus=model('admin')->getAdmin($name);
            if (!$rus||$rus->password!= Md5($data['password'])) {
                $this->error('用户不存在或者密码错误');
            }
            session('adminusr',$rus,'admin');
           return $this->redirect("admin/index/index");
        }else{
            $account=session('adminusr','','admin');
            if($account&&$account->id){
                return $this->redirect("admin/index/index");
            }
            return $this->fetch('');
        }
    }
    public function loginout(){
        session(null,'admin');
        return $this->redirect("admin/login/index");
    }
}