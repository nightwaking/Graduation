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
    <li class="active"><a href="javascript:;">商品管理</a></li>
</ul>

<form action="<?php echo U('Index/store');?>" method="post" role="form" class="form-inline store-form">
    <div class="form-group">
        <input type="text" name="store_id" value="<?php echo ((isset($formget["store_id"]) && ($formget["store_id"] !== ""))?($formget["store_id"]):''); ?>" placeholder="商品id" class="form-control search-input">
        <input type="text" name="store_name" value="<?php echo ((isset($formget["store_name"]) && ($formget["store_name"] !== ""))?($formget["store_name"]):''); ?>" placeholder="商品名称" class="form-control search-input">
        <select class="sele_kd form-control" name="kind_id" style="width: 100px;">
            <option value="0">品牌</option>
            <?php if(is_array($settlesRes)): foreach($settlesRes as $key=>$vo): ?><option name="kindOption" value="<?php echo ($vo['kid']); ?>">
                    <?php
 echo (getfirstchar($vo['kname'])); ?>
                    <?php echo ($vo['kname']); ?>
                </option><?php endforeach; endif; ?>
        </select>

        <input type="submit" class="btn" value="搜索" />
        <a class="btn btn-danger" href="<?php echo U('Index/store');?>">清空</a>
    </div>
</form>
<div class="table-responsive store-table">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>商品名称</th>
                <th>商品种类</th>
                <th>商品数量</th>
                <th>商品价格</th>
                <th>商品描述</th>
                <th>商品状态</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
        <?php if(is_array($kind)): foreach($kind as $key=>$vo): ?><tr>
                <td><?php echo ($vo["sid"]); ?></td>
                <td><?php echo ($vo["storename"]); ?></td>
                <td><?php echo ($vo["kname"]); ?></td>
                <td><?php echo ($vo["storeamount"]); ?></td>
                <td><?php echo ($vo["storeprice"]); ?></td>
                <td><?php echo ($vo["storedescription"]); ?></td>
                <td><?php echo ($vo["storestatus"]); ?></td>
                <td>
                    <a href="<?php echo U('Index/edit', array('id'=>$vo['sid']));?>">编辑</a>
                    <a href="<?php echo U('Index/delete', array('id'=>$vo['sid']));?>">删除</a>
                </td>
            </tr><?php endforeach; endif; ?>
            <tr>
                <td><a href="<?php echo U('Index/add');?>">增加新产品</a></td>
            </tr>
        </tbody>
    </table>
</div>
<div class="pagination"><?php echo ($page); ?></div>
</body>
</html>