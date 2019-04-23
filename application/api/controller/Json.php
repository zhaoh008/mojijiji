<?php


namespace app\api\controller;

/*
 * 返回JSON类，用于前端测试
 */

use think\Controller;

class Json extends Controller
{
            /*
             * 返回json
             */
        public function index() {
            $i=888;
            $row=array();
         for ($j=0;$j<=$i;$j++){
             $name='name'.$j;
             $price=$j^2;
             $row[]=([
                 'name'=>$name,
                 'price'=>$price
             ]);
         }
        print_r($row);
        }
}