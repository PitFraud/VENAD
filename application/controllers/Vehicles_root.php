<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vehicles_root extends MY_Controller {
	public $table = 'tbl_vechicles_root';
	public $table1 = 'tbl_vehicles_item';
	public $page  = 'Vehicles_root';
	public function __construct() {
		parent::__construct();
		$this->load->model('General_model');
		$this->load->model('Member_model');
		$this->load->model('Vaccination_model');
		$this->load->model('Vehicles_model');
	}

	public function index(){
		$template['body'] = 'Vehicles_root/list';
		$template['script'] = 'Vehicles_root/script';
		$template['notifications']=$this->General_model->get_notifications();
		$this->load->view('template', $template);
	}

	public function add(){
		$this->form_validation->set_rules('vehicle_id_fk','vehicle_id_fk','required');
		if ($this->form_validation->run() == FALSE) {
			$template['body'] = 'Vehicles_root/add';
			$template['script'] = 'Vehicles_root/script';
			$template['notifications']=$this->General_model->get_notifications();
			$template['vehicle'] = $this->Vehicles_model->getvehicle();
			$template['driver'] = $this->Vehicles_model->getdriver();
			$template['products'] = $this->Vehicles_model->getproducts();
			$this->load->view('template', $template);
		}
		else {
				$count = count($this->input->post('annotation_destination')); 
				$destination = $this->input->post('annotation_destination');
				$place = $this->input->post('annotation_place');
				$km = $this->input->post('annotation_km');
				$arrival_time = $this->input->post('annotation_arrival_time');
				

				$data = array(
					'vehicle_id_fk' => $this->input->post('vehicle_id_fk'),
					'driver_id_fk' => $this->input->post('driver_id_fk'),
					'vroot_details'=> $this->input->post('vroot_details'),
					'date' => 	date('Y-m-d'),
					'status' => 1,
				
				);
			
			$result = $this->General_model->add($this->table,$data);
				$insert_id = $this->db->insert_id();
				    if ($count) 
					{
						for ($i = 0; $i < $count; $i++) 
							{
								$data2 = array(
								'v_destination_fk_id' => $insert_id,
								'v_destination_name' => $destination[$i],
								'v_detination_place' => $place[$i],
								'v_destination_km' => $km[$i],
								'v_destination_arrival_time' => $arrival_time[$i],
								'v_destination_status' => 1,
								
								);

					 			$result = $this->General_model->add('vehicle_destination',$data2);

		                 	}
		            }
				$response_text = 'Vehicle Root Map added successfully';
				if($result){
	            $this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
				}
				else{
	            $this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
				}
				 redirect('/Vehicles_root/', 'refresh');
			}
	}


	public function getVehicles_root(){
	      	$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
	        $param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10';
	        $param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
	        $param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
	        $param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
	        $param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';
	    	$data = $this->Vehicles_model->getVehicles_root($param);
	    	$json_data = json_encode($data);
	    	echo $json_data;
	}


	public function view($vroot_id){
		$template['body'] = 'Vehicles_root/view';
		$template['script'] = 'Vehicles_root/script';
		$template['notifications']=$this->General_model->get_notifications();
		$template['records'] = $this->Vehicles_model->getrout($vroot_id);
		//$template['records1'] = $this->Vehicles_model->getroutitem($vroot_id);
		$template['records1'] = $this->Vehicles_model->getRouteDetails($vroot_id);
		$this->load->view('template', $template);
	}

}

