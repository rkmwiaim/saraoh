<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {
	function __construct()
	    {
	        parent::__construct();
            $this->load->library('session');
	    }

	public function index()
	{
        $this->load->helper('url');
        $login = false;
        if($this->input->server('REQUEST_METHOD') === "POST") {
            $post = $this->input->post();
            $id = $post['id'];
            $password = $post['password'];
            if($id == "1" && $password == "1") {
                $login = true;

                $this->session->set_userdata('login','success');

                redirect(base_url()."index.php");
            } else {
                // $this->session->unset_userdata('login');
            }
        }
        $this->load->view('login');
    }
}
?>
