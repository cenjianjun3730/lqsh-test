<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
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
                        <li><a href="<?php echo U(banner);?>">添加Banner</a></li>
                        <li style="background: #09c"><a href="<?php echo U('banner', array('c' => 'del'));?>">删除Banner</a></li>
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
    <form action="<?php echo U('bannerdelete');?>" method="post">
    <div class="panel admin-panel">
        <div class="panel-head"><strong>信息列表</strong></div>
        <div class="padding border-bottom">
            <input type="button" class="button button-small checkall" name="checkall" checkfor="<?php echo ($v["id"]); ?>" value="全选" />
            <a onclick="{if(confirm('确认删除?')){return true;}return false;}">
                <input type="submit" class="button button-small border-yellow" value="批量删除" />
            </a>
        </div>
        <table class="table table-hover">
            <tr>
                <th width="45">选择</th>
                <th width="*">Banner</th>
                <th width="100">时间</th>
                <th width="60">操作</th>
            </tr>
            <?php if(is_array($data)): foreach($data as $key=>$v): ?><tr>
                    <td><input type="checkbox" name="id[]" value="<?php echo ($v["id"]); ?>" /></td>
                    <td><img src="__PUBLIC__<?php echo ($v["address"]); ?>" width="800" height="293"></td>
                    <td><?php echo (date('Y-m-d',$v["time"])); ?></td>                
                    <td>
                        <a class="button border-yellow button-little" href="<?php echo U('bannerdeleteone', array('id' => $v['id']));?>" onclick="{if(confirm('确认删除?')){return true;}return false;}">删除</a>
                    </td>
                </tr><?php endforeach; endif; ?>
        </table>
    </div>
    </form>
    <br />
</div>
</body>
</html>