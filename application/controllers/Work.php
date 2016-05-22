<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Work extends MY_Controller {
	function __construct()
	    {
	        parent::__construct();
	    }

	public function index()
	{

		$this->load->library('session');

		$work_param = array('header' => "");
		$customer = $this->session->userdata('customer');
		$this->load->model('design1_model');

		$design1s = $this->design1_model->gets();
		$design1s_array = array();
		foreach($design1s as $key => $value) {
			$design1s_array[$value->id] = get_object_vars($value);
		}
		$work_param['design1s_array'] = $design1s_array;

		$this->load->model('design2_model');
		$design2s = $this->design2_model->gets();
		$design2s_array = array();
		foreach($design2s as $key => $value) {
			$design2s_array[$value->id] = get_object_vars($value);
		}
		$work_param['design2s_array'] = $design2s_array;

		if(!is_null($customer)) {
			$this->load->model('work_model');
			$works = $this->work_model->get($customer['id']);
			$work_param['works'] = $works;
		}

		if($this->input->server('REQUEST_METHOD') === "POST") {
			$this->load->library('form_validation');
			$this->form_validation->set_rules('design1_id', '구분', 'required');
			$this->form_validation->set_rules('design2_id', '디자인', 'required');
			$this->form_validation->set_rules('price', '결제금액', 'required');
			$this->form_validation->set_rules('date', '날짜', 'required');

			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('message', '입력 조건이 정확하지 않습니다.');
			} else {
				$this->load->model('work_model');
				$customer = $this->work_model->put($this->input->post());
				$this->load->helper('url');
				redirect("/");
			}
		}

		$this->load->view('header');
		$this->load->view('menu_bar');
		$this->load->view('sidebar_work');

		$this->load->helper(array('form', 'url'));

		$this->load->view('work', $work_param);
		$this->load->view('work_footer', array('design2s'=> $design2s));
	}

	public function works() {
		$this->load->library('session');

		$work_param = array('header' => "");
		$customer = $this->session->userdata('customer');
		$this->load->model('design1_model');

		$design1s = $this->design1_model->gets();
		$design1s_array = array();
		foreach($design1s as $key => $value) {
			$design1s_array[$value->id] = get_object_vars($value);
		}
		$work_param['design1s_array'] = $design1s_array;

		$this->load->model('design2_model');
		$design2s = $this->design2_model->gets();
		$design2s_array = array();
		foreach($design2s as $key => $value) {
			$design2s_array[$value->id] = get_object_vars($value);
		}
		$work_param['design2s_array'] = $design2s_array;

		$this->load->model('work_model');
		$works = $this->work_model->get($customer['id']);
		$work_param['works'] = $works;

		$work_param['customer'] = $customer;

		$this->load->library('session');
		$this->load->view('works', $work_param);

	}

	public function parent() {
		$this->load->view('parent');
	}

	public function child() {
		$this->load->view('child');
	}
}
?>
