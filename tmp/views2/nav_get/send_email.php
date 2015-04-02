
    <div class="panel panel-default" style="">
        <div class="panel-heading">
            <h3 class="panel-title"><span class="glyphicon glyphicon-envelope"></span>有想法？Tell Us</h3>
            <p><a href="">亚安信息科技</a> 是一家专注为用户提供便捷信息的互联网公司 . <a href="">我们的联系电话:</a> 400-000000</p>

            <div class="panel-options">
                <a data-rel="collapse" href="#"><i class="fa fa-fw fa-minus"></i></a>
                <a data-rel="reload" href="#"><i class="fa fa-fw fa-refresh"></i></a>
                <!-- <a data-rel="close" href="#"><i class="fa fa-fw fa-times"></i></a> -->
            </div>
        </div>
        <div class="panel-body">
        	<!--  -->
<div class="panel-body">
    <div class="row">
    	<div class="col-sm-4">
            <div class="form-group">
            	<label class="sr-only" for="exampleInputName5">Name</label>
            	 <input type="text" class="form-control" id="exampleInputName5" placeholder="*您的姓名">
             </div>
        </div>
    	<div class="col-sm-4">
        	<div class="form-group">
            	<label class="sr-only" for="exampleInputEmail5">Email address</label>
            	<input type="email" class="form-control" id="exampleInputEmail5" placeholder="*您的电子邮箱">
        	</div>
    	</div>
    	<div class="col-sm-4">
        	<div class="form-group">
            	<label class="sr-only" for="exampleInputWebsite5">Website</label>
            	<input type="url" class="form-control" id="exampleInputWebsite5" placeholder="您的联系电话">
        	</div>
    	</div>
    	</div>
    <div class="form-group" style="height:1px; width:100%; background:#c8e;">
    </div>
    <div class="form-group">
    	<h5><b>收件人：</b></h5>
    </div>
    <div class="form-group">
    	<div class="input-group">
            <input type="email" class="form-control" id="disabledTextInput" readonly aria-describedby="bsic-addon2" value="example">
           	<span class="input-group-addon" id="basic-addon2">@yaninfo.com</span>
        </div>
        <!-- <label class="sr-only" for="exampleInputEmail5">Email to</label> -->
      	<!-- <input type="email" class="form-control disabled" id="exampleInputEmail5" value="example@yaninfo.com"> -->
    </div>
    <div class="form-group">
    	<h5><b>主题：</b></h5>
    </div>
    <div class="form-group">
        <label class="sr-only" for="exampleInputEmail5">Email title</label>
      	<input type="email" class="form-control" id="exampleInputEmail5" placeholder="邮件标题">
    </div>
    <div class="form-group">
    	<h5><b>内容：</b></h5>
    </div>
    <div class="form-group">
        <label class="sr-only" for="exampleInputMessage5">Message</label>
        <textarea rows="20" class="form-control" id="exampleInputMessage5" placeholder="输入邮件正文" style="resize:vertical"></textarea>
    </div>
</div>
       	<!--  -->
<div class="panel-footer">
    <div class="form-group text-right">
        <button type="button" onclick="js_send_email()" id="send_email_submit" class="btn btn-primary" style="width:15%">提交</button>
    </div>
</div>
        </div>
    </div>
<script>
function js_send_email(){
    result = $.ajax({
        url: "libs/c_email/send" ,
        beforeSend: function() {
            $('#send_email_submit').html('邮件正在加载');
        },
        error: function() {
            $('$send_email_submit').html('获取数据出错');
        },
        success: function() {
            $('#send_email_submit').html(result.responseText);
        }
    });
}
</script>