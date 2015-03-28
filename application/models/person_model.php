
<?php
// <!-- 用户信息 MySqlmodel -->
// <!-- 2015/03/22 -->

	class Person_model extends CI_Model{
		public function __construct(){
			parent::__construct();
		}
		public function login_check_db($person_class){
			$query = $this->db->get_where('person', array('email' => $person_class->GetUsername()) );
			$re = $query->row_array();
			if(!empty($re)){
				$person_class->SetPermiss($re['permiss']);
				if($person_class->GetUsername() == $re['email'] && $person_class->GetPassword() == $re['password'] )
					return 0;
			}
			return 1;
		}

	}
?>