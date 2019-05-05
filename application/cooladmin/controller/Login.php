<?php
/**
 * 文件名 Login.php
 * 创建者 赵航
 * 邮箱 zhaoh008@gmail.com
 * 创建时间 2019-05-05 15:12
 * 项目名称 mojijiji
 */


namespace app\cooladmin\controller;


use think\Controller;

class Login extends  Controller
{
    /*
     * 登录功能
     */
    public function Login(){
        return $this->fetch();
    }
    /*
     * 注册
     */
    public function Register(){
        return $this->fetch();
    }
}