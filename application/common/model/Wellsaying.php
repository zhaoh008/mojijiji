<?php
/**
 * Created by PhpStorm.
 * User: zhaoh
 * Date: 2017/11/26
 * Time: 7:03
 */

namespace app\common\model;
use think\Model;

class wellsaying extends Model
{

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
    public function randwellsaying()
    {

        return $this->where('')
            ->order('rand()')
            ->limit(1)
            ->select();
    }
    public function getwellsaying()
    {       $data="";

        return $this->where($data)
            ->select();
    }
    public function pagewellsaying()
    {       $data="";

        return $this->where($data)
            ->paginate(12);
    }
    /**
     * 通过穿过来的参数模糊查询标签
     * User: zhaoh
     * Date: 2017/11/19
     * Time: 20:15
     */
    public function findwellsaying($data)
    {
        $order=[
            'id'=>'desc'
        ];

        return $this->where('content','like','%'.$data['content'].'%')
            ->order($order)
            ->paginate(12,false,['query'=>request()->param()]);
    }
    /**
     * 通过ID查询标签
     * User: zhaoh
     * Date: 2017/11/19
     * Time: 20:15
     */
    public function getwellsayingById($article_id)
    {

        return $this->where('id',$article_id)->select();

    }
    /**
     * 跟新标签
     * User: zhaoh
     * Date: 2017/11/19
     * Time: 20:15
     */
    public function updwellsaying($data,$label_id){

        $article=[
            'content'=>$data['content'],
            'ovdate' =>date('Y-m-d',time())
        ];
        return $this->where('id',$label_id)->update($article);
    }
    /**
     * 删除标签  通过ID.
     * User: zhaoh
     * Date: 2017/11/19
     * Time: 20:15
     */
    public function delwellsaying($article_id){
        return $this->where('id',$article_id)->delete();
    }
}