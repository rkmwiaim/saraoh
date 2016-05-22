<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Design2_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function gets(){
        return $this->db->get('design2')->result();
    }

    function get($design1_id) {
      $this->db->where("design1_id",$design1_id);
      $result=$this->db->get('design2')->result();
        return $result;
    }

    function put($option) {
      $this->db->insert('design2', $option);
    }

    function remove($design2_id) {
      $this->db->where('id', $design2_id);
      $this->db->delete('design2');
    }

    function update($design2_id, $option) {
      $this->db->where('id', $design2_id);
      $this->db->update('design2', $option);
    }
}
