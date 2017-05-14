<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>商品管理</title>
    <link rel="stylesheet" type="text/css" href="/liweilincm/Public/Static/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/liweilincm/Public/Static/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="/liweilincm/Public/Static/css/main.css">
    <script src="/liweilincm/Public/Static/js/jquery.js"></script>
    <script src="/liweilincm/Public/Static/js/bootstrap.min.js"></script>
</head>
<body>

<ul class="nav nav-tabs">
    <li>
        <a href="<?php echo U('Image/index');?>">图片管理</a>
    </li>
    <li class="active">
        <a href="#">添加</a>
    </li>
</ul>

<form action="<?php echo U('Image/add');?>" method="post" role="form" class="edit-form" enctype="multipart/form-data">
    <div class="form-group">
        <label for="storename">图片种类:</label>
        <select class="form-control add-select" name="pic_type">
            <option value="1">用于幻灯片</option>
            <option value="2">用于页面修饰</option>
        </select>

        <label for="storename">上传图片:</label>
        <input type="file" class="form-control]" name="photo1">
        <input type="submit" class="btn" name="submit" value="提交">
    </div>    
</form>
</body>
</html>