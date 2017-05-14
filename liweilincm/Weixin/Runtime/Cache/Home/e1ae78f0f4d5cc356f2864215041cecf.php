<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <title>前台系统</title>
    <link rel="stylesheet" type="text/css" href="/liweilincm/Public/Static/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/liweilincm/Public/Static/css/weui.min.css">
    <link rel="stylesheet" type="text/css" href="/liweilincm/Public/Static/css/index.css">
</head>
<body ontouchstart>

<div class="page__bd">
    <div class="weui-cells__title">个人中心</div>
    <div class="weui-cells">
        <a href="<?php echo U('User/edit');?>">
        <div class="weui-cell weui-cell_access">
        <div class="weui-cell__bd">个人信息完善</div>
            <div class="weui-cell__ft" style="font-size: 0">
                <span class="weui-badge weui-badge_dot" style="margin-left: 5px;margin-right: 5px;"></span>
            </div>
        </div>
        </a>
    </div>
    <div class="weui-cells">
        <a href="<?php echo U('Store/exchangeShow');?>">
        <div class="weui-cell weui-cell_access">
        <div class="weui-cell__bd">订单查看</div>
            <div class="weui-cell__ft" style="font-size: 0">
                <span class="weui-badge weui-badge_dot" style="margin-left: 5px;margin-right: 5px;"></span>
            </div>
        </div>
        </a>
    </div>
    <div class="weui-cells">
        <a href="<?php echo U('User/changePassword');?>">
        <div class="weui-cell weui-cell_access">
        <div class="weui-cell__bd">密码修改</div>
            <div class="weui-cell__ft" style="font-size: 0">
                <span class="weui-badge weui-badge_dot" style="margin-left: 5px;margin-right: 5px;"></span>
            </div>
        </div>
        </a>
    </div>
    <br/>
    <br/>
    <div class="weui-cells">
        <a href="<?php echo U('Home/logout');?>">
        <div class="weui-cell weui-cell_access">
        <div class="weui-cell__bd">退出登录</div>
            <div class="weui-cell__ft" style="font-size: 0">
                <span class="weui-badge weui-badge_dot" style="margin-left: 5px;margin-right: 5px;"></span>
            </div>
        </div>
        </a>
    </div>
</div>
<div class="footer">
<div class="weui-tab">
    <div class="weui-tab__panel">

    </div>
    <div class="weui-tabbar" id="weiTab">
        <a href="<?php echo U('Store/index');?>" class="weui-tabbar__item">
            <img src="/liweilincm/Public/Static/images/icon_nav_layout.png" alt="" class="weui-tabbar__icon">
            <p class="weui-tabbar__label">商品</p>
        </a>
        <a href="<?php echo U('User/index');?>" class="weui-tabbar__item">
            <img src="/liweilincm/Public/Static/images/icon_nav_cell.png" alt="" class="weui-tabbar__icon">
            <p class="weui-tabbar__label">个人信息</p>
        </a>
        <a href="<?php echo U('Store/showBasket');?>" class="weui-tabbar__item">
            <img src="/liweilincm/Public/Static/images/icon_nav_special.png" alt="" class="weui-tabbar__icon">
            <p class="weui-tabbar__label">购物车</p>
        </a>
    </div>
</div>
</div>
</body>

<script type="text/javascript" src="https://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script type="text/javascript" src="https://res.wx.qq.com/open/libs/weuijs/1.0.0/weui.min.js"></script>
<script type="text/javascript" src="/liweilincm/Public/Static/js/zepto.min.js"></script>


<script type="text/javascript">
 
$(function(){
        var $searchBar = $('#searchBar'),
            $searchResult = $('#searchResult'),
            $searchText = $('#searchText'),
            $searchInput = $('#searchInput'),
            $searchClear = $('#searchClear'),
            $searchCancel = $('#searchCancel');

        function hideSearchResult(){
            $searchResult.hide();
            $searchInput.val('');
        }
        function cancelSearch(){
            hideSearchResult();
            $searchBar.removeClass('weui-search-bar_focusing');
            $searchText.show();
        }

        $searchText.on('click', function(){
            $searchBar.addClass('weui-search-bar_focusing');
            $searchInput.focus();
        });
        $searchInput
            .on('blur', function () {
                if(!this.value.length) cancelSearch();
            })
            .on('input', function(){
                if(this.value.length) {
                    $searchResult.show();
                } else {
                    $searchResult.hide();
                }
            })
        ;
        $searchClear.on('click', function(){
            hideSearchResult();
            $searchInput.focus();
        });
        $searchCancel.on('click', function(){
            cancelSearch();
            $searchInput.blur();
        });
    });
</script>
<script type="text/javascript">
    $(function(){
        $('.weui-tabbar__item').on('click', function () {
            $(this).addClass('weui-bar__item_on').siblings('.weui-bar__item_on').removeClass('weui-bar__item_on');
        });
    });
</script>
<script type="text/javascript">
    var orderStatus = $('.order_status');
    var orderCannel = $('.order_cannel');

    for (var i=0; i<orderStatus.length; i++){
        if (orderStatus[i].innerHTML == 1){
            orderCannel[i].style.display = "none";
        }else{
            orderCannel[i].style.display = "block";
        }
    }
</script>
<script type="text/javascript" src="/liweilincm/Public/Static/js/jquery.js"></script>
<script type="text/javascript" src="/liweilincm/Public/Static/js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        var pic_circle = $('.item:first');
        var pic_icon = $('.pic_icon:first');
        pic_circle.addClass('active');
        pic_icon.addClass('active');

        $("#myCarousel").carousel('cycle')
    });
</script>
</html>