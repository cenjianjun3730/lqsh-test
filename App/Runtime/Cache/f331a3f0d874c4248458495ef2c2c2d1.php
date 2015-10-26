<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>

<head>
    <title>首页</title>
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="keywords" content="<?php echo ($seo["0"]["seo"]); ?>" />
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <!--[if lt IE 9]>
    <script src="http://res.nie.netease.com/comm/html5/html5shiv.js"></script>
    <![endif]-->

    <!--页面直接引用less文件-->
    <link type="text/css" rel="stylesheet" href="__PUBLIC__/css/index.css">
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
					<a href="<?php echo U('Index/index');?>" class="nav-hover" >
						<span>首页</span>
						<div></div>
					</a>
				</li>
				<li>
					<a href="<?php echo U('Pro/pro');?>" >
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



<section class="banner">
	<div class="container">
		<div id="slides">
			<?php if(is_array($banner)): foreach($banner as $key=>$v): ?><a href="javascript:;">
					<img src="__PUBLIC__<?php echo ($v["address"]); ?>" alt="banner1" width="1366", height="500">	
				</a><?php endforeach; endif; ?>
		<a href="javascript:;" class="slidesjs-previous slidesjs-navigation prev"><i class="icon-chevron-left"></i></a>
      		<a href="javascript:;" class="slidesjs-next slidesjs-navigation next"><i class="icon-chevron-right"></i></a>
		</div>
	</div>
</section>

<section class="case competitive">
	<div class="top">
		<p>
			<span>精选产品</span>
			<br />
			<i>FEATURED PRODUCTS</i>
			<br />
			<b></b>
		</p> 
	</div>
	<div class="center">
		<div class="pro">
			<?php if(is_array($topPro)): foreach($topPro as $key=>$v): ?><a href="<?php echo U('Pro/pdetail', array('id' => $v['id']));?>" target="_blank">
					<div class="pro-case">
						<img src="__PUBLIC__<?php echo ($v["pro_img"]); ?>" alt="" width="250" height="180">
						<div class="pro-shade">
							<div class="search"></div>
							<div class="title">
								<div class="title-bg"></div>
								<span><?php echo ($v["pro_name"]); ?></span>
							</div>
						</div>
					</div>
				</a><?php endforeach; endif; ?>
		</div>
	</div>
</section>

<section class="case introduction">
	<div class="top">
		<p>
			<span>产品介绍</span>
			<br />
			<i>PRODUCT INTRODUCTION</i>
			<br />
			<b></b>
		</p> 
	</div>
	<div class="center">
		<div class="intd">
			<p class="text"><?php echo ($introduction); ?></p>
		</div>
		<div class="pro clear">
			<div class="pcont" id="ISL_Cont_1">
				<div class="ScrCont">
					<div class="clear pro-box" id="List1_1">
						<?php if(is_array($showPro)): foreach($showPro as $key=>$v): ?><a href="<?php echo U('Pro/pdetail', array('id' => $v['id']));?>" target="_blank">
								<div class="pro-case">
									<img src="__PUBLIC__<?php echo ($v["pro_img"]); ?>" alt="" width="250" height="180">
									<div class="pro-shade">
										<div class="search"></div>
										<div class="title">
											<div class="title-bg"></div>
											<span><?php echo ($v["pro_name"]); ?></span>
										</div>
									</div>
								</div>
							</a><?php endforeach; endif; ?>
					</div>
					<div class="clear pro-box" id="List2_1"></div>
				</div>
			</div>
			<a href="javascript:;" class="prev" onmousedown="ISL_GoUp_1()" onmouseup="ISL_StopUp_1()" onmouseout="ISL_StopUp_1()"></a>
			<a href="javascript:;" class="next" onmousedown="ISL_GoDown_1()" onmouseup="ISL_StopDown_1()" onmouseout="ISL_StopDown_1()"></a>
		</div>
		<a class="more" href="<?php echo U('Pro/pro');?>" target="_blank">更多</a>
	</div>
</section>


<section class="case contact">
	<div class="top">
		<p>
			<span>联系我们</span>
			<br />
			<i>CONTACT US</i>
			<br />
			<b></b>
		</p> 
	</div>
	<div class="center">
		<div class="dt">
			<img src="__PUBLIC__/img/index-dt.jpg" alt="我们的地址">
		</div>
		<div class="info">
			<div class="src">
				<div class="icon"></div>
				<p class="title">公司总地址</p>
				<p class="text">文案文案文案文案文案文案文案文案</p>
			</div>
			<div class="phonto">
				<div class="icon"></div>
				<p class="title">电话／传真</p>
				<p class="text">文案文案文案文案文案文案文案文案</p>
			</div>
			<div class="mail">
				<div class="icon"></div>
				<p class="title">电子邮箱</p>
				<p class="text">文案文案文案文案文案文案文案文案</p>
			</div>
		</div>
	</div>
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
<script type="text/javascript" charset="utf-8" src="__PUBLIC__/pkg/auto_combine_3cc07.js"></script>
</body>

</html>