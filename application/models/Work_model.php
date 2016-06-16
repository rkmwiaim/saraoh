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
      $this->db->where("customer_id", $customer_id);
      $this->db->order_by('id', 'DESC');
      $result=$this->db->get('work')->result();
      return $result;
    }

    function put($option) {
      $this->db->insert('work', $option);
      $this->load->model('customer_model');
			$this->customer_model->update($option['customer_id'],array("last_visit_date"=>$option['date']));
      $customer = $this->session->userdata('customer');
      $customer['last_visit_date'] = $option['date'];
      $this->session->set_userdata('customer',$customer);
    }

    function get_by_bundle($bundle_id) {
      $this->db->where("bundle_id", $bundle_id);
      $this->db->order_by('id', 'DESC');
      $result=$this->db->get('work')->result();
      return $result;
    }

    function update($work_array) {
      $added_id_array = array();
      foreach($work_array as $key => $work) {
        if(isset($work['id'])) {
          $this->db->where('id',$work['id']);
          $this->db->update('work',$work);
        } else {
          $this->db->insert('work',$work);
          array_push($added_id_array, $this->db->insert_id());
        }
      }
      return $added_id_array;

    }
}
