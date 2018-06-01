<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:83:"F:\php_project\materialDownload\public/../application/admin\view\accountNumber.html";i:1527733861;s:69:"F:\php_project\materialDownload\application\admin\view\base\base.html";i:1527762029;s:42:"../application/admin/view/base/header.html";i:1527767676;s:43:"../application/admin/view/base/sidebar.html";i:1527769384;s:42:"../application/admin/view/base/footer.html";i:1525767586;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>腾云后台管理系统</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="../../static/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../static/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../../static/bower_components/Ionicons/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../../static/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../static/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../../static/dist/css/skins/_all-skins.min.css">

    <link rel="stylesheet" href="../../static/plugins/timepicker/bootstrap-timepicker.min.css">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <style>
        .content {
            min-height: 250px;
            padding: 0;
            margin-right: auto;
            margin-left: auto;
            padding-left: 0;
            padding-right: 0;
            padding-top: 15px;
        }
    </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>素材网</b></span>
        <!-- logo for regular state and mobile devices -->
        <!--<span class="logo-lg"><b>Admin</b>LTE</span>-->
        <span class="logo-lg">素材下载网后台管理</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
                <li class="dropdown messages-menu">
                    <a href="#" data-toggle="modal" data-target="#reset-model">
                        重置密码
                    </a>
                </li>
                <li class="dropdown messages-menu">
                    <a href="/admin/logout">
                       退出登录
                    </a>
                </li>

            </ul>
        </div>
    </nav>
</header>

    <!-- 侧边栏 Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <ul class="sidebar-menu" data-widget="tree">
            <!--<li class="header">MAIN NAVIGATION</li>-->

            <?php if(session('admin')['role'] == 1): if(isset($activeType) AND $activeType == 1): ?>
            <li class="active">
            <?php else: ?>
            <li>
            <?php endif; ?>
                <a href="/admin/admin">
                    <i class="fa fa-calendar"></i><span>副管理员列表</span>
                </a>
            </li>
            <?php endif; if(isset($activeType) AND $activeType == 2): ?>
            <li class="active">
                <?php else: ?>
            <li>
                <?php endif; ?>
                <a href="/admin/user">
                    <i class="fa fa-calendar"></i><span>账号列表</span>
                </a>
            </li>


            <?php if(isset($activeType) AND $activeType == 3): ?>
            <li class="active">
                <?php else: ?>
            <li>
                <?php endif; ?>
                <a href="/admin/material_website">
                    <i class="fa fa-calendar"></i><span>素材网站列表</span>
                </a>
            </li>

            <?php if(isset($activeType) AND $activeType == 4): ?>
            <li class="active">
                <?php else: ?>
            <li>
                <?php endif; ?>
                <a href="/admin/account">
                    <i class="fa fa-calendar"></i><span>素材网站账号列表</span>
                </a>
            </li>


            <?php if(isset($activeType) AND $activeType == 5): ?>
            <li class="active">
                <?php else: ?>
            <li>
                <?php endif; ?>
                <a href="/admin/config/1">
                    <i class="fa fa-calendar"></i><span>教材视频</span>
                </a>
            </li>


            <?php if(isset($activeType)): if($activeType == 6 || $activeType == 7 || $activeType == 8 || $activeType == 9): ?>
            <li class="treeview active">
            <?php else: ?>
            <li class="treeview">
            <?php endif; else: ?>
            <li class="treeview">
            <?php endif; ?>
                <a href="#">
                    <i class="fa fa-laptop"></i>
                    <span>基础信息管理</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">

                    <?php if(isset($activeType) AND $activeType == 6): ?>
                    <li class="active">
                        <?php else: ?>
                    <li>
                        <?php endif; ?>
                        <a href="/admin/config/4"><i class="fa fa-circle-o"></i>网站背景图片</a>
                    </li>

                    <?php if(isset($activeType) AND $activeType == 7): ?>
                    <li class="active">
                        <?php else: ?>
                    <li>
                        <?php endif; ?>
                        <a href="/admin/notice"><i class="fa fa-circle-o"></i>通知公告</a>
                    </li>

                    <?php if(isset($activeType) AND $activeType == 8): ?>
                    <li class="active">
                        <?php else: ?>
                    <li>
                        <?php endif; ?>
                        <a href="/admin/config/2"><i class="fa fa-circle-o"></i>邮箱模板设置</a>
                    </li>

                    <?php if(isset($activeType) AND $activeType == 9): ?>
                    <li class="active">
                        <?php else: ?>
                    <li>
                        <?php endif; ?>
                        <a href="/admin/config/9"><i class="fa fa-circle-o"></i>淘宝店铺地址设置</a>
                    </li>





                </ul>
            </li>





        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="margin-left: 140px;min-height: 650px!important;width:100%;display: table">

        <!-- Main content -->
        <section class="content" style="width: 1300px;height: 720px;">


            
