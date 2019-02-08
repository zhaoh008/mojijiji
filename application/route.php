<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

use think\Route;

Route::rule('read/:article_id','index/index/seearticle');
Route::rule('category/:name','index/index/categoryArticle');
Route::rule('label/:name','index/index/labelarticle');
Route::rule('label/:name','index/index/labelarticle');
Route::rule('tome','index/index/tome');
Route::rule('home','index/index/index');
Route::rule('label','index/index/labellist');