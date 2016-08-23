<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function get() {
      $this->db->where('name', 'saraoh');
      $result=$this->db->get('login')->result();
      return $result;
    }
}
