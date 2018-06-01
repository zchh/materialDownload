<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:73:"F:\php_project\materialDownload\public/../application/user\view\shop.html";i:1527842945;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>素材网站-账号购买流程</title>
    <link rel="stylesheet" href="/static/css/reset.css">
    <link rel="stylesheet" href="/static/css/home.css">
    <script src="/static/js/jquery.min.js"></script>
</head>

<body style="min-width: 1200px">

<section class="body">
    <!-- 登录框 -->
    <section class="login mlxg_login">
        <div class="login-logo password_logo mlxg_logo">
            <img src="/static/images/logo.png" alt="logo">&nbsp;&nbsp;&nbsp;<span>--账号购买流程</span>
        </div>

        <div class="mlxg_buy_progress">
            <div class="mlxg_buy_progress_inner">
                <div>
                    <img src="/static/images/flash_progress_03.jpg" alt="error">
                </div>
                <div class="mlxg_qq_server">
                    <div>
                        <img src="/static/images/flash_dian_heng_07.jpg">
                        <img src="/static/images/flash_qq.png" style="width: 25px">
                        <span style="font-size: 16px;color: #323232">客服</span><img src="/static/images/1.png" style="width: 21px">
                        <span>：</span>
                        <span style="font-size: 12px;border:1px solid #05488C;border-radius: 10px; padding:3px 7px;color: #05488C;cursor: pointer">点击咨询</span>
                    </div>

                    <div>
                        <img src="/static/images/flash_qq.png" style="width: 25px">
                        <span style="font-size: 16px;color: #323232">客服</span><img src="/static/images/2.png" style="width: 21px">
                        <span>：</span>
                        <span style="font-size: 12px;border:1px solid #05488C;border-radius: 10px; padding:3px 7px;color: #05488C;cursor: pointer">点击咨询</span>
                    </div>

                </div>
                <div class="mlxg_taobao_link">
                    <img src="/static/images/flash_dian_heng_07.jpg">
                    <span>淘宝链接：</span>
                    <span style="color: #024989;text-decoration: underline;cursor:pointer" onclick="shop()">点我直接购买 >></span>
                </div>
            </div>
        </div>



    </section>
    <!-- 联系客服 -->
    <a class="service">联系客服</a>
</section>

</body>
<script src="../../static/js/flash_home.js"></script>
<script>
    function shop() {
        window.location.href= '<?php echo $config_value; ?>';
    }
</script>
</html>