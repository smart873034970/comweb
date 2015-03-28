<!-- 信息列表 MySqlmodel -->
<!-- 2015/03/23 -->

<?php
    class Email_model extends CI_Model{
        public function __construct(){
            parent::__construct();
            date_default_timezone_set('PRC');
            $query = $this->db->get('email_list');

            foreach($query->result() as $row){
                array_push($this->email, $row->email);
                array_push($this->username, $row->username);
                array_push($this->time, $row->create_time);
                array_push($this->keyword, $row->keyword);
                array_push($this->state, $row->state);
                array_push($this->reg_state, $row->reg_state);
                array_push($this->all, array('username' => $row->username, 'email' => $row->email,'reg_state' => $row->reg_state, 'create_time' => $row->create_time, 'keyword' => $row->keyword, 'state' => $row->state));
            }
        }
        private $email= array();
        private $username = array();
        private $time  = array();
        private $keyword = array();
        private $state = array();
        private $reg_state = array();


        private $all = array();


        //用于用户信息获取
        public function GetEmailAll_db(){
            return $this->all;
        }
        public function GetEmailList_db(){
            return $this->email;
        }
        public function GetEmailUsernameList_db(){
            return $this->username;
        }
        public function GetEmailTimeList_db(){
            return $this->time;
        }


        //用于用户信息增加，修改，获取

            //用于用户信息注册
        public function SetEmailReg($_email, $_publickey, $_keyword){
            $result = $this->db->get_where('email_list',array('email' => $_email));
            $now_date = date('y-m-d G:i:sa');
            if(isset($result->row(0)->email)){
                if($result->row(0)->reg_state == 0){
                    $this->db->update('email_list', array('username' => 'default user', 'create_time' => date('y-m-d G:i:sa'),'email' => $_email, 'keyword' => $_keyword, 'publickey' => $_publickey));
                    return 0;
                }else{
                    return 1;   //用于已注册，禁止重新验证
                }
            }else{
                $this->db->insert('email_list', array('username' => 'default user', 'create_time' => date('y-m-d G:i:sa'),'email' => $_email, 'keyword' => $_keyword, 'publickey' => $_publickey));
                return 0;
            }

        }
            //用户关键字与地点增加
        public function AddKeyword_db($_email, $_keyword, $_location){
            $result = $this->db->get_where('email_list', array('email' => $_email));
            if($result->num_rows() == 0)
                return 1;   //nothing!
            $keyword_data = $result->row(0)->keyword;
            $tmp = json_decode($keyword_data,true);
            if(isset($tmp[$_keyword])){ // key word is had
                array_push($tmp[$_keyword], $_location);
            }else{
                $tmp[$_keyword] = array($_location);
            }

            $this->db->update('email_list', array('keyword' => json_encode($tmp)), array('email' => $_email)) ;
            return '<h1>success:</h1></br>email:'.$_email.'</br>keyword: '.$_keyword.'</br>location: '.$_location;
        }// end AddKeyword_db

            //取用户关键字与地点
        public function GetKeyword_db($_email){
            $result = $this->db->get_where('email_list', array('email' => $_email));
            if($result->num_rows() == 0)
                return 1;   //nothing!
            $keyword_data = $result->row(0)->keyword;
            // return array(explode('"',$keyword_data)[1], explode('"',$keyword_data)[3]); //array(keyword, location)
            // return array('php','usa');
            // return current(json_decode($keyword_data, true));
            $tmp_data= json_decode($keyword_data, true);
            $tmp_key = array();
            $tmp_location = array();
            foreach($tmp_data as $k => $v){
                 array_push($tmp_key, $k);
                 array_push($tmp_location, $v[0]);
            }
            return array('location' => $tmp_location, 'keyword' => $tmp_key);


        }
            //用户取消订阅
        public function CancelSubscribe_db($_email, $_value){
            $result = $this->db->get_where('email_list', array('email' => $_email));
            if($result->num_rows() == 0)
                return 1;   //nothing!
            $this->db->update('email_list', array('email' => $_email, 'state' => $_value));
            return 0;
        }


        //用于用户信息验证
            //验证publickey
        public function ValidatePublicKey_db($_publickey){
            $result = $this->db->get_where('email_list', array('publickey' => $_publickey));
            if($result->num_rows() == 0){
                return 1; //publickey error
            }else{
                $c_time = $result->row(0)->create_time;
                $bad_time = date('Y-m-d G:i:sa',strtotime($c_time."+1 day"));

                $now_time = date('Y-m-d G:i:sa');
                if($now_time > $bad_time){
                    return 2; //time is error
                }
                $this->db->update('email_list', array('reg_state' => '1'), array('publickey' => $_publickey));
                $c_time = $result->row(0)->create_time;
                $b_time = date('Y-m-d G:i:sa',strtotime($c_time."+1 day"));

                $a_time = date('Y-m-d G:i:sa');
                // return $c_time .'</br>'.$b_time;
            }
        }
            //验证用户是否存在
        public function ValidateEmail_db($_email){
            $result = $this->db->get_where('email_list', array('email' => $_email));
            if($result->num_rows() == 0){
                return 1;   //user is none
            }else{
                return 0;
            }
        }
            //验证用户是否已通过注册
        public function ValidateRegState_db($_email){
            $result = $this->db->get_where('email_list', array('email' => $_email));
            if($result->num_rows() == 0){
                return 1;   //  user is none
            }else{
                if( $result->row(0)->reg_state == 1){
                    return 0;   //user is register
                }else{
                    return 2;   //user reg_state is not register
                }
            }
        }
            //验证用户是否已订阅
        public function Validatesubscribe_db($_email){
            $result = $this->db->get_where('email_list', array('email' => $_email));
            if($result->num_rows() == 0){
                return 1;   //  user is none
            }else{
                if( $result->row(0)->state == 0){
                    return 0;   //user is subsribe
                }else{
                    return 2;   //user subsribe is not 
                }
            }
        }

 
    }
?>