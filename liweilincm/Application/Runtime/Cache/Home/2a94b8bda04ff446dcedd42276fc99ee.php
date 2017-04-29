<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <meta name="keywords" content="scclui框架">
    <meta name="description" content="scclui为轻量级的网站后台管理系统模版。">
    <title>首页</title>
    
    <link rel="stylesheet" href="/Public/Static/css/sccl.css">
    <link rel="stylesheet" type="text/css" href="/Public/Static/css/skin/qingxin/skin.css" id="layout-skin"/>
    
  </head>
 <body>
    <div class="layout-admin">
        <header class="layout-header">
            <span class="header-logo">后台管理</span> 
            <a class="header-menu-btn" href="javascript:;"><i class="icon-font">&#xe600;</i></a>
            <ul class="header-bar">
                <li class="header-bar-role"><a href="javascript:;">超级管理员</a></li>
                <li class="header-bar-nav">
                    <a href="javascript:;"><?php echo session("name");?><i class="icon-font" style="margin-left:5px;">&#xe60c;</i></a>
                    <ul class="header-dropdown-menu">
                        <li><a href="<?php echo U('Public/logout');?>">退出</a></li>
                    </ul>
                </li>
                <li class="header-bar-nav"> 
                    <a href="javascript:;" title="换肤"><i class="icon-font">&#xe608;</i></a>
                    <ul class="header-dropdown-menu right dropdown-skin">
                        <li><a href="javascript:;" data-val="qingxin" title="清新">清新</a></li>
                        <li><a href="javascript:;" data-val="blue" title="蓝色">蓝色</a></li>
                        <li><a href="javascript:;" data-val="molv" title="墨绿">墨绿</a></li>
                        
                    </ul>
                </li>
            </ul>
        </header>
        <aside class="layout-side">
            <ul class="side-menu">
              
            </ul>
        </aside>
        
        <div class="layout-side-arrow"><div class="layout-side-arrow-icon"><i class="icon-font">&#xe60d;</i></div></div>
        
        <section class="layout-main">
            <div class="layout-main-tab">
                <button class="tab-btn btn-left"><i class="icon-font">&#xe60e;</i></button>
                <nav class="tab-nav">
                    <div class="tab-nav-content">
                        <a href="javascript:;" class="content-tab active" data-id="<?php echo U('Index/home');?>">首页</a>
                    </div>
                </nav>
                <button class="tab-btn btn-right"><i class="icon-font">&#xe60f;</i></button>
            </div>
            <div class="layout-main-body">
                <iframe class="body-iframe" name="iframe0" width="100%" height="99%" src="<?php echo U('Index/home');?>" frameborder="0" data-id="<?php echo U('Index/home');?>" seamless></iframe>
            </div>
        </section>
        <div class="layout-footer">毕业设计</div>
    </div>
</body>

<script type="text/javascript" src="/Public/Static/js/jquery.js"></script>
<script type="text/javascript" src="/Public/Static/js/sccl.js"></script>
<script type="text/javascript" src="/Public/Static/js/sccl-util.js"></script>
<script type="text/javascript">
$(function(){
    /*获取皮肤*/
    //getSkinByCookie();
    
    /*菜单json*/
    var menu = [{"id":"1","name":"主菜单","parentId":"0","url":"","icon":"","order":"1","isHeader":"1","childMenus":[
                    {"id":"3","name":"商品管理","parentId":"1","url":"","icon":"&#xe604;","order":"1","isHeader":"0","childMenus":[
                    {"id":"4","name":"分类管理","parentId":"3","url":"<?=U('Kind/kind')?>","icon":"","order":"1","isHeader":"0","childMenus":""},
                    {"id":"5","name":"商品管理","parentId":"3","url":"<?=U('Index/store')?>","icon":"","order":"1","isHeader":"0","childMenus":""}
                    ]},
                    {"id":"6","name":"订单管理","parentId":"1","url":"","icon":"&#xe602;","order":"1","isHeader":"0","childMenus":[
                    {"id":"7","name":"完成的订单","parentId":"6","url":"<?=U('Exchange/exchange')?>","icon":"","order":"1","isHeader":"0","childMenus":""}
                    ]}
                ]},
                ];
    initMenu(menu,$(".side-menu"));
    $(".side-menu > li").addClass("menu-item");
    
    /*获取菜单icon随机色*/
    //getMathColor();
});
</script>
</html>