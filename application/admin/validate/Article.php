<?php
/**
 * Created by PhpStorm.
 * User: zhaoh
 * Date: 2017/11/19
 * Time: 14:33
 */
namespace app\admin\validate;
use think\Validate;
class Article extends   Validate
{
    protected $rule=[
      ['title','require','文章标题不能为空' ],
      ['author','require','文章作者不能为空' ],
        ['category','require','请选择分类' ],
        ['label1','require','请选择标签' ],
        ['adescribe','require','文章描述不能为空' ],
         ['content','require','文章内容不能为空' ],
    ];
}