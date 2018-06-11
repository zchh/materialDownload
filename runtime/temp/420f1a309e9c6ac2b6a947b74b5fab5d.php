<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:78:"D:\code_file\php\materialDownload\public/../application/admin\view\login2.html";i:1528528378;}*/ ?>
<!DOCTYPE html>
<!-- saved from url=(0039)http://yun.vjietiao.com/agent/login.php -->
<html class="hf">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <!-- 让IE浏览器用最高级内核渲染页面 还有用 Chrome 框架的页面用webkit -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1,initial-scale=1.0, maximum-scale=1.0,user-scalable=0">
    <!-- IOS6全屏 Chrome高版本全屏 ================================================== -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <title>后台登录</title>
    <link rel="stylesheet" type="text/css" href="../../static/login/css/style.css">
    <script type="text/javascript" src="../../static/login/js/jquery-1.10.1.min.js"></script>
    <script type="text/javascript" src="../../static/login/js/jquerys.js"></script>
    <style>
        #myAlert{
            display: inline-block;
            height: 30px;
            line-height: 30px;
            width: 183px;
            font-size: 14px;
            text-align: right;
            color: #fb793c;
            padding-right: 5px;
        }
    </style>
</head>

<body onkeydown="keyLogin(event);">
<div class="box over">
    <section class="login_fo">
        <div style="margin-top: 209px; background-color: #fdfdfd;">
            <form class="login_form" method="post" id="myform" name="myform" action="" target="">
                <h2 style="color:#FB793C; height:60px; line-height:60px;">
                    素材下载后台管理</h2>
                <section>
                    <p>
                        <label for="username">
                            <img src="../../static/login/images/name.png">
                        </label>
                        <input id="username" name="username" type="text" value="" placeholder="管理员名">
                        <span id="myAlert"></span>
                    </p>
                    <p>
                        <label for="password">
                            <img src="../../static/login/images/pass.png">
                        </label>
                        <input  id="password" type="password" name="password" value="" placeholder="请输入6-12位密码">
                        <span id="myAlert"></span>
                    </p>
                    <div class="over">
							<span>

									<!--<input type="checkbox" name="rem_pass" value="1" style="cursor:pointer;" id="rem_pass">记住密码-->
                                                        <!--<input type="checkbox" id="remember" value="1" checked> 记住我-->

                            </span>
                        <!--<a href="/borrower/password" class="right">忘记密码</a>-->
                    </div>
                    <p class="but buts">
                        <input id="btn" type="button" style="cursor:pointer;" onclick="" value="登录">
                    </p>
                </section>
            </form>
        </div>
    </section>

    <!--<section class="footer login_foot">-->
        <!--<div class="container over">-->
            <!--<ul>-->
                <!--<li>-->
                    <!--<a href="">使用须知</a>-->
                <!--</li>-->
                <!--<li>-->
                    <!--<a href="">常见问题</a>-->
                <!--</li>-->
                <!--<li>-->
                    <!--<a href="">客户服务</a>-->
                <!--</li>-->
                <!--<li>-->
                    <!--<a href="">信息反馈</a>-->
                <!--</li>-->
            <!--</ul>-->
            <!--<div class="ewm_int">-->
					<!--<span>-->
						<!--<img src="../../static/login/images/201711241715517472.png" width="54" height="54">-->
					<!--</span>-->
            <!--</div>-->
            <!--<p>-->
                <!--<span>版权所有：福州腾云数据科技有限公司 COPYRIGHT@2017 豫ICP备09082528号-1</span>-->
            <!--</p>-->
        <!--</div>-->
    <!--</section>-->

</div>
<script src="/static/layer/layer.js"></script>
<script language="JavaScript">

    $("#btn").on("click",function () {

        //管理员登录
        $.ajax({
            type: "post",
            url: '/admin/login',
            data: {
                'username':  $("[name='username']").val(),
                'password':  $("[name='password']").val(),
            },
            dataType: "json",
            success: function(data) {
                if(data.code == '200'){
                    alert(data.msg);
                    window.location.href= '/admin/user';
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





    // 表单验证
    // function my_submit(){
    //
    //     // 用户名验证
    //     var my_username = $("#myUsername").val(),
    //         my_password = $('#myPassword').val()
    //     if(my_username === ""){
    //         myAlert($("#myUsername"),'用户名不能为空')
    //         return;
    //     }
    //
    //     if(/^[A-Za-z0-9]+/.test(my_username) === false){
    //         myAlert($("#myUsername"),'用户名只能使用英文和数字')
    //         return;
    //     }
    //
    //     // 密码验证
    //     if(my_password === ""){
    //         myAlert($("#myPassword"),'密码不能为空')
    //         return;
    //     }
    //
    //     if(/^[A-Za-z0-9]{6,12}$/.test(my_password) === false){
    //         myAlert($("#myPassword"),'请输入有效密码')
    //         return;
    //     }
    //
    //     // 表单提交
    //     $('#myform').submit();
    // }

    // 警告消息
    function myAlert(obj,str){
        obj.siblings("#myAlert").html(str);
    }

    $("#mySubmit").click(my_submit);

    function keyLogin(e) {
        e = e || window.event;
        if (e.keyCode == 13) {
            my_submit()
        }
    }

</script>

</body>

</html>