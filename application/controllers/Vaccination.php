<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');
class Vaccination extends MY_Controller {
	public $table = 'tbl_vaccination';
	public $page  = 'Vaccination';
	public function __construct() {
		parent::__construct();
		$this->load->model('General_model');
		$this->load->model('Member_model');
		$this->load->model('Allotment_model');
		$this->load->model('Vaccination_model');
	}
	public function index(){
		$template['body'] = 'Vaccination/list';
		$template['script'] = 'Vaccination/script';
		$template['notifications']=$this->General_model->get_notifications();
		$this->load->view('template', $template);
	}
	public function add(){
		$this->form_validation->set_rules('vaccination_name','vaccination_days','required');
		if ($this->form_validation->run() == FALSE) {
			$template['body'] = 'Vaccination/add';
			$template['script'] = 'Vaccination/script';
			$template['notifications']=$this->General_model->get_notifications();
			$this->load->view('template', $template);
		}
		else {
			$insert_array=[
				'vaccination_name'=>$_POST['vaccination_name'],
				'vaccination_days'=>$_POST['vaccination_days'],
				'created_at'=>date('Y-m-d H:i:s'),
			];
			// $result = $this->General_model->add($this->table,$insert_array);
			// $response_text = 'vaccination added successfully';
			$vaccination_id=$this->input->post('vaccination_id');
			if($vaccination_id){
				$data['vaccination_id'] = $vaccination_id;
				// $result = $this->General_model->update($this->table,$data,'vaccination_id',$vaccination_id);
				$result = $this->General_model->update($this->table,$insert_array,'vaccination_id',$vaccination_id);
				$response_text = 'Vaccination updated successfully';
			}
			else{
				$result = $this->General_model->add($this->table,$insert_array);
				$response_text = 'Vaccination added  successfully';
			}
			if($result){
				$this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
			}
			else{
				$this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
			}
			redirect('/Vaccination/', 'refresh');
		}
	}
	public function edit($vaccination_id){
		$template['body'] = 'Vaccination/add';
		$template['script'] = 'Vaccination/script';
		$template['notifications']=$this->General_model->get_notifications();
		$template['records'] = $this->General_model->get_row($this->table,'vaccination_id',$vaccination_id);
		$this->load->view('template', $template);
	}
	public function getVaccinations(){
		// $this->load->model('Allotment_model');
		$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
		$param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10';
		$param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
		$param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
		$param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
		$param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';
		$data = $this->Vaccination_model->getVaccinations($param);
		$json_data = json_encode($data);
		echo $json_data;
	}
	public function delete(){
		$vaccination_id = $this->input->post('vaccination_id');
		$data = $this->General_model->delete($this->table,'vaccination_id',$vaccination_id);
		if($data) {
			$response['text'] = 'Deleted successfully';
			$response['type'] = 'success';
		}
		else{
			$response['text'] = 'Success';
			$response['type'] = 'success';
		}
		$response['layout'] = 'topRight';
		$data_json = json_encode($response);
		echo $data_json;
		redirect('/Vaccination/', 'refresh');
	}
	public function getMembers(){
		$data = $this->Allotment_model->getMembers();
		return $data;
	}
	public function getUnits(){
		$data = $this->Allotment_model->getUnits();
		return $data;
	}
}
