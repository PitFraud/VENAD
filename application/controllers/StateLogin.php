<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class StateLogin extends MY_Controller {
	public $table = 'tbl_login';
	public $page  = 'StateLogin';
	public function __construct() {
		parent::__construct();
		$this->load->model('General_model');
		$this->load->model('Member_model');
		$this->load->model('Allotment_model');
		$this->load->model('State_model');
	}
	public function index(){
		$template['body'] = 'StateLogin/list';
		$template['script'] = 'StateLogin/script';
		$this->load->view('template', $template);
	}

	public function add(){
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('state', 'Member type', 'required');
		if ($this->form_validation->run() == FALSE) {
			$template['body'] = 'StateLogin/add';
			$template['script'] = 'StateLogin/script';
			$template['states'] = $this->State_model->getStates();
			$this->load->view('template', $template);
		}
		else {
			$insert_data = array(
				'user_name' => $this->input->post('username'),
				'password'=> $this->input->post('password'),
				'user_type' => 5, // State comsidering a usertype 5
				'mem_id' => $this->input->post('state'),
				'status' => 1,
				'created_at' => date('Y-m-d H:i:s'),
			);
			$result = $this->General_model->add($this->table,$insert_data);
			// var_dump($result); die;
			if($result){
				$this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
			}
			else{
				$this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
			}
			redirect('/StateLogin/', 'refresh');
		}
	}

	public function getMemberDetailsWhere(){
		$id=$this->input->post('id');
		$result=$this->Member_model->get_member_types_where($id);
		echo json_encode($result);
	}

	public function get(){
			$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
			$param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10';
			$param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
			$param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
			$param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
			$param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';
		$data = $this->State_model->get_state_login_credentials();
		$json_data = json_encode($data);
		echo $json_data;
    }


}
