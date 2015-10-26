<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
    <title>bannner上传</title>
</head>
<body>
    <div style="width:201px; margin: 0 auto; padding-top: 200px;">
        <p style="text-align: center">上传banner</p>
        <p>图片建议尺寸：1366*500</p>
        <p>否则图片可能会变形</p>
        <form action="<?php echo U('banner');?>" method="post" enctype="multipart/form-data">
            <input type="file" name="file"/>
            <input type="submit" name="submit" value="上传" style="margin-top: 20px;" />
        </form>
    </div>
</body>
</html>