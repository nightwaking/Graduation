<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title>后台登录</title>

<link href="/liweilincm/Public/Static/css/style.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>

<div class="message warning">
    <div class="inset">
        <div class="login-head">
            <h1>后台登录</h1>
            <div class="alert-close"></div>             
        </div>
        
        <form method="post" action="<?php echo U('Public/dologin');?>">
            <ul>
                <li><input type="text" class="text" value="用户名" onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = '用户名';}" name="username"><a href="#" class=" icon user"></a></li>
                
                <li><input type="password" value="" name="password" /> <a href="#" class="icon lock"></a></li>
            </ul>
            
            <div class="submit">
                <input type="submit" id="mobile_code" value="登录" name="loginSub">
                <div class="clear mobile"></div> 
            </div>
        </form>
    </div>                  
</div>


</body>
<script type="text/javascript" src="/liweilincm/Public/Static/js/jquery.js"></script>
</html>