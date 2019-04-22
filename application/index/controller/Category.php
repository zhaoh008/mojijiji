<?php


namespace app\index\controller;


use think\Controller;

/*
 * 分类控制器
 */
class Category extends Controller
{
        /*
         * 分类列表获取渲染
         */
        public function categoryList(){
            $category_list=model('Category')->getCategory();
//            echo "<pre>";print_r($category_list);echo "<pre>";;die();
            //计算每个分类下的文章数量
            foreach ($category_list as $key=>$value){
                $article_num=model('Article')->categoryArticleNum($category_list[$key]['id']);
                $category_list[$key]['article_num']=3;
            }
            $this->fetch('',['category'=>$category_list]);
        }
}