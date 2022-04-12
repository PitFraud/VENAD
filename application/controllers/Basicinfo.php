<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Basicinfo extends MY_Controller {
	public $table = 'tbl_basic_info';
	public $page  = 'Basic';
	public function __construct() {
		parent::__construct();
        $this->load->model('General_model');
        $this->load->model('Basic_model');
	}
	public function index()
	{
		$template['body'] = 'Basic_info/list';
		$template['script'] = 'Basic_info/script';
		$this->load->view('template', $template);
	}
	public function add(){
		$this->form_validation->set_rules('bas_name', 'Name', 'required');
		if ($this->form_validation->run() == FALSE) {
			$template['body'] = 'Basic_info/add';
			$template['script'] = 'Basic_info/script';
			$this->load->view('template', $template);
		}
		else {
			$basic_info_id = $this->input->post('basic_info_id');
			$data = array(
						'basic_login_id_fk' => $this->session->userdata('id'),
						'basic_comp_name' => $this->input->post('bas_name'),
						'basic_desc' => $this->input->post('bas_desc'),
						'bsic_reg_no' => $this->input->post('bas_reg_no'),
            'basic_address' => $this->input->post('bas_addr'),
						'basic_cn' => $this->input->post('bas_cn'),
						'basic_join_date' => $this->input->post('bas_date'),
						'basic_web_add' => $this->input->post('bas_web_url'),
						'basic_email_add' => $this->input->post('bas_email'),
						'basic_pan' => $this->input->post('bas_pan'),
						'basic_udhyam' => $this->input->post('bas_udhyam'),
						'basic_drug_lic' => $this->input->post('bas_drug_lic'),
						'basic_trade_lic' => $this->input->post('bas_trade_lic'),
						'basic_gst' => $this->input->post('bas_gst'),
						'basic_farm' => $this->input->post('bas_farm'),
						'basic_import_export_code' => $this->input->post('bas_imp_exp_code'),
						'basic_fssai' => $this->input->post('bas_fssai'),
						'basic_title' => $this->input->post('bas_title'),
						'basic_phone_1' => $this->input->post('bas_phone_1'),
            'basic_phone_2' => $this->input->post('bas_phone_2'),
						'basic_status' => 1
						);
						$basic_info_id = $this->input->post('basic_info_id');
				if($basic_info_id){
                     $data['basic_info_id'] = $basic_info_id;
                     $result = $this->General_model->update($this->table,$data,'basic_info_id',$basic_info_id);
                     $response_text = 'Basic Info updated successfully';
                }
				else{
                     $result = $this->General_model->add($this->table,$data);
                     $response_text = 'Basic Info added  successfully';
                }
				if($result){
	            $this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
				}
				else{
	            $this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
				}
	        redirect('/Basicinfo/', 'refresh');
		}
	}
	public function get(){
		$this->load->model('Basic_model');
    	$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
        $param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10';
        $param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
        $param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
        $param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
        $param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';
    	$data = $this->Basic_model->getClassinfoTable($param);
    	$json_data = json_encode($data);
    	echo $json_data;
    }
	public function delete(){
        $basic_info_id = $this->input->post('basic_info_id');
        $updateData = array('basic_status' => 0);
        $data = $this->General_model->update($this->table,$updateData,'basic_info_id',$basic_info_id);
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
    }
	public function edit($basic_info_id){
		$template['body'] = 'Basic_info/add';
		$template['script'] = 'Basic_info/script';
		$template['records'] = $this->General_model->get_row($this->table,'basic_info_id',$basic_info_id);
    	$this->load->view('template', $template);
	}
}
