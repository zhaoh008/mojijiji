<?php
/**
 * Created by PhpStorm.
 * User: zhaoh
 * Date: 2017/11/23
 * Time: 22:01
 */

namespace app\common\model;


use think\Model;

class Category extends Model
{
    /**
     * 添加分类
     * User: zhaoh
     * Date: 2017/11/19
     * Time: 20:15
     */
    public function add($data){

        $data['sdate']=date('Y-m-d',time());
        $data['ovdate']=date('Y-m-d',time());
        return $this->allowField(true)->save($data);
    }
    /**
     * 获取全部分类.
     * User: zhaoh
     * Date: 2017/11/19
     * Time: 20:15
     */
    public function getCategory()
    {
        $data= $this->where('')
            ->select();
        return $data;
    }

    /**
     * 通过穿过来的参数模糊查询标签
     * User: zhaoh
     * Date: 2017/11/19
     * Time: 20:15
     */
    public function findCategory($data)
    {
        $order=[
            'category_id'=>'desc'
        ];

        return $this->where('name','like','%'.$data['name'].'%')
            ->order($order)
            ->paginate(12,false,['query'=>request()->param()]);
    }
    /**
     * 通过ID查询分类
     * User: zhaoh
     * Date: 2017/11/19
     * Time: 20:15
     */
    public function getCategoryById($article_id)
    {

        return $this->where('category_id',$article_id)->select();

    }
    /**
     * 跟新分类 通过查出ID跟新
     * User: zhaoh
     * Date: 2017/11/19
     * Time: 20:15
     */
    public function updCategory($data,$label_id){

        $article=[
            'name'=>$data['name'],
            'ovdate' =>date('Y-m-d',time())
        ];
        return $this->where('category_id',$label_id)->update($article);
    }
    public function updCategoryNumber($data,$label_id){

        $article=[
            'articlenumber'=>$data,
        ];
        return $this->where('category_id',$label_id)->update($article);
    }
    /**
     * 删除分类 通过ID.
     * User: zhaoh
     * Date: 2017/11/19
     * Time: 20:15
     */
    public function delCategory($article_id){
        return $this->where('category_id',$article_id)->delete();
    }


}