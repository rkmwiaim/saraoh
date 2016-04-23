<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function index()
	{
		$this->load->view('welcome_message');
	}

  public function work() {
		$this->load->view('header');
		$this->load->view('menu_bar');
		$this->load->view('sidebar_work');
		$this->load->view('work');
		$this->load->view('footer');
	}

  public function customer() {

  }
}
?>
