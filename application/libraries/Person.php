<?php 
class Person{
    private $username='';
    private $password='';
    private $permiss='';
    public function __construct($_username='', $_password=''){
        $this->username = $_username;
        $this->password = $_password;
    }
    public function GetUsername(){
        return $this->username;
    }
    public function GetPassword(){
        return $this->password;
    }
    public function SetPermiss($_permiss){
        $this->permiss = $_permiss;
    }
    public function GetPermiss(){
        return $this->permiss;
    }
}

?>