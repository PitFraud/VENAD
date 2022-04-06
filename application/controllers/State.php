<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class State extends MY_Controller {
	public $table = 'tbl_state';
	public $page  = 'State';
	public function __construct() {
		parent::__construct();
       if(! $this->is_logged_in()){
          redirect('/login');
        }
        
        $this->load->model('General_model');
        $this->load->model('State_model');
        $this->load->model('Member_model');
	}
	public function index()
	{
		$template['body'] = 'State/list';
		$template['script'] = 'State/script';
		$this->load->view('template', $template);
	}
	public function add(){
		$this->form_validation->set_rules('state_name', 'Name', 'required');
		if ($this->form_validation->run() == FALSE) {
			$template['body'] = 'State/add';
			$template['script'] = 'State/script';
			$this->load->view('template', $template);
		}
		else {
			$state_id = $this->input->post('state_id');
			
			$data = array(
						'state_name' => $this->input->post('state_name'),
						'state_number' => $this->input->post('state_number'),
						'state_incharge' => $this->input->post('state_incharge'),
						'state_status' => 1
						);
						$state_id = $this->input->post('state_id');
				if($state_id){
					 
                     $data['state_id'] = $state_id;
                     $result = $this->General_model->update($this->table,$data,'state_id',$state_id);
                     $response_text = 'State updated successfully';
                }
				else{
                     $result = $this->General_model->add($this->table,$data);
                     $response_text = 'State added  successfully';
                }
				if($result){
	            $this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
				}
				else{
	            $this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
				}
	        redirect('/State/', 'refresh');
		}
	}

	public function get(){
		$this->load->model('State_model');
    	$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
        $param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10'; 
        $param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
        $param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
        $param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
        $param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';
        
    	$data = $this->State_model->getClassinfoTable($param);
    	$json_data = json_encode($data);
    	echo $json_data;
    }
	public function delete(){
        $state_id = $this->input->post('state_id');
        $updateData = array('state_status' => 0);
        $data = $this->General_model->update($this->table,$updateData,'state_id',$state_id);
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
		redirect('/State/', 'refresh');
    }
	public function edit($state_id){
		$template['body'] = 'State/add';
		$template['script'] = 'State/script';
		$template['records'] = $this->General_model->get_row($this->table,'state_id',$state_id);
    	$this->load->view('template', $template);
	}
	
}