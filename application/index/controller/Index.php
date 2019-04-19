<?php
namespace app\index\controller;
use think\Controller;
class Index   extends Base
{
    public function Index(){
    $tenlabel=model('Label')->tenLabel();
    $article=model("Article")->getArticle();
    $wellsaying=model('Wellsaying')->randwellsaying();
    $category=model('Category')->getCategory();
    return $this->fetch('',['article'=>$article,'category'=>$category,'tenlabel'=>$tenlabel,'wellsaying'=>$wellsaying]);

}
    public function labelArticle($name){
        $data=['label'=>urldecode($name)];
        $tenlabel=model('Label')->tenLabel();
        $article=model("Article")->labelArticle($data);
        $wellsaying=model('Wellsaying')->randwellsaying();
        $category=model('Category')->getCategory();
        return $this->fetch('',['article'=>$article,'category'=>$category,'tenlabel'=>$tenlabel,'wellsaying'=>$wellsaying]);

    }
    public function categoryArticle($name){

        $data=['category'=>urldecode($name)];
        $tenlabel=model('Label')->tenLabel();
        $article=model("Article")->categoryArticle($data);
        $wellsaying=model('Wellsaying')->randwellsaying();
        $category=model('Category')->getCategory();
        return $this->fetch('',['article'=>$article,'category'=>$category,'tenlabel'=>$tenlabel,'wellsaying'=>$wellsaying]);

    }
    public function Search($search){

        $data=['content'=>$search];
        $article=model("Article")->search($data);
        $tenlabel=model('Label')->tenLabel();
        $wellsaying=model('Wellsaying')->randwellsaying();
        $category=model('Category')->getCategory();
        return $this->fetch('',['article'=>$article,'category'=>$category,'tenlabel'=>$tenlabel,'wellsaying'=>$wellsaying]);

    }
    public function seeArticle($article_id){

        $article=model("Article")->getArticleById($article_id);
        $prev=model('Article')->getArticlePrev($article);
        $next=model('Article')->getArticleNext($article);
        $tenlabel=model('Label')->tenLabel();
        $wellsaying=model('Wellsaying')->randwellsaying();
        $category=model('Category')->getCategory();
        return $this->fetch('',['article'=>$article,'category'=>$category,'tenlabel'=>$tenlabel,'wellsaying'=>$wellsaying,'prev'=>$prev,'next'=>$next]);

    }
    public function labelList(){
        $tenlabel=model('Label')->tenLabel();
        $label=model('Label')->getLabel();
        $article=model("Article")->getArticle();
        $wellsaying=model('Wellsaying')->randwellsaying();
        $category=model('Category')->getCategory();
        return $this->fetch('',['article'=>$article,'tenlabel'=>$tenlabel,'category'=>$category,'label'=>$label,'wellsaying'=>$wellsaying]);
    }

    public function toMe(){
        $lmessage=model('Lmessage')->getLmessage();
        $tenlabel=model('Label')->tenLabel();
        $wellsaying=model('Wellsaying')->randwellsaying();
        $category=model('Category')->getCategory();
        return $this->fetch('',['category'=>$category,'tenlabel'=>$tenlabel,'wellsaying'=>$wellsaying,'lmessage'=>$lmessage]);
    }
    public function addLmessage(){
        if($this->request->isPost()){
            $data=input('post.');
            $data['sdate']=date('Y-m-d',time());
           $res= model('Lmessage')->add($data);

        }
    }
    public function Kaoshi(){
        $shiti=model('Kaoshi')->order('rand()')->limit(100)->select();
        $this->assign('shiti',$shiti);
        var_dump($shiti);
        //session('kaoshi',$shiti);
       // return $this->fetch('');

    }
    public function Tijiao(){
        $shiti=session('kaoshi');
        $daan=input('post.');
        print_r($daan);
    }
    public function  Page404(){

    }
}
