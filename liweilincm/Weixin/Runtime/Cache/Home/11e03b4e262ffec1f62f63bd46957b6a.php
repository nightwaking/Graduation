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
    <?php if(is_array($kind)): foreach($kind as $key=>$vo): ?><div class="weui-form-preview">
        <div class="weui-form-preview__hd">
            <label class="weui-form-preview__label">订单价格</label>
            <em class="weui-form-preview__value">¥<?php echo ($vo["e_price"]); ?></em>
        </div>
        <div class="weui-form-preview__bd">
            <div class="weui-form-preview__item">
                <label class="weui-form-preview__label">订单号</label>
                <span class="weui-form-preview__value"><?php echo ($vo["e_order"]); ?></span>
            </div>
            <div class="weui-form-preview__item">
                <label class="weui-form-preview__label">下单时间</label>
                <span class="weui-form-preview__value"><?php echo ($vo["e_time"]); ?></span>
            </div>
            <div class="weui-form-preview__item">
                <label class="weui-form-preview__label">订单地址</label>
                <span class="weui-form-preview__value"><?php echo ($vo["e_address"]); ?></span>
            </div>
            <div class="weui-form-preview__item">
                <label class="weui-form-preview__label">订单备注</label>
                <span class="weui-form-preview__value"><?php echo ($vo["e_notice"]); ?></span>
            </div>
            <div class="weui-form-preview__item">
                <label class="weui-form-preview__label">订单状态</label>
                <span class="weui-form-preview__value"><?php OrderStatus($vo['status']);?></span>
                <span hidden="hidden" class="order_status"><?php echo ($vo["status"]); ?></span>
            </div>
        </div>
        <div class="weui-form-preview__ft order_cannel">
            <a class="weui-form-preview__btn weui-form-preview__btn_default" href="<?php echo U('Store/orderCannel', array('id'=>$vo['e_id']));?>">取消订单</a>
        </div>  
    </div><?php endforeach; endif; ?>
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
        <a href="<?php echo U('Home/logout');?>" class="weui-tabbar__item">
            <img src="/liweilincm/Public/Static/images/icon_nav_special.png" alt="" class="weui-tabbar__icon">
            <p class="weui-tabbar__label">退出</p>
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
</html>