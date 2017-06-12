<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>注册用户</title>
    <script type="text/javascript" src="http://img.qidian.com/js/jquery-2.1.1.min.js"></script>
</head>
<body>
<p>注册用户</p>
<form method="post" id="subUser" action="/Home/User/saveUser">
    <p>用户名<input type="text"  name="userName" id="userName"/></p>
    <p>密  码<input type="password"  name="passWord" id="passWord"/></p>
    <p>确认密码<input type="password"  name="passWord" id="passWordSure"/></p>
    <p>邮  箱<input type="text"  name="email" id="email"/></p>
    <p>手  机<input type="text"  name="phone" id="phone"/></p>
    <p><button type="button" id="register" >提交</button></p>
</form>

</body>
<script>
    $("#register").on("click",function() {
        if(!$("#userName").val()) {
            alert("请输入用户名");
            return ;
        }
        var pass = $("#passWord").val(),
                pass2 = $("#passWordSure").val();
        if(!pass||!pass2||pass!=pass2) {
            alert("密码异常");
            return;
        }
        $("#subUser").submit();
    });
</script>
</html>