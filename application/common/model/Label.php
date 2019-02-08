<?php
/**
 * Created by PhpStorm.
 * User: zhaoh
 * Date: 2017/11/23
 * Time: 22:01
 */

namespace app\common\model;


use think\Model;

class Label extends Model
{
    /**
     * 添加标签
     * User: zhaoh
     * Date: 2017/11/19
     * Time: 20:15
     */
    public function add($data){

        $data['sdate']=date('Y-m-d',time());
        $data['ovdate']=date('Y-m-d',time());
        return $this->save($data);
    }
    /**
     * 获取全部标签
     * User: zhaoh
     * Date: 2017/11/19
     * Time: 20:15
     */
    public function getLabel()
    {       $data="";

        return $this->where($data)
            ->select();
    }
    public function pageLabel()
    {       $data="";

        return $this->where($data)
            ->paginate(12);
    }
    public function tenLabel()
    {       $data="";
        $order=[
            'articlenumber'=>'desc'
        ];

        return $this->where($data)
            ->order($order)
            ->limit(12)
            ->select();
    }
    /**
     * 通过穿过来的参数模糊查询标签
     * User: zhaoh
     * Date: 2017/11/19
     * Time: 20:15
     */
    public function findLabel($data)
    {
        $order=[
            'label_id'=>'desc'
        ];

        return $this->where('name','like','%'.$data['name'].'%')
            ->order($order)
            ->paginate(12,false,['query' => request()->param()]);
    }
    /**
     * 通过ID查询标签
     * User: zhaoh
     * Date: 2017/11/19
     * Time: 20:15
     */
    public function getLabelById($article_id)
    {

        return $this->where('label_id',$article_id)->select();

    }
    /**
     * 跟新标签
     * User: zhaoh
     * Date: 2017/11/19
     * Time: 20:15
     */
    public function updLabel($data,$label_id){

        $article=[
            'name'=>$data['name'],
            'ovdate' =>date('Y-m-d',time())
        ];
        return $this->where('label_id',$label_id)->update($article);
    }
    public function updLabelNumber($data,$label_id){

        $article=[
            'articlenumber'=>$data,
        ];
        return $this->where('label_id',$label_id)->update($article);
    }
    /**
     * 删除标签  通过ID.
     * User: zhaoh
     * Date: 2017/11/19
     * Time: 20:15
     */
    public function delLabel($article_id){
        return $this->where('label_id',$article_id)->delete();
    }

}