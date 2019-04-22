<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:72:"C:\wamp64\www\mojijiji\public/../application/admin\view\login\index.html";i:1555384342;s:71:"C:\wamp64\www\mojijiji\public/../application/admin\view\index\head.html";i:1555384342;}*/ ?>
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
            </div>
        </div>

    </div>
</div>
<section >
    <div class="container " >
        <div class="row" >
            <div class="col-md-12 " >
                <div class="post ">
                    <div class="post-head" >
                        <h1 class="post-title">
                            管理员登陆
                        </h1>
                    </div>
                    <div class="post-content">
                        <form method="post" action="<?php echo url('login/index'); ?>" role="form">
                            <div class="form-group" style="margin-left: 25%">
                                <label for="title">账户：</label>
                                <input type="text" class="form-control form-control1"  id="title" name="name" placeholder="请输入用户名">
                            </div>
                            <div class="form-group"style="margin-left: 25%">
                                <label for="author">密码：</label>
                                <input type="password" class="form-control form-control1" id="author" name="password" placeholder="请输入密码">
                            </div>
                            <button type="submit" class="btn btn-doc1" style="margin-left: 61%">登陆</button>
                        </form>
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