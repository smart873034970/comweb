<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// <!-- mail控制器，用于用户邮件操作 -->
class c_email extends CI_Controller {
    private $email_to;
    private $email_subject;
    private $email_message;
    public function __construct(){
        parent::__construct();
        session_start();
        //load the email library
        if(empty($_SESSION['had_login'])){
            // if($_REQUEST['pass'] == 'admin'){

            // }else{
            //     echo 'sorry , you cann`t use the email function. beacuse pass is false, please sign-in web site .';
            //     exit;
            // }
        }
        $this->load->model('email_model');
        $this->load->library('email');

        // config the email
        $config['protocol'] = 'smtp'; 
        $config['smtp_host'] = 'smtp.163.com'; // given server 
        $config['smtp_user'] = 'you_smart'; 
        $config['smtp_pass'] = 'Zz612401000000'; 
        $config['smtp_port'] = '25'; // given port. 
        $config['smtp_timeout'] = '10'; 
        $config['newline'] = "/r/n"; 
        $config['crlf'] = "/r/n"; 
        $config['charset']='utf-8';  // Encoding type 
        $config['mailtype']= 'html';

        $this->email->initialize($config);  //initialize the$config 
        $this->email->clear();  //clear the last

    }

    public function index()
    {
         echo 'the controller is to email server';
    }

