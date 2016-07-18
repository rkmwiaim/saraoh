<?php
class MY_Controller extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->library('session');
                $login = $this->session->userdata('login');

                if(isset($login) && $login == "success") {
                    $this->session->set_userdata('login','success');
                } else {
                    $this->load->helper('url');
                    redirect(base_url()."index.php/login");
                }
        }
}
 ?>
