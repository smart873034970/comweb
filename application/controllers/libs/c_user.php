<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


// 用户信息控制器，操作用户信息

class C_user extends CI_Controller {

	private $per;
	public function __construct(){
		parent::__construct();
        session_start();
		$this->load->model('person_model');	// perosn model for database
        $this->load->library('Person');	// person class
        $tmp_username = empty($_REQUEST['username']) == true ? 'empty' : $_REQUEST['username'];
        $tmp_password = empty($_REQUEST['password']) == true ? 'empty' : $_REQUEST['password'];
        $tmp_permiss = empty($_REQUEST['permiss']) == true ? 'empty' : $_REQUEST['permiss'];
        $tmp_email = empty($_REQUEST['email']) == true ? 'empty' : $_REQUEST['email'];
		$this->per = new Person($tmp_username, $tmp_password, $tmp_permiss, $tmp_email);
	}

	//function index
    public function index()
    {
         echo 'user infomation';
    }

    //function login_in
    public function login_in(){ 
        if ($this->per->GetUsername() == 'empty'){
            echo '1';	// $_request username is empty
            exit;
        }
        if ($this->per->GetPassword() == 'empty'){
            echo '2';	// $_request password is empty
            exit;
        }
		$db_result = $this->person_model->Login_check_db($this->per);
        if($db_result == 0){
            //set had_login to session
            $_SESSION['had_login']='true';  
            // add username to session
            if($this->per->GetUsername() != '')
                $_SESSION['username']=$this->per->GetUsername();
            // add 'permiss' to session
            if($this->per->GetPermiss() != '')
                $_SESSION['permiss']=$this->person_model->get_permiss_db($this->per);
            echo '0';
        }else{
            echo '3';
        }
    }

    //function
    public function fix_user(){
        if ($this->per->GetUsername() == 'empty'){
            echo '1'; // $_request password is empty
            exit;
        }
        if ($this->per->GetPermiss() == 'empty'){
            echo '3'; //$_request password is empty
            exit;
        }
        if ($this->per->GetPassword() == 'empty'){
            echo '2'; // $_request password is empty
            exit;
        }
        echo $this->person_model->fix_user_db($this->per);
    }

    //function modify_user
    public function modify_user(){
    	$result = $this->person_model->modify_user_db($this->per);
    	if($result == 0){
    		echo '0';
    	}else{
    		echo '1';
    	}

    }

    //function delete_user
    public function delete_user(){
        if ($this->per->GetUsername() == 'empty'){
            echo '2';	// $_request username is empty
            exit;
        }
       	$result = $this->person_model->delete_user_db($this->per);
       	if($result == 0){
       		echo '0';
       	}else{
       		echo '1';	//user is none
       	}
    }

    //function add_user
    public function add_user(){
        if ($this->per->GetUsername() == 'empty'){
        	echo 'username is can`t empty';	//$_request password is empty
        	exit;
        }
        if ($this->per->GetPassword() == 'empty'){
            echo 'password is can`t empty';	// $_request password is empty
            exit;
        }
        if ($this->per->GetEmail() == 'empty'){
        	//none
        }
        if ($this->per->GetPermiss() == 'empty'){
        	$this->per->SetPermiss('All');
        }        
        $result =$this->person_model->add_user_db($this->per);

        if($result == 0){
        	echo '0';
        }else{
        	echo '1';
        }
    }

    //function login_out
    public function login_out(){
        session_destroy();
        redirect('/','refresh');
    }
}

/* End of file c_user.php.php */
