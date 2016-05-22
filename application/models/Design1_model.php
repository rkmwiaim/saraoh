<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Design1_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function gets(){
        $this->db->order_by('id', 'ASC');
        return $this->db->get('design1')->result();
    }

    function get($option) {
      foreach($option as $key => $value) {
        $this->db->where($key,$value);
      }
      $result=$this->db->get('design1')->result();
        return $result;
    }

    function put($option) {
      $this->db->insert('design1', $option);
    }

    function remove($design1_id) {
      $this->db->where('id', $design1_id);
      $this->db->delete('design1');
    }

    function update($design1_id, $option) {
      $this->db->where('id', $design1_id);
      $this->db->update('design1', $option);
    }
}
