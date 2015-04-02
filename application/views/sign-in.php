<!DOCTYPE HTML>
<?php
	session_start(); 
	if(isset($_SESSION['had_login'])){
		header("Location: /welcome");
	}
?>
<html>
<head>
	<!-- 新 Bootstrap 核心 CSS 文件 -->
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js//jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<title>亚安信息技术管理平台</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<!--<link href="http://fonts.googleapis.com/css?family=IM+Fell+English:400,400italic|Open+Sans:300,400" rel="stylesheet" type="text/css">--->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/jquery.min.js"></script>
	 	<!---strat-slider---->
	    <link rel="stylesheet" type="text/css" href="css/slider.css" />
		<script type="text/javascript" src="js/modernizr.custom.28468.js"></script>
		<script type="text/javascript" src="js/jquery.cslider.js"></script>
			<script type="text/javascript">
				$(function() {
				
					$('#da-slider').cslider({
						autoplay	: true,
						bgincrement	: 500
					});
				
				});
			</script>
	<!-- start gallery_sale -->
	<script type="text/javascript" src="js/jquery.easing.min.js"></script>	
	<script type="text/javascript" src="js/jquery.mixitup.min.js"></script>
	<script type="text/javascript">
	$(function () {
		
		var filterList = {
		
			init: function () {
			
				// MixItUp plugin
				// http://mixitup.io
				$('#portfoliolist').mixitup({
					targetSelector: '.portfolio',
					filterSelector: '.filter',
					effects: ['fade'],
					easing: 'snap',
					// call the hover effect
					onMixEnd: filterList.hoverEffect()
				});				
			
			},
			
			hoverEffect: function () {
			
				// Simple parallax effect
				$('#portfoliolist .portfolio').hover(
					function () {
						$(this).find('.label').stop().animate({bottom: 0}, 200, 'easeOutQuad');
						$(this).find('img').stop().animate({top: -30}, 500, 'easeOutQuad');				
					},
					function () {
						$(this).find('.label').stop().animate({bottom: -40}, 200, 'easeInQuad');
						$(this).find('img').stop().animate({top: 0}, 300, 'easeOutQuad');								
					}		
				);				
			
			}

		};
		
		// Run the show!
		filterList.init();
	});	
	</script>
</head>
<body>
<!-- start header -->
<div class="header_bg">
<div class="wrap">
	<div class="header">
		<div class="logo">
			<a href="/"><img src="images/logo.png" alt=""/> </a>
		</div>
		<div class="h_menu">
			<ul>
				<li class="active" style="font-size:170%;"  ><a href="/">亚安信息管理平台</a></li>
				<li class="active" style="font-size:100%"  ></li>
				<li class="active" style="font-size:100%"  ><button  class="btn da-link" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" onclick="to_login()" aria-controls="collapseExample">用户登陆</button></li>
			</ul>
		</div>
		<div class="clear"></div>
	</div>
</div>
<div class="collapse" id="collapseExample">
  <div class="well">
    <div class="row">
  <div class="col-lg-5">
    <div class="input-group" style=" margin-left:30%">

      <b style="color:#000; font-weight:bold;">用户名：</b><input type="text" id="input_username"class="form-control" aria-label="...">
    </div><!-- /input-group -->

  </div><!-- /.col-lg-6 -->
  <div class="col-lg-4">
    <div class="input-group">

      <b style="color:#000; font-weight:bold; color:#333">密码：</b><input type="text" id="input_password" class="form-control" aria-label="...">
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
  <div class="col-lg-3">
    <div class="input-group" style="text-align:left">
    	<button class="btn" id="input_submit"onclick="mycheck()">提交</button>&nbsp;&nbsp;
    	<button class="btn" onclick="login_cancel()" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">取消</button>
    </div><!-- /input-group -->
    
  </div><!-- /.col-lg-6 -->
</div><!-- /.row -->
  </div>
</div>
</div>
<!-- start slider -->
<div class="slider_bg">
<div class="wrap">
	<div class="slider">
				<div id="da-slider" class="da-slider">
				<div class="da-slide">
					<h2>我们的团队更加出色</h2>
					<p>我们是一只富有激情的创新团队。我们将设计通过情感的表达把用户和产品很自然的连接在一起，让用户享受使用产品的愉悦，以此来强化对产品、品牌的体验认知！通过自然的交互和生动的设计展现出来，用一个充满情感化的设计打动用户！</p>
					<a href="http://yaninfo.com" class="da-link" style="margin-top:5%; background:#23252a;" >访问我们的主页</a>
				</div>
				<div class="da-slide">
					<h2>我们的数据更加准确</h2>
					<p>为客户提供品牌化、一站式的解决方案。服务涵盖了互联网，掌上移动设备、桌面平台以及电子消费类产品等。为客户提供从品牌设计、概念设计、交互设计、视觉设计、功能研发到最终产品实现。为客户提供真正具有创新价值的产品体验。</p>
					<a href="http://yaninfo.com" class="da-link" style="margin-top:5%; background:#23252a;">访问我们的主页</a>
				</div>
				<div class="da-slide" >
					<h2>我们的信息更加专业</h2>
					<p>我们通过研究理解用户的思维、行为、和目标，挖掘用户对产品使用的潜在需求，通过我们服务于各行业客户的丰富经验，结合品牌的优势进行分析，让用户在情绪上、行为上感知产品的创新、感受完美的体验。超越品牌的价值。</p>
					<a href="http://yaninfo.com" class="da-link" style="margin-top:5%; background:#23252a;">访问我们的主页</a>
				</div>
				<nav class="da-arrows">
					<span class="da-arrows-prev"></span>
					<span class="da-arrows-next"></span>
				</nav>
			</div>
		</div>
