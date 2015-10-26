<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
    <title>产品上传</title>
</head>
<body>
    <div style="width: 100%; height: 50px;">
        <div style="width: 500px; margin:0 auto">
            <a href="<?php echo U('banner');?>">上传banner</a>
            <a href="<?php echo U('pro');?>" style="margin-left: 110px;">上传产品</a>
            <a href="<?php echo U('dynamic');?>" style="margin-left: 110px;">上传动态</a>
        </div>
    </div>    
    <div style="width:800px; margin: 0 auto;">
        <p style="text-align: center">上传动态</p>
        <form action="<?php echo U('dynamicupdata');?>" method="post" enctype="multipart/form-data">
        <p>动态标题：</p>
            <input type="text" name="name" style="width: 300px">
        <p>动态分类：</p>
            <select name="classify">
                <option value="第一分类">第一分类</option>
            </select>
        <p>动态内容：</p>
            <textarea name="text" style="width:800px; height:400px; resize: none"></textarea>
        <p>图片建议尺寸：940*350，否则图片可能会变形</p>
            <input type="file" name="pro" style="width: 750px;"/>
            <input type="submit" name="submit" value="上传" style="margin-top: 20px;" />
        </form>
    </div>
</body>
</html>