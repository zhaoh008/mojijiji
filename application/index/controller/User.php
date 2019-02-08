<?php
/**
 * Created by PhpStorm.
 * User: zhaoh
 * Date: 2018/3/10
 * Time: 17:32
 */

namespace app\index\controller;


use think\Controller;

class User extends Controller
{
    public function loginIn(){
        if($this->request->isPost()){
            $data=input('post.');
            $user=model("User")->getUserByPhone($data);
            if (!$user||$user->password!= MD5($data['password'])) {
                echo "账号或密码错误●ω●";
            }else{
                session('user',$user,'index');
                echo'登陆成功●ω●';
            }
        }

    }
    public function register(){
        if($this->request->isPost()){
            $data=input('post.');
            $res=model('User')->add($data);
            if($res){
               echo "注册成功●ω●";
            }else
                echo "注册失败，重新再试●ω●";
        }
    }
    public function loginOut(){
        session(null,'index');
        echo "已注销●ω●";
    }
    public function getIp() {
        if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown"))
            $ip = getenv("HTTP_CLIENT_IP");
        else
            if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown"))
                $ip = getenv("HTTP_X_FORWARDED_FOR");
            else
                if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown"))
                    $ip = getenv("REMOTE_ADDR");
                else
                    if (isset ($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown"))
                        $ip = $_SERVER['REMOTE_ADDR'];
                    else
                        $ip = "unknown";
        return ($ip);
    }
}