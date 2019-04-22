<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:73:"C:\wamp64\www\mojijiji\public/../application/index\view\index\search.html";i:1555384342;s:71:"C:\wamp64\www\mojijiji\public/../application/index\view\index\head.html";i:1555384342;s:73:"C:\wamp64\www\mojijiji\public/../application/index\view\index\header.html";i:1555384342;s:75:"C:\wamp64\www\mojijiji\public/../application/index\view\index\category.html";i:1555384342;s:72:"C:\wamp64\www\mojijiji\public/../application/index\view\index\label.html";i:1555384342;s:73:"C:\wamp64\www\mojijiji\public/../application/index\view\index\footer.html";i:1555384342;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>program-01的博客</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css"  href="__PUBLIC__/css/bootstrap.css " >
    <link rel="stylesheet" type="text/css"  href="__PUBLIC__/css/mojiji.css "  >
    <link href="favicon.ico" rel="shortcut icon">
    <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
    <link href="https://cdn.bootcss.com/bootstrap-validator/0.5.3/css/bootstrapValidator.min.css" rel="stylesheet">
    <script src="https://cdn.bootcss.com/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script>

    <script src="__PUBLIC__/js/bootstrap.js " ></script>
    <script src="__PUBLIC__/js/mojiji.js" ></script>
</head>
<body>
<div class="header"  style="background-image: url(__PUBLIC__/images/red5.jpg )"  >
    <div class="container">
        <div class="row">
            <div class="cl-xs-12">
                <h1  >
                    Program-01的博客。
                </h1>
            </div>
        </div>
        <div class="col-xs-12 hidden-xs hidden-sm">
            <?php if(is_array($tenlabel) || $tenlabel instanceof \think\Collection || $tenlabel instanceof \think\Paginator): $i = 0; $__LIST__ = $tenlabel;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <a href="<?php echo url('index/index/labelarticle',['name'=>$vo['name']]); ?>" class="btn  btn-doc" ><?php echo $vo['name']; ?></a>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            <a href="<?php echo url('index/index/labellist'); ?>" class="btn  btn-doc" >...</a>
        </div>
    </div>
</div>

