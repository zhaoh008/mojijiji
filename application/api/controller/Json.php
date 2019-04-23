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
            $get=input('get.');
            if(array_key_exists('offset',$get)){
                $offset=$get['offset']?$get['offset']:0;
            }else
            {
                $offset=0;
            }
            if(array_key_exists('limit',$get)){
                $limit=$get['limit']?$get['limit']:0;
            }else
            {
                $limit=10;
            }
            if(array_key_exists('sort',$get)){
                $sort=$get['sort']?$get['sort']:'id';
            }
            else{
                $sort='id';
            }
            if(array_key_exists('order',$get)){
                $order=$get['order']?$get['order']:'asc';
            }
            else{
                $order='asc';
            }
         $data=model('test')
            ->where('id|name|price','like','%'.$search.'%')
            ->limit($offset,$limit)
            ->order($sort, $order)
            ->select();
        $rows['total']=888;
        $rows['totalNotFiltered']=888;
        $rows['rows']=$data;
        return $rows;
        }
}