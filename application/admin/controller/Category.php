<?php
/**
 * Created by PhpStorm.
 * User: zhaoh
 * Date: 2017/11/23
 * Time: 20:07
 */

namespace app\admin\controller;
use think\Controller;


class Category extends Base
{
    public function category()
    {
        $label=model("Category")->getCategory();
        return $this ->fetch('',['category'=>$label]);
    }
    /**
     * 添加标签
     * User: zhaoh
     * Date: 2017/11/19
     * Time: 12:53
     */
    public function saveCategory()
    {
        $data=input('post.');

        $validate = validate('Category');

        if (!$validate->check($data)) {
            $this->error($validate->getError());
        }
        $rus= model('Category')->add($data);
        if($rus){
            $this->success('添加成功','Category/category');
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
    public  function  updCategory($label_id){
        $name=input('post.name');
        $data=model('Category')-> getCategoryById($label_id);
        $data['name']=$name;
        $rus=model('Category')->updCategory($data,$label_id);
        if($rus){
            $this->success('修改成功','Category/category');
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

    public function delCategory($id){
        $result= model('Category')->delCategory($id);
        if($result){
            $this->success('删除成功','Category/category' );
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
    public function findCategory($name)
    {   $data=['name'=>$name];
        $label=model("Category")->findCategory($data);
        return $this ->fetch('Category/category',['category'=>$label]);
    }
}