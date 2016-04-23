<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function index()
	{
		$this->load->view('welcome_message');
	}

  public function work() {
		$this->load->view('header');
		$this->load->view('sidebar_work');
		$this->load->model('customer_model');
		$customers = $this->customer_model->gets();
		$this->load->view('main', array('customers' => $customers));
		$this->load->view('footer');
	}

  public function customer() {
    $this->load->view('sidebar');
		$this->load->model('customer_model');
		$customers = $this->customer_model->gets();
		$this->load->view('main', array('customers' => $customers));
		$this->load->view('footer');
  }
}
?>
