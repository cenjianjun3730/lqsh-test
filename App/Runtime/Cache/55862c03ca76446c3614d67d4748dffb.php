<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>后台管理</title>
    <link rel="stylesheet" href="__PUBLIC__/css/pintuer.css">
    <link rel="stylesheet" href="__PUBLIC__/css/admin.css">
    <script src="__PUBLIC__/js/jquery.js"></script>
    <script src="__PUBLIC__/js/pintuer.js"></script>
    <script src="__PUBLIC__/js/respond.js"></script>
    <script src="__PUBLIC__/js/admin.js"></script>
    <link type="image/x-icon" href="/favicon.ico" rel="shortcut icon" />
    <link href="/favicon.ico" rel="bookmark icon" />
</head>

<body>
<div class="lefter">
    <div class="logo"><img src="__PUBLIC__/img/logo.jpg" alt="后台管理系统" /></div>
</div>
<div class="righter nav-navicon" id="admin-nav">
    <div class="mainer">
        <div class="admin-navbar">
            <span class="float-right">
                <a class="button button-little bg-main" href="<?php echo U('Index/index');?>" target="_blank">前台首页</a>
                <a class="button button-little bg-yellow" href="<?php echo U('quit');?>">注销登录</a>
            </span>
            <ul class="nav nav-inline admin-nav">
                <li class="active"><a href="<?php echo U('banner');?>"> Banner</a>
                    <ul>
                        <li style="background: #09c"><a href="<?php echo U(banner);?>">添加Banner</a></li>
                        <li><a href="<?php echo U('banner', array('c' => 'del'));?>">删除Banner</a></li>
                    </ul>
                </li>
                <li><a href="<?php echo U('pro');?>">产品</a></li>
                <li><a href="<?php echo U('dynamic');?>">动态</a></li>
                <li><a href="<?php echo U('message');?>">信息</a></li>
                <li><a href="<?php echo U('company');?>">其他</a></li>
            </ul>
        </div>
        <div class="admin-bread">
            <span>您好，admin，欢迎您的光临。</span>
        </div>
    </div>
</div>

<div class="admin">
    <div class="tab">
      <div class="tab-body">
        <br />
        <div class="tab-panel active" id="tab-set">
            <form method="post" class="form-x" action="<?php echo U('bannerupdata');?>" enctype="multipart/form-data">
                <div class="form-group">
                    <p style="color:#f00; margin-left: 95px;">只支持以下格式图片上传：jpg，gif。<br/>图片建议尺寸：1366*500，否则图片可能会变形！<br/>如果没有图片上传，系统将采用默认图片。</p>
                    <div class="label"><label for="logo">Banner：</label></div>
                    <div class="field">
                        <input type="file" name="file" style="margin-top: 8px;"/>
                    </div>
                </div>
                <div class="form-button"><input class="button bg-main" type="submit" value="提  交"></div>
            </form>
        </div>
      </div>
    </div>
</div>
</body>
</html>