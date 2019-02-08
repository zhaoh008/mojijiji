<?php
/**
 * Created by PhpStorm.
 * User: zhaoh
 * Date: 2017/11/19
 * Time: 12:53
 */

namespace app\admin\controller;
use think\Validate;
use think\Controller;
use think\File;
use think\Request;

class Article extends Base
{
    public function getCategory(){
        $category=model("Category")->getCategory();
        return json_encode($category);
    }

    /**
     * @return bool
     */
    public function getLabel()
    {
        $label=model('label')->getLabel();
        return json_encode($label);
    }
    /**
     * 添加文章
     * User: zhaoh
     * Date: 2017/11/19
     * Time: 12:53
     */
    public function addArticle()
    {   $category=model('Category')->getCategory();
        $label=model('Label')->getLabel();
        $this->assign('category',$category);
        $this->assign('label',$label);
        return $this->fetch();
    }
    /**
     * Created 保存文章.
     * User: zhaoh
     * Date: 2017/11/19
     * Time: 12:53
     */
    public function saveArticle()
    {
       $data=input('post.');
       $validate = validate('Article');
       if (!$validate->check($data)) {
           $this->error($validate->getError());
        }
       $rus= model('Article')->add($data);
        if($rus){
            $this->success('添加文章成功', 'index/index');
        }
        else{
            $this->error("添加文章失败");
        }
    }
    /**
 * 跟新文章
 * User: zhaoh
 * Date: 2017/11/19
 * Time: 12:53
 */
       public function updArticle($article_id){
             $category=model('Category')->getCategory();
             $label=model('Label')->getLabel();
             $this->assign('category',$category);
            $this->assign('label',$label);
           $data= model('Article')->getArticleById($article_id);
           $this->assign('article',$data);
             return  $this->fetch('updarticle');
       }
    /**
     * 跟新文章
     * User: zhaoh
     * Date: 2017/11/19
     * Time: 12:53
     */
       public function saveUpdArticle($article_id){

           $data=input('post.');
           $validate = validate('Article');

           if (!$validate->check($data)) {
               $this->error($validate->getError());
           }
          $rus= model('Article')->updArticle($data,$article_id);
           if($rus){
               $this->success('修改文章成功', 'index/index');
           }else{
               $this->error("修改文章失败（可能是完全没有修改）");
           }
       }
       public function delArticle($article_id){
           $result= model('Article')->delArticle($article_id);
           if($result){
               $this->success('删除文章成功', 'index/index');
           }
           else{
               $this->error("删除文章失败");
           }
}/**
 * 查询
 * User: zhaoh
 * Date: 2017/11/19
 * Time: 12:53
 */
    public function findArticle($title,$category,$label)
    {   $data=["title"=>$title,'category'=>$category,"label"=>$label];
       $article=model("Article")->findArticle($data);
       return $this ->fetch('index/admin',['article'=>$article]);
    }
    public function upLoadImage(){
        $file =request()->file('Filedata');
        if($file){
            $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
            if($info){
                // 成功上传后 获取上传信息
                // 输出 jpg
                echo $info->getSaveName();
                // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
        }
        }

    }

}