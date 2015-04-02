<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php require_once 'resource/resource.php'; echo $GolbalTitle['index']; ?></title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/iriy-admin.min.css">
        <link rel="stylesheet" href="css/demo.css">
        <link rel="stylesheet" href="css/font-awesome.css">

        <link rel="stylesheet" href="css/jquery-jvectormap-1.2.2.css">
        <link rel="stylesheet" href="css/rickshaw.min.css">
         <link rel="stylesheet" href="css/morris.min.css">
       
  </head>
    <body class="">
    <?php 
        if(!isset($_SESSION['had_login'])){
            echo '您还没有登录，没有足够的权限访问当前页面<a href="/">点击此处登录</a>';
            exit;
        }
    ?>
        <header>
            <nav class="navbar navbar-default navbar-static-top no-margin" role="navigation">
                <div class="navbar-brand-group">
                    <a class="navbar-sidebar-toggle navbar-link" data-sidebar-toggle>
                        <i class="fa fa-lg fa-fw fa-bars"></i>
                    </a>
                    <a class="navbar-brand hidden-xxs" href="welcome">
                        <span class="sc-visible">
                            I
                        </span>
                        <span class="sc-hidden">
                            <span class="semi-bold">当前权限:</span>
                            <?php
                                if(isset($_SESSION['permiss']))
                                    echo $_SESSION['permiss'];
                                else
                                    echo 'None';
                            ?>
                        </span>
                    </a>
                </div>
                <ul class="nav navbar-nav navbar-nav-expanded pull-right margin-md-right">
                    <li class="hidden-xs">
                        <form class="navbar-form">
                            <div class="navbar-search">
                                <input type="text" placeholder="Search &hellip;" class="form-control">
                                <button class="btn" type="submit"><i class="fa fa-search"></i></button>
                            </div>
                        </form>
                    </li>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="javascript:;">
                            <i class="fa fa-envelope"></i>
                            <span class="badge badge-up badge-dark badge-small">3</span>
                        </a>
                        <ul class="dropdown-menu dropdown-messages pull-right">
                            <li class="dropdown-title bg-inverse">New Messages</li>
                            <li class="unread">
                                <a href="javascript:;" class="message">
                                    <img class="message-image img-circle" src="images/7.jpg">

                                    <div class="message-body">
                                        <strong>Ernest Kerry</strong><br>
                                        Hello, You there?<br>
                                        <small class="text-muted">8 minutes ago</small>
                                    </div>
                                </a>
                            </li>
                            <li class="unread">
                                <a href="javascript:;" class="message">
                                    <img class="message-image img-circle" src="images/7.jpg">

                                    <div class="message-body">
                                        <strong>Don Mark</strong><br>
                                        I really appreciate your &hellip;<br>
                                        <small class="text-muted">21 hours</small>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;" class="message">
                                    <img class="message-image img-circle" src="images/7.jpg">

                                    <div class="message-body">
                                        <strong>Jess Ronny</strong><br>
                                        Let me know when you free<br>
                                        <small class="text-muted">5 days ago</small>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;" class="message">
                                    <img class="message-image img-circle" src="images/7.jpg">

                                    <div class="message-body">
                                        <strong>Wilton Zeph</strong><br>
                                        If there is anything else &hellip;<br>
                                        <small class="text-muted">06/10/2014 5:31 pm</small>
                                    </div>
                                </a>
                            </li>
                            <li class="dropdown-footer">
                                <a href="javascript:;"><i class="fa fa-share"></i> See all messages</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="javascript:;">
                            <i class="fa fa-globe fa-lg"></i>
                            <span class="badge badge-up badge-danger badge-small">3</span>
                        </a>
                        <ul class="dropdown-menu dropdown-notifications pull-right">
                            <li class="dropdown-title bg-inverse">Notifications (3)</li>
                            <li>
                                <a href="javascript:;" class="notification">
                                    <div class="notification-thumb pull-left">
                                        <i class="fa fa-clock-o fa-2x text-info"></i>
                                    </div>
                                    <div class="notification-body">
                                        <strong>Call with John</strong><br>
                                        <small class="text-muted">8 minutes ago</small>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;" class="notification">
                                    <div class="notification-thumb pull-left">
                                        <i class="fa fa-life-ring fa-2x text-warning"></i>
                                    </div>
                                    <div class="notification-body">
                                        <strong>New support ticket</strong><br>
                                        <small class="text-muted">21 hours ago</small>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;" class="notification">
                                    <div class="notification-thumb pull-left">
                                        <i class="fa fa-exclamation fa-2x text-danger"></i>
                                    </div>
                                    <div class="notification-body">
                                        <strong>Running low on space</strong><br>
                                        <small class="text-muted">3 days ago</small>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;" class="notification">
                                    <div class="notification-thumb pull-left">
                                        <i class="fa fa-user fa-2x text-muted"></i>
                                    </div>
                                    <div class="notification-body">
                                        New customer registered<br>
                                        <small class="text-muted">06/18/2014 12:31 am</small>
                                    </div>
                                </a>
                            </li>
                            <li class="dropdown-footer">
                                <a href="javascript:;"><i class="fa fa-share"></i> See all notifications</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle navbar-user" href="javascript:;">
                            <?php
                                $img_src='images/none.jpg';
                                if(!empty($_SESSION['had_login']))
                                    $img_src='images/profile.jpg';
                                printf('<img class="img-circle" src="%s">',$img_src);
                            ?>
                            <span class="hidden-xs">
                            <?php
                                if(isset($_SESSION['username']))
                                    echo $_SESSION['username'];
                                else
                                    echo '游客';
                            ?>
                            </span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu pull-right-xs">
                            <li class="arrow"></li>
                            <li><a href="profile.html">Profile</a></li>
                            <li><a href="javascript:;"><span class="badge badge-danger pull-right">2</span> Inbox</a></li>
                            <li><a href="javascript:;">Messages</a></li>
                            <li><a href="javascript:;">Settings</a></li>
                            <li class="divider"></li>
                            <li><a href="libs/c_user/login_out">注销</a></li>
                        </ul>
                    </li>
                </ul>
                <a id="navbar-buy-theme" class="btn btn-danger btn-sm navbar-btn btn-round pull-right margin-right-md" href="">戳一下!</a>
            </nav>
        </header>
        <div class="page-wrapper">
            <aside class="sidebar sidebar-default">
                <div class="sidebar-profile">
                <?php
                    // $img_src='images/none.jpg';
                    // if(!empty($_SESSION['had_login']))
                        // $img_src = 'images/profile.jpg';
                    printf('<img class="img-circle profile-image" src="%s">',$img_src);
                ?>
                    <div class="profile-body">
                        <h4>
                            <?php
                                if(isset($_SESSION['username']))
                                    echo $_SESSION['username'];
                                else
                                    echo '游客';
                            ?>
                        </h4>

                        <div class="sidebar-user-links">
                            <a class="btn btn-link btn-xs" href="profile.html" data-placement="bottom" data-toggle="tooltip" data-original-title="Profile"><i class="fa fa-user"></i></a>
                            <a class="btn btn-link btn-xs" href="javascript:;"       data-placement="bottom" data-toggle="tooltip" data-original-title="Messages"><i class="fa fa-envelope"></i></a>
                            <a class="btn btn-link btn-xs" href="javascript:;"       data-placement="bottom" data-toggle="tooltip" data-original-title="Settings"><i class="fa fa-cog"></i></a>
                            <a class="btn btn-link btn-xs" href="libs/c_user/login_out" data-placement="bottom" data-toggle="tooltip" data-original-title="Logout"><i class="fa fa-sign-out"></i></a>
                        </div>
                    </div>
                </div>
                <nav>
                    <h5 class="sidebar-header">目录</h5>
                    <ul class="nav nav-pills nav-stacked">
                        <li class="nav-dropdown active open">
                            <a class="main_index" title="网站监测">
                                <i class="fa fa-lg fa-fw fa-home"></i> 网站监测
                            </a>
                            <ul class="nav-sub">
                                <li>
                                    <a onclick="nav_get('')" title="Dashboard">
                                        <i class="fa fa-fw fa-caret-right"></i> 概览
                                    </a>
                                </li>
                                <li>
                                    <a onclick="nav_get('webwatch_context/163')" title="Dashboard">
                                        <i class="fa fa-fw fa-caret-right"></i> 163
                                    </a>
                                </li>
                                <li>
                                    <a onclick="nav_get('webwatch_context/sina')"title="Analytics Overview">
                                        <i class="fa fa-fw fa-caret-right"></i> 新浪
                                        <span class="label label-danger pull-right">New</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-dropdown">
                            <a href="#" title="Users">
                                <i class="fa fa-lg fa-fw fa-user"></i> 成员管理
                            </a>
                            <ul class="nav-sub">
                                <li>
                                    <a onclick="nav_get('my_team')"title="Members">
                                        <i class="fa fa-fw fa-caret-right"></i> <span>我的成员</span>
                                    </a>
                                </li>
                                <li>
                                    <a onclick="nav_get('add_team')" title="Profile">
                                        <i class="fa fa-fw fa-caret-right"></i> 添加成员
                                    </a>
                                </li>
                              <!--   <li>
                                    <a onclick="nav_get('my_infomation')"title="Profile">
                                        <i class="fa fa-fw fa-caret-right"></i> 我的信息
                                    </a>
                                </li> -->
                            </ul>
                        </li>
                        <li class="nav-dropdown">
                            <a href="#" title="Users">
                                <i class="fa fa-lg fa-fw fa-envelope-o"></i> 邮件
                                <span class="label label-danger pull-right">预留</span>
                            </a>
                            <ul class="nav-sub">
                                <li>
                                    <a  onclick="nav_get('my_subscribe')" title="Compose">
                                        <i class="fa fa-fw fa-caret-right"></i> 我的订阅
                                    </a>
                                </li>
                                <li>
                                    <a onclick="nav_get('had_email')"title="Inbox">
                                        <i class="fa fa-fw fa-caret-right"></i> 已发送邮件
                                    </a>
                                </li>
                                <li>
                                    <a title="Message">
                                        <i class="fa fa-fw fa-caret-right"></i> 我的收信
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-dropdown">
                            <a href="#" title="UI Elements">
                                <i class="fa fa-lg fa-fw fa-suitcase"></i> 我的项目
                            </a>
                            <ul class="nav-sub">
                                <li>
                                    <a title="Typography">
                                        <i class="fa fa-fw fa-caret-right"></i> 项目总览
                                        <span class="pull-right badge badge-info">More</span>
                                    </a>
                                    <!-- sub-sub menu -->
                                    <ul class="nav-sub">
                                        <li>
                                            <a href="#" "项目总览">
                                                <i class="fa fa-fw fa-file"></i>
                                                Project1
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a title="Buttons">
                                        <i class="fa fa-fw fa-caret-right"></i> 项目需求
                                    </a>
                                </li>
                                <li>
                                    <a title="Panels">
                                        <i class="fa fa-fw fa-caret-right"></i> 项目提交
                                    </a>
                                </li>
                                <li>
                                    <a title="Tabs & Accordions">
                                        <i class="fa fa-fw fa-caret-right"></i> 项目进度
                                        <span class="label label-danger pull-right">预留</span>
                                    </a>
                                </li>
                                <li>
                                    <a title="Tooltips & Popovers">
                                        <i class="fa fa-fw fa-caret-right"></i> 项目交流
                                    </a>
                                </li>
                                <li>
                                    <a title="Alerts">
                                        <i class="fa fa-fw fa-caret-right"></i> 项目分配
                                    </a>
                                </li>
                                <li>
                                    <a title="Components">
                                        <i class="fa fa-fw fa-caret-right"></i> 技术文档
                                        <span class="label label-danger pull-right">New</span>
                                    </a>

                                </li>
                                <li>
                                    <a title="Icons">
                                        <i class="fa fa-fw fa-caret-right"></i> 团队协作
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-dropdown">
                            <a href="#" title="Forms">
                                <i class="fa fa-lg fa-fw fa-edit"></i> 预留
                                <span class="label label-warning pull-right">预留</span>
                            </a>
                            <ul class="nav-sub">
                                <li>
                                    <a title="Form Layouts">
                                        <i class="fa fa-fw fa-caret-right"></i> 预留
                                    </a>
                                </li>
                                <li>
                                    <a title="Basic Elements">
                                        <i class="fa fa-fw fa-caret-right"></i> 预留
                                    </a>
                                </li>
                                <li>
                                    <a title="Advanced Components">
                                        <i class="fa fa-fw fa-caret-right"></i> 预留
                                    </a>
                                </li>
                                <li>
                                    <a title="Sliders">
                                        <i class="fa fa-fw fa-caret-right"></i> 预留
                                    </a>
                                    </li>
                                <li>
                                    <a title="Form Wizards">
                                        <i class="fa fa-fw fa-caret-right"></i> 预留
                                    </a>
                                </li>
                                <li>
                                    <a title="Form Validation">
                                        <i class="fa fa-fw fa-caret-right"></i> 预留
                                    </a>
                                </li>
                                <li>
                                    <a title="Editors">
                                        <i class="fa fa-fw fa-caret-right"></i> 预留
                                        <span class="label label-danger pull-right">预留</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="disabled">
                            <a href="javascript:;" title="Disabled">
                                <i class="fa fa-lg fa-fw fa-th"></i> 预留
                            </a>
                        </li>
                    </ul>
                    <h5 class="sidebar-header">标签</h5>
                    <ul class="nav nav-pills nav-stacked">
                        <li>
                            <a href="javascript:;">
                                <i class="fa fa-fw fa-circle text-danger"></i>
                                预留
                            </a>
                        </li>
                        <li>
                            <a href="javascript:;">
                                <i class="fa fa-fw fa-circle text-success"></i>
                                预留
                            </a>
                        </li>
                        <li>
                            <a href="javascript:;">
                                <i class="fa fa-fw fa-circle text-info"></i>
                                预留
                            </a>
                        </li>
                    </ul>
                    <h5 class="sidebar-header">数据</h5>
                    <ul class="sidebar-summary">
                        <li>
                            <div class="mini-chart mini-chart-block">
                                <div class="chart-details">
                                    <div class="chart-name">预留</div>
                                    <div class="chart-value">预留</div>
                                </div>
                                <div id="mini-chart-sidebar-1" class="chart pull-right"></div>
                            </div>
                        </li>
                        <li>
                            <div class="mini-chart mini-chart-block">
                                <div class="chart-details">
                                    <div class="chart-name">预留</div>
                                    <div class="chart-value">预留</div>
                                </div>
                                <div id="mini-chart-sidebar-2" class="chart pull-right"></div>
                            </div>
                        </li>
                        <li>
                            <div class="mini-chart mini-chart-block">
                                <div class="chart-details">
                                    <div class="chart-name">预留</div>
                                    <div class="chart-value">预留</div>
                                </div>
                                <div id="mini-chart-sidebar-3" class="chart pull-right"></div>
                            </div>
                        </li>
                    </ul>
                </nav>
            </aside>

