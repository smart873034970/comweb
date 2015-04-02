<?php session_start();?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php require_once 'resource/resource.php'; echo $GolbalTitle['sign-in']; ?></title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/iriy-admin.min.css">
        <link rel="stylesheet" href="css/demo.css">
        <link rel="stylesheet" href="css/font-awesome.css">
		<style>
#mytitle
{
    margin-top:5%;
-webkit-animation:myfirst 0.5s; /* Safari and Chrome */
-webkit-animation-fill-mode: forwards;
}
#body{
    /*padding-top: 4%;*/
    -webkit-animation: mybody 1s;
    -webkit-animation-fill-mode: forwards;
}
#myinfo{
    color:#fff;
    -webkit-animation: myinfo 0.3s;
    -webkit-animation-fill-mode: forwards;
}
@-webkit-keyframes myinfo{
    from {margin-left:15%;font-size:150%; color:#fff;}
    to {margin-left:26%; font-size:300%; color:#2e3192;}
}

@-webkit-keyframes mybody{
    from {background:#999; }
    to {background:#eee;}
}

@-webkit-keyframes myfirst /* Safari and Chrome */
{
from {margin-left:0;}
to {margin-left:30%;}
}

		</style>
    </head>
    <body class="body-sign-in" id="body" >
        <div id="chrome" style="width:100%; text-align:center; background:#c8a; padding:1% 0 1% 0; color:#ddd"><span>您当前使用的浏览器对CSS3 / HTML5 支持不完美，为了您能正常访问，我们推荐您使用Chrome内核浏览器</span><span  id="chrome-close" onclick="hide_me()" style="margin-left:2%; cursor: pointer;">&times;</span></div>
        <script>
            var isChrome = window.navigator.userAgent.indexOf("Chrome") !== -1 
            var state =document.getElementById('chrome');
            if(isChrome == true){
                state.style.display="none";
            }else{
                state.style.display="block";
            }
            function hide_me(){
                state.style.display="none";
            }
            function mysubmit(){
                if(isChrome == false){
                    alert('对不起，您当前使用的浏览器对CSS3与HTML5支持不完全，请更换浏览器我，我们推荐您使用Chrome内核浏览器。')
                }else{
                    document.getElementById('login_form').submit();
                }
            }
            document.onkeydown=function(event){
                var e = event || window.event || arguments.callee.caller.arguments[0];
                if(e && e.keyCode==13){
                    document.getElementById('login_form').submit();
                }
            }; 
        </script>
    <div class="container" style="margin-top:6%">
        
        <span id="myinfo"><img src="images/logo.png" style="margin-right:5%"/>信息管理与发布</span>
            <div id="mytitle" class="panel panel-default form-container">
            <div class="panel-body">
                <form role="form" id="login_form" action="libs/c_user/login_in">
                    <h3 id="myhead" class="text-center margin-xl-bottom">登录</h3>

                    <div class="form-group text-center username">
                        <label class="sr-only" for="email">Email Address</label>
                        <?php
                            if(isset($_SESSION['had_login'])){
                                printf('<input name="username" type="email" class="form-control input-lg"  readonly id="email" value="%s">',$_SESSION['username']);
                            }else{
                                printf('<input name="username" type="email" class="form-control input-lg" id="input_username" id="email" placeholder="用户名">');
                            }
                        ?>
                    </div>
                    <div class="form-group text-center password">
                        <label class="sr-only" for="password">Password</label>
                        <?php
                            if(isset($_SESSION['had_login'])){
                        printf('<input name="password" type="text" onfocus="this.type=\'password\'" autocomplete="off" class="form-control input-lg" id="password" readonly value="************">');
                            }else{
                        printf('<input name="password" type="text" onfocus="this.type=\'password\'" autocomplete="off" class="form-control input-lg" id="input_password" placeholder="密码">');
                            }
                        ?>
                    </div>
                        <?php
                            if(isset($_SESSION['had_login'])){
                                printf('<a type="button" href="libs/c_user/login_out" class="btn btn-warning btn-block btn-lg">注销 / 更换帐号</a>');
                                printf('<a type="button" href="welcome" class="btn btn-primary btn-block btn-lg">登入</a>');
                            }else{
                                printf('<a type="button" href="register" class="btn btn-info btn-block btn-lg">注册新用户</a>');
                                printf('<button type="button" onclick="mycheck()" id="btn-submit" class="btn btn-primary btn-block btn-lg">登入</button>');
                            }
                        ?>
                </form>
            </div>
            <div class="panel-body text-center">
                <div class="margin-bottom">
                    <a class="text-muted text-underline" href="javascript:;">Forgot Password? Please contact admin.</a>
                </div>
                <div>
                    <center>CopyRight ® yaninfo</center>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<script src="js/jquery.min.js"></script>
<script>

//the function mycheck() validating form data format
function mycheck() {
    var submit_state = 0000;
    var username = $('#input_username').val();
    var password = $('#input_password').val();
    // the submit_state using 4 placeholder to identify the state
    if (username.length == 0) {
        $('.username').addClass('has-error');
        return;
    } else {
        $('.username').removeClass('has-error');
        submit_state = 1;
    }
    if (password.length == 0) {
        $('.password').addClass('has-error');
        return;
    } else {
        $('.password').removeClass('has-error');
        submit_state = 11;
    }
    if (submit_state = 11) {
        mysubmit();
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
        url: 'libs/c_user/login_in',
        data:$('#login_form').serialize(),
        type: "POST",
        beforeSend:function(){
            $('#btn-submit').html('正在提交..')
        },
        success:function(result){
            if(result == 0){
                    window.location.replace("/welcome");
            }else{
                alert('对不起你输入的帐号密码不正确')
                $('#btn-submit').html('提交')
                $('#input_password').val('')
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
