<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>新用户注册</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/iriy-admin.min.css">
        <link rel="stylesheet" href="css/demo.css">
        <link rel="stylesheet" href="css/font-awesome.css">


    </head>
    <body class="">
        <div class="page-wrapper">


            <div class="page-content">
                <div class="page-subheading page-subheading-md">
    <ol class="breadcrumb">
        <li><a href="/">首页</a></li>
        <li class="active"><a>注册新用户</a></li>
    </ol>
</div>


<div class="container-fluid-md">
    <form class="form-horizontal form-bordered" id="reg_form" role="form">
        <div class="panel panel-default" >

            <div class="panel-body" >
                <div class="form-group text-center" style="margin-top:2%">
                	<h1>欢迎加入我们的团队</h1>
                </div>
                <div class="form-group username" style="margin-top:5%">
                    <label class="control-label col-sm-3">*用户名称</label>

                    <div class="controls col-sm-6">
                        <input class="form-control" name="username" type="username" id="input_username" placeholder="输入用户名称"/>
                        <span class="help-block">用户名称作为登录与昵称的唯一标识，不能更改.</span>
                    </div>
                </div>

                <div class="form-group mail">
                    <label class="control-label col-sm-3" >*邮箱地址</label>
                    <div class="controls col-sm-6">
                        <input class="form-control" type="email" name="email" id="input_email" placeholder="输入用户邮箱">
                        <span class="help-block">邮箱作为我们联系的方式.</span>
                    </div>
                </div>
                <div class="form-group pass">
                    <label class="control-label col-sm-3">*用户密码</label>
                    <div class="controls pass col-sm-6">
                        <input class="form-control" id="input_password1" type="text" onfocus="this.type='password'" autocomplete="off" name="password" id="input_password1" placeholder="输入用户密码">
                        <span class="help-block">用户密码作为唯一的登录口令.密码最少6位</span>
                    </div>
                </div>
                <div class="form-group pass pass2">
                    <label class="control-label col-sm-3">*确认密码</label>
                    <div class="controls col-sm-6">
                        <input class="form-control" type="text" onfocus="this.type='password'" autocomplete="off" id="input_password2" placeholder="再次输入用户密码">
                        <span class="help-block">确认输入的两次密码相同.密码最少6位</span>
                    </div>
                </div>
                <div class="form-group text-center">
					<button type="button" class="btn btn-primary btn-lg" id="btn-submit" onclick="mycheck()" style="width:10%; margin-top:7%">提交</button></br>
                    <a href="/" id="toIndexpage" style="display:none; margin-top:1%">点此立即返回</a></br>
                </div>
                <div class="foorer text-center" style="margin-top:10%">
                    Copyright ® xxx 
                </div>

</div>

            </div>
        </div>
<script src="js/jquery.min.js"></script>
<script>

//the function mycheck() validating form data format
function mycheck() {
    var submit_state = 0000;
    var username = $('#input_username').val();
    var password1 = $('#input_password1').val();
    var password2 = $('#input_password2').val();
    var email = $('#input_email').val();
    // the submit_state using 4 placeholder to identify the state
    if (username.length == 0) {
        $('.username').addClass('has-error');
        return;
    } else {
        $('.username').removeClass('has-error');
        submit_state = 1000;
    }

    if (isEmail(email) == false) {
        $('.mail').addClass('has-error');
    } else {
        $('.mail').removeClass('has-error');
        submit_state = 1100
    }
    if (password1.length >= 6) {
        $('.pass').removeClass('has-error');
        if (password1 != password2) {
            $('.pass2').addClass('has-error');
            retur;
        } else {
            $('.pass2').removeClass('has-error');
            submit_state = 1110;
        }
    } else {
        $('.pass').addClass('has-error');
        return;
    }
    if (submit_state = 1110) {
        mysubmit()
    }
}

//the isEmail is Validating email regular expressions
function isEmail(str) {
    var reg = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/;
    return reg.test(str);
}

//ajax submit form
function mysubmit() {
    var result;
    // $('#reg_form').submit();
    $.ajax({
        url: 'libs/c_user/add_user',
        data:$('#reg_form').serialize(),
        type: "POST",
        beforeSend:function(){
            $('#btn-submit').html('正在提交..')
        },
        success:function(result){
            if(result == 0){
                var a=3;
                $('#btn-submit').html('成功,3秒后返回')
                setInterval(function(){
                    if(a == 0 ){
                        window.location.replace("/");
                    }
                    $('#btn-submit').html('成功,'+a+'秒后返回')
                    document.getElementById('toIndexpage').style.display='block';
                    a--;
                }, 800)
            }else{
                alert('对不起，你输入的账户名称已存在!')
                $('#btn-submit').html('提交')
            }
        }
    })
}

//is enter keydown
document.onkeydown = function(e) {
    var e = e || event;
    if (e.keyCode == 13) {
        $('#btn-submit').click();
        e.preventDefault ? e.preventDefault() : (e.returnValue = false);
    }
}

</script>



    </body>
</html>
