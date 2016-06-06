<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Staff_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function gets(){
        return $this->db->get('staff')->result();
    }

    function put($option) {
      $this->db->insert('staff', $option);
    }

    function remove($id) {
      $this->db->where('id', $id);
      $this->db->delete('staff');
    }

    function update($id, $option) {
      $this->db->where('id', $id);
      $this->db->update('staff', $option);
    }
}
