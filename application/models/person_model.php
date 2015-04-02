
<?php
// <!-- 用户信息 MySqlmodel -->
// <!-- 2015/03/22 -->

	class Person_model extends CI_Model{
		public function __construct(){
			date_default_timezone_set('PRC');
			parent::__construct();
		}
		public function login_check_db($person_class){
			if( $this->validate_user_db($person_class) == 1){
				return 1;	//error user is none
			}
			$result = $this->db->get_where('person', array('username' => $person_class->GetUsername(), 'password' => $person_class->GetPassword() ));
			if($result->num_rows() == 1){
				return 0;	// success
			}else{
				return 2;	//password is false
			}

		}

		//function emaillist
		public function get_person_all_db(){
			$query = $this->db->get('person');

			$email =array();
			$password =array();
			$permiss = array();
			$username = array();
			$create_time = array();

			$all = array();
            foreach($query->result() as $row){
                array_push($email, $row->email);
                array_push($username, $row->username);
                array_push($permiss, $row->permiss);
                array_push($password, $row->password);
                array_push($create_time, $row->create_time);

                array_push($all, array('username' => $row->username, 'email' => $row->email, 'permiss' => $row->permiss, 'password' => $row->password, 'create_time' => $row->create_time )  );
            }
            return $all;
		}
		//function validate_user_db
		public function validate_user_db($person_class){
			$result = $this->db->get_where('person', array('username' => $person_class->GetUsername()) );
			$tmp = $result->num_rows() ==0 ? 1: 0; // return 1 user is none
			return $tmp;
		}

		//function valiepermiss
		public function get_permiss_db($person_class){
			$result = $this->db->get_where('person', array('username' => $person_class->GetUsername()) );
			if($this->validate_user_db($person_class) == 1){
				return 1;	//error user is none
			}
			return $result->row(0)->permiss;
		}

		//function 
		public function delete_user_db($person_class){
			if($this->validate_user_db($person_class) == 1){
				return 1;	//error user is none
			}
			$this->db->delete('person', array('username' => $person_class->GetUsername()) );
			return 0;
		}
		public function modify_user_db($person_class){
			if($this->validate_user_db($person_class) == 1){	//if user is none
				return 1;	//error user is none
			}
			$this->db->update('person', array('username' => $person_class->GetUsername(), 'password' => $person_class->GetPassword(), 'permiss' => $person_class->GetPermiss(), 'email' => $person_class->GetEmail() ), array('username' => $person_class->GetUsername() ));
		}

		//function
		public function add_user_db($person_class){
			if($this->validate_user_db($person_class) == 0 ){
				return 1;	//error user is had
			}
			$this->db->insert('person', array('username' => $person_class->GetUsername(), 'password' => $person_class->GetPassword(), 'permiss' => $person_class->GetPermiss(), 'email' => $person_class->GetEmail() , 'create_time' => date('y-m-d G:i:s')));
			return 0;
		}

		//function
		public function fix_user_db($person_class){
			if($this->validate_user_db($person_class) == 1 ){
				return 1;	//error user is none
			}
			$this->db->update('person', array('password' => $person_class->GetPassword(), 'permiss' => $person_class->GetPermiss()) ,array('username' => $person_class->GetUsername() ));
			return 0;
		}

	}// class is end
?>