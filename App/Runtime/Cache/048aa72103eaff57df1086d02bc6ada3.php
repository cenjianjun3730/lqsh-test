<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
    <title>bannner上传</title>
</head>
<body>
    <div style="width: 100%; height: 50px;">
        <div style="width: 500px; margin:0 auto">
            <a href="<?php echo U('banner');?>">上传banner</a>
            <a href="<?php echo U('pro');?>" style="margin-left: 110px;">上传产品</a>
            <a href="<?php echo U('dynamic');?>" style="margin-left: 110px;">上传动态</a>
        </div>
    </div>
    <div style="width:201px; margin: 0 auto; margin-top: 150px;">
        <p style="text-align: center">上传banner</p>
        <p>图片建议尺寸：1366*500</p>
        <p>否则图片可能会变形</p>
        <form action="<?php echo U('bannerupdata');?>" method="post" enctype="multipart/form-data">
            <input type="file" name="file"/>
            <input type="submit" name="submit" value="上传" style="margin-top: 20px;" />
        </form>
    </div>
</body>
</html>