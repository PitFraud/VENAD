<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Mlogin extends MY_Controller {
	public $table = 'tbl_login';
	public $page  = 'Mlogin';
	public function __construct() {
		parent::__construct();
		$this->load->model('General_model');
		$this->load->model('Member_model');
		$this->load->model('Allotment_model');
	}
	public function index(){
		$template['body'] = 'Mlogin/list';
		$template['script'] = 'Mlogin/script';
		$this->load->view('template', $template);
	}

	public function add(){
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('member_type', 'Member type', 'required');
		$this->form_validation->set_rules('member_id', 'Member ID', 'required');
		if ($this->form_validation->run() == FALSE) {
			$template['body'] = 'Mlogin/add';
			$template['script'] = 'Mlogin/script';
			$template['MemberTypes'] = $this->Member_model->get_member_types();
			$template['MemberDetails'] = $this->Member_model->get_member_details();
			$this->load->view('template', $template);
		}
		else {
			$m_id = $this->input->post('member_id');
			$check_user_exist = $this->Member_model->get_member_login_exist($m_id);
			if(!empty($check_user_exist)){
				$this->session->set_flashdata('response', 'User Login Already Exits');
				redirect('/Mlogin/', 'refresh');
			}
			else
			{
				$insert_data = array(
					'user_name' => $this->input->post('username'),
					'password'=> $this->input->post('password'),
					'user_type' => $this->input->post('member_type'),
					'mem_id' => $this->input->post('member_id'),
					'status' => 1,
					'created_at' => date('Y-m-d H:i:s'),
				);
				$result = $this->General_model->add($this->table,$insert_data);
				// var_dump($result); die;
				if($result){
					$this->session->set_flashdata('response', "Successfully Added Member Login Details");
				}
				else{
					$this->session->set_flashdata('response', 'Something went wrong,please try again later');
				}
				redirect('/Mlogin/', 'refresh');
			}
			
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
		$data = $this->Member_model->get_member_credentials();
		$json_data = json_encode($data);
		echo $json_data;
    }


}
