<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>

<head>
    <title>动态</title>
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="keywords" content="<?php echo ($seo["0"]["seo"]); ?>" />
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <!--[if lt IE 9]>
    <script src="http://res.nie.netease.com/comm/html5/html5shiv.js"></script>
    <![endif]-->

    <!--页面直接引用less文件-->
    <link type="text/css" rel="stylesheet" href="__PUBLIC__/css/company.css">
</head>

<body>

    <!--内嵌inline/index.html文件-->
    <nav class="nav clear">
	<div class="nav-top">
		<a href="<?php echo U('Index/index');?>">
			<div class="logo"></div>
		</a>
		<div class="nav-box">
			<ul class="clear">
				<li>
					<a href="<?php echo U('Index/index');?>">
						<span>首页</span>
						<div></div>
					</a>
				</li>
				<li>
					<a href="<?php echo U('Pro/pro');?>">
						<span>产品</span>
						<div></div>
					</a>
				</li>
				<li>
					<a href="<?php echo U('Dynamic/dynamic');?>"  class="nav-hover" >
						<span>动态</span>
						<div></div>
					</a>
				</li>
				<li>
					<a href="<?php echo U('About/about');?>" >
						<span>关于</span>
						<div></div>
					</a>
				</li>
			</ul>
		</div>
	</div>
</nav>

<section class="center">
	<section class="top clear">
		<h3>公司动态<br /> <span>DYNAMIC COMPANY</span></h3>
		<div class="nav">
			<a <?php if(!$_GET['c']) echo'class="hover"';?> href="<?php echo U('Dynamic/dynamic');?>">全部动态</a>
			<a <?php if($_GET['c']==1) echo'class="hover"';?> href="<?php echo U('Dynamic/dynamic', array('c' => 1));?>">第一分类</a>
		</div>
	</section>
	<section class="bottom clear">
		<div class="text">
			<?php if(is_array($dynamic)): foreach($dynamic as $key=>$v): ?><div class="case">
					<a href="<?php echo U('detail', array('id' => $v['id']));?>" target="_blank" style="color: #484747">
						<h3><?php echo ($v["dynamic_name"]); ?></h3>
					</a>
					<span>Article name</span>
					<p><?php echo ($v["dynamic_content"]); ?></p>
					<p style="float: right;"><?php echo (date('Y-m-d', $v["time"])); ?></p>		
				</div><?php endforeach; endif; ?>
		</div>
		<div class="page">
				<a title="上一页" href="<?php echo ($upPage); ?>" style="display: <?php echo ($upDisplay); ?>">
					<div class="page-prev"></div>
				</a>
			<a title="下一页" href="<?php echo ($downPage); ?>" style="display: <?php echo ($downDisplay); ?>">
				<div class="page-next"></div>
			</a>
		</div>
	</section>
</section>

<footer>
	<div class="footer-body">
		<div class="about">
			<p class="clear">
				<i></i>
				<span>关于我们</span>
			</p>
			<a href="javascript:;">超链接接</a>
			<a href="javascript:;">超链接接</a>
			<a href="javascript:;">超链接接</a>
			<a href="javascript:;">超链接接</a>
			<a href="javascript:;">超链接接</a>
		</div>
		<div class="link">
			<p class="clear">
				<i></i>
				<span>友情链接</span>
			</p>
			<a href="javascript:;">超链接接</a>
			<a href="javascript:;">超链接接</a>
			<a href="javascript:;">超链接接</a>
			<a href="javascript:;">超链接接</a>
			<a href="javascript:;">超链接接</a>
		</div>
		<div class="fans">
			<p class="clear">
				<i></i>
				<span>关注我们</span>
			</p>
			<a title="新浪微博" class="weibo" href="javascript:;">新浪微博</a>
			<a title="腾讯客服" class="qq" href="javascript:;">腾讯客服</a>
		</div>
	</div>
	<div class="copyright">
		<p>©2015-2016</p>
	</div>
</footer>

    <!-- jquery-1.8.3 -->
    <!--lib中的文件，自动合并为一个文件-->

	<script type="text/javascript" charset="utf-8" src="__PUBLIC__/pkg/lib.js"></script>
<script type="text/javascript" charset="utf-8" src="__PUBLIC__/pkg/pro.js"></script>
</body>

</html>