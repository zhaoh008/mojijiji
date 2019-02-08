<?php
/**
 * Created by PhpStorm.
 * User: zhaoh
 * Date: 2018/3/9
 * Time: 10:13
 */

namespace app\api\controller;

use think\Controller;


class Sendsms extends Controller
{
    public function checkSms(){
        $phone=$_POST['phone'];
        $code=model('Sendsms')->sendsms($phone);
        session('code',$code,'index');
        echo'验证码已发送●ω●';
    }

    public function checkCode(){
        $jsonBoo=null;
        $sessionCode=session('code','','index');
        $code=$_POST['yanzhengma'];
        if($code==$sessionCode) {
           $jsonBoo=array("valid"=>true);
           echo json_encode($jsonBoo);
       }else{
            $jsonBoo=array("valid"=>false);
            echo json_encode($jsonBoo);
       }
    }
}