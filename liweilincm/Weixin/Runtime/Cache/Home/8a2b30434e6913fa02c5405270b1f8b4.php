<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <title>前台系统</title>
    <link rel="stylesheet" type="text/css" href="/liweilincm/Public/Static/css/weui.min.css">
    <link rel="stylesheet" type="text/css" href="/liweilincm/Public/Static/css/index.css">
</head>
<body ontouchstart>
<div class="weui-cells__title">用户注册:</div>
<form method="post" action="<?php echo U('Home/register');?>">
    <div class="weui-cells weui-cells_form">
        <div class="weui-cell">
            <div class="weui-cell__hd"><label class="weui-label">用户名:</label></div>
            <div class="weui-cell__bd">
                <input class="weui-input" type="text" id="username" placeholder="请输入用户名" name="username">
            </div>
        </div>

        <div class="weui-cell">
            <div class="weui-cell__hd"><label class="weui-label">密码:</label></div>
            <div class="weui-cell__bd">
                <input class="weui-input" type="password" id="password" placeholder="请输入密码" name="password">
            </div>
        </div>

        <div class="weui-cell">
            <div class="weui-cell__hd"><label class="weui-label">重复密码:</label></div>
            <div class="weui-cell__bd">
                <input class="weui-input" id="repassword" type="password" placeholder="再次输入用户名" name="repassword">
            </div>
        </div>

        <button class="weui-btn weui-btn_plain-primary" type="submit" id="btn">注册</button>
    </div>
</form>
<br>

 <a href="<?php echo U('Home/dologin');?>" class="weui-btn weui-btn_plain-primary" id="btn">登录</a>

<div class="weui-cells__title" id="notice">表单报错</div>
</body>
</html>