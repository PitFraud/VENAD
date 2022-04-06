<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Vendor extends MY_Controller {
	public $table = 'tbl_vendor';
	public $tbl_account = 'tbl_supp_acc';
	public $tbl_accountlog = 'tbl_supp_acclog';
	public $page  = 'Vendor';
	public function __construct() {
		parent::__construct();
        if(! $this->is_logged_in()){
          redirect('/login');
		}
        $this->load->model('General_model');
		$this->load->model('Vendor_model');
        
	}
	public function index()
	{
		$template['body'] = 'Vendor/list';
		$template['script'] = 'Vendor/script';
		$this->load->view('template', $template);
	}
	public function get(){
		$this->load->model('Vendor_model');
    	$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
        $param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10'; 
        $param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
        $param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
        $param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
        $param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';
        
    	$data = $this->Vendor_model->getVendorTable($param);
    	$json_data = json_encode($data);
    	echo $json_data;
    }
	public function add(){
		$this->form_validation->set_rules('vendorname', 'Name', 'required');
		if ($this->form_validation->run() == FALSE) {
			$template['body'] = 'Vendor/add';
			$template['script'] = 'Vendor/script';
			$this->load->view('template', $template);
		}
		else {
			
			$data = array(
						'vendorname' => $this->input->post('vendorname'),
						'vendoraddress' => $this->input->post('vendoraddress'),
						'vendorphone' => $this->input->post('vendorphone'),
						'vendoremail' => $this->input->post('vendoremail'),
						'vendorgst' => $this->input->post('vendorgst'),
						'vendor_oldbal' => $this->input->post('vendor_oldbal'),
						'vendorstatus' => 1
						);
			
			$vendor_id = $this->input->post('vendor_id');
			if($vendor_id){
				 
				$data['vendor_id'] = $vendor_id;
				$supdata = array(
								'old_bal'=>$this->input->post('vendor_oldbal'),  
								'credit'=>$this->input->post('vendor_oldbal'), 
								'new_bal'=>$this->input->post('vendor_oldbal'), 
								'up_date'=>date('Y-m-d'));
				$AccData = array(
								'old_balance'=>$this->input->post('vendor_oldbal')
								);
				$result = $this->General_model->update($this->table,$data,'vendor_id',$vendor_id);
				 
				 
				$response_text = 'Vendor details updated';
			}
			else{
				
				$result = $this->General_model->add($this->table,$data);
				
				$response_text = 'Vendor details Added';
			}
			if($result){
	            $this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
			}
			else{
	            $this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
			}
	        redirect('/Vendor/', 'refresh');
		}
	}
	public function edit($vendor_id){
		$template['body'] = 'Vendor/add';
		$template['script'] = 'Vendor/script';
		$template['records'] = $this->General_model->get_row($this->table,'vendor_id',$vendor_id);
    	$this->load->view('template', $template);
	}
	public function delete(){
       
        $vendor_id = $this->input->post('vendor_id');
        $updateData = array('vendorstatus' => 0);
        $data = $this->General_model->update($this->table,$updateData,'vendor_id',$vendor_id);                       
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
        // redirect('/Vendor/', 'refresh');
    }
}