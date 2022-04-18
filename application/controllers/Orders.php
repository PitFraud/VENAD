<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Orders extends MY_Controller {
	public $table = 'tbl_orders';
	public $page  = 'Orders';
	public function __construct() {
		parent::__construct();
		if(! $this->is_logged_in()){
			redirect('/login');
		}
		$this->load->model('General_model');
		$this->load->model('Orders_model');
		$this->load->model('Member_model');

	}
	public function index()
	{
		$template['body'] = 'Orders/list';
		$template['script'] = 'Orders/script';
		$this->load->view('template', $template);
	}
	public function add(){
		$this->form_validation->set_rules('product', 'Item', 'required');
		if ($this->form_validation->run() == FALSE) {
			$template['body'] = 'Orders/add';
			$template['script'] = 'Orders/script';
			$template['products'] = $this->Orders_model->get_all_products();
			$this->load->view('template', $template);
		}
		else {
			$order_id = $this->input->post('order_id');
			// var_dump($this->session->userdata('mem_id'));
			// var_dump($_POST); die;
			$data = array(
				'user_id'=>$this->session->userdata('mem_id'),
				'item_id' => $this->input->post('product'),
				'quantity' => $this->input->post('quantity'),
				'status' => 0,
				'created_at' => date('Y-m-d H:i:s'),
			);
			$order_id = $this->input->post('order_id');
			if($order_id){
				$data['order_id'] = $order_id;
				$result = $this->General_model->update($this->table,$data,'order_id',$item_id);
				$response_text = 'Order updated successfully';
			}
			else{
				$result = $this->General_model->add($this->table,$data);
				$response_text = 'Order added  successfully';
			}

			if($result){
				$this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
			}
			else{
				$this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
			}
			redirect('/Orders/', 'refresh');

		}
	}
	public function get(){
		$this->load->model('Orders_model');
		$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
		$param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10';
		$param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
		$param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
		$param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
		$param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';
		$data = $this->Orders_model->getClassinfoTable($param);
		$json_data = json_encode($data);
		echo $json_data;
	}
	public function delete(){
		$order_id = $this->input->post('order_id');
		$updateData = array('status' => 2); // 2 is considered as deleted
		$data = $this->General_model->update($this->table,$updateData,'order_id',$order_id);
		if($data) {
			$response['text'] = 'Deleted successfully';
			$response['type'] = 'success';
		}
		else{
			$response['text'] = 'Something went wrong';
			$response['type'] = 'error';
		}
		$response['layout'] = 'topRight';
		$data_json = json_encode($response);
		echo $data_json;
		redirect('/Orders/', 'refresh');
	}

	public function edit($order_id){
		$template['body'] = 'Orders/add';
		$template['script'] = 'Orders/script';
		$template['products'] = $this->Orders_model->get_all_products();
		$template['records'] = $this->General_model->get_row($this->table,'order_id',$order_id);
		$this->load->view('template', $template);

	}

	public function adminView(){
		$template['body'] = 'Orders/adminlist';
		$template['script'] = 'Orders/adminscript';
		$this->load->view('template', $template);
	}

	public function changeStatusToDelivered($order_id){
		$result=$this->Orders_model->update_delivery_status($order_id);
		redirect('/Orders/adminView', 'refresh');
	}
}