<div class="row">

    <div class="col-xs-12">
        <div class="box">



            <div class="box-header">
                <h3 class="box-title">账号管理</h3>
            </div>


            <div style="position: relative;margin-bottom: 20px;margin-left: 20px" >
                <form action="/admin/user" method="get">
               <input name="keywords" placeholder="请输入账号或手机号或邮箱进行查询" style="width: 250px" value="<?php echo $requestParam['keywords']; ?>">
                &nbsp;&nbsp; &nbsp;&nbsp;开通日期： <input type="text" name="open_time" class="layui-input" value="<?php echo $requestParam['open_time']; ?>"  style="width: 100px;"  autocomplete="off" id="time1">---<input type="text" name="end_time" class="layui-input" value="<?php echo $requestParam['end_time']; ?>"  style="width: 100px;"  autocomplete="off" id="time2">
                &nbsp;&nbsp; &nbsp;&nbsp;状态：<select name="status">
                                                <?php if($requestParam['status'] == '1'): ?>
                                                 <option value="">--</option>
                                                 <option value="1" selected="selected">已激活</option>
                                                 <option value="0">未激活</option>
                                                <?php elseif($requestParam['status'] == '0'): ?>
                                                 <option value="">--</option>
                                                 <option value="1">已激活</option>
                                                 <option value="0" selected="selected">未激活</option>
                                                <?php else: ?>
                                                 <option value="" selected="selected">--</option>
                                                 <option value="1">已激活</option>
                                                 <option value="0">未激活</option>
                                                <?php endif; ?>
                                              </select>
                &nbsp;&nbsp; &nbsp;&nbsp;<input class="btn btn-primary" type="submit" value="搜索">
                </form>
            </div>
            <div style="position: relative;margin-bottom: 69px" >
                <button class="btn btn-success pull-left" style="margin-left: 20px" id="active">批量激活</button>
                <button class="btn btn-default pull-right" style="margin-left: 20px" id="export">导出</button>
                <button  type="button" class="btn btn-default pull-right" style="background: #67AEC2;color: white;border: none;border-radius: 5px" data-toggle="modal" data-target="#modal-default" id="add-model">
                    新增
                </button>
            </div>

            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th><button type="button" class="btn btn-default btn-sm checkbox-toggle" style="background: white;width: 15px;margin-top: -19px;height: 10px;outline: none;border: none"><i class="fa fa-square-o"></i></button>ID</th>
                        <th>账号</th>
                        <th>密码</th>
                        <th>手机号</th>
                        <th>邮箱</th>
                        <th>开通日期</th>
                        <th>剩余开通天数</th>
                        <th>截止日期</th>
                        <th>当天剩余下载次数</th>
                        <th>账号权限</th>
                        <th>状态</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(!(empty($data) || (($data instanceof \think\Collection || $data instanceof \think\Paginator ) && $data->isEmpty()))): if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$single): $mod = ($i % 2 );++$i;?>
                    <tr>
                        <td><input type="checkbox" name="check_num" value="<?php echo $single['user_id']; ?>" class="checkSingle"><?php echo $single['user_id']; ?></td>
                        <td><?php echo $single['account_number']; ?></td>
                        <td><?php echo $single['password']; ?></td>
                        <td><?php echo $single['phone_number']; ?></td>
                        <td><?php echo $single['mailbox']; ?></td>
                        <td><?php echo $single['open_time']; ?></td>
                        <td><?php echo $single['days']; ?></td>
                        <td><?php echo $single['end_time']; ?></td>
                        <td><?php echo $single['rest_download_times']; ?></td>
                        <td><?php echo $single['permission']; ?></td>
                        <td>
                            <?php if($single['status'] == 0): ?>
                              未激活
                            <?php else: ?>
                              已激活
                            <?php endif; ?>
                        </td>
                        <td><a href="" style="color:limegreen"  data-toggle="modal" data-target="#modal-edit-<?php echo $single['user_id']; ?>">编辑</a>
                            <a href=""  style="color:limegreen" onclick="deleteEntity('<?php echo $single['user_id']; ?>')">删除</a>
                        </td>
                    </tr>

                    <div class="modal fade" id="modal-edit-<?php echo $single['user_id']; ?>">
                    <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">编辑</h4>
                    </div>
                    <form action="/admin/user/edit/<?php echo $single['user_id']; ?>" method="post">
                    <div class="modal-body">
                    <label>账号</label>
                    <input name="account_number" value="<?php echo $single['account_number']; ?>" type="text" class="form-control my-colorpicker1">
                    <label>密码</label>
                    <input name="password" value="<?php echo $single['password']; ?>" type="text" class="form-control my-colorpicker1">
                    <label>手机号</label>
                    <input name="phone_number" value="<?php echo $single['phone_number']; ?>" type="text" class="form-control my-colorpicker1">
                        <label>邮箱</label>
                    <input name="mailbox" value="<?php echo $single['mailbox']; ?>" type="text" class="form-control my-colorpicker1">
                    <label>当天下载次数</label>
                    <input name="download_times" value="<?php echo $single['download_times']; ?>" type="number" class="form-control my-colorpicker1">
                        <label>当天剩余下载次数</label>
                    <input name="rest_download_times" value="<?php echo $single['rest_download_times']; ?>" type="number" class="form-control my-colorpicker1">
                    <label>是否为终生账号</label>
                    <select name="is_permanent" class="form-control permanent_select_2">
                    <?php if($single['is_permanent'] == 1): ?>
                    <option value="1" selected="selected">是</option>
                    <option value="0">否</option>
                    <?php else: ?>
                    <option value="1">是</option>
                    <option value="0" selected="selected">否</option>
                    <?php endif; ?>
                    </select>
                    <?php if($single['is_permanent'] == 1): ?>
                    <div class="date1" style="display: none">
                    <label>开通日期</label>
                    <input type="text" name="open_time" class="layui-input" value="<?php echo $single['open_time']; ?>"  style="width: 100px;"  autocomplete="off"><br>
                    <label>截止日期</label>
                    <input type="text" name="end_time"  class="layui-input" value="<?php echo $single['end_time']; ?>"  style="width: 100px;"  autocomplete="off"><br>
                    </div>
                    <?php else: ?>
                        <div class="date_2" style="display: inline-block">
                            <label>开通日期</label>
                            <input type="text" name="open_time" class="layui-input" value="<?php echo $single['open_time']; ?>"  style="width: 100px;"  autocomplete="off"><br>
                            <label>截止日期</label>
                            <input type="text" name="end_time"  class="layui-input" value="<?php echo $single['end_time']; ?>"  style="width: 100px;"  autocomplete="off"><br>
                        </div>
                    <?php endif; ?>

                    <label>账号状态</label> <br>
                    <?php if($single['status'] == 1): ?>
                    <input  type="radio" name="status" value="1" checked="checked"> 未激活
                    <input type="radio" name="status" value="2" > 激活 <br>
                    <?php else: ?>
                    <input  type="radio" name="status" value="1"> 未激活
                    <input type="radio" name="status" value="2" checked="checked"> 激活 <br>
                    <?php endif; ?>
                        <label>账号权限</label><br>
                        <?php if(!(empty($websiteList) || (($websiteList instanceof \think\Collection || $websiteList instanceof \think\Paginator ) && $websiteList->isEmpty()))): if(is_array($websiteList) || $websiteList instanceof \think\Collection || $websiteList instanceof \think\Paginator): $i = 0; $__LIST__ = $websiteList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$single2): $mod = ($i % 2 );++$i;if(in_array(($single2['website_name']), is_array($single['permission'])?$single['permission']:explode(',',$single['permission']))): ?>
                        <input type="checkbox" name="permission[]" value="<?php echo $single2['website_id']; ?>" checked="checked"><?php echo $single2['website_name']; else: ?>
                        <input type="checkbox" name="permission[]" value="<?php echo $single2['website_id']; ?>"><?php echo $single2['website_name']; endif; endforeach; endif; else: echo "" ;endif; endif; ?>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">重置</button>
                    <input type="submit" style="background: #FB9C60;border: 0" class="btn btn-primary edit" value="确定修改">
                    </div>
                    </form>
                    </div>
                    </div>
                    </div>





                    <?php endforeach; endif; else: echo "" ;endif; endif; ?>

                    </tbody>
                </table>
            </div>



        </div>
    </div>
