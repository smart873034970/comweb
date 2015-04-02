<?php 
class Person{
    private $username='';
    private $password='';
    private $permiss='';
    private $email = '';
    private $create_time ='';
    public function __construct($_username='', $_password='', $_permiss ='', $_email ='', $_create_time = ''){
        $this->username = $_username;
        $this->password = $_password;
        $this->permiss = $_permiss;
        $this->email = $_email;
        $this->create_time = $_create_time;
    }

    //username
    public function GetUsername(){
        return $this->username;
    }
    public function SetUsername($_myusername){
        if(empty($_myusername)){
            return 1;   // is empty
        }
        $this->username = $_myusername;
    }

    //create_time

    public function GetCreatetime(){
        return $this->create_time;
    }
    public function SetCreatetime($_mycreatetime){
        if(empty($_mycreatetime)){
            return 1;   // is empty
        }   
        $this->create_time = $_mycreatetime;
    }
    //password
    public function GetPassword(){
        return $this->password;
    }
    public function SetPssword($_mypassword){
        if(empty($_mypassword)){
            return 1;   // is empty
        }
        $this->password = $_mypassword;
    }

    //permiss
    public function SetPermiss($_mypermiss){
        if(empty($_mypermiss)){
            return 1;   // is empty
        }
        $this->permiss = $_mypermiss;
    }
    public function GetPermiss(){
        return $this->permiss;
    }

    //email
    public function GetEmail(){
        return $this->email;
    }
    public function SetEmail($_myemail){
        if(empty($_myemail)){
            return 1;   // is empty
        }  
        $this->email = $_myemail;
    }
}

?>