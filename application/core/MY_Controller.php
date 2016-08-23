<?php
class MY_Controller extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->library('session');
                $this->load->helper('cookie');
                $login = $this->session->userdata('login');

                if(get_cookie('login') == "success" || (isset($login) && $login == "success")) {
                    $this->session->set_userdata('login','success');
                } else {
                    $this->load->helper('url');
                    redirect(base_url()."index.php/login");
                }
        }
}
 ?>