</div>







<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">添加</h4>
            </div>
            <form action="/admin/user/add">
                <div class="modal-body">
                    <label>新增数量</label>
                    <input name="number2" id="number" type="number" class="form-control my-colorpicker1">
                    <label>当天下载次数</label>
                    <input name="download_times2" id="download_times" type="number" class="form-control my-colorpicker1">
                    <label>是否为终生账号</label>
                    <select name="is_permanent2" class="form-control permanent_select">
                        <option value="1">是</option>
                        <option value="0" selected="selected">否</option>
                    </select>
                    <div class="date">
                    <label>开通日期</label>
                    <input type="text" name="open_time2"  class="layui-input" value=""  style="width: 100px;"  autocomplete="off" id="time3"><br>
                    <label>截止日期</label>
                    <input type="text" name="end_time2"  class="layui-input" value=""  style="width: 100px;"  autocomplete="off" id="time4"><br>
                    </div>
                    <label>账号状态</label> <br>
                    <input  type="radio" name="status2" value="1" > 未激活
                    <input type="radio" name="status2" value="2" > 激活 <br>
                    <br>
                    <label>账号权限</label><br>
                    <?php if(!(empty($websiteList) || (($websiteList instanceof \think\Collection || $websiteList instanceof \think\Paginator ) && $websiteList->isEmpty()))): if(is_array($websiteList) || $websiteList instanceof \think\Collection || $websiteList instanceof \think\Paginator): $i = 0; $__LIST__ = $websiteList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$single): $mod = ($i % 2 );++$i;?>
                    <input type="checkbox" name="permission2[]" value="<?php echo $single['website_id']; ?>"><?php echo $single['website_name']; endforeach; endif; else: echo "" ;endif; endif; ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">重置</button>
                    <button style="background: #FB9C60;border: 0" class="btn btn-primary" id="add" data-dismiss="modal">确认添加</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script src="../../static/bower_components/jquery/dist/jquery.min.js"></script>
