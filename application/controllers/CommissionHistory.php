<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class CommissionHistory extends MY_Controller {
	public $table = 'tbl_commission_history';
	public $page  = 'District';
	public function __construct() {
		parent::__construct();
       if(! $this->is_logged_in()){
          redirect('/login');
        }
        $this->load->model('General_model');
        $this->load->model('District_model');
        $this->load->model('Member_model');
        $this->load->model('CommissionHistory_model');
	}
	public function index(){
		$template['body'] = 'CommissionHistory/list';
		$template['script'] = 'CommissionHistory/script';
		$this->load->view('template', $template);
	}

	public function get(){
    	$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
        $param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10';
        $param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
        $param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
        $param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
        $param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';
    	$data = $this->CommissionHistory_model->get_commission_history($param);
    	$json_data = json_encode($data);
    	echo $json_data;
    }

	public function delete(){
        $district_id = $this->input->post('district_id');
        $updateData = array('district_status' => 0);
        $data = $this->General_model->update($this->table,$updateData,'district_id',$district_id);
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
		redirect('/District/', 'refresh');
    }
	public function edit($district_id){
		$template['body'] = 'District/add';
		$template['script'] = 'District/script';
		$template['state'] = $this->Member_model->get_state();
		$template['records'] = $this->General_model->get_row($this->table,'district_id',$district_id);
    	$this->load->view('template', $template);
	}

}
