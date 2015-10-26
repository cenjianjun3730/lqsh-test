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
                <li><a href="<?php echo U('banner');?>">Banner</a></li>
                <li class="active"><a href="<?php echo U('pro');?>">产品</a>
                    <ul>
                        <li><a href="<?php echo U(pro);?>">添加产品</a></li>
                        <li style="background: #09c"><a href="<?php echo U('pro', array('c' => 'del'));?>">删除产品</a></li>
                    </ul>
                </li>                
                <li><a href="<?php echo U('dynamic');?>">动态</a></li>
                <li><a href="<?php echo U('message');?>">信息</a></li>
            </ul>
        </div>
        <div class="admin-bread">
            <span>您好，admin，欢迎您的光临。</span>
        </div>
    </div>
</div>

<div class="admin">
    <form action="<?php echo U('prodelete');?>" method="post">
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
                <th width="80">产品分类</th>
                <th width="200">产品名称</th>
                <th width="*">产品介绍</th>
                <th width="100">时间</th>
                <th width="95">操作</th>
            </tr>
            <?php if(is_array($data)): foreach($data as $key=>$v): ?><tr>
                    <td><input type="checkbox" name="id[]" value="<?php echo ($v["id"]); ?>" /></td>
                    <td><?php echo ($v["classify"]); ?></td>
                    <td><?php echo ($v["pro_name"]); ?></td>
                    <td><?php echo ($v["pro_introduction"]); ?></td>
                    <td><?php echo (date('Y-m-d', $v["time"])); ?></td>
                    <td>
                        <a class="button border-blue button-little" href="<?php echo U('prodeleteone', array('id' => $v['id']));?>">修改</a>
                        <a class="button border-yellow button-little" href="<?php echo U('prodeleteone', array('id' => $v['id']));?>" onclick="{if(confirm('确认删除?')){return true;}return false;}">删除</a>
                    </td>
                </tr><?php endforeach; endif; ?>
        </table>
        <div class="panel-foot text-center" style="height: 55px;">
            <ul class="pagination" style="display: <?php echo ($upDisplay); ?>"><li><a href="<?php echo ($upPage); ?>">上一页</a></li></ul>
            <ul class="pagination" style="display: <?php echo ($downDisplay); ?>"><li><a href="<?php echo ($downPage); ?>">下一页</a></li></ul>
        </div>
    </div>
    </form>
    <br />
</div>
</body>
</html>