    public function send(){      
        if(empty($_REQUEST['email_subject'])){
            echo 'error: email_subject is cann`t empty';
            exit;
        }else{
            $this->email_subject = $_REQUEST['email_subject'];
        }
        if(empty($_REQUEST['email_message'])){
            echo 'error: email_message is cann`t empty';
            exit;
        }else{
            $this->email_message = '<h3>此条邮件由亚安系统发送.</h3></br><div>'.$_REQUEST['email_message'].'</div>';
        } 
        if(empty($_REQUEST['email_to'])){
            echo 'error: email_to is cann`t empty';
            exit;
        }else{
            $this->email_to = $_REQUEST['email_to'];
        } 
        $this->email->from('you_smart@163.com', 'kk');  // show in the reciever email box 
        $this->email->to($this->email_to); 
         

        $this->email->subject($this->email_subject); 
        $this->email->message($this->email_message); 
        $this->email->send();   //Send out the email. 

        $result =  $this->email->print_debugger();
        if(strlen(strstr($result, 'error')) > 0){
            echo strlen(strstr($result, 'error'));
        }else{
            echo 0;
        }

    }
    public function validate($url){
        $result = $this->email_model->ValidatePublickey_db($url);
        // echo $result;
        // exit;
        if($result == 0){
            echo 'validate success';
        }else{
            if($result == 1){
                echo 'validate failure, publickey is overdue';
            }else{
                echo 'validate failure, time is overdue.';
            }
        }

    }
    public function add_data(){
        if(empty($_REQUEST['email_to'])){
            echo 'error: email_to is cann`t empty';
            exit;
        }else{
            $this->email_to = $_REQUEST['email_to'];
        }
        if(empty($_REQUEST['keyword'])){
            echo 'error: email_to is cann`t keyword';
            exit;
        }
        if(empty($_REQUEST['location'])){
            echo 'error: email_to is cann`t location';
            exit;
        }

        if($this->email_model->ValidateEmail_db($this->email_to) == 1){
            echo 'error, user is none.please reg to web site';
            exit;
        }
        if($this->email_model->ValidateRegState_db($this->email_to) == 2){
            echo 'sorry. your email address is not Verify. please Verify your email';
            exit;
        }

        $keyword = $_REQUEST['keyword'];
        $location = $_REQUEST['location'];
        print_r($this->email_model->AddKeyword_db($this->email_to, $keyword, $location));
        exit;

    }
    public function send_reg(){
        if(empty($_REQUEST['email_to'])){
            echo 'error: email_to is cann`t empty';
            exit;
        }else{
            $this->email_to = $_REQUEST['email_to'];
        }
        if(empty($_REQUEST['keyword'])){
            echo 'error: email_to is cann`t keyword';
            exit;
        }
        if(empty($_REQUEST['location'])){
            echo 'error: email_to is cann`t location';
            exit;
        }
        $location = $_REQUEST['location'];
        $keyword = $_REQUEST['keyword'];

        $this->email->from('you_smart@163.com', 'kk');  // show in the reciever email box 
        $this->email->to($this->email_to); 
        // echo $this->email_to;    

        $this->email->subject('reg_info'); 

        // publickey 
        $publickey = md5(date('y-m-d-h-i-sa').$this->email_to);
        // 
        $email_fotmat=sprintf('<meta charset="utf-8"/>
            <div style="width:100%%; background:#B9D3EE;">
                <center style="padding-top:1%%"><h1>Company Infomation</h1></center>
                <div>欢迎访问注册我们的网站，这是一封反馈邮件，请点击下方的连接到我们指定的网址完成注册。若无法点击请复制连接地址到浏览器打开 </div>
                <div><a href="%s">%s</a></div>
            </div>','http://'.$_SERVER['HTTP_HOST'].'/libs/c_email/validate/'.$publickey ,'http://'.$_SERVER['HTTP_HOST'].'/libs/c_email/validate/'.$publickey);
        $this->email->message($email_fotmat);
        if($this->email_model->ValidateRegState_db($this->email_to) == 0){
            echo 'Error! User already exists ';
            exit;
        }
        $this->email->send();   //Send out the email. 

        $result =  $this->email->print_debugger();
        if(strlen(strstr($result, 'error')) > 0){
            echo strlen(strstr($result, 'error'));
        }else{
            if($this->email_model->SetEmailReg($this->email_to, $publickey, json_encode(array($keyword => 'keyword', $keyword => array($location))) )  == 0){
                echo 'email is send';
            }
        }
    }
    public function send_all_push_count($count){
        for($t=0; $t< (int)$count; $t++){
            $this->send_all_push();
        }
    } 
    public function send_all_Push(){
        //Get the Data
        $this->load->library('DataInfo');
        $my_data = new DataInfo();


        $result = $this->email_model->GetEmailList_db();    //get the email_list
        if(empty($result)){
            echo 'email_list is empty.';
            exit;
        }
        $Had_Send_List = array();
        $Not_Send_List = array();
        $value_list = array();
         foreach($result as $value){
            if($this->email_model->ValidateRegState_db($value) == 0){   //is ValiedateRegister state is true
                if($this->email_model->Validatesubscribe_db($value) == 0){
                    $this->email->from('you_smart@163.com', 'kk');  // show in the reciever email box 
                    $this->email->to($value);
                    $this->email->subject($this->email_subject);

                    //*****************************
                    //Get the info on  web-server
                        $temp_keyword = $this->email_model->GetKeyword_db($value);    //return array('keyword' = array(), 'location' => array())
                        // print_r($temp_keyword);
                        // exit;
                        $result = $my_data->GetData($temp_keyword['keyword'][0]);   //default location is GetLocation()
                        // echo sizeof($result['city']);
                        // exit;
                        if($result == 1){
                            'data XML error.';
                            exit;
                        }
                        if($result == 1){
                            'get the info timeout.';
                            exit;
                        }
                        $template_file_context = file_get_contents('resource/template_1_1.html'); // the template
                        $template_file_main = file_get_contents('resource/template_1.html');
                        $link_context = '';
                        foreach($temp_keyword['keyword'] as $v){
                            $link_context.= '<a href="#">'.$v.'</a>&nbsp;'; 
                        }
                        $context = '';
                        for($i=1; $i < sizeof($result['city']); $i++){
                            $context.= sprintf($template_file_context, $result['url'][$i], $result['jobtitle'][$i] ,$result['city'][$i], $result['date'][$i], $result['source'][$i], $result['snippet'][$i]); 
                        }
                        // $context = '<div style="background:#ccc; padding:3%;"><h1><b>Recommend you for the job: </b></h1></div>'.$template.'</br><div><a href="http://'.$_SERVER['HTTP_HOST'].'libs/c_email/subscribe?email_to='.$value.'&value=false">Cancel Subscribe</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#">Cick View More</a></div>';
                        $domain = 'http://'.$_SERVER['HTTP_HOST'];
                        $send_body = sprintf($template_file_main, $context, $link_context, $domain.'/libs/c_email/subscribe?email_to='.$value.'&value=false', 'http://www.baidu.com');
                        // Send the email
                        $this->load->model('Email_Model');
                        $this->email_subject='Recommend you for the job';
                        $this->email_message = $send_body;    //set the message context
                    //end
                        $this->email->subject($this->email_subject);
                    $this->email->message($this->email_message);
                    $this->email->send();
                    array_push($Had_Send_List, $value);
                }else{
                    array_push($Not_Send_List, $value.' [ <b>user is cancel subscribe.</b> ]');
                }
            }else{
                array_push($Not_Send_List, $value.' [ <b>user is not validate email.</b> ]');
            }
         }
         echo '<h2>Success Send List:</h2></br>';
         foreach($Had_Send_List as $value){
            echo "$value</br>";
         }
         echo '<h2>Failure Send List(Register state is not):</h2></br>';
         foreach($Not_Send_List as $value){
            echo "$value</br>";
         }
    }


    public function send_all(){
        if(empty($_REQUEST['email_subject'])){
            echo 'error: email_subject is cann`t empty';
        }else{
            $this->email_subject = $_REQUEST['email_subject'];
        }
        if(empty($_REQUEST['email_message'])){
            echo 'error: email_message is cann`t empty';
            exit;
        }else{
            $this->email_message = '<h1>'.$_REQUEST['email_message'].'</h1>';
        } 
        $this->load->model('Email_Model');
        $result = $this->Email_Model->GetEmailList_db();
        if(empty($result)){
            echo 'email_list is empty.';
            exit;
        }
        $Had_Send_List = array();
        $Not_Send_List = array();
        $value_list = array();
         foreach($result as $value){
            if($this->email_model->ValidateRegState_db($value) == 0){
                $this->email->from('you_smart@163.com', 'kk');  // show in the reciever email box 
                $this->email->to($value);
                $this->email->subject($this->email_subject);
                $this->email->message($this->email_message);
                $this->email->send();
                array_push($Had_Send_List, $value);
            }else{
                array_push($Not_Send_List, $value);
            }
         }
         echo '<h2>Success Send List:</h2></br>';
         foreach($Had_Send_List as $value){
            echo "$value</br>";
         }
         echo '<h2>Failure Send List:</h2></br>';
         foreach($Not_Send_List as $value){
            echo "$value</br>";
         }
    }

    public function subscribe(){
        if(empty($_REQUEST['email_to'])){
            echo 'error: email_to is cann`t empty';
            exit;
        }else{
            $this->email_to = $_REQUEST['email_to'];
        }
        if(empty($_REQUEST['value'])){
            echo 'error: email_to is cann`t value';
            exit;
        }else{
            if($_REQUEST['value'] != 'true' && $_REQUEST['value'] != 'false'){
                echo 'the value is 1 and 0.  value error';
                exit;
            }
        }
        $email_value = $_REQUEST['value'];
        $state = array('true' => 0, 'false' => '1');
        $result = $this->email_model->CancelSubscribe_db($this->email_to, $state[$_REQUEST['value']]);
        if( $result== 0){
            echo $this->email_to.' success.'.' subscribe state is '.$_REQUEST['value'];
        }else if($result == 1){
            echo 'sorry , email is none. please register';
        }

    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */