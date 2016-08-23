<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct()
	    {
	        parent::__construct();
	    }


	public function index()
	{
        $this->load->library('session');
        $this->load->helper('url');
        $login = false;
        if($this->input->server('REQUEST_METHOD') === "POST") {
            $post = $this->input->post();
            $id = $post['id'];
            $this->load->model('login_model');
    		$log_info = $this->login_model->get();
            if($id == $log_info[0]->id) {
                $login = true;
                $this->session->set_userdata('login','success');
                $this->load->helper('cookie');
                $cookie = array(
                   'name'   => 'login',
                   'value'  => 'success',
                   'expire' => '86500'
               );
                set_cookie($cookie);
                redirect(base_url()."index.php");
            } else {
                $this->session->set_flashdata("message", '로그인에 실패하였습니다.');
            }
        }
        $this->load->view('login');
    }
}
?>
