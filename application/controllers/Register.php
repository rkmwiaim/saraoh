<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function index()
	{

	}

	function _getCustomers() {
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('message', '검색 조건이 정확하지 않습니다.');
			return NULL;
		} else {
			$this->load->model('customer_model');
			$customers = $this->customer_model->get(array($this->input->post('customer-search-select')=>$this->input->post('customer-search-query')));
			return $customers;
		}
	}

	public function customer()
	{
		$this->load->library('session');
		$this->load->library('form_validation');

		if($this->input->server('REQUEST_METHOD') === "POST") {
			$class = $this->input->post('class');
			if($class === "register") {
				$this->form_validation->set_rules('name', '이름', 'required');
				$this->form_validation->set_rules('phone_number', '전화번호', 'required');
				if ($this->form_validation->run() == FALSE) {
					$this->session->set_flashdata('message', '조건이 정확하지 않습니다.');
				} else {
					$this->load->model('customer_model');
					$customer = $this->input->post();
					$postclass = $customer["postclass"];
					$_POST['class'] = $postclass;

					unset($customer["class"]);
					unset($customer["postclass"]);
					unset($customer["staff"]);
					$id = $this->customer_model->put($customer);

					if($postclass == "work") {
						$customer["id"] = $id;
						$this->load->helper('url');
						$this->session->set_userdata('customer',$customer);
						redirect("/work");
					}
				}
			} else if ($class == "search"){
				$this->form_validation->set_rules('customer-search-select', 'search', 'required');
				$this->form_validation->set_rules('customer-search-query', 'query', 'required');
				if ($this->form_validation->run() == FALSE) {
					$this->session->set_flashdata('message', '검색 조건이 정확하지 않습니다.');
				} else {
					$this->load->model('customer_model');
					$customers = $this->customer_model->get(array($this->input->post('customer-search-select')=>$this->input->post('customer-search-query')));
					if(($this->input->post('from') == "work" || $this->input->post('from') == "fast-search") && count($customers) == (int)1) {
						$customer = get_object_vars($customers[0]);
						$this->load->helper('url');
						$this->session->set_userdata('customer',$customer);
						redirect("/work");
					}
				}
			} else if ($class == "modify") {
				$customer = $this->input->post();
				$id = $customer["id"];
				$postclass = $customer["postclass"];
				$_POST['class'] = $postclass;

				unset($customer["id"]);
				unset($customer["class"]);
				unset($customer["postclass"]);
				unset($customer["staff"]);

				$this->load->model('customer_model');
				$this->customer_model->update($id, $customer);

				if($postclass == "work") {
					$this->load->helper('url');
					$customer["id"] = $id;
					$this->session->set_userdata('customer',$customer);
					redirect("/work");
				}
			} else if($class == "delete") {
				$this->load->model('customer_model');
				$this->customer_model->remove($this->input->post('id'));

			}
		}

		$this->_head();
		$option = array('header' => 'register-');
		if(isset($customers)) {
			$option['customers'] = $customers;
		}
		$this->load->view('register_customer', $option);
		$this->_footer();
	}



	public function design()
	{
		$this->load->model('design1_model');
		$this->load->model('design2_model');
		$this->load->library('session');
		$this->load->library('form_validation');

		$design1s = $this->design1_model->gets();
		$design2_id = $this->input->post('design2-id');
		$design2_name = $this->input->post('design2-name');
		$design2_price = $this->input->post('design2-price');

		$design_param = array('design1s' => $design1s);

		$design1_id = $this->input->post('design1-id');
		if(!is_null($design1_id) && !$design1_id == "") {
			$design2s = $this->design2_model->get($this->input->post('design1-id'));
			if($this->input->post('class') == 'select-design1') {
				$design2_class = $this->input->post('design2-class');
				if($design2_class == "register-design2" || $design2_class == "select-design2") {
					foreach($design2s as $key => $value) {
						if($value->id == $design2_id) {
							$design2_name = $value->name;
							$design2_price = $value->price;
						}
					}
				} else if ($design2_class  == "delete-design2") {
					$this->design2_model->remove($this->input->post('design2-id'));
					$design2s = $this->design2_model->get($this->input->post('design1-id'));
					$design2_name = "";
					$design2_price = "";
				} else if ($design2_class  == "update-design2") {
					$design2_name = $this->input->post('design2-name');
					$design2_price = $this->input->post('design2-price');
					$this->design2_model->update($this->input->post('design2-id'), array("name" => $design2_name, "price" => $design2_price));
					$design2s = $this->design2_model->get($this->input->post('design1-id'));
				}
			}
		}

		$class = "";
		if($this->input->server('REQUEST_METHOD') === "POST") {
			$class = $this->input->post('class');
			if($class === "register-design1") {
				$this->form_validation->set_rules('name', '이름', 'required');

				if ($this->form_validation->run() == FALSE) {
					$this->session->set_flashdata('message', '1차 디자인명이 없습니다.');
				} else {
					$option = $this->input->post();
					unset($option["class"]);
					unset($option['design1-id']);
					$this->design1_model->put($option);
				}
			} else if ($class === "delete-design1"){
				$this->design1_model->remove($this->input->post('design1-id'));
			} else if($class === "update-design1") {
				$this->design1_model->update($this->input->post('design1-id'), array("name" => $this->input->post('name')));
			}	else if($class == "select-design1"){
				$class2 = $this->input->post("design2-class");
				$this->form_validation->set_rules('design2-name', '이름', 'required');
				$this->form_validation->set_rules('design2-price', '이름', 'required');

				if($class2 == "register-design2") {
					if ($this->form_validation->run() == FALSE) {
						$this->session->set_flashdata('message', '2차 디자인명 또는 가격이 잘못되었습니다.');
					} else {
						$option = array("name" => $design2_name, "price" => $design2_price, "design1_id" => $this->input->post('design1-id'));
						$this->design2_model->put($option);

						$design2s = $this->design2_model->get($this->input->post('design1-id'));
						$design_param['design2s'] = $design2s;
						$design2_name = "";
						$design2_price = "";
					}
				}
			}
		}

		$design_param["design2_id"] = $design2_id;
		$design_param["design2_name"] = $design2_name;
		$design_param["design2_price"] = $design2_price;
		if(isset($design2s)) {
				$design_param['design2s'] = $design2s;
		}

		$this->_head();
		$this->load->view('register_design', $design_param);
		$this->_footer();
	}

	public function staff()
	{
		$this->_head();
		$this->load->view('register_staff');
		$this->_footer();
	}

	function _head() {
		$this->load->library('session');
		$this->load->view('header');
		$this->load->view('menu_bar', array("class"=>$this->uri->rsegment(1)));
		$this->load->view('sidebar_register');
		$this->load->view('main_head');
	}

	function _footer() {
		$this->load->view('main_footer');
		$this->load->view('footer');
	}
}
?>
