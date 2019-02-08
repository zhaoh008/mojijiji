<?php
/**
 * Created by PhpStorm.
 * User: zhaoh
 * Date: 2017/11/19
 * Time: 20:15
 */

namespace app\common\model;
use think\Model;

class Article extends  Model
{
    /**
     * 添加文章
     * User: zhaoh
     * Date: 2017/11/19
     * Time: 20:15
     */
public function add($data){
    $fuck=$data['label1'];
    $data['label']=implode(',',$fuck);
    unset($data['label1']);
    $data['sdate']=date('Y-m-d',time());
    $data['ovdate']=date('Y-m-d',time());
    return $this->save($data);
}
    /**
 * 获取标签下的文章以及统计总数
 * User: zhaoh
 * Date: 2017/11/19
 * Time: 20:15
 */
    public function labelArticle($data)
    {
        return $this->where('label','like','%'.$data['label'].'%')
            ->paginate(12,false,['query' => request()->param()]);


    }
    public function labelNumberArticle($data)
    {
        $count=$this->where('label','like','%'.$data.'%')
            ->select();
        return count($count);

    }
    /**
     * 获取分类下的文章.及统计总数
     * User: zhaoh
     * Date: 2017/11/19
     * Time: 20:15
     */
    public function categoryArticle($data)
    {
       return $this->where('category','like',$data['category'])
            ->paginate(12,false,['query' => request()->param()]);


    }
    public function categoryNumberArticle($data)
    {
        $count=$this->where('category','like',$data)
            ->select();
        return count($count);

    }
    /**
     * 获取全部文章.
     * User: zhaoh
     * Date: 2017/11/19
     * Time: 20:15
     */
public function getArticle()
{       $data="";
        $order=[
            'article_id'=>'desc'
        ];
        return $this->where($data)
                        ->order($order)
                         ->paginate(12);
}
    /**
     * 通过穿过来的参数模糊查询文章，传递的参数包括分类 标签 标题
     * User: zhaoh
     * Date: 2017/11/19
     * Time: 20:15
     */
    public function findArticle($data)
    {
        $order=[
            'article_id'=>'desc'
        ];
        return $this->where('title','like','%'.$data['title'].'%')
            ->where('category','like','%'.$data['category'].'%')
            ->where('label','like','%'.$data['label'].'%')
            ->order($order)
            ->paginate(12,false,['query' => request()->param()]);
    }
    /**
     * 通过ID查询文章
     * User: zhaoh
     * Date: 2017/11/19
     * Time: 20:15
     */
    public function getArticleById($article_id)
    {

        return $this->where('article_id',$article_id)->select();

    }
    /**
     *  上一页下一页
     * User: zhaoh
     * Date: 2017/11/19
     * Time: 20:15
     */
    public function getArticlePrev($article)
    {
        $order=[
            'article_id'=>'desc'
        ];
       return $this->where('article_id','<',$article[0]['article_id'])
                     ->where('category','like',$article[0]['category'])
                    ->order($order)
                    ->limit(1)
                    ->select();
    }
    public function getArticleNext($article)
    {

           return  $this->where('article_id','>',$article[0]['article_id'])
              ->where('category','like',$article[0]['category'])
               ->limit(1)
            ->select();
    }
    /**
     * 跟新文章 通过查出ID跟新
     * User: zhaoh
     * Date: 2017/11/19
     * Time: 20:15
     */
    public function updArticle($data,$article_id){
        $fuck=$data['label1'];
        $data['label']=implode(',',$fuck);
        unset($data['label1']);
            $article=[
                'title'=>$data['title'],
                'author'=>$data['author'],
                'image'=>$data['image'],
                'category'=>$data['category'],
                'label'=>$data['label'],
                'adescribe'=>$data['adescribe'],
                'content'=>$data['content'],
                'ovdate' =>date('Y-m-d',time())
            ];
            return $this->where('article_id',$article_id)->update($article);
    }
    /**
     * 删除文章 通过ID.
     * User: zhaoh
     * Date: 2017/11/19
     * Time: 20:15
     */
        public function delArticle($article_id){
            return $this->where('article_id',$article_id)->delete();
        }
    /**
     * 查询文章
     * User: zhaoh
     * Date: 2017/11/19
     * Time: 20:15
     */
    public function search($data){
        $order=[
            'article_id'=>'desc'
        ];

        return $this->where('content','like','%'.$data['content'].'%')
            ->where ('title','like','%'.$data['content'].'%')
            ->order($order)
            ->paginate(12,false,['query' => request()->param()]);
    }
}