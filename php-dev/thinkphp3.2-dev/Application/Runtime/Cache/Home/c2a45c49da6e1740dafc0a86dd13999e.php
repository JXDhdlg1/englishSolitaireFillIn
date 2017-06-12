<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>补全单词</title>
    <!-- Bootstrap -->
    <link href="http://static.page.com/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script>

    </script>
</head>
<body>
<h1 class="test">补全单词</h1>
<form method="post" action="/Home/Index/inputResult" style="align-content: center">
    <p>
        <?php for($i=0;$i<$wordLength;$i++) { ?>
        <?php if($i==$char1||$i==$char2) { ?>
        <input type="text"  placeholder="" name="word<?=$i?>" size="3" maxlength="1" required />
        <?php } else { ?>
        <span class="label label-info"><?=$word[$i]?></span>
        <input type="hidden"  placeholder="" name="word<?=$i?>" value="<?=$word[$i]?>" />
        <?php } ?>
        <?php } ?>
        <input type="hidden"  placeholder="" name="wordlength" value="<?=$wordLength?>" />
    </p>
    <p id="explain" style="display: none"><?=$explain?></p>
    <p><button type="button" id="show_explain" class="btn btn-sm btn-info">提示</button> <button type="submit" class="btn btn-sm btn-success">提交</button></p>
</form>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="http://static.page.com/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
<script>
    $("#show_explain").on("click",function () {
        $("#explain").show();
    });
</script>
</body>
</html>