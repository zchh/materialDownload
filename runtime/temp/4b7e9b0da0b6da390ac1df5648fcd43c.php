<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:76:"D:\code_file\php\materialDownload\public/../application/user\view\index.html";i:1528453315;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>素材网站-首页</title>
    <link rel="stylesheet" href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="../../static/css/reset.css">
    <link rel="stylesheet" href="../../static/css/home.css">
    <script src="../../static/js/jquery.min.js"></script>
    <!--<script>-->
        <!--$(document).ready(function(){-->
            <!--$("#flash_jiexi").click(function(){-->

                <!--window.location.href="/user/analysis?url="+ $(" #tflash_input_value ").val();-->
            <!--});-->
        <!--});-->
    <!--</script>-->
</head>

<body style="min-width: 1200px">

<section class="body uzi_body">

    <!--顶部导航栏-->
    <div class="uzi_top_nav">
        <div class="uzi_top_nav_inner">
            <div class="uzi_top_nav_left" id="uzi_top_nav_left">
                <div style="width: 100%;height: 100%;line-height: 50px;cursor:pointer;">
                    <span style="vertical-align: middle">账户安全</span> <i class="fa fa-angle-down" style="font-size: 18px;vertical-align: middle" id="uzi_tubiao"></i>
                </div>
                <div class="uzi_hover_content">
                    <div id="clearlove_two_click">绑定手机号</div>
                    <div id="clearlove_three_click">绑定邮箱</div>
                    <div id="karsa_xiugai_password">修改密码</div>
                    <div style="border-bottom: none" id="clearlove_off" class="logout">退出账号</div>
                </div>
            </div>
            <div class="uzi_top_nav_right">
                <div style="margin-top: 14px">
                    <img src="../../static/images/flash_laba.png" alt="error">
                    <span>不同网站的权限可以联系客户补差升级</span>
                </div>
            </div>
        </div>
    </div>

    <!-- 登录框 -->
    <section class="login uzi_login">
        <div class="uzi_logo">
            <img src="../../static/images/logo.png" alt="logo">
        </div>
        <a id="download"></a>

        <div class="uzi_search">
            <div style="padding-top: 65px">
                <div class="uzi_search_inner">
                    <div class="uzi_search_left">
                        <input type="text" name="flash_input_value">
                    </div>
                    <div class="uzi_search_right" id="flash_jiexi">解析</div>
                </div>
            </div>
        </div>

        <!--<div class="">-->
        <!--<div style="padding-top: 65px">-->
        <!--<form action="/user/analysis" method="post">-->
        <!--<div class="">-->
        <!--<input type="text" name="url">-->
        <!--</div>-->
        <!--<input type="submit" class="" placeholder="解析">-->
        <!--</form>-->
        <!--</div>-->
        <!--</div>-->



        <div class="uzi_three_select">
            <div class="uzi_three_select_top">
                <div style="padding-top: 15px">
                    <span id="uzi_odd_one">账户信息</span>
                    <span>|</span>
                    <span id="uzi_odd_two">下载权限</span>
                    <span>|</span>
                    <span id="uzi_odd_three">使用教程</span>
                </div>

            </div>
            <div class="uzi_three_select_bottom" id="uzi_haha_one">
                <div style="padding: 15px 18px">
                    <div class="uzi_account_message">
                        <div>实用期限：[次数账号]</div>
                        <div>剩余次数：[<?php echo $rest_download_times; ?>]次</div>
                        <div>账号权限：<?php echo $permissionStr; ?></div>
                        <div>账号说明：[终身]账号[剩余次数]为每天剩余次数</div>
                    </div>
                </div>
            </div>

            <div class="uzi_three_select_bottom" id="uzi_haha_two">
                <div style="padding: 15px 18px">
                    <div class="uzi_image_website">
                        <div>
                            <?php if(!(empty($permission) || (($permission instanceof \think\Collection || $permission instanceof \think\Paginator ) && $permission->isEmpty()))): if(is_array($permissionArr) || $permissionArr instanceof \think\Collection || $permissionArr instanceof \think\Paginator): $i = 0; $__LIST__ = $permissionArr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$single): $mod = ($i % 2 );++$i;?>
                            <a href="<?php echo $single['website_url']; ?>"> <img src="<?php echo $single['website_pic_url']; ?>" onclick="test()"></a>
                            <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                            <!--<img src="../../static/images/qiantuwang_03.jpg" onclick="test()">-->
                            <!--<img src="../../static/images/qiantuwang_05.jpg">-->
                            <!--<img src="../../static/images/qiantuwang_07.jpg">-->
                            <!--<img src="../../static/images/qiantuwang_09.jpg">-->
                            <!--<img src="../../static/images/qiantuwang_11.jpg">-->
                            <!--<img src="../../static/images/qiantuwang_13.jpg">-->
                        </div>
                        <!--<div style="margin-top: 10px">-->
                            <!--<img src="../../static/images/qiantuwang_21.jpg" style="cursor: pointer">-->
                        <!--</div>-->
                    </div>
                </div>
            </div>

            <div class="uzi_three_select_bottom" id="uzi_haha_three">
                <div style="padding: 15px 18px">
                    <div class="uzi_account_message">
                        <div style="color: #034889;text-decoration: underline;cursor: pointer" onclick="view_url()">点击查看视频教程</div>

                    </div>
                </div>
            </div>
        </div>
    </section>


    <!--提示框的四个公用的弹窗-->

    <!--修改密码-->

    <div class="karsa_board" id="karsa_board">


        <section class="login password_login" id="karsa_login" style="position: relative;background-color: rgba(0, 0, 0, .3);">

            <div style="position: absolute;top: 8px;right: 14px;cursor: pointer;" id="karsa_close">
                <img src="../../static/images/flash_white_chacha.png" alt="error" style="width: 12px;">
            </div>

            <div class="login-logo password_logo">
                <span>修改密码</span>
            </div>


            <form action="" class="password_form" id="password_display_phone">
                <div class="login-username password_input">
                    <label for="username" style="font-size:18px">手机号：</label>
                    <input type="text" name="phone_number_2" id="username">

                </div>
                <div class="login-password password_input">
                    <label for="password" style="font-size:18px">验证码：</label>
                    <input type="password" name="password_code" id="password">
                    <span class="password_yanzhengma">获取验证码</span>
                </div>
                <div class="login-username password_input">
                    <label for="username" style="font-size:18px">新密码：</label>
                    <input type="text" name="new_password" >

                </div>
                <div class="login-username password_input" style="border-bottom:none">
                    <label for="username" style="font-size:18px">再次输入密码：</label>
                    <input type="text" name="new_password_2" >

                </div>
            </form>



            <div class="login-bottom">
                <div class="login-remember">
                    <div class="karsa_forget_password">
                        <img src="../../static/images/flash_wenhao.png" alt="error" style="width: 24px"> <span>忘记密码？</span>
                    </div>

                </div>

                <div class="login-buy  karsa_btn">
                    <span>绑定</span>

                </div>
            </div>
        </section>

    </div>


    <!--绑定手机号-->


    <div class="karsa_board" id="clearlove_two">


        <section class="login password_login"  style="position: relative;height: 283px !important;background-color: rgba(0, 0, 0, .3);">

            <div style="position: absolute;top: 8px;right: 14px;cursor: pointer;" id="clearlove_two_close">
                <img src="../../static/images/flash_white_chacha.png" alt="error" style="width: 12px;">
            </div>

            <div class="login-logo password_logo">
                <span>绑定手机号</span>
            </div>


            <form action="" class="password_form" style="height: 100px !important;">
                <div class="login-username password_input">
                    <label for="username" style="font-size:18px">手机号：</label>
                    <input type="text" name="username" >

                </div>
                <div class="login-password password_input" style="border-bottom: none">
                    <label for="password" style="font-size:18px">验证码：</label>
                    <input type="password" name="phone_code" >
                    <span class="password_yanzhengma">获取验证码</span>
                </div>

            </form>



            <div class="login-bottom" style="padding-top: 39px;">
                <div class="login-remember">
                    <div class="karsa_forget_password">
                        <img src="../../static/images/flash_wenhao.png" alt="error" style="width: 24px"> <span>绑定手机号可用手机号登录？</span>
                    </div>

                </div>

                <div class="login-buy  karsa_btn" style="margin-left: 161px !important;" onclick="bind(1)">
                    <span>绑定</span>

                </div>
            </div>
        </section>

    </div>



    <!--绑定邮箱-->

    <div class="karsa_board" id="clearlove_three">


        <section class="login password_login"  style="position: relative;height: 231px !important;background-color: rgba(0, 0, 0, .3);">

            <div style="position: absolute;top: 8px;right: 14px;cursor: pointer;" id="clearlove_three_close">
                <img src="../../static/images/flash_white_chacha.png" alt="error" style="width: 12px;">
            </div>

            <div class="login-logo password_logo">
                <span>绑定邮箱</span>
            </div>
            <form action="" class="password_form" style="height: 50px !important;">
                <div class="login-username password_input" style="border:none !important;">
                    <label for="username" style="font-size:18px">输入邮箱：</label>
                    <input type="text" name="mailbox">
                </div>
            </form>

            <div class="login-bottom">
                <div class="login-remember">
                    <div class="karsa_forget_password">
                        <img src="../../static/images/flash_wenhao.png" alt="error" style="width: 24px"> <span>绑定邮箱后可用于找回密码</span>
                    </div>

                </div>

                <div class="login-buy  karsa_btn" style="margin-left: 161px !important;" onclick="bind(2)">
                    <span>绑定</span>
                </div>
            </div>
        </section>

    </div>



    <!--提示-->

    <div class="karsa_board" id="clearlove_four">


        <section class="login password_login"  style="position: relative;height: 130px !important;background-color: rgba(0, 0, 0, .3);">

            <div style="position: absolute;top: 8px;right: 14px;cursor: pointer;" id="clearlove_four_close">
                <img src="../../static/images/flash_white_chacha.png" alt="error" style="width: 12px;">
            </div>

            <div class="login-logo password_logo" style="margin-bottom: 0">
                <span>提示</span>
            </div>



            <div class="login-bottom">
                <div class="login-remember">
                    <div class="karsa_forget_password">
                        <img src="../../static/images/flash_wenhao.png" alt="error" style="width: 24px"> <span style="font-size: 16px">次数已用完</span>
                    </div>

                </div>


            </div>
        </section>

    </div>


    <!-- 联系客服 -->
    <a class="service">联系客服</a>
</section>

</body>
<script src="../../static/js/flash_home.js"></script>
<script>

    //解析
    $("#flash_jiexi").click(function(){
        window.location.href="/user/analysis?url="+  $("[name='flash_input_value']").val();
    });

    //退出登录
    $("#clearlove_off").click(function(){
        window.location.href="/user/logout";
    });

    function view_url() {
        window.location.href= '<?php echo $video_url; ?>';
    }

    function bind(type) {
        if(type == 1){
            var phone_number = $("[name='phone_number']").val();
            if(phone_number == ''){
                alert('输入的电话不能为空');
                return false;
            }
            var param = "type="+type+"&phone="+phone_number;
        }else if(type == 2) {
            var mailbox = $("[name='mailbox']").val();
            if(mailbox == ''){
                alert('输入的邮箱不能为空');
                return false;
            }
            var param = "type="+type+"&mailbox="+mailbox;
        }else{
            alert('参数错误！')
        }
        $.ajax({
            type: "post",
            url: '/user/bind',
            data: param,
            dataType: "json",
            success: function(data) {
                alert(data.msg);
            },
            error:function(){
                alert('系统错误');
            }
        });
    }







</script>
</html>