</div>
</div>
<div class="top_bg">
<div class="wrap">
	<div class="top_grid">
		<h2>我们的团队</h2>
		<ul id="filters" class="clearfix">
						<li><span class="filter active" data-filter="icon logo web">siteUI设计</span></li>
						<li><span class="filter" data-filter="app card web">webserver后台</span></li>
						<li><span class="filter" data-filter="icon web card">photography绘图</span></li>
						<li><span class="filter" data-filter="app card icon logo web">Human resources人力资源</span></li>
					</ul>
	<div class="clear"></div>
	</div>
</div>
</div>
<!-- start main -->
<div class="main_bg">
<div class="wrap">
<div class="main">
		<div id="portfoliolist">
			<div class="grid_list1 grid_top">		
			<div class="portfolio app" data-cat="app">
				<div class="portfolio-wrapper">			
					<a >
						<img src="images/pic2.jpg"  alt="Image 2" />
					</a>
					<div class="label">
						<div class="label-text">
								<a class="text-title">前端设计</a>
								<span class="text-category">The designer</span>
						</div>
						<a ><div class="label-bg"></div></a>
					</div>
				</div>
			</div>	
			<div class="clear"></div>
			</div>	
			<div class="grid_list2 grid_top">
				<div class="portfolio web" data-cat="web">
					<div class="portfolio-wrapper">						
						<a >
							<img src="images/pic4.jpg"  alt="Image 2" />
						</a>
						<div class="label">
							<div class="label-text">
									<a class="text-title">数据获取</a>
									<span class="text-category">Data acquisition</span>
							</div>
							<a ><div class="label-bg"></div></a>
						</div>
					</div>
				</div>
				<div class="portfolio web grid_top" data-cat="web">
					<div class="portfolio-wrapper">						
						<a >
							<img src="images/pic6.jpg"  alt="Image 2" />
						</a>
						<div class="label">
							<div class="label-text">
									<a class="text-title">数据解析</a>
									<span class="text-category">Data analysis</span>
							</div>
							<a ><div class="label-bg"></div></a>
						</div>
					</div>
				</div>
				<div class="clear"></div>
			</div>				
			<div class="grid_list2 grid_top">
				<div class="portfolio card" data-cat="card">
					<div class="portfolio-wrapper">			
						<a >
							<img src="images/pic3.jpg"  alt="Image 2" />
						</a>
						<div class="label">
							<div class="label-text">
									<a class="text-title">数据检索</a>
									<span class="text-category">Data retrieval</span>
							</div>
							<a ><div class="label-bg"></div></a>
						</div>
					</div>
				</div>	
				<div class="portfolio card grid_top" data-cat="card">
					<div class="portfolio-wrapper">			
						<a >
							<img src="images/pic5.jpg"  alt="Image 2" />
						</a>
						<div class="label">
							<div class="label-text">
									<a class="text-title">数据推送</a>
									<span class="text-category">Data push</span>
							</div>
							<a ><div class="label-bg"></div></a>
						</div>
					</div>
				</div>	
				<div class="clear"></div>
			</div>	
		</div>
	<!-- container -->
	<script type="text/javascript" src="js/fliplightbox.min.js"></script>
	<script type="text/javascript">$('body').flipLightBox()</script>
	<div class="clear"></div>
	</div>
<!---End-gallery----->
</div>
</div>
<!-- start mid_grid -->
<div class="mid_bg">
<div class="wrap">
<div class="main">
	<h2 class="style">关于本站</h2>
	<div class="clear"></div>
</div>
</div>
</div>
<div class="mid_bg1">
<div class="wrap">
<div class="main">
	<p class="para">人员信息与客户资源综合管理控制后台</p>

	<div class="clear"></div>
</div>
</div>
</div>
<!-- start footer -->
<div class="footer_bg">
<div class="wrap">
<div class="footer">
		<div class="copy">
			<p class="link"><span>Copyright &copy; 2014.yaninfo.com All rights reserved.</span></p>
		</div>
</div>
</div>
</div>
<div style="display:none"><script src='http://v7.cnzz.com/stat.php?id=155540&web_id=155540' language='JavaScript' charset='gb2312'></script></div>
<script>
	
	function to_login(){
		// $('#collapseExample').collapse('show');
		// alert('123')
		$('$input_username').focus();
	}
	function mycheck() {
    	var submit_state = 0000;
    	var username = $('#input_username').val();
    	var password = $('#input_password').val();
   	 // the submit_state using 4 placeholder to identify the state
    	if (username.length == 0) {
        	alert('用户名不能为空')
        	return;
    	} else {
       	 submit_state = 1;
    	}
    	if (password.length == 0) {
        	alert('密码不能为空')
        	return;
    	} else {
        	submit_state = 11;
    	}
    	if (submit_state = 11) {
        	mysubmit();
    	}
}


//ajax submit form
function mysubmit() {
    var result;
    // $('#reg_form').submit();
    $.ajax({
        url: 'libs/c_user/login_in',
        data:'username='+$('#input_username').val()+'&password='+$('#input_password').val(),
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
	function login_cancel(){
		// $('#collapseExample').collapse('hide');
		$('#input_username').val('')
		$('#input_password').val('')
	}
</script>
</body>
</html>