<div class="page-content">
                <div class="page-subheading page-subheading-md">
    <ol class="breadcrumb">
        <li><a href="javascript:;">主页</a></li>
        <li class="active menu-second">公司信息</li>
    </ol>
</div>



<div class="container-fluid-md" id="body" style="margin-bottom:5%">
<!-- content  -->
</div>

            </div>
        </div>
<!-- modal dialog -->
<div class="modal fade" id="tip" tabindex="-1" aria-labelledby="tiplabel" aria-hidden="true" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">温馨提示</h4>
            </div>
            <div class="modal-body">
                <span style="font-size:130%">您好，欢迎访问陕西亚安信息技术科技有限公司。</br></br>您可以在下方告诉我们您的邮箱，订阅我们的内容，我们将会不定时的发送关于公司的招聘、业务、文档、推广...信息。</span>
                <form role="form" style="margin:5% 0 2% 0">
                        <label class="sr-only" for="email">Email Address</label>
                        <h3>Email:</h3> <input name="username" type="email" class="form-control input-lg" id="email" placeholder="example@yaninfo.com">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <button type="button" id="email-submit" class="btn btn-primary" data-loading-text="正在提交" autocomplete="off" style="width:15%">提交</button>
            </div>
        </div>
    </div>
</div>
<!-- modal end -->

        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.navgoco.js"></script>
        <script src="js/main.js"></script>
        <script src="js/jquery.sparkline.js"></script>
        <script src="js/demo.js"></script>

        <script src="js/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="js/world_mill_en.js"></script>
        <script src="js/vendor/d3.v3.js"></script>
        <script src="js/rickshaw.min.js"></script>

        <script src="js/jquery.flot.js"></script>
        <script src="js/jquery.flot.resize.js"></script>
        <script src="js/raphael-min.js"></script>
        <script src="js/morris.min.js"></script>
        <script src="js/dashboard.js"></script>
        <!-- 去掉菜单栏href属性后[为ajax做准备]，设置鼠标样式 -->
        <style type="text/css">
            nav a{ cursor:pointer;} 
        </style>

        <script>              
        // 用于目录异步获取信息
            function nav_get(name){
                var menu_second='';
                switch(name){
                    case '':
                        menu_second = '网站概览';
                        break;
                    case 'my_team':
                        menu_second = '我的成员';
                        break;
                    case 'add_team':
                        menu_second = '添加成员';
                        break;
                    case 'my_subscribe':
                        menu_second = '我的订阅';
                        break;
                    case 'webwatch_context/163':
                        menu_second = '163';
                        break;
                    case 'webwatch_context/sina':
                        menu_second = 'sina';
                        break;
                    case 'gsxx':
                        menu_second = '公司信息';
                        break;
                    case 'fsyj':
                        menu_second = '已发送邮件';
                        break;

                }
                $('.menu-second').text(menu_second);

                result = $.ajax({url: "main_ajax/"+name, beforeSend: function(){
                    $('#body').html('内容正在加载');
                },error: function(){
                    $('$body').html('获取数据出错');
                }, success: function(){
                    $('#body').html(result.responseText);
                }});
            }//nav_get function end

                <?php
                    if(empty($_SESSION['had_login'])){
                        echo "$('#tip').modal('toggle')";
                    }
                ?>  

                nav_get('');    //默认显示公司信息
        </script>
        


    </body>
</html>

