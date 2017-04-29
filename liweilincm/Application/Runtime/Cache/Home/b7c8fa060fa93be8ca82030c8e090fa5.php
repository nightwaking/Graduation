<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>商品管理</title>
    <link rel="stylesheet" type="text/css" href="/Public/Static/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/Public/Static/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="/Public/Static/css/main.css">
    <script src="/Public/Static/js/jquery.js"></script>
    <script src="/Public/Static/js/bootstrap.min.js"></script>
</head>
<body>

<ul class="nav nav-tabs">
    <li>
        <a href="<?php echo U('Kind/kind');?>">商品管理</a>
    </li>
    <li class="active">
        <a href="#">添加</a>
    </li>
</ul>

<form action="<?php echo U('Kind/add');?>" method="post" role="form" class="edit-form">
    <div class="form-group">

        <label for="kind_name">分类名称:</label>
        <input type="text" class="form-control" value="" name="kind_name">

        <label for="kind_description">商品描述:</label>
        <input type="text" class="form-control" value="" name="kind_description">

        <input type="submit" class="btn" name="submit" value="提交">
    </div>    
</form>
</body>
</html>