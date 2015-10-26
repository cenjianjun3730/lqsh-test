<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
    <title>后台登录</title>
</head>
<body>
    <div style="width:201px; margin: 0 auto; padding-top: 200px;">
        <p style="text-align: center">后台登录</p>
        <form action="<?php echo U('login');?>" method="post">
            帐号：<input type="text" name="username">
            密码：<input type="password" name="pwd" style="margin-top: 20px;">
            <input type="submit" value="登录" style="float: right; margin-top: 20px;">
        </form>
    </div>
</body>
</html>