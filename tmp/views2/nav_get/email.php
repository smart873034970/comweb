<div class="container-fluid-md">
    <div class="row">
        <div class="col-md-3 col-lg-2">
            <!-- <a href="compose.html" class="btn btn-block btn-success">邮件信息</a> -->
            <div class="mail-navigation">
                <h5 class="alert alert-success"><?php echo date('m-d G:i:s')?></h5>
                <ul class="nav nav-pills nav-stacked nav-mail">
                    <li class="active"><a href="#"><i class="fa fa-fw fa-inbox "></i> 邮件操作 <span class="label label-warning pull-right">31</span></a></li>
                    <li><a href="#"><i class="fa fa-fw fa-envelope-o"></i> 发送一封邮件</a></li>
                    <li><a href="#"><i class="fa fa-fw fa-star"></i> 更改订阅状态</a></li>
                    <li><a href="#"><i class="fa fa-fw fa-file-text-o"></i> 更改用户信息</a></li>
                    <li><a href="#"><i class="fa fa-fw fa-trash-o"></i> 删除用户</a></li>
                </ul>

                <h5>用户标记</h5>
                <ul class="nav nav-pills nav-stacked nav-mail">
                    <li><a href="#"><i class="fa fa-fw fa-circle text-primary"></i> 标记</a></li>
                    <li><a href="#"><i class="fa fa-fw fa-circle text-danger"></i> 标记</a></li>
                    <li><a href="#"><i class="fa fa-fw fa-circle text-info"></i> 标记</a></li>
                    <li><a href="#"><i class="fa fa-fw fa-circle text-warning"></i> 标记</a></li>
                    <li><a href="#"><i class="fa fa-fw fa-circle text-success"></i> 标记</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-9 col-lg-10">
            <div class="panel panel-lg panel-light">
                <div class="panel-heading padding-md-vertical">
                    <h3 class="thin no-margin-top margin-md-bottom">
                        已订阅列表 <span class="smaller text-muted">(<?php echo sizeof($email_all); ?>)</span>
                    </h3>

                    <div class="clearfix">
                        <div role="toolbar" class="btn-toolbar pull-left">
                            <div class="btn-group btn-group-sm btn-group-text-normal">
                                <button class="btn btn-white" type="button" data-toggle="tooltip" data-container="body" onclick="nav_get('my_subscribe')"data-original-title="Refresh"><i class="fa fa-repeat"></i></button>
                            </div>

                            <div class="btn-group btn-group-sm btn-group-text-normal">
                                <button class="btn btn-white" type="button" data-toggle="tooltip" data-container="body" data-original-title="Archive"><i class="fa fa-archive"></i></button>
                                <button class="btn btn-white" type="button" data-toggle="tooltip" data-container="body" data-original-title="Report spam"><i class="fa fa-exclamation-circle"></i></button>
                                <button class="btn btn-white" type="button" data-toggle="tooltip" data-container="body" data-original-title="Delete"><i class="fa fa-trash-o"></i></button>
                            </div>
                        </div>

                        <div role="toolbar" class="btn-toolbar pull-right">
                            <div class="btn-group btn-group-sm btn-group-text-normal">
                                <button data-toggle="dropdown" class="btn btn-white btn-no-border dropdown-toggle" type="button">
                                    <?php $person_count =sizeof($email_all); ?>
                                    <b>1</b>-<b><?php echo $person_count;?></b> of <?php echo $person_count; ?>
                                </button>
                                <ul role="menu" class="dropdown-menu dropdown-menu-right">
                                    <li class="disabled"><a href="javascript:;">Newest</a></li>
                                    <li><a href="javascript:;">Oldest</a></li>
                                </ul>
                            </div>

                            <div class="btn-group btn-group-sm btn-group-text-normal">
                                <button class="btn btn-white" type="button" data-toggle="tooltip" data-container="body" data-original-title="Newer"><i class="fa fa-chevron-left"></i></button>
                                <button class="btn btn-white" type="button" data-toggle="tooltip" data-container="body" data-original-title="Older"><i class="fa fa-chevron-right"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover table-mail">
                        <tbody>
                        <tr class="unread starred">
                            <td class="mail-form" style="width:8%; cursor: Pointer">
                                <b><input type="checkbox" name="selectall" value=on onclick="selectAll()"> Check</b>
                            </td>
                            <td class="mail-form" style="width:8%">
                                <b>订阅</b>
                            </td>
                            <td class="mail-from">
                                用户
                            </td>
                            <td class="mail-subject">
                                邮箱
                            </td>

                            <td class="mail-attachment" style="width:8%">
                                <b>注册状态</b>
                            </td>
                            <td class="mail-date" style="width:17%%;">
                                时间
                            </td>
                        </tr>
                        <link rel="stylesheet" href="css/myindex.css">
                <?php
                    foreach($email_all as $value){
                        if($value['state'] == 0){
                            $state = 'm-star';
                        }else{
                            $state = '';
                        }
                        if($value['reg_state'] == 0){
                            $reg_state = 'No';
                        }else{
                            $reg_state = 'Yes';
                        }                        
                        printf('<tr class="unread starred">
                            <td class="mail-form" style="width:8%%">
                                <input class="itemselect" type="checkbox"/>
                            </td>
                            <td class="mail-star">
                                <i class="%s"></i>
                            </td>
                            <td class="mail-from">
                                %s
                            </td>
                            <td class="mail-subject">
                                <span class="label label-warning">[预留] </span>%s
                            </td>
                            <td class="mail-attachment" style="width:8%%">
                                <b>%s</b>
                            </td>
                            <td class="mail-date" style="width:17%%">
                                <span >%s<span>
                            </td>
                        </tr>', $state, $value['username'], $value['email'], $reg_state,$value['create_time']);
                    }
                ?>
                <!-- <button style="margin-left:5%%" type="button" id="send-email" onclick="nav_get(\'send_email?%s\')" class="btn btn-warning btn-sm">回信</button> -->
                        </tbody>
                        <script>
                        $('.itemselect').click(function(){
                            alert('123');
                        })
                        </script>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
