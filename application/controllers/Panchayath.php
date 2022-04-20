<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Panchayath extends MY_Controller {
	public $table = 'tbl_panchayath';
	public $page  = 'Panchayath';
	public function __construct() {
		parent::__construct();
       if(! $this->is_logged_in()){
          redirect('/login');
        }
        $this->load->model('General_model');
        $this->load->model('Panchayath_model');
        $this->load->model('Member_model');
	}
	public function index()
	{
		$template['notifications']=$this->General_model->get_notifications();
		$template['body'] = 'Panchayath/list';
		$template['script'] = 'Panchayath/script';
		$this->load->view('template', $template);
	}
	public function add(){
		$this->form_validation->set_rules('panchayath_name', 'Name', 'required');
		if ($this->form_validation->run() == FALSE) {
			$template['notifications']=$this->General_model->get_notifications();
			$template['body'] = 'Panchayath/add';
			$template['script'] = 'Panchayath/script';
			$template['district'] = $this->Member_model->get_district();
			$this->load->view('template', $template);
		}
		else {
			$panchayath_id = $this->input->post('panchayath_id');
			$data = array(
						'panchayath_name' => $this->input->post('panchayath_name'),
						'panchayath_address' => $this->input->post('panchayath_address'),
						'panchayath_number' => $this->input->post('panchayath_number'),
						'panchayath_district' => $this->input->post('panchayath_district'),
						'panchayath_incharge' => $this->input->post('panchayath_incharge'),
						'panchayath_status' => 1
						);
						$panchayath_id = $this->input->post('panchayath_id');
				if($panchayath_id){
                     $data['panchayath_id'] = $panchayath_id;
                     $result = $this->General_model->update($this->table,$data,'panchayath_id',$panchayath_id);
                     $response_text = 'Panchayath updated successfully';
                }
				else{
                     $result = $this->General_model->add($this->table,$data);
                     $response_text = 'Panchayath added  successfully';
                }
				if($result){
	            $this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
				}
				else{
	            $this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
				}
	        redirect('/Panchayath/', 'refresh');
		}
	}
	public function get(){
		$this->load->model('Panchayath_model');
    	$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
        $param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10';
        $param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
        $param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
        $param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
        $param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';
    	$data = $this->Panchayath_model->getClassinfoTable($param);
    	$json_data = json_encode($data);
    	echo $json_data;
    }
	public function delete(){
        $panchayath_id = $this->input->post('panchayath_id');
        $updateData = array('panchayath_status' => 0);
        $data = $this->General_model->update($this->table,$updateData,'panchayath_id',$panchayath_id);
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
		redirect('/Panchayath/', 'refresh');
    }
	public function edit($panchayath_id){
		$template['notifications']=$this->General_model->get_notifications();
		$template['body'] = 'Panchayath/add';
		$template['script'] = 'Panchayath/script';
		$template['district'] = $this->Member_model->get_district();
		$template['records'] = $this->General_model->get_row($this->table,'panchayath_id',$panchayath_id);
    	$this->load->view('template', $template);
	}
}
