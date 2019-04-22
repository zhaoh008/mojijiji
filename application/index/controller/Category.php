<?php


namespace app\index\controller;


use think\Controller;

class Category extends Controller
{
        public function categoryList(){
            $category=model('Category')->getCategory();
            $this->fetch('',['category'=>$category]);
        }
}