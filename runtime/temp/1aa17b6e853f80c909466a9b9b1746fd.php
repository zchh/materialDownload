<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:88:"F:\php_project\git_project\materialDownload\public/../application/admin\view\notice.html";i:1527573866;s:81:"F:\php_project\git_project\materialDownload\application\admin\view\base\base.html";i:1528513919;s:42:"../application/admin/view/base/header.html";i:1527767676;s:43:"../application/admin/view/base/sidebar.html";i:1527769384;s:42:"../application/admin/view/base/footer.html";i:1525767586;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>后台管理系统</title>
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
                <h3 class="box-title">公告管理</h3>
            </div>

            <div style="position: relative;margin-bottom: 69px" >
                <button  type="button" class="btn btn-default pull-right" style="background: #67AEC2;color: white;border: none;border-radius: 5px" data-toggle="modal" data-target="#modal-default" id="add-model">
                    新增
                </button>
            </div>

            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>通知内容</th>
                        <th>启用</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(!(empty($data) || (($data instanceof \think\Collection || $data instanceof \think\Paginator ) && $data->isEmpty()))): if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$single): $mod = ($i % 2 );++$i;?>
                    <tr>
                        <td><?php echo $single['notice_id']; ?></td>
                        <td><?php echo $single['notice_content']; ?></td>
                        <td>
                            <?php if($single['is_open'] == 1): ?>
                               启用状态
                            <?php else: ?>
                               关闭状态
                            <?php endif; ?>
                        </td>

                        <td><a href="" style="color:limegreen" data-toggle="modal" data-target="#modal-edit-<?php echo $single['notice_id']; ?>">编辑</a>
                            <a href=""  style="color:limegreen" onclick="deleteEntity('<?php echo $single['notice_id']; ?>')">删除</a>
                        </td>
                    </tr>

                    <div class="modal fade" id="modal-edit-<?php echo $single['notice_id']; ?>">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">编辑</h4>
                                </div>
                                <form action="/admin/notice/edit/<?php echo $single['notice_id']; ?>" method="post">
                                    <div class="modal-body">
                                        <label>通知内容</label>
                                        <input type="text" class="form-control my-colorpicker1" name="notice_content" value="<?php echo $single['notice_content']; ?>">
                                        <br>
                                        <label>是否启用</label>
                                        <select name="is_open" class="form-control">
                                            <option value="">--</option>
                                            <?php if(1 == $single['is_open']): ?>
                                            <option value="1" selected="selected">启用</option>
                                            <option value="0">关闭</option>
                                            <?php else: ?>
                                            <option value="1">启用</option>
                                            <option value="0" selected="selected">关闭</option>
                                            <?php endif; ?>
                                        </select>
                                        <br>
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
            <form action="/admin/notice/add">
                <div class="modal-body">
                    <label>通知内容</label>
                    <input id="download_times" type="text" class="form-control my-colorpicker1" name="notice_content2">
                    <br>
                    <label>是否启用</label>
                    <select name="is_open2" class="form-control">
                        <option value="">--</option>
                        <option value="1">启用</option>
                        <option value="0">关闭</option>
                    </select>
                    <br>
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

    //添加
    $("#add").click(function () {
        var notice_content2 =  $("[name='notice_content2']").val();
        var is_open2 =  $("[name='is_open2']").val();
        if(notice_content2 == '' || is_open2 == ''){
            alert('缺少输入');
            return false;
        }
        $.ajax({
            type: "post",
            url: '/admin/notice/add',
            data: {
                'notice_content': notice_content2,
                'is_open': is_open2
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


    function deleteEntity(id) {
        var result = confirm('确定删除该账号吗？');
        if(result == false){
            return false;
        }
        $.ajax({
            type: "post",
            url: '/admin/delete',
            data: {
                'type':1,
                'id': parseInt(id)
            },
            dataType: "json",
            success: function(data) {
                if(data.code == '204'){
                    window.location.reload();
                }
            },
            error:function(){
                alert('系统错误');
            }
        });
    }








    //修改
    // $(".edit").click(function () {
    //     var account_number =  $("[name='account_number']").val();
    //     var password =  $("[name='password']").val();
    //     var type = $("[name='type']").val();
    //     if(account_number == '' || password == '' || type == ''){
    //         alert('缺少输入');
    //         return false;
    //     }
    //     $.ajax({
    //         type: "post",
    //         url: '/admin/account/add',
    //         data: {
    //             'account_number': account_number,
    //             'password': password,
    //             'type': type
    //         },
    //         dataType: "json",
    //         success: function(data) {
    //             alert(data.msg);
    //             if(data.code == '201'){
    //                 window.location.reload();
    //             }
    //         },
    //         error:function(){
    //             alert('系统错误');
    //         }
    //     });
    // })





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
