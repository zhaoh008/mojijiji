<?php
/**
 * Created by PhpStorm.
 * User: zhaoh
 * Date: 2017/11/30
 * Time: 16:39
 */

namespace app\common\model;


use think\Model;

class Comment extends Model
{ /**
 * 获取所有评论
 * User: zhaoh
 * Date: 2017/11/30
 * Time: 16:39
 */
    public function getComment(){
        return $this->where('')
            ->select();
    }
    /**
     * 获取对应文章下的评论
     * User: zhaoh
     * Date: 2017/11/30
     * Time: 16:39
     */
    public function getCommentById($id){
        return $this->where('forsome',$id)
                    ->select();
    }
    /**
     * 添加评论
     * User: zhaoh
     * Date: 2017/11/30
     * Time: 16:39
     */
    public function add($data){
        $data=[
            'content'=>$data['comment'],

        ];
    }
}