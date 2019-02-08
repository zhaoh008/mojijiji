<?php
/**
 * Created by PhpStorm.
 * User: zhaoh
 * Date: 2017/11/26
 * Time: 7:06
 */

namespace app\admin\controller;
use think\Controller;

class wellsaying extends Base
{
    public function wellsaying()
    {
        $label=model("wellsaying")->pagewellsaying();
        return $this ->fetch('',['wellsaying'=>$label]);
    }
    /**
     * 添加标签
     * User: zhaoh
     * Date: 2017/11/19
     * Time: 12:53
     */
    public function savewellsaying()
    {
        $data=input('post.');

        $validate = validate('wellsaying');

        if (!$validate->check($data)) {
            $this->error($validate->getError());
        }
        $rus= model('wellsaying')->add($data);

    }
    /**
     * 修改标签
     * User: zhaoh
     * Date: 2017/11/19
     * Time: 12:53
     */
    public  function  updwellsaying($id){
        $name=input('post.content');
        $data=model('wellsaying')-> getwellsayingbyId($id);
        $data['content']=$name;
        $rus=model('wellsaying')->updwellsaying($data,$id);
        if($rus){
            $this->success('修改成功','wellsaying/wellsaying');
        }
        else{
            $this->error("修改失败");
        }
    }

    /**
     * 删除标签
     * User: zhaoh
     * Date: 2017/11/19
     * Time: 12:53
     */

    public function delwellsaying($id){
        $result= model('wellsaying')->delwellsaying($id);
        if($result){
            $this->success('删除成功','wellsaying/wellsaying');
        }
        else{
            $this->error("删除失败");
        }
    }/**
 * 查询标签
 * User: zhaoh
 * Date: 2017/11/19
 * Time: 12:53
 */
    public function findwellsaying($content)
    {   $data=['content'=>$content];
        $label=model("wellsaying")->findwellsaying($data);
        return $this ->fetch('wellsaying/wellsaying',['wellsaying'=>$label]);
    }
}