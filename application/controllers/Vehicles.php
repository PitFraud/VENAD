<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Vehicles extends MY_Controller {
	public $table = 'tbl_vehicle';
	public $page  = 'Vehicles';
	public function __construct() {
		parent::__construct();
		$this->load->model('General_model');
		$this->load->model('Member_model');
		$this->load->model('Vaccination_model');
		$this->load->model('Vehicles_model');
	}
	public function index(){
		$template['body'] = 'Vehicles/list';
		$template['script'] = 'Vehicles/script';
		$template['notifications']=$this->General_model->get_notifications();
		$this->load->view('template', $template);
	}
	public function add(){
		$this->form_validation->set_rules('vehicle_name','vehiclename','required');
		if ($this->form_validation->run() == FALSE) {
			$template['vehicle_types'] = $this->getVehicleTypes();
			$template['vehicle_groups'] = $this->getVehicleGroups();
			$template['notifications']=$this->General_model->get_notifications();
			$template['body'] = 'Vehicles/add';
			$template['script'] = 'Vehicles/script';
			$this->load->view('template', $template);
		}
		else {
			$image=$_FILES['vehicle_image']['name'];
			$config['upload_path'] = './Images/Vehicles/';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$config['file_name'] = $_FILES['vehicle_image']['name'];
			$pic = $_FILES['vehicle_image']['name'];
			//Load upload library and initialize configuration
			$this->load->library('upload',$config);
			$this->upload->initialize($config);
			if($this->upload->do_upload('vehicle_image')){
				$insert_array=[
					'vehicle_type_fk'=>$_POST['vehicle_type'],
					'vehicle_reg_no'=>$_POST['reg_no'],
					'vehicle_name'=>$_POST['vehicle_name'],
					'vehicle_engine_number'=>$_POST['engine_no'],
					'vehicle_make_model'=>$_POST['make_model'],
					'vehicle_chassis_number'=>$_POST['chassis_no'],
					'vehicle_year_of_mfd'=>$_POST['year_mfd'],
					'vehicle_fuel_type'=>$_POST['fuel_type'],
					'vehicle_color'=>$_POST['color'],
					'vehicle_fuel_mesurement'=>$_POST['fuel_measurement'],
					'vehicle_image'=>$_FILES['vehicle_image']['name'],
					'vehicle_track_usage'=>$_POST['track_usage'],
					'vehicle_group_fk'=>$_POST['group'],
					'vehicle_sec_or_aux'=>$_POST['sec_or_aux'],
					'created_at'=>date('Y-m-d H:i:s'),
				];
			}
			$vehicle_id = $this->input->post('vehicle_id');
			if($vehicle_id){
									 $data['vehicle_id'] = $vehicle_id;
									 $result = $this->General_model->update($this->table,$insert_array,'vehicle_id',$vehicle_id);
									 $response_text = 'Vehicle updated successfully';
							}
			else{
									 $result = $this->General_model->add($this->table,$insert_array);
									 $response_text = 'Vehicle added  successfully';
							}
				// $result = $this->General_model->add($this->table,$insert_array);
				// $response_text = 'Vehicle added successfully';
				if($result){
					$this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
				}
				else{
					$this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
				}
				redirect('/Vehicles/', 'refresh');
			}
		}
		public function edit($vehicle_id){
			$template['vehicle_types'] = $this->getVehicleTypes();
			$template['vehicle_groups'] = $this->getVehicleGroups();
			$template['notifications']=$this->General_model->get_notifications();
			$template['body'] = 'Vehicles/add';
			$template['script'] = 'Vehicles/script';
			$template['records'] = $this->General_model->get_row($this->table,'vehicle_id',$vehicle_id);
	    	$this->load->view('template', $template);
		}
		public function getVehicles(){
			$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
			$param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10';
			$param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
			$param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
			$param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
			$param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';
			$data = $this->Vehicles_model->getVehicles($param);
			$json_data = json_encode($data);
			echo $json_data;
		}
		public function getVehicleTypes(){
			$data=$this->Vehicles_model->get_vehicle_types();
			return $data;
		}
		public function getVehicleGroups(){
			$data=$this->Vehicles_model->get_vehicle_groups();
			return $data;
		}
	}
