<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>

<head>
    <title>标题</title>
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="keywords" content="<?php echo ($seo["0"]["seo"]); ?>" />
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <!--[if lt IE 9]>
    <script src="http://res.nie.netease.com/comm/html5/html5shiv.js"></script>
    <![endif]-->

    <!--页面直接引用less文件-->
    <link type="text/css" rel="stylesheet" href="__PUBLIC__/css/pro.view.css">
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
					<a href="<?php echo U('Pro/pro');?>"  class="nav-hover" >
						<span>产品</span>
						<div></div>
					</a>
				</li>
				<li>
					<a href="<?php echo U('Dynamic/dynamic');?>" >
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
		<div class="mianbao">
			<a href="<?php echo U('Pro/pro');?>">产品</a>
			<span>></span>
			<a href="<?php echo U('Pro/pro');?>">全部产品</a>
			<span>></span>
			<a class="hover" href="<?php echo U();?>"><?php echo ($pdetail["0"]["pro_name"]); ?></a>
		</div>
		<div class="title">
			<h1><?php echo ($pdetail["0"]["pro_name"]); ?></h1>
			<span><?php echo (date('Y-m-d', $pdetail["0"]["time"])); ?></span>
		</div>
	</section>
	<section class="bottom clear">
		<div class="text">
			<img src="__PUBLIC__<?php echo ($pdetail["0"]["pro_img"]); ?>" alt="" width="940" height="350">
			<br />
			<br />
			<p><?php echo ($introduction); ?></p>
		</div>
		<div class="page">
			<a title="上一个产品" style="display: <?php echo ($upDisplay); ?>" href="<?php echo U('pdetail', array('id' => $upPro['0']['id']));?>">
				<div class="page-prev"></div>
			</a>
			<a title="下一个产品" style="display: <?php echo ($downDisplay); ?>" href="<?php echo U('pdetail', array('id' => $downPro['0']['id']));?>">
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