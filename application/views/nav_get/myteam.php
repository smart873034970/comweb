<div class="container-fluid-md">
    <div class="row">
        <div class="col-md-3 col-lg-2">
            <!-- <a href="compose.html" class="btn btn-block btn-success">邮件信息</a> -->
            <div class="mail-navigation">
                <h5 class="alert alert-success"><?php echo date('m-d G:i:s')?></h5>
                <ul class="nav nav-pills nav-stacked nav-mail">
                    <li class="active"><a href="#"><i class="fa fa-fw fa-inbox "></i> 用户操作 <span class="label label-warning pull-right">31</span></a></li>
                    <li><a onclick="nav_get('send_email')" style="cursor: pointer"><i class="fa fa-fw fa-envelope-o"></i> 发送一封邮件</a></li>
                    <!-- <li><a href="#"><i class="fa fa-fw fa-star"></i> 更改订阅状态</a></li> -->
                    <!-- <li><a href="#"><i class="fa fa-fw fa-file-text-o"></i> 更改用户信息</a></li> -->
                    <!-- <li><a href="#"><i class="fa fa-fw fa-trash-o"></i> 删除用户</a></li> -->
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





<script>
    var user_list = new Array();
</script>
            <div class="panel panel-lg panel-light" style="border:1px solid #F60;">
                <div class="panel-heading padding-md-vertical">
                    <h3 class="thin no-margin-top margin-md-bottom">
                        成员管理面板 <span class="smaller text-muted">(<?php echo sizeof($email_all); ?>)</span>
                    </h3>

                    <div class="clearfix">
                        <div role="toolbar" class="btn-toolbar pull-left">
                            <div class="btn-group btn-group-sm btn-group-text-normal">
                                <button class="btn btn-white" type="button" data-toggle="tooltip" data-container="body" onclick="nav_get('my_team')"data-original-title="Refresh"><i class="fa fa-repeat"></i></button>
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
                                    <?php 
                                        $index_count = 0;
                                        $max_count = 50; //the a page max show
                                        $total_count = isset($email_all['0']) == true ? sizeof($email_all['0']) : 0; //the total count
                                        $page_count = $total_count/$max_count;  //Total pages

                                    ?>
                                    <b>1</b>-<b><?php echo $total_count;?></b> of <?php echo $total_count; ?>
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
<!-- line -->
<!-- <a class="btn btn-primary btn-block" type="button" data-toggle="collapse" data-target="#collapseInfo" aria-expanded="false" aria-controls="collapseInfo">
  成员信息面板
