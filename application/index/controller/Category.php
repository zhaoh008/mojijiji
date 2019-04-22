<?php


namespace app\index\controller;


use think\Controller;

class Category extends Controller
{
        public function categoryList(){
            $category_list=model('Category')->getCategory();
            echo "<pre>";print_r($category_list);echo "<pre>";;die();
            foreach ($category_list as $key=>$value){

            }
            $this->fetch('',['category'=>$category]);
        }
}