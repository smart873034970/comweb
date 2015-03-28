<!-- 默认控制器[用于首页显示与登录] -->
<!-- kk 2015/03/20 -->
<?php 
// require_once 'libs/login.php';

                                                        
class Login_check extends CI_Controller{
    public function __construct(){
        parent:: __construct();
        $this->load->model('Person_model');
        // 加载session
        session_start();
    }
    public function index(){
        if (empty($_REQUEST['username'])) {
            echo 'error, username is empty';
            exit;
        } 
        if (empty($_REQUEST['password'])) {
            echo 'error, password is empty';
            exit;
        }      
        $redirect_path = '/';
        $this->load->library('Person');

        // 载入用户信息        
        $per = new Person($_REQUEST['username'], $_REQUEST['password']);

        // 加载model
        $db_result = $this->Person_model->Login_check_db($per);

        // 
        if($db_result == 0){
            //设置已登录状态session
            $_SESSION['had_login']='true';  
            // 添加username到session
            if($per->GetUsername() != '')
                $_SESSION['username']=$per->GetUsername();
            // 添加用户权限'permiss'到session
            if($per->GetPermiss() != '')
                $_SESSION['permiss']=$per->GetPermiss();
            
            // 
            $redirect_path = 'welcome';
        }

        //根据返回开始跳转
        redirect($redirect_path, 'refresh');     //返回验证
    }
    public function login_out(){
        session_destroy();
        redirect('/','refresh');
    }
}

?>