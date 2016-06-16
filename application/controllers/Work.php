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
		$work_param['design2s'] = $design2s;
		$design2s_array = array();
		foreach($design2s as $key => $value) {
			$design2s_array[$value->id] = get_object_vars($value);
		}
		$work_param['design2s_array'] = $design2s_array;

		$this->load->model('staff_model');
		$staffs = $this->staff_model->gets();
		$staffs_array = array();
		foreach($staffs as $key => $staff) {
			$staffs_array[$staff->id] = get_object_vars($staff);
		}
		$work_param["staffs_array"] = $staffs_array;

		if(!is_null($customer)) {
			$this->load->model('work_model');
			$works = $this->work_model->get($customer['id']);
			$work_param['works'] = $works;
		}

		$post = $this->input->post();
		if($this->input->server('REQUEST_METHOD') === "POST") {
			$form_validate = TRUE;
			if($post['type'] == 'select') {
				$bundle_id = $post['bundle-id'];
				$this->load->model('work_model');
				$workbundle = $this->work_model->get_by_bundle($bundle_id);
				$work_param['workbundle'] = $workbundle;
			} else if ($post['type'] == 'insert'){
				$work_array = array();
				if(!isset($post['design1_id']) || !isset($post['design2_id']) || !isset($post['staff_id']) || !isset($post['price'])) {
					$form_validate = FALSE;
				} else {
					$design1_id_array = $post['design1_id'];
					$design2_id_array = $post['design2_id'];
					$staff_id_array = $post['staff_id'];
					$price_array = $post['price'];

					$min = count($design1_id_array);
					if(count($design2_id_array) < $min) {
						$form_validate = FALSE;
					}
					if(count($staff_id_array) < $min) {
						$form_validate = FALSE;
					}
					if(count($price_array) < $min) {
						$form_validate = FALSE;
					}

					if($form_validate) {
						$customer_id = $post['customer_id'];
						$date = $post['date'];
						$memo = $post['memo'];

						for($i = 0; $i<$min ; $i++){
							$work = array();
							$work['design1_id'] = $design1_id_array[$i];
							$work['design2_id'] = $design2_id_array[$i];
							$work['staff_id'] = $staff_id_array[$i];
							$work['price'] = $price_array[$i];
							$work['customer_id'] = $customer_id;
							$work['date'] = $date;
							$work['memo'] = $memo;
							$work_array[$i] = $work;
						}
					}
				}

				if ($form_validate == FALSE) {
					$this->session->set_flashdata('message', '입력 조건이 정확하지 않습니다.');
				} else {
					$this->load->model('workbundle_model');
					$bundle_id = $this->workbundle_model->put();
					$temp_array = array_reverse($work_array);
					foreach($temp_array as $key => $work) {
						$work['bundle_id'] = $bundle_id;
						$customer = $this->work_model->put($work);
						$this->load->helper('url');
					}
					redirect("/");
				}
			} else if ($post['type'] == 'modify'){
				if(!isset($post['design1_id']) || !isset($post['design2_id']) || !isset($post['staff_id']) || !isset($post['price'])) {
					$form_validate = FALSE;
				} else {
					$design1_id_array = $post['design1_id'];
					$design2_id_array = $post['design2_id'];
					$staff_id_array = $post['staff_id'];
					$price_array = $post['price'];
					$id_array = $post['id'];

					$min = count($design1_id_array);
					if(count($design2_id_array) < $min) {
						$form_validate = FALSE;
					}
					if(count($staff_id_array) < $min) {
						$form_validate = FALSE;
					}
					if(count($price_array) < $min) {
						$form_validate = FALSE;
					}
			}

				if($form_validate) {
					$this->load->model('work_model');
					$work_array = array();
					$customer_id = $post['customer_id'];
					$date = $post['date'];
					$memo = $post['memo'];
					$bundle_id = $post['bundle-id'];
					$customer = $this->session->userdata('customer');
					$customer_id = $customer['id'];

					for($i = 0; $i<$min ; $i++){
						$work = array();
						if(isset($id_array[$i])) {
								$work['id'] = $id_array[$i];
						}
						$work['design1_id'] = $design1_id_array[$i];
						$work['design2_id'] = $design2_id_array[$i];
						$work['staff_id'] = $staff_id_array[$i];
						$work['price'] = $price_array[$i];
						$work['customer_id'] = $customer_id;
						$work['date'] = $date;
						$work['bundle_id'] = $bundle_id;
						$work['memo'] = $memo;
						$work_array[$i] = $work;
					}

					$added_id_array = $this->work_model->update($work_array);
					array_merge($id_array, $added_id_array);
				} else {
					$this->session->set_flashdata('message', '입력 조건이 정확하지 않습니다.');
				}
				$post['type'] = 'select';
				$bundle_id = $post['bundle-id'];
				$this->load->model('work_model');
				$workbundle = $this->work_model->get_by_bundle($bundle_id);
				$work_param['workbundle'] = $workbundle;
				$work_param['reload'] = 'true';

			} else if ($post['type'] == 'delete'){
				$bundle_id = $post['bundle-id'];
				$this->load->model('workbundle_model');
				$this->workbundle_model->remove($bundle_id);
				$work_param['reload'] = 'true';
				$work_param['close'] = 'true';
			}
		}

		$this->load->helper(array('form', 'url'));
		$this->load->view('header');
		if(isset($post['type']) && $post['type'] == 'select') {
			$work_param['customer'] = $customer;
			$this->load->view('modify_work_bar', $work_param);
			$this->load->view('work_footer', $work_param);
		} else {
			$this->load->view('menu_bar');
			$this->load->view('sidebar_work');
			$this->load->view('work', $work_param);
			$this->load->view('work_footer', array("design1s_array"=>$design1s_array, "staffs_array"=>$staffs_array, 'design2s'=> $design2s));
		}


	}

	public function works() {
		$this->load->library('session');
		$this->load->helper('form');

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

		$this->load->model('staff_model');
		$staffs = $this->staff_model->gets();
		$staffs_array = array();
		foreach($staffs as $key => $staff) {
			$staffs_array[$staff->id] = get_object_vars($staff);
		}
		$work_param['staffs_array'] = $staffs_array;

		$work_param['customer'] = $customer;

		$this->load->library('session');
		$this->load->view('works', $work_param);

	}

	public function parent() {
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->form_validation->set_rules('parent[]', '구분', 'array_required_check');
		// $this->form_validation->set_rules('parent[]', '구분', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('message', '입력 조건이 정확하지 않습니다.');
		} else {

		}
		$this->load->view('parent');
	}

	public function array_required_check($array) {
		$success = FALSE;
		foreach($array as $key => $value) {
			if(strlen($value) > 0) {
				$success = TRUE;
			}
		}

		if($success) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function child() {
		$this->load->view('child');
	}
}
?>
