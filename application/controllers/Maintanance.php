<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Maintanance extends MY_Controller {
	public $table = 'tbl_maintanance_history';
	public $page  = 'Maintanance';
	public function __construct() {
		parent::__construct();
		$this->load->model('General_model');
		$this->load->model('Member_model');
		$this->load->model('Maintanance_model');
		$this->load->model('Vehicles_model');
		$this->load->model('TravelDetails_model');
	}
	public function index(){
		$template['notifications']=$this->General_model->get_notifications();
		$template['body'] = 'Maintanance/list';
		$template['script'] = 'Maintanance/script';
		$this->load->view('template', $template);
	}
	public function add(){
		$this->form_validation->set_rules('vehicle_name','vehicle name','required');
		if ($this->form_validation->run() == FALSE) {
			$template['vehicles'] = $this->getVehicleList();
			$template['drivers'] = $this->getDrivers();
			$template['body'] = 'Maintanance/add';
			$template['script'] = 'Maintanance/script';
			$this->load->view('template', $template);
		}
		else {
			$insert_array=[
					'history_vehicle_fk'=>$_POST['vehicle_name'],
					'history_incharge_driver_fk'=>$_POST['driver_name'],
					'history_complaint'=>$_POST['complaint'],
					'history_reason'=>$_POST['reason'],
					'history_date'=>$_POST['date'],
					'history_workshop_name'=>$_POST['workshop'],
					'history_cost'=>$_POST['cost'],
					'history_insurance_received'=>$_POST['insurance'],
					'history_remarks'=>$_POST['remarks'],
					'created_at'=>date('Y-m-d H:i:s'),
				];
				$result = $this->General_model->add($this->table,$insert_array);
				$response_text = 'Vehicle added successfully';
				if($result){
	            $this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
				}
				else{
	            $this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
				}
				 redirect('/Maintanance/', 'refresh');
		}
	}
	public function getMaintanance(){
	      	$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
	        $param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10';
	        $param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
	        $param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
	        $param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
	        $param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';
	    	$data = $this->Maintanance_model->getMaintanance($param);
	    	$json_data = json_encode($data);
	    	echo $json_data;
	}
	public function getVehicleList(){
		$data = $this->TravelDetails_model->getVehicleList();
		return $data;
	}
	public function getDrivers(){
		$data = $this->TravelDetails_model->getDrivers();
		return $data;
	}
}
