<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:78:"C:\wamp64\www\mojijiji\public/../application/admin\view\category\category.html";i:1555384342;s:71:"C:\wamp64\www\mojijiji\public/../application/admin\view\index\head.html";i:1555384342;s:73:"C:\wamp64\www\mojijiji\public/../application/admin\view\index\header.html";i:1555384342;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>program-01的博客</title>
    <link rel="stylesheet" type="text/css"  href="__PUBLIC__/css/bootstrap.css " >
    <link rel="stylesheet" type="text/css"  href="__PUBLIC__/css/mojiji.css "  >
    <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="__PUBLIC__/js/bootstrap.js " ></script>
    <script src="__PUBLIC__/js/mojiji.js" ></script>
    <script type="text/javascript" charset="utf-8" src="__PUBLIC__/editor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="__PUBLIC__/editor/ueditor.all.min.js"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="__PUBLIC__/editor/lang/zh-cn/zh-cn.js"></script>
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/uploadify/uploadify.css" />
    <script type="text/javascript" src="__PUBLIC__/uploadify/jquery.uploadify.js"></script>
    <script type="text/javascript" src="__PUBLIC__/js/image.js"></script>

</head>
<body>
<div class="header"  style="background-image: url(/static/images/red5.jpg )"  >
    <div class="container">
        <div class="row">
            <div class="cl-xs-12">
                <h1  >
                    Program-01后台博客管理系统。
                </h1>
                <?php if($admin): ?>
                <p> 管理员<?php echo $admin->name; ?><a style="color: #0f0f0f " href="<?php echo url('login/loginout'); ?>">退出</a></p>
                <?php endif; ?>
            </div>
        </div>

    </div>
</div>
<nav class="navbar-doc " role="navigation">
    <div class="container">
        <div class="row" >
            <div class="col-sm-12">
                <div class="navbar-header ">
                    <button type="button" class="navbar-toggle nav-toggle " data-toggle="collapse" data-target="#menu1">
                        <span class="hanbao"></span>
                        <span class="hanbao"></span>
                        <span class="hanbao"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse " id="menu1">
                    <ul class="nav-doc">
                        <li><a href="<?php echo url('index/index'); ?> ">文章管理</a></li>
                        <li><a href=" <?php echo url('label/label'); ?>">管理用户</a></li>
                        <li><a href="label.html ">管理评论</a></li>
                        <li><a href="<?php echo url('category/category'); ?>">管理分类</a></li>
                        <li><a href="<?php echo url('label/label'); ?>">管理标签</a></li>
                        <li><a href="<?php echo url('wellsaying/wellsaying'); ?>">管理名言</a></li>
                        <li><a href="<?php echo url('index/index/index'); ?>">博客首页</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>
<section >
    <div class=" container-fluid " >
        <div class="row" >
            <div class="col-md-12 " >
                <div class="post ">
                    <div class="post-head" >
                        <h1 style="text-align: center ">
                            分类管理
                        </h1>

                    </div>
                    <div class="post-content" >
                        <form class="form-inline" role="form" method="post" action="<?php echo url('category/findCategory'); ?>">
                            <div class="form-group">
                                <label  for="name">分类名称:</label>
                                <input type="text" class="form-control form-control2" id="name" placeholder="请输入分类名称" name="name">
                            </div>
                            <button type="submit" class="btn btn-doc1">查询</button>
                        </form>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>操作</th>
                                    <th>名称</th>
                                    <th>文章总数</th>
                                    <th>日期</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if(is_array($category) || $category instanceof \think\Collection || $category instanceof \think\Paginator): $i = 0; $__LIST__ = $category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                <tr> <td><a data-toggle="modal" data-target="#myModal<?php echo $vo['category_id']; ?>"><span class="glyphicon glyphicon-tags">修改</span></a>&nbsp;
                                    <div class="modal " style="margin-top: 100px" id="myModal<?php echo $vo['category_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLab">修改分类</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                </div>
                                                <form method="post" style="margin-top: 10px" action="<?php echo url('category/updCategory',['label_id'=>$vo['category_id']]); ?>" role="form">
                                                    <div class="form-group">
                                                        <label for="title1">标签分类：</label>
                                                        <input type="text" class="form-control form-control1"  id="title1" name="name" value="<?php echo $vo['name']; ?>">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                                                        <button type="submit" class="btn btn-doc1">修改</button>
                                                    </div>
                                                </form>

                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal -->
                                    </div>
                                    <a data-toggle="modal" data-target="#myModa<?php echo $vo['category_id']; ?>"><span class="glyphicon glyphicon-trash">删除</span></a></td>
                                    <div class="modal " style="margin-top: 100px" id="myModa<?php echo $vo['category_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                </div>

                                                <div class="post-head " >
                                                    <h1 class="post-title " >
                                                        确定要删除么？删除后无法恢复
                                                    </h1>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                                                    <a href="<?php echo url('category/delCategory',['id'=>$vo['category_id']]); ?>" class="btn btn-doc1">确定</a>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal -->
                                    </div>
                                    <td><?php echo $vo['name']; ?></td>
                                    <td><?php echo $vo['articlenumber']; ?></td>
                                    <td><?php echo $vo['ovdate']; ?></td>
                                </tr>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>



                    <div class="post-permalink">
                        <a data-toggle="modal" data-target="#myModal1" class="btn btn-doc1">添加分类</a>
                        <div class="modal " style="margin-top: 100px" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel">添加分类</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    </div>
                                    <form method="post" style="margin-top: 10px" action="<?php echo url('category/saveCategory'); ?>" role="form">
                                        <div class="form-group">
                                            <label for="title">分类名称：</label>
                                            <input type="text" class="form-control form-control1"  id="title" name="name" placeholder="请输入分类名称">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                                            <button type="submit" class="btn btn-doc1">添加</button>
                                        </div>
                                    </form>

                                </div><!-- /.modal-content -->
                            </div><!-- /.modal -->
                        </div>
                    </div>
                    <footer class="post-footer " >

                    </footer>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
</body>
</html>