</a> -->
<div class="panel panel-default collapse" id="collapseInfo">
        <div class="panel-body">
            <table id="table-basic" class="table table-striped dataTable" role="grid" aria-describedby="table-basic_info">
                <thead>
                    <tr role="row">
                        <th  tabindex="0" aria-controls="table-basic" rowspan="1" colspan="1"  aria-label="Rendering engine: activate to sort column ascending" style="width: 150px;">用户名称</th>
                        <th  tabindex="0" aria-controls="table-basic" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 294px;">用户邮箱</th>
                        <th  tabindex="0" aria-controls="table-basic" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 277px;">用户密码</th>
                        <th  tabindex="0" aria-controls="table-basic" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 194px;">注册时间</th>
                        <th  tabindex="0" aria-controls="table-basic" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 151px;">用户权限</th>
                        <th  tabindex="0" aria-controls="table-basic" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 151px;">用户权限</th>
                    </tr>
                </thead>
                <tbody >

                <!-- ### the content -->
                <?php

                    foreach($email_all as $value){
                        $index_count++; //
                        if($index_count > $total_count){
                            break;  // Exceeds the maximum value
                        }
                        printf('<script>user_list.push("%s")</script>', $value['username']);       
                        printf('<tr class="gradeA " role="row" class="myitem">
                        <td>%s</td>
                        <td>%s</td>
                        <td>%s</td>
                        <td>%s</td>
                        <td>%s</td>
                        <td><a class="btn btn-warning btn-sm" style="margin-right:2%%" onclick="fix(%d)">修改</a><a class="btn btn-danger btn-sm" onclick="del(%s)">删除</a></td>
                    </tr>',$value['username'], $value['email'], $value['password'], $value['create_time'], $value['permiss'], $index_count, $index_count);
                }

                ?>
<style>
tbody tr{-webkit-transition:background-color 0.5s linear}
tbody tr:hover{background: rgba(200,200,200,0.7);}
</style>
                </tbody>
            </table>
                <div style="width:100%; height:1px; margin:2% 0 2% 0; background: #83f;"></div>

            <div class="collapse" id="collapsefix">
                <div class="well">
                        <div class="row">
                            <div class="col-lg-2">
                                用户：<span id="tip_username"></span>
                            </div>
                            <div class="col-lg-2">
                                用户密码：
                            </div>
                            <div class="col-lg-3">
                                <div class="input-group">
                                    <input type="text" aria-label="..." name="password" id="fix_password">
                                </div><!-- /input-group -->
                            </div><!-- /.col-lg-6 -->
                            <div class="col-lg-2">
                                用户权限：
                            </div>
                            <div class="col-lg-3">
                                <div class="input-group">
                                    <input type="text"  aria-label="..." name="permiss" id="fix_permiss">
                                </div><!-- /input-group -->
                            </div><!-- /.col-lg-6 -->
                        </div><!-- /.row -->
                        </br>
                        <div style="text-align:right">
                            <button class="btn btn-success btn-sm text-right" id="fixcancel" style="margin-right:2%">取消修改</button><button class="btn btn-warning btn-sm text-right" id="fixsave">保存修改</button>
                        </div>
                </div>
            </div>

            <div class="row" style="margin-right:4%">
                <div class="col-xs-12" style="text-align:right">
                    <nav>
                        <ul class="pagination">
                            <li>
                                <a href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>

                            <!-- ### the page footer -->
                            <?php 
                                // echo $total_count; 
                                for($tmp_i=0; $tmp_i<$page_count; $tmp_i++){
                                    printf('<li><a href="%d">%s</a></li>',$tmp_i, ($tmp_i+1));
                                }
                            ?>
                            <li>
                                <a href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
        </div>
    </div>
</div>
<!-- Small modal -->

<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">删除用户</h4>
        </div>
        <div class="modal-body">
        <span id="del_tip"></span> 你确定要删除该用户吗？
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-info btn-sm" data-dismiss="modal">取消</button><button type="button" class="btn btn-danger btn-sm" onclick="isdel()">确定</button>
        </div>
    </div>
  </div>
</div>
<!-- lines -->

<!-- lines -->

<script>

    var tmp=0;
    $('#collapseInfo').collapse('show')

    //fix
    $('#fixcancel').click(function(){
        $('#collapsefix').collapse('hide');


        $('#fix_password').val('');
        $('#fix_permiss').val('');
    })

    $('#fixsave').click(function(){
        var return_state = false;
        if($('#fix_password').val().length < 5){
            alert('你输入的密码太短啦!')
        }else{
            // submit fix_form
            $.ajax({
                url: 'libs/c_user/fix_user',
                data:'username='+ $('#tip_username').html()+'&password='+$('#fix_password').val()+'&permiss='+$('#fix_permiss').val(),
                type: "get",
                beforeSend:function(){
                    $('#fixsave').html('正在提交..')
                },
                success:function(result){
                    if(result == 0){
                        $('#collapsefix').collapse('hide');
                        nav_get('my_team');
                    }else{
                        $('#fixsave').html('保存修改')
                        alert('修改失败');
                    }
                }
            })
        }
    $('#fix_password').val('');
    $('#fix_permiss').val('');

    })

    //fix-end

    //fix
    function fix(index){
        tmp = index;    //the index value
        var name = user_list[tmp-1]
        // alert(name)
        $('#tip_username').html(name)
        $('#collapsefix').collapse('show');
    }


    //delete
    function del(index){
        tmp = index;
        $('.bs-example-modal-sm').modal('show');
        $('#del_tip').html("[ "+user_list[tmp-1]+" ]");
    }
    function isdel(){
        $('.bs-example-modal-sm').modal('hide');
        var name = user_list[tmp-1]
        $.ajax({url: "libs/c_user/delete_user?username="+name, success: function(){
            setTimeout("my_refresh()",300);
        }})
    }
    function my_refresh(){
        nav_get('my_team')
    }
</script>
        </div>
    </div>
</div>
