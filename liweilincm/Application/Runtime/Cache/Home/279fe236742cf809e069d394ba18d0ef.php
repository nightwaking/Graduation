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

<form action="<?php echo U('Exchange/exchange');?>" method="post" role="form" class="form-inline store-form">
    <div class="form-group">
        <input type="text" name="exchange_id" value="<?php echo ((isset($formget["exchange_id"]) && ($formget["exchange_id"] !== ""))?($formget["exchange_id"]):''); ?>" placeholder="订单ID" class="form-control search-input">
        <input type="text" name="exchange_order" value="<?php echo ((isset($formget["exchange_order"]) && ($formget["exchange_order"] !== ""))?($formget["exchange_order"]):''); ?>" placeholder="订单号" class="form-control search-input">
        <span class="input-append date form_datetime">
            <input type="text" name="start_time" value="<?php echo ((isset($formget["start_time"]) && ($formget["start_time"] !== ""))?($formget["start_time"]):''); ?>" placeholder="起始时间" class="form-control search-input" readonly>
            <span class="add-on"><i class="icon-th"></i></span>
        </span>
        <span class="input-append date form_datetime">
            <input type="text" name="end_time" value="<?php echo ((isset($formget["end_time"]) && ($formget["end_time"] !== ""))?($formget["end_time"]):''); ?>" placeholder="结束时间" class="form-control search-input" readonly>
            <span class="add-on"><i class="icon-th"></i></span>
        </span>
        <input type="submit" class="btn" value="搜索" />
        <a class="btn btn-danger" href="<?php echo U('Exchange/exchange');?>">清空</a>
    </div>
</form>
<div class="table-responsive store-table">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>订单号</th>
                <th>下单用户</th>
                <th>下单时间</th>
                <th>订单价格</th>
                <th>订单地址</th>
                <th>订单备注</th>
            </tr>
        </thead>
        <tbody>
        <?php if(is_array($exchange)): foreach($exchange as $key=>$vo): ?><tr>
                <td><?php echo ($vo["e_id"]); ?></td>
                <td><?php echo ($vo["e_order"]); ?></td>
                <td><?php echo ($vo["username"]); ?></td>
                <td><?php echo ($vo["e_time"]); ?></td>
                <td><?php echo ($vo["e_price"]); ?></td>
                <td><?php echo ($vo["e_address"]); ?></td>
                <td><?php echo ($vo["e_notice"]); ?></td>
            </tr><?php endforeach; endif; ?>
        </tbody>
    </table>
</div>
<div class="pagination"><?php echo ($page); ?></div>
</body>
<script src="/liweilincm/Public/Static/js/bootstrap-datetimepicker.min.js">
</script>
<script type="text/javascript">
    $(".form_datetime").datetimepicker({
        format: "yyyy-mm-dd hh:ii"
    });
</script>
</html>