<?php
class Asyn extends CI_Controller{
	public function index(){
		// if()
		echo '12';
	}

	
	public function task(){
        if(empty($_REQUEST['pass'])){
            echo 'error, pass is empty.';
            exit;
        }else{
            if($_REQUEST['pass'] !== 'admin'){
                echo 'error, pass is false.';
                exit;
            }
        }
        $q = file_get_contents('http://192.168.1.116/libs/c_email/send_all_push');
        echo $q;
    }
}
?>