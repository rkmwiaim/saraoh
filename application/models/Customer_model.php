<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Customer_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function gets(){
        return $this->db->get('customer')->result();
    }

    function get($option) {
      foreach($option as $key => $value) {
        $this->db->like($key, $value);
      }
      $result=$this->db->get('customer')->result();
      return $result;
    }

    function put($option) {
      $this->db->insert('customer', $option);
      return $this->db->insert_id();
    }

    function remove($customer_id) {
      $this->db->where('id', $customer_id);
      $this->db->delete('customer');
    }

    function update($customer_id, $option) {
      $this->db->where('id', $customer_id);
      $this->db->update('customer', $option);
    }



}
