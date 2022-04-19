<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Drivers extends MY_Controller {
	public $table = 'tbl_drivers';
	public $page  = 'Drivers';
	public function __construct() {
		parent::__construct();
		$this->load->model('General_model');
		$this->load->model('Member_model');
		$this->load->model('Allotment_model');
		$this->load->model('Vaccination_model');
		$this->load->model('Driver_model');
	}
	public function index(){
		$template['notifications']=$this->General_model->get_notifications();
		$template['body'] = 'Drivers/list';
		$template['script'] = 'Drivers/script';
		$this->load->view('template', $template);
	}
	public function add(){
		$this->form_validation->set_rules('driver_name','driver_id','required');
		if ($this->form_validation->run() == FALSE) {
			$template['notifications']=$this->General_model->get_notifications();
			$template['body'] = 'Drivers/add';
			$template['script'] = 'Drivers/script';
			$this->load->view('template', $template);
		}
		else {
			$image=$_FILES['driver_image']['name'];
			$config['upload_path'] = './Images/Drivers/';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$config['file_name'] = $_FILES['driver_image']['name'];
			$pic = $_FILES['driver_image']['name'];
			//Load upload library and initialize configuration
			$this->load->library('upload',$config);
			$this->upload->initialize($config);
			if($this->upload->do_upload('driver_image')){
				$insert_array=[
						'driver_name'=>$_POST['driver_name'],
						'driver_email'=>$_POST['email'],
						'driver_mobile'=>$_POST['mobile'],
						'driver_address'=>$_POST['address'],
						'driver_image'=>$_FILES['driver_image']['name'],
						'driver_license_no'=>$_POST['licence_no'],
						'created_at'=>date('Y-m-d H:i:s'),
					];
			}
				// $result = $this->General_model->add($this->table,$insert_array);
				// $response_text = 'Driver added successfully';
				$driver_id = $this->input->post('driver_id');
				if($driver_id){
					$data['driver_id'] = $driver_id;
					$result = $this->General_model->update($this->table,$insert_array,'driver_id',$driver_id);
					$response_text = 'Driver updated successfully';
				}
				else{
					$result = $this->General_model->add($this->table,$insert_array);
					$response_text = 'Driver added  successfully';
				}
				if($result){
	            $this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
				}
				else{
	            $this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
				}
				 redirect('/Drivers/', 'refresh');
		}
	}
	public function edit($driver_id){
		$template['notifications']=$this->General_model->get_notifications();
		$template['body'] = 'Drivers/add';
		$template['script'] = 'Drivers/script';
		$template['records'] = $this->General_model->get_row($this->table,'driver_id',$driver_id);
    $this->load->view('template', $template);
	}
	public function getDrivers(){
		// $this->load->model('Allotment_model');
      	$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
        $param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10';
        $param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
        $param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
        $param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
        $param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';
    	$data = $this->Driver_model->getDrivers($param);
    	$json_data = json_encode($data);
    	echo $json_data;
	}
	public function delete(){
        $vaccination_id = $this->input->post('vaccination_id');
        $updateData = array('status' => 0);
        $data = $this->General_model->update($this->table,$updateData,'vaccination_id',$vaccination_id);
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
