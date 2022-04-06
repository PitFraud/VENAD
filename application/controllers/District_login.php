<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class District_login extends MY_Controller {
	public $table = 'tbl_login';
	public $page  = 'Mlogin';
	public function __construct() {
		parent::__construct();
		$this->load->model('General_model');
		$this->load->model('Member_model');
		$this->load->model('Allotment_model');
		$this->load->model('District_model');
		$this->load->model('State_model');
	}
	public function index(){
		$template['body'] = 'District_login/list';
		$template['script'] = 'District_login/script';
		$this->load->view('template', $template);
	}

	public function add(){
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('district', 'Member type', 'required');
		if ($this->form_validation->run() == FALSE) {
			$template['body'] = 'District_login/add';
			$template['script'] = 'District_login/script';
			$template['states'] = $this->State_model->getStates();
			$template['districts'] = $this->District_model->getDistricts();
			// $template['MemberDetails'] = $this->Member_model->get_member_details();
			$this->load->view('template', $template);
		}
		else {
			$insert_data = array(
				'user_name' => $this->input->post('username'),
				'password'=> $this->input->post('password'),
				'user_type' => 6, //user type 6 considered as district login
				'mem_id' => $this->input->post('district'),
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
			redirect('/District_login/', 'refresh');
		}
	}

	public function getDistrictsWhere(){
		$id=$this->input->post('id');
		$result=$this->District_model->get_districts_where($id);
		echo json_encode($result);
	}

	public function get(){
			$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
			$param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10';
			$param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
			$param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
			$param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
			$param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';
		$data = $this->District_model->get_district_credentials();
		$json_data = json_encode($data);
		echo $json_data;
    }


}
