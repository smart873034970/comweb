<!-- 默认登录控制器，默认首页 -->
<!-- kk 2015/03/20 -->
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

    public function index()
    {
         $this->load->view('sign-in');
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */