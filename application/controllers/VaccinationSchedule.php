<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');
class VaccinationSchedule extends MY_Controller {
	public $table = 'tbl_vaccination_schedule';
	public $page  = 'VaccinationSchedule';
	public function __construct() {
		parent::__construct();
		$this->load->model('General_model');
		$this->load->model('Member_model');
		$this->load->model('Allotment_model');
		$this->load->model('Vaccination_model');
		$this->load->model('VaccinationSchedule_model');
	}
	public function index(){
		$template['body'] = 'VaccinationSchedule/list';
		$template['script'] = 'VaccinationSchedule/script';
		$this->load->view('template', $template);
	}

	public function add(){
		$this->form_validation->set_rules('allotment_id','Allotment','required');
		$this->form_validation->set_rules('vaccine_name','Vaccine Name','required');
		$this->form_validation->set_rules('vaccine_dose','Vaccine Dose','required');
		$this->form_validation->set_rules('vaccine_total_dose','Total Dose','required');
		$this->form_validation->set_rules('vaccine_date','Vaccine Date','required');
		if ($this->form_validation->run() == FALSE) {
			$template['allotment_details']=$this->getAllotments();
			$template['vaccine_list']=$this->getVaccineList();
			$template['body'] = 'VaccinationSchedule/add';
			$template['script'] = 'VaccinationSchedule/script';
			$this->load->view('template', $template);
		}
		else {
			$insert_array=[
				'schedule_allotment_fk'=>$_POST['allotment_id'],
				'schedule_vaccine_fk'=>$_POST['vaccine_name'],
				'schedule_vaccine_dose'=>$_POST['vaccine_dose'],
				'schedule_vaccine_total_dose'=>$_POST['vaccine_total_dose'],
				'schedule_vaccine_date'=>$_POST['vaccine_date'],
				'schedule_status'=>$_POST['vaccine_status'],
				'created_at'=>date('Y-m-d H:i:s'),
			];
			// var_dump($insert_array); die;
			// $result = $this->General_model->add($this->table,$insert_array);
			// $response_text = 'vaccination added successfully';
			$schedule_id=$this->input->post('schedule_id');
			if($schedule_id){
				$data['schedule_id'] = $schedule_id;
				// $result = $this->General_model->update($this->table,$data,'vaccination_id',$vaccination_id);
				$result = $this->General_model->update($this->table,$insert_array,'schedule_id',$schedule_id);
				$response_text = 'Schedule updated successfully';
			}
			else{
				$result = $this->General_model->add($this->table,$insert_array);
				$response_text = 'Schedule added  successfully';
			}
			if($result){
				$this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
			}
			else{
				$this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
			}
			redirect('/VaccinationSchedule/', 'refresh');
		}
	}

	public function edit($schedule_id){
		$template['body'] = 'VaccinationSchedule/add';
		$template['script'] = 'VaccinationSchedule/script';
		$template['allotment_details'] = $this->getAllotmentsList();
		$template['vaccine_list'] = $this->getVaccineList();
		$template['records'] = $this->General_model->get_row($this->table,'schedule_id',$schedule_id);
    $this->load->view('template', $template);
	}

	public function getAllotmentsList(){
		$data=$this->VaccinationSchedule_model->getAllotmentsList();
		return $data;
	}

	public function get(){
		// $this->load->model('Allotment_model');
		$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
		$param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10';
		$param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
		$param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
		$param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
		$param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';
		$data = $this->VaccinationSchedule_model->get_schedule_details($param);
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

	public function getVaccineList(){
		$data=$this->VaccinationSchedule_model->get_vaccine_list();
		return $data;
	}

	public function getAllotments(){
		$data=$this->Allotment_model->get_allotment_list();
		return $data;
	}



	public function getreceipt($schedule_id){



		$template['body'] = 'VaccinationSchedule/receipt';

		$template['script'] = 'VaccinationSchedule/script-receipt';
		$template['records'] = $this->VaccinationSchedule_model->getreceipt($schedule_id);
		$this->load->view('template', $template);

	}



}
