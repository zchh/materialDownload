<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:76:"D:\code_file\php\materialDownload\public/../application/user\view\login.html";i:1528453315;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>素材网站-首页</title>
    <link rel="stylesheet" href="../../static/css/reset.css">
    <link rel="stylesheet" href="../../static/css/home.css">
</head>

<body style="min-width: 1200px">

<section class="body">
    <!-- 登录框 -->
    <section class="login">
        <div class="login-logo">
            <img src="../../static/images/logo.png" alt="logo">
        </div>
        <form action="">
            <div class="login-username">
                <label for="account_number">账号：</label>
                <input type="text" name="account_number" id="account_number">
                <img src="../../static/images/flash_chacha.png" alt="error">
            </div>
            <div class="login-password">
                <label for="password">密码：</label>
                <input type="password" name="password" id="password">
                <img src="../../static/images/flash_arrow.png" alt="error" id="btn">
            </div>
        </form>
        <div class="login-bottom">
            <div class="login-remember">
                <input type="checkbox" name="login-remember">
                <span>记住我的账户ID</span>
            </div>
            <a class="login-forget">
                <img src="../../static/images/flash_ask.png" alt="error">
                <span>忘记账户或密码</span>
            </a>
            <div class="login-buy">
                <span> > </span>
                <span>我要购买账号！</span>
            </div>
        </div>
    </section>
    <!-- 联系客服 -->
    <a class="service">联系客服</a>
</section>


<script src="../../static/bower_components/jquery/dist/jquery.min.js"></script>
<script>
    $("#btn").on("click",function () {
        //管理员登录
        $.ajax({
            type: "post",
            url: '/user/login',
            data: {
                'account_number':  $("[name='account_number']").val(),
                'password':  $("[name='password']").val(),
            },
            dataType: "json",
            success: function(data) {
                if(data.code == '200'){
                    alert(data.msg);
                    window.location.href= '/';
                    // window.location.href= '/admin/getCustomerData';
                }else{
                    alert(data.msg);
                }
            },
            error:function(){
                alert('系统错误');
            }
        });
    })


    $(".login-buy").click(function () {
        window.location.href= '/user/shop';
    })
</script>




</body>

</html>