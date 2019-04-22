<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:79:"C:\wamp64\www\mojijiji\public/../application/admin\view\article\addarticle.html";i:1555384342;s:71:"C:\wamp64\www\mojijiji\public/../application/admin\view\index\head.html";i:1555384342;s:73:"C:\wamp64\www\mojijiji\public/../application/admin\view\index\header.html";i:1555384342;}*/ ?>
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
    <div class="container " >
        <div class="row" >
            <div class="col-md-12 " >
                <div class="post ">
                    <div class="post-head" >
                        <h1 class="post-title">
                            添加文章
                        </h1>
                    </div>
                    <div class="post-content">
                    <form method="post" action="<?php echo url('article/savearticle'); ?>"  role="form">
                        <div class="form-group">
                            <label for="title">标题：</label>
                            <input type="text" class="form-control form-control1"  id="title" name="title" placeholder="请输入文章标题">
                        </div>
                        <div class="form-group">
                        <label for="author">作者：</label>
                        <input type="text" class="form-control form-control1" id="author" name="author" value="墨叽叽">
                        </div>
                        <div class="form-group">
                            <label for="file_upload">文章缩略图：</label>
                            <div style="display: inline-block">
                                <input type="file"  id="file_upload" >
                            </div>
                        </div>
                        <img id="wa" class="img-responsive">
                        <div class="form-group">
                            <label for="savename">图片地址：</label>
                            <input type="text"  class="form-control form-control1"id="savename" name="image" value="" readonly="true">
                        </div>
                        <div class="form-group">
                            <label>分类：</label>
                            <select class="form-control form-control1" name="category" id="category" >
                                <?php if(is_array($category) || $category instanceof \think\Collection || $category instanceof \think\Paginator): $i = 0; $__LIST__ = $category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$category): $mod = ($i % 2 );++$i;?>
                                <option  ><?php echo $category['name']; ?></option>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </div>
                        <p><label>标签：</label></p>
                        <?php if(is_array($label) || $label instanceof \think\Collection || $label instanceof \think\Paginator): $i = 0; $__LIST__ = $label;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$label): $mod = ($i % 2 );++$i;?>
                        <label class="checkbox-inline">
                            <input type="checkbox" value="<?php echo $label['name']; ?>" name="label1[]"> <?php echo $label['name']; ?>
                        </label>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                      <div>
                          <label for="describe">文章描述：</label>
                          <textarea class="form-control form-control2" rows="3" id="describe"  name="adescribe"></textarea>

                          <label for="editor">文章内容：</label>
                          <textarea rows="18" id="editor" name="content" ></textarea>

                          <button type="submit" class="btn btn-doc1">上传</button>
                      </div>
                    </form>
                </div>
                    <footer class="post-footer " >

                    </footer>
                </div>
            </div>
        </div>
        </div>

</section>
<script type="text/javascript">
    var ue = UE.getEditor('editor');
</script>
<script>
    $(function() {
        $("#file_upload").uploadify({
            swf           : '__PUBLIC__/uploadify/uploadify.swf',
            'buttonText'  : '图片上传',
            'fileSizeLimit' : '2000KB',
            'fileTypeDesc'  : '你需要一些文件',
            'fileTypeExts'  : '*.gif; *.jpg; *.png',
            uploader      : "<?php echo url('admin/article/uploadimage'); ?>",
            'onUploadSuccess':function(file, data, response){
                console.log(data);
                console.log(file);
                console.log(response);
                $("#savename").attr("value","/uploads/"+data);
                $("#wa").attr("src","/uploads/"+data);
            }
        });
    });
</script>
</body>
</html>