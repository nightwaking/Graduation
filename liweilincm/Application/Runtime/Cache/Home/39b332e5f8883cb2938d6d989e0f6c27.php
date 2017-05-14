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
    <li class="active"><a href="javascript:;">用户管理</a></li>
</ul>

<form action="<?php echo U('Index/home');?>" method="post" role="form" class="form-inline store-form">
    <div class="form-group">
        <input type="text" name="user_id" value="<?php echo ((isset($formget["store_id"]) && ($formget["store_id"] !== ""))?($formget["store_id"]):''); ?>" placeholder="用户id" class="form-control search-input">
        <input type="text" name="user_name" value="<?php echo ((isset($formget["store_name"]) && ($formget["store_name"] !== ""))?($formget["store_name"]):''); ?>" placeholder="用户名称" class="form-control search-input">

        <input type="submit" class="btn" value="搜索" />
        <a class="btn btn-danger" href="<?php echo U('Index/home');?>">清空</a>
    </div>
</form>
<div class="table-responsive store-table">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>用户名</th>
                <th>用户手机号</th>
                <th>用户邮箱</th>
                <th>用户注册时间</th>
                <th>用户最后登录时间</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
        <?php if(is_array($kind)): foreach($kind as $key=>$vo): ?><tr>
                <td><?php echo ($vo["uid"]); ?></td>
                <td><?php echo ($vo["username"]); ?></td>
                <td><?php echo ($vo["mobile"]); ?></td>
                <td><?php echo ($vo["email"]); ?></td>
                <td><?php echo ($vo["regtime"]); ?></td>
                <td><?php echo ($vo["lasttime"]); ?></td>
                <td>
                    <a href="<?php echo U('Index/userDelete', array('id'=>$vo['uid']));?>">删除</a>
                </td>
            </tr><?php endforeach; endif; ?>
        </tbody>
    </table>
</div>
<div class="pagination"><?php echo ($page); ?></div>
</body>
</html>