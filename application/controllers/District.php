<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class District extends MY_Controller {
	public $table = 'tbl_district';
	public $page  = 'District';
	public function __construct() {
		parent::__construct();
       if(! $this->is_logged_in()){
          redirect('/login');
        }
        $this->load->model('General_model');
        $this->load->model('District_model');
        $this->load->model('Member_model');

	}
	public function index()
	{
		$template['notifications']=$this->General_model->get_notifications();
		$template['body'] = 'District/list';
		$template['script'] = 'District/script';
		$this->load->view('template', $template);
	}
	public function add(){
		$this->form_validation->set_rules('district_name', 'Name', 'required');
		if ($this->form_validation->run() == FALSE) {
			$template['notifications']=$this->General_model->get_notifications();
			$template['body'] = 'District/add';
			$template['script'] = 'District/script';
			$template['state'] = $this->Member_model->get_state();
			$this->load->view('template', $template);
		}
		else {
			$district_id = $this->input->post('district_id');
			$data = array(
						'district_name' => $this->input->post('district_name'),
						'district_number' => $this->input->post('district_number'),
						'district_state_id_fk' => $this->input->post('district_state'),
						'district_incharge' => $this->input->post('district_incharge'),
						'district_status' => 1
						);
						$district_id = $this->input->post('district_id');
				if($district_id){
                     $data['district_id'] = $district_id;
                     $result = $this->General_model->update($this->table,$data,'district_id',$district_id);
                     $response_text = 'District updated successfully';
                }
				else{
                     $result = $this->General_model->add($this->table,$data);
                     $response_text = 'District added  successfully';
                }
				if($result){
	            $this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
				}
				else{
	            $this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
				}
	        redirect('/District/', 'refresh');

		}
	}
	public function get(){
		$this->load->model('District_model');
    	$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
        $param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10';
        $param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
        $param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
        $param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
        $param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';
    	$data = $this->District_model->getClassinfoTable($param);
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
		$template['notifications']=$this->General_model->get_notifications();
		$template['body'] = 'District/add';
		$template['script'] = 'District/script';
		$template['state'] = $this->Member_model->get_state();
		$template['records'] = $this->General_model->get_row($this->table,'district_id',$district_id);
    	$this->load->view('template', $template);

	}
}
