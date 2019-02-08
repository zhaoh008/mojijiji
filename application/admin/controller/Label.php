<?php
/**
 * Created by PhpStorm.
 * User: zhaoh
 * Date: 2017/11/23
 * Time: 20:07
 */

namespace app\admin\controller;
use think\Controller;


class Label extends Base
{
    public function label()
    {
        $label=model("Label")->pageLabel();
        return $this ->fetch('',['label'=>$label]);
    }
    public function getLabel()
    {
        $data=model("Label")->getLabel();
        return json_encode($data);
    }
    /**
     * 添加标签
     * User: zhaoh
     * Date: 2017/11/19
     * Time: 12:53
     */
    public function savelabel()
    {
        $data=input('post.');

        $validate = validate('Label');

        if (!$validate->check($data)) {
            $this->error($validate->getError());
        }
        $rus= model('Label')->add($data);
        if($rus){
            $this->success('添加成功','label/label');
        }
        else{
            $this->error("添加失败");
        }
    }
/**
 * 修改标签
 * User: zhaoh
 * Date: 2017/11/19
 * Time: 12:53
 */
      public  function  updLabel($label_id){
          $name=input('post.name');
          $data=model('Label')-> getLabelById($label_id);
          $data['name']=$name;
          $rus=model('Label')->updLabel($data,$label_id);
          if($rus){
              $this->success('修改成功','label/label');
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

    public function delLabel($id){
        $result= model('Label')->delLabel($id);
        if($result){
            $this->success('删除成功','label/label');
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
    public function findLabel($name)
    {   $data=['name'=>$name];
       $label=model("Label")->findLabel($data);
        return $this ->fetch('label/label',['label'=>$label]);
    }
}