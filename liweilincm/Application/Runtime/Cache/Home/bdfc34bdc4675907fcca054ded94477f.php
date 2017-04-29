<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>商品管理</title>
    <link rel="stylesheet" type="text/css" href="/Public/Static/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/Public/Static/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="/Public/Static/css/main.css">
    <script src="/Public/Static/js/jquery.js"></script>
    <script src="/Public/Static/js/bootstrap.min.js"></script>
</head>
<body>

<ul class="nav nav-tabs">
    <li>
        <a href="<?php echo U('Index/store');?>">商品管理</a>
    </li>
    <li class="active">
        <a href="#">编辑</a>
    </li>
</ul>

<form action="<?php echo U('Index/edit');?>" method="post" role="form" class="edit-form">
    <div class="form-group">
        <input type="hidden" class="form-control" value="<?php echo ($kind["sid"]); ?>" name="store_id">

        <label for="storename">商品名称:</label>
        <input type="text" class="form-control" value="<?php echo ($kind[storename]); ?>" name="store_name">

        <label for="storename">商品种类 (不可修改):</label>
        <input type="text" class="form-control" value="<?php echo ($kind[kname]); ?>" disabled="disabled">

        <label for="storename">商品价格(单位 元):<span id="checkNum"></span></label>
        <input type="text" class="form-control" value="<?php echo ($kind[storeprice]); ?>" name="store_price" id="storePrice">

        <label for="storename">商品数量<span id="checkAmount"></span></label>
        <input type="text" class="form-control" value="<?php echo ($kind[storeamount]); ?>" name="store_amount" id="storeNum">

        <label for="storename">商品描述:</label>
        <input type="text" class="form-control" value="<?php echo ($kind[storedescription]); ?>" name="store_description">

        <input type="submit" class="btn" name="submit" value="提交">
    </div>    
</form>
</body>
<script type="text/javascript">
    var storeNum = document.getElementById("storeNum");
    var storePrice = document.getElementById("storePrice");
    var checkPrice = document.getElementById("checkNum");
    var checkAmount = document.getElementById("checkAmount");

    function checkNum(value, number){
        value.onblur = function(){
            var re_number = /[^\d]/g;
            if (this.value == ""){
                number.style.display = "inline";
                number.innerHTML = "输入不能为空";
            }else if(re_number.test(this.value)){
                number.style.display = "inline";
                number.innerHTML = "输入值必须为数字";
            }else{
                number.style.display = "none";
            }
        }
    }

    checkNum(storePrice, checkPrice);
    checkNum(storeNum, checkAmount);
</script>
</html>