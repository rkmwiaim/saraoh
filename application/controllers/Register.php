<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function index()
	{
		$this->load->view('header');
		$this->load->view('menu_bar');
		$this->load->view('sidebar_register');
		$this->load->view('register_customer');
		$this->load->view('footer');
	}

	public function customer()
	{
		$this->load->view('header');
		$this->load->view('menu_bar', array("class"=>$this->uri->rsegment(1)));
		$this->load->view('sidebar_register');
		$this->load->view('register_customer');
		$this->load->view('footer');
	}

	public function design()
	{
		$this->load->view('header');
		$this->load->view('menu_bar', array("class"=>$this->uri->rsegment(1)));
		$this->load->view('sidebar_register');
		$this->load->view('register_design');
		$this->load->view('footer');
	}

	public function staff()
	{
		$this->load->view('header');
		$this->load->view('menu_bar', array("class"=>$this->uri->rsegment(1)));
		$this->load->view('sidebar_register');
		$this->load->view('register_staff');
		$this->load->view('footer');
	}
}
?>
