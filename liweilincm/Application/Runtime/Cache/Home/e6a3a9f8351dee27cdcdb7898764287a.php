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
    <li class="active"><a href="javascript:;">分类管理</a></li>
</ul>

<form action="<?php echo U('Kind/kind');?>" method="post" role="form" class="form-inline store-form">
    <div class="form-group">
        <input type="text" name="kind_id" value="<?php echo ((isset($formget["kind_id"]) && ($formget["kind_id"] !== ""))?($formget["kind_id"]):''); ?>" placeholder="分类id" class="form-control search-input">
        <input type="text" name="kind_name" value="<?php echo ((isset($formget["kind_name"]) && ($formget["kind_name"] !== ""))?($formget["kind_name"]):''); ?>" placeholder="分类名称" class="form-control search-input">
        <input type="submit" class="btn" value="搜索" />
        <a class="btn btn-danger" href="<?php echo U('Kind/kind');?>">清空</a>
    </div>
</form>
<div class="table-responsive store-table">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>分类名称</th>
                <th>分类描述</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
        <?php if(is_array($kind)): foreach($kind as $key=>$vo): ?><tr>
                <td><?php echo ($vo["kid"]); ?></td>
                <td><?php echo ($vo["kname"]); ?></td>
                <td><?php echo ($vo["kdescription"]); ?></td>
                <td>
                    <a href="<?php echo U('Kind/delete', array('id'=>$vo['kid']));?>">删除</a>
                </td>
            </tr><?php endforeach; endif; ?>
            <tr>
                <td><a href="<?php echo U('Kind/add');?>">增加新分类</a></td>
            </tr>
        </tbody>
    </table>
</div>
<div class="pagination"><?php echo ($page); ?></div>
</body>
</html>