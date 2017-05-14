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
    <li class="active"><a href="javascript:;">图片管理</a></li>
</ul>

<div class="table-responsive store-table">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>图片名称</th>
                <th>图片用处</th>
                <th>图片添加时间</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
        <?php if(is_array($kind)): foreach($kind as $key=>$vo): ?><tr>
                <td><?php echo ($vo["imgid"]); ?></td>
                <td><?php echo ($vo["image"]); ?></td>
                <td><?php getWay($vo['type']);?></td>
                <td><?php echo ($vo["create_time"]); ?></td>
                <td>
                    <a href="<?php echo U('Image/delete', array('id'=>$vo['imgid']));?>">删除</a>  
                </td>
            </tr><?php endforeach; endif; ?>
            <tr>
                <td><a href="<?php echo U('Image/add');?>">增加新图片</a></td>
            </tr>
        </tbody>
    </table>
</div>

<div class="pagination"><?php echo ($page); ?></div>
</body>
</html>