<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Work_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function gets(){
        return $this->db->get('work')->result();
    }

    function get($customer_id) {
      $this->db->where("customer_id",$customer_id);
      $this->db->order_by('id', 'DESC');
      $result=$this->db->get('work')->result();
        return $result;
    }

    function put($option) {
      $this->db->insert('work', $option);
    }

    // function remove($design2_id) {
    //   $this->db->where('id', $design2_id);
    //   $this->db->delete('work');
    // }
    //
    // function update($design2_id, $option) {
    //   $this->db->where('id', $design2_id);
    //   $this->db->update('design2', $option);
    // }
}