<script src="/static/layDate/laydate/laydate.js"></script>
<script src="../../static/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script>
    $(function () {
        $('#example1').DataTable({
            'paging'      : true,
            'lengthChange': true,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : true,
        });
    });


    $(document).ready(function(){
        $(".permanent_select").change(function(){
            //alert($(this).val());
            if($(this).val()==0){
                $(this).nextAll(".date").eq(0).css("display","inline-block");
            }
            if($(this).val()==1){
                $(this).nextAll(".date").eq(0).css("display","none");
            }
        });

        $(".permanent_select_2").change(function(){
            //alert($(this).val());
            if($(this).val()==0){
                $(this).nextAll(".date_2").eq(0).css("display","inline-block");
            }
            if($(this).val()==1){
                $(this).nextAll(".date_2").eq(0).css("display","none");
            }
        });

    });



    // var laydate = layui.laydate;
    // var endDate= laydate.render({
    //     elem: '#time4',//选择器结束时间
    //     type: 'datetime',
    //     min:"1970-1-1",//设置min默认最小值
    //     done: function(value,date){
    //         startDate.config.max={
    //             year:date.year,
    //             month:date.month-1,//关键
    //             date: date.date,
    //             hours: 0,
    //             minutes: 0,
    //             seconds : 0
    //         }
    //     }
    // });
    // //日期范围
    // var startDate=laydate.render({
    //     elem: '#time3',
    //     type: 'datetime',
    //     max:"2099-12-31",//设置一个默认最大值
    //     done: function(value, date){
    //         endDate.config.min ={
    //             year:date.year,
    //             month:date.month-1, //关键
    //             date: date.date,
    //             hours: 0,
    //             minutes: 0,
    //             seconds : 0
    //         };
    //     }
    // });




    //时间
    laydate.render({
        elem: '#time1' //或 elem: document.getElementById('test')、elem: lay('#test') 等
    });
    laydate.render({
        elem: '#time2' //或 elem: document.getElementById('test')、elem: lay('#test') 等
    });
    laydate.render({
        elem: '#time3' //或 elem: document.getElementById('test')、elem: lay('#test') 等
    });
    laydate.render({
        elem: '#time4' //或 elem: document.getElementById('test')、elem: lay('#test') 等
    });

    $(".checkbox-toggle").click(function () {

        $(".checkSingle").attr('checked','checked');

        var clicks = $(this).data('clicks');
        if (clicks) {
            //Uncheck all checkboxes
            $("input[type='checkbox']").iCheck("uncheck");
            $(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
        } else {
            //Check all checkboxes
            $("input[type='checkbox']").iCheck("check");
            $(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
        }
        $(this).data("clicks", !clicks);
    });

    $(".checkSingle").on("click",function () {
        $(this).attr('checked','checked');
    });

    //添加
    $("#add").click(function () {
        var number2 =  $("[name='number2']").val();
        var download_times2 =  $("[name='download_times2']").val();
        var is_permanent2 =  $("[name='is_permanent2']").val();
        var status2 =  $("[name='status2']").val();
        var open_time2 =  $("[name='open_time2']").val();
        var end_time2 =  $("[name='end_time2']").val();
        var permission2 =  $("[name='permission2']").val();

        var is_open2 =  $("[name='is_open2']").val();
        if(number2 == '' || download_times2 == '' || is_permanent2 == '' || status2 == '' || open_time2 == '' || end_time2 == '' || permission2 == ''){
            alert('缺少输入');
            return false;
        }
        $.ajax({
            type: "post",
            url: '/admin/user/add',
            data: {
                'number': number2,
                'download_times': download_times2,
                'is_permanent': is_permanent2,
                'status': status2,
                'open_time': open_time2,
                'end_time': end_time2,
                'permission': permission2
            },
            dataType: "json",
            success: function(data) {
                console.log(data);
                alert(data.msg);
                if(data.code == '201'){
                    window.location.reload();
                }
            },
            error:function(){
                alert('系统错误');
            }
        });
    });

    //激活
    $("#active").click(function () {
        var obj=document.getElementsByName('check_num');
        var s='';
        for(var i=0; i<obj.length; i++){
            if(obj[i].checked){
                s += obj[i].value;
                s += ',';
            }
        }
        $.ajax({
            type: "post",
            url: '/admin/user/active',
            data: {
                'check_num': s
            },
            dataType: "json",
            success: function(data) {
                alert(data.msg);
                if(data.code == '201'){
                    window.location.reload();
                }
            },
            error:function(){
                alert('系统错误');
            }
        });
    })


    //导出
    $("#export").on("click",function () {
        var obj=document.getElementsByName('check_num');
        var s='';
        for(var i=0; i<obj.length; i++){
            if(obj[i].checked){
                s += obj[i].value;
                s += ',';
            }
        }
        if(s == ''){
            alert('请至少选择一条进行导出');
            return false;
        }
        window.location.href = "/admin/user/export?check_num="+s;
    })

    function deleteEntity(id) {
        var result = confirm('确定删除该账号吗？');
        if(result == false){
            return false;
        }
        $.ajax({
            type: "post",
            url: '/admin/delete',
            data: {
                'type':3,
                'id': parseInt(id)
            },
            dataType: "json",
            success: function(data) {
                alert(data.msg);
                if(data.code == '204'){
                    window.location.reload();
                }
            },
            error:function(){
                alert('系统错误');
            }
        });
    }




</script>




        </section>
        <!-- /.content -->
    </div>

    <!--<style>
    .main-footer{
        height: 115px;
        padding: 0px;
        background: #E9E9E9;
        border-top:none;
    }

    .mlxg_footer{
        width: 1007px;
        height: 100%;
        /*background: tomato;*/
        margin: auto;
    }

    .mlxg_footer_inner{
        width: 100%;
        height: 68px;
        /*outline:1px solid purple;*/
        float: left;
        margin-top: 24px;
    }

    .mlxg_footer_inner>div{
        font-size: 12px;
    }

    .mlxg_footer_inner_one{
        width: 324px;
        height: 100%;
        float: left;
        /*outline: 1px solid pink;*/
    }

    .mlxg_footer_inner_two{
        width: 68px;
        height: 100%;
        float: left;
        /*outline: 1px solid pink;*/
        margin-left: 71px;
    }

    .mlxg_footer_inner_two>img{
        width: 100%;
    }

    .mlxg_footer_inner_three{
        width: 470px;
        height: 100%;
        float: right;
        /*outline: 1px solid pink;*/
    }

    .mlxg_span_content>span{
        margin-right: 17.5px;
    }

    .mlxg_span_content>span:nth-of-type(odd){
        cursor: pointer;
    }

    .mlxg_span_content>span:last-child{
        margin-right: 0;
    }
</style>
<footer class="main-footer" style="margin-left: 140px">
    <div class="mlxg_footer">
        <div class="mlxg_footer_inner">
            <div class="mlxg_footer_inner_one">
                <div style="padding-top: 26px" class="mlxg_span_content">
                    <span>使用须知</span>
                    <span>|</span>
                    <span>常见问题</span>
                    <span>|</span>
                    <span>客服服务</span>
                    <span>|</span>
                    <span>信息反馈</span>
                </div>

            </div>
            <div class="mlxg_footer_inner_two">
                <img src="../../static/home/images/201711241715517472.png" alt="error">
            </div>
            <div class="mlxg_footer_inner_three">
                <div style="padding-top:26px">版权所有： 深圳腾云金投信息科技有限公司 COPYRIGHT&copy;2017 粤ICP备09082528号-1</div>
            </div>
        </div>
    </div>

</footer>-->




    <div class="modal fade" id="reset-model">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">密码重置</h4>
                </div>
                <form>
                    <div class="modal-body">
                        <label>原密码</label>
                        <input id="oldPassword" name="oldPassword" type="password" class="form-control my-colorpicker1">
                        <label>新密码</label>
                        <input id="newPassword" name="newPassword" type="password" class="form-control my-colorpicker1">
                        <label>确认新密码</label>
                        <input id="newPassword2" name="newPassword2" type="password" class="form-control my-colorpicker1">
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-default pull-left" data-dismiss="modal">重置</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal"  id="sure_edit">确认修改</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>




</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../../static/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../static/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../../static/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../static/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../../static/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../static/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../static/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../static/dist/js/demo.js"></script>

<script src="../../static/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<script src="../../static/plugins/iCheck/icheck.min.js"></script>

<!-- page script -->
<script>
    // $(function () {
    //     $('#example1').DataTable()
    //     $('#example2').DataTable({
    //         'paging'      : true,
    //         'lengthChange': true,
    //         'searching'   : true,
    //         'ordering'    : true,
    //         'info'        : true,
    //         'autoWidth'   : false,
    //     });
    // });


    $('#datepicker').datepicker({
        autoclose: true,
        language:"cn",
    });

    $("#sure_edit").on("click",function () {
        $.ajax({
            type: "post",
            url: '/admin/resetPassword',
            data: {
                'oldPassword':  $("[name='oldPassword']").val(),
                'newPassword':  $("[name='newPassword']").val(),
                'newPassword2':  $("[name='newPassword2']").val()
            },
            dataType: "json",
            success: function(data) {
                if(data.code == '201'){
                    alert(data.msg);
                }else{
                    alert(data.msg);
                }
            },
            error:function(){
                alert('系统错误');
            }
        });

    })

</script>
</body>
</html>
