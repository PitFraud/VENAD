<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class TravelDetails extends MY_Controller {
	public $table = 'tbl_travel';
	public $page  = 'Travel_details';
	public function __construct() {
		parent::__construct();
		$this->load->model('General_model');
		$this->load->model('Member_model');
		$this->load->model('Vaccination_model');
		$this->load->model('Vehicles_model');
		$this->load->model('TravelDetails_model');
	}
	public function index(){
		$template['body'] = 'Travel_details/list';
		$template['script'] = 'Travel_details/script';
		$template['notifications']=$this->General_model->get_notifications();
		$this->load->view('template', $template);
	}
	public function add(){
		$this->form_validation->set_rules('vehicleSelect','Vehicle','required');
		if ($this->form_validation->run() == FALSE) {
			$template['vehicles'] = $this->getVehicleList();
			$template['drivers'] = $this->getDrivers();
			$template['body'] = 'Travel_details/add';
			$template['script'] = 'Travel_details/script';
			$template['notifications']=$this->General_model->get_notifications();
			$this->load->view('template', $template);
		}
		else {
			$insert_array=[
					'travel_vehicle_fk'=>$_POST['vehicleSelect'],
					'travel_driver_fk'=>$_POST['driverSelect'],
					'travel_date'=>$_POST['travel_date'],
					'travel_start_km'=>$_POST['starting_km'],
					'travel_end_km'=>$_POST['ending_km'],
					'travel_total_km'=>$_POST['total_km'],
					'travel_root_details'=>$_POST['root_details'],
					'travel_fuel'=>$_POST['fuel'],
					'travel_fuel_cost'=>$_POST['fuel_cost'],
					'travel_other_exp'=>$_POST['other_expenses'],
					'created_at'=>date('Y-m-d H:i:s'),
				];
				$result = $this->General_model->add($this->table,$insert_array);
				$response_text = 'Travel details added successfully';
				if($result){
	            $this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
				}
				else{
	            $this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
				}
				 redirect('/TravelDetails/', 'refresh');
		}
	}
	public function getTravelDetails(){
	      	$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
	        $param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10';
	        $param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
	        $param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
	        $param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
	        $param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';
	    	$data = $this->TravelDetails_model->getTravelDetails($param);
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
