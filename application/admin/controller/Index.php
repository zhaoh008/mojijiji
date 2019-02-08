<?php
namespace app\admin\controller;
use think\Controller;
class Index extends Base
{
    public function fucknumber(){
        $label=model('Label')->getlabel();
        for( $i=0;$i<count($label);$i++){
            $name= $label[$i]['name'];
            $number= model('Article')->labelNumberArticle($name);
            $rus = model('Label')->updLabelNumber($number,$label[$i]['label_id']);
        }
        $category=model('Category')->getCategory();
        for( $i=0;$i<count($category);$i++){
            $name= $category[$i]['name'];
            $number= model('Article')->categoryNumberArticle($name);
            $rus = model('Category')->updCategoryNumber($number,$category[$i]['category_id']);
        }
    }
    public function index()
    {   $this->fucknumber();
        $article=model("Article")->getArticle();
        return $this ->fetch('admin',['article'=>$article]);
    }

}
