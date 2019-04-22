<?php


namespace app\index\controller;


use think\Controller;

class Category extends Controller
{
        public function categoryList(){
            $category_list=model('Category')->getCategory();
//            echo "<pre>";print_r($category_list);echo "<pre>";;die();
            foreach ($category_list as $key=>$value){
                $category_list[$key]['article_num']=3;
            }
            echo "<pre>";print_r($category_list);echo "<pre>";;die();
            $this->fetch('',['category'=>$category]);
        }
}