<!--
// 用于主界面左边栏异步加载
//  
-->

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main_ajax extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		// 加载session
		session_start();
        if (empty($_SESSION['had_login'])) {
            echo 'not perrmiss to visited this page.<a href="/">click to login</a>';
            exit;
        }
        //加载email_model Model类
        $this->load->model('Email_Model');
        $this->load->model('Person_Model');

	}
    public function index(){
        $this->load->view('nav_get/webwatch');
    }
    //context function
    public function webwatch_context($var='default'){     
        $this->load->view('nav_get/webwatch_context', array('site' => $var));
    }
    public function my_home(){
        $tmp_string = '';
        if(!isset($_SESSION['had_login'])){
            $tmp_string = '<span class="alert alert-warning">you not permiss,plase <a href="/">login-in</a> to view your home page.</span>';
        }else{
            $tmp_string = '你好，我们是亚安信息技术科技有限公司</br><span style="margin-left:5%">the my home page.</span>'; 
        }
        echo $tmp_string;
    }
    public function my_infomation(){
        $tmp_string = '';
        if(!isset($_SESSION['had_login'])){
            $tmp_string = '<span class="alert alert-warning">you not permiss,plase <a href="/">login-in</a> to view your home page.</span>';
        }else{
            $tmp_string = '你好，我们是亚安信息技术科技有限公司</br><span style="margin-left:5%">the my home page.</span>'; 
        }
        echo $tmp_string;
    }
    public function my_team(){
            $data['email_all'] = $this->GetPersonAll();
            $this->load->view('nav_get/myteam',$data);
    }
    public function add_team(){
        $this->load->view('nav_get/addteam');
    }
    public function had_email(){
        $tmp_string = '';
        if(!isset($_SESSION['had_login'])){
            $tmp_string = '<span class="alert alert-warning">you not permiss,plase <a href="/">login-in</a> to view your home page.</span>';
        }else{
            $tmp_string = '你好，我们是亚安信息技术科技有限公司</br><span style="margin-left:5%">the my home page.</span>'; 
        }
        echo $tmp_string;
    }
    public function send_email(){
        $this->load->view('nav_get/send_email');
    }
    public function my_subscribe(){
        if(isset($_SESSION['had_login'])){
            // 调用私有函数
            // $data['mail_list'] = $this->GetEmail_List();
            $data['email_all'] = $this->GetEmailAll();
            $this->load->view('nav_get/email',$data);
            //返回视图文件
            // $this->load->view('nav_get/email',$data);
        }else{
             echo '<span class="alert alert-warning">you not permiss, please <a href="/">login-in</a> to view your team.</span>';
            }
            // $this->load->view('nav_get/send_email');
    }
    // 获取邮件列表
    private function GetEmail_List(){
        return $this->Email_Model->GetEmailList_db();
    }
    private function GetEmailAll(){
        return $this->Email_Model->GetEmailAll_db();
    }
    private function GetPersonAll(){
        return $this->Person_Model->get_person_all_db();
    }
}

/* End of file main_ajax.php */
/* Location: ./application/controllers */