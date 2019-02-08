<?php
/**
 * Created by PhpStorm.
 * User: zhaoh
 * Date: 2018/3/9
 * Time: 13:55
 */

namespace app\api\controller;


use think\Controller;

class Phoneapi extends Controller
{
    /**
     * @return array
     */
    public function checkPhone(){
        $jsonBoo=array("valid"=>false);
        $phone=$_POST['phone'];
        $res=model('User')->findPhone($phone);
        if($phone==$res['phone']) {
            echo json_encode($jsonBoo);
        }else{
            $jsonBoo=array("valid"=>true);
            echo json_encode($jsonBoo);
        }
    }
}