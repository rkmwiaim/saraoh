<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Workbundle_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function put() {
      $this->db->insert('workbundle', array("id"=>NULL));
      return $this->db->insert_id();
    }

    function remove($bundle_id) {
      $this->db->where('id', $bundle_id);
      $this->db->delete('workbundle');
    }
}