<nav class="navbar-doc " role="navigation">
    <div class="container">
        <div class="row" >
            <div class="col-sm-12">
                <div class="navbar-header ">
                    <button type="button" class="navbar-toggle nav-menu" data-toggle="collapse" data-target="#menu1">
                        <span class="hanbao"></span>
                        <span class="hanbao"></span>
                        <span class="hanbao"></span>
                    </button>
                    <?php if($user): ?>
                    <div class="btn-group navbar-toggle  nav-img">
                        <div class="">
                            <a  href="#"  data-toggle="dropdown"><?php if($user['image']): ?>
                                <img src={"$user.image}"  class="img-circle img-responsive"
                                     style="width: 43px;margin-left: 20px">
                                <?php else: ?>
                                <img src="/static/images/touxiang.jpg"  class="img-circle img-responsive"
                                     style="width: 43px;margin-left: 20px">
                                <?php endif; ?>
                            </a>
                            <ul class="dropdown-menu" role="menu" >
                                <li class="disabled" >
                                    <a > <?php echo $user['username']; ?></a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="#">更换头像</a>
                                </li>
                                <li>
                                    <a href="#">修改个人资料</a>
                                </li>
                                <li class="disabled">
                                    <a href="#">我的空间
                                        <br>（开发中✿ﾟ▽ﾟ或者没必要？）</a>
                                </li>
                                <li class="divider"></li>
                                <li class="loginout">
                                    <a>注销</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <?php else: ?>
                    <button  class="navbar-toggle  nav-login" data-toggle="modal" data-target="#myModal" >登陆</button>
                    <?php endif; ?>
                    <button  class="navbar-toggle nav-search" data-toggle="collapse" data-target="#xialasearch" >
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="menu1">
                    <ul class="nav-doc">
                        <li><a href="<?php echo url('index/index/index'); ?>">首页</a></li>
                        <li><a href=" <?php echo url('index/index/labellist'); ?>">标签</a></li>
                        <li><a href="#">分类</a></li>
                        <li><a href="<?php echo url('index/index/tome'); ?>" >留言板</a></li>
                        <li ><a href="/api/phoneapi/checkphone">文章归档</a></li>

                        <div class="nav-search-login">
                            <form class="form-inline" id="mysearch" role="form" method="get" action="<?php echo url('index/index/search'); ?>">
                                <div class="form-group">
                                    <div class="input-group" >
                                        <input type="text" class="form-control form-control2" name="search" placeholder="搜索点啥?">
                                        <span class="input-group-btn">
						                <button type="submit" class="btn btn-default" >
                                        <span class="glyphicon glyphicon-search"></span>
						                </button>
					                </span>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <?php if($user): ?>
                        <div class="btn-group img-hide">
                            <div class="">
                                <a  href="#"  data-toggle="dropdown">
                                    <img src="/static/images/touxiang.jpg"  class="img-circle img-responsive"
                                         style="width: 43px;margin-left: 20px" ></a>
                                <ul class="dropdown-menu" role="menu" >
                                    <li class="disabled" >
                                        <a > <?php echo $user['username']; ?></a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="#">更换头像</a>
                                    </li>
                                    <li>
                                        <a href="#">修改个人资料</a>
                                    </li>
                                    <li class="disabled">
                                        <a href="#">我的空间（开发中✿ﾟ▽ﾟ或者没必要？）</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li class="loginout">
                                        <a>注销</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <?php else: ?>
                        <div class="btn-hide">
                            <button class=" btn btn-doc1"  style="margin-left:20px; " data-toggle="modal" data-target="#myModal">登陆</button>
                        </div>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="collapse" id="xialasearch" style="margin-top: 10px">
        <form  id="yoursearch" role="form" method="get" action="<?php echo url('index/index/search'); ?>">
            <div class="form-group">
                <div class="input-group" >
                    <input type="text" class="form-control form-control2" name="search" placeholder="搜索点啥?" >
                    <span class="input-group-btn">
						                <button type="submit" class="btn btn-default" >
                                        <span class="glyphicon glyphicon-search"></span>
						                </button>
					                </span>
                </div>
            </div>
        </form>
    </div>
</nav>
<div class="modal fade"style="margin-top: 233px" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <ul id="myTab" class="nav nav-tabs nav-tabs-doc" style="margin-top: 20px">
                <li class="active">
                    <a href="#home" data-toggle="tab">
                        登陆
                    </a>
                </li>
                <li><a href="#ios" data-toggle="tab">注册</a></li>
            </ul>
            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade in active" id="home">

                    <form id="login"  style="margin-top: 10px" method="post">

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group modal-input" >
                                    <div class="input-group ">
                    <span class="input-group-addon ">
                            <span class="glyphicon glyphicon-phone"></span>
                    </span>
                                        <input type="text" class="form-control form-control2" name="phone" maxlength="11" placeholder="请输入手机号">

                                    </div><!-- /input-group -->
                                </div>
                            </div><!-- /.col-lg-6 -->
                            <br>
                            <div class="col-lg-12">
                                <div class="form-group modal-input" >
                                    <div class="input-group ">
                    <span class="input-group-addon ">
                            <span class="glyphicon glyphicon-screenshot"></span>
                    </span>
                                        <input type="password" class="form-control form-control2" name="password" placeholder="老铁密码" >
                                    </div><!-- /input-group -->
                                </div>
                            </div>
                        </div><!-- /.row -->

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                            <button type="submit" class="btn btn-doc1">登陆</button>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="ios">
                    <form  id="register" style="margin-top: 10px" method="post">

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group modal-input">
                                    <div class="input-group ">
                    <span class="input-group-addon ">
                            <span class="glyphicon glyphicon-phone"></span>
                    </span>

                                        <input type="text" id="phone" class="form-control form-control2" placeholder="仅支持大陆手机号"name="phone" maxlength="11">
                                    </div><!-- /input-group -->
                                </div>
                            </div><!-- /.col-lg-6 -->
                            <br>
                            <div class="col-lg-12">
                                <div class="form-group modal-input">
                                    <div class="input-group ">
                    <span class="input-group-btn ">
                        <a id="sendsms"  class="btn btn-doc3">获取验证码</a>
                    </span>

                                        <input type="text" id="yanzhengma" class="form-control form-control2" placeholder="验证码" name="yanzhengma" maxlength="6">
                                    </div><!-- /input-group -->
                                </div>
                            </div><!-- /.col-lg-6 -->
                            <br>
                            <div class="col-lg-12">
                                <div class="form-group modal-input">
                                    <div class="input-group ">
                    <span class="input-group-addon ">
                                    <span class="glyphicon glyphicon-user"></span>
                    </span>
                                        <input type="text" class="form-control form-control2" placeholder="取个名吧" name="username" maxlength="8">
                                    </div><!-- /input-group -->
                                </div>
                            </div>
                            <br>
                            <div class="col-lg-12">
                                <div class="form-group modal-input">
                                    <div class="input-group ">
                    <span class="input-group-addon ">
                                    <span class="glyphicon glyphicon-screenshot"></span>
                    </span>
                                        <input type="password" class="form-control form-control2" placeholder="老铁密码" name="password">
                                    </div><!-- /input-group -->
                                </div>
                            </div>
                            <br>
                            <div class="col-lg-12">
                                <div class="form-group modal-input">
                                    <div class="input-group ">
                    <span class="input-group-addon ">
                                    <span class="glyphicon glyphicon-screenshot"></span>
                    </span>
                                        <input type="password" class="form-control form-control2" placeholder="再次密码" name="againpassword">
                                    </div><!-- /input-group -->
                                </div>
                            </div>
                        </div><!-- /.row -->

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                            <button  type="submit" class="btn btn-doc1">注册</button>
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>
<div class="alert-box" id="alert">
    <div  class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert"
                aria-hidden="true">
            &times;
        </button>
        <span id="success"> </span>
    </div>
</div>
<section >
    <div class="container " >
        <div class="row" >
            <main class="col-md-8 " >
                <div class="post" >

                    <div class="post-content" >
                        <p></p>
                        <h3>搜索到下面这些文章</h3>
                        <p></p>

                    </div>
                    <footer class="post-footer " >
                        <p style="color: #ff6766"><?php echo emptyarticle($article); ?></p>
                    </footer>
                </div>
                <?php if(is_array($article) || $article instanceof \think\Collection || $article instanceof \think\Paginator): $i = 0; $__LIST__ = $article;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <article class="post" >
                    <div class="post-head " >
                        <h1 class="post-title " >
                            <a href="<?php echo url('index/index/seeArticle',['article_id'=>$vo['article_id']]); ?>" ><?php echo $vo['title']; ?></a>
                        </h1>
                        <div class="post-meta" >
                            <sapn class="author">
                                作者：<a href="#" ><?php echo $vo['author']; ?></a>
                            </sapn>
                            ·
                            <time class="post-date" ><?php echo $vo['ovdate']; ?></time>
                        </div>
                    </div>
                    <div class="featured-madia" >
                        <a href="<?php echo url('index/index/seeArticle',['article_id'=>$vo['article_id']]); ?>"  ><img src="<?php echo $vo['image']; ?>" class="img-responsive"></a>
                    </div>
                    <div class="post-content" >
                        <p></p>
                        <p><?php echo $vo['adescribe']; ?></p>
                        <p></p>
                    </div>
                    <div class="post-permalink">
                        <a href=" <?php echo url('index/index/seeArticle',['article_id'=>$vo['article_id']]); ?>" class="btn btn-doc1">阅读全文</a>
                    </div>
                    <footer class="post-footer " >
                        <span class="glyphicon glyphicon-folder-open"></span><?php echo $vo['label']; ?>
                    </footer>
                </article>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                <div class="page-doc" >
                    <?php echo $article->render(); ?>
                </div>
            </main>
            <div class="col-md-4" >
                <div class="widget" >
                    <div class="title" >
                        <h3>有趣的话</h3>
                    </div>
                    <div class="content1" >
                        <?php if(is_array($wellsaying) || $wellsaying instanceof \think\Collection || $wellsaying instanceof \think\Paginator): $i = 0; $__LIST__ = $wellsaying;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <?php echo $vo['content']; endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                </div>
                <div class="widget" >
    <div class="title" >
        <h3>分类</h3>
    </div>
    <div class="content1" >
        <?php if(is_array($category) || $category instanceof \think\Collection || $category instanceof \think\Paginator): $i = 0; $__LIST__ = $category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <a href="<?php echo url('index/index/categoryArticle',['name'=>urldecode($vo['name'])]); ?>" class="btn  btn-doc4" ><span class="badge badge-doc pull-right "><?php echo $vo['articlenumber']; ?></span><?php echo $vo['name']; ?></a>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
</div>
                <div class="widget" >
    <div class="title" >
        <h3>标签</h3>
    </div>
    <div class="content1" >
            <?php if(is_array($tenlabel) || $tenlabel instanceof \think\Collection || $tenlabel instanceof \think\Paginator): $i = 0; $__LIST__ = $tenlabel;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <a href="<?php echo url('index/index/labelarticle',['name'=>$vo['name']]); ?>" class="btn  btn-doc2" ><?php echo $vo['name']; ?></a>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            <a href="<?php echo url('index/index/labellist'); ?>" class="btn  btn-doc2" >...</a>
    </div>
</div>
            </div>
        </div>
    </div>
    </div>
</section>
<div id="to-top" onclick="GoTop ()" >
    <span class="glyphicon glyphicon-chevron-up " ></span>
</div>
</body>
<div class="copyright">
    <div class="container">
        <div class="row" >
            <div class="col-sm-12" >
                <span>Copyright ©<a href="http://www.program-01.cn/" style="color: #ff6766">program-01</a></span>
            </div>
        </div>
    </div>
</div>
</html>