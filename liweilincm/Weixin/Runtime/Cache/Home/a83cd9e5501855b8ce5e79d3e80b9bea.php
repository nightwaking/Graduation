<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <title>注册</title>
    <link rel="stylesheet" type="text/css" href="/Graduation/liweilincm/Public/Static/css/weui.min.css">
    <link rel="stylesheet" type="text/css" href="/Graduation/liweilincm/Public/Static/css/index.css">
</head>


<div class="footer">
<div class="weui-tab">
    <div class="weui-tab__panel">

    </div>
    <div class="weui-tabbar">
        <a href="<?php echo U('Store/index');?>" class="weui-tabbar__item weui-bar__item_on">
            <img src="/Graduation/liweilincm/Public/Static/images/icon_nav_layout.png" alt="" class="weui-tabbar__icon">
            <p class="weui-tabbar__label">商品</p>
        </a>
        <a href="<?php echo U('User/index');?>" class="weui-tabbar__item">
            <img src="/Graduation/liweilincm/Public/Static/images/icon_nav_cell.png" alt="" class="weui-tabbar__icon">
            <p class="weui-tabbar__label">个人信息</p>
        </a>
        <a href="<?php echo U('Home/logout');?>" class="weui-tabbar__item">
            <img src="/Graduation/liweilincm/Public/Static/images/icon_nav_special.png" alt="" class="weui-tabbar__icon">
            <p class="weui-tabbar__label">退出</p>
        </a>
    </div>
</div>
</div>
</body>
</html>