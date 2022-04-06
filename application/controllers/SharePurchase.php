<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class SharePurchase extends MY_Controller {
	public $table = 'tbl_share_purchase_details';
	public $page  = 'SharePurchase';
	public function __construct() {
		parent::__construct();
		$this->load->model('General_model');
		$this->load->model('Member_model');
		$this->load->model('Allotment_model');
		$this->load->model('Vaccination_model');
		$this->load->model('Share_model');
		$this->load->model('SharePurchase_model');
	}

	public function index(){
		$template['body'] = 'SharePurchase/list';
		$template['script'] = 'SharePurchase/script';
		$this->load->view('template', $template);
	}

	public function getShareNames(){
			$data = $this->SharePurchase_model->getSharesDetails();
			return $data;
	}


	public function add(){
		$this->form_validation->set_rules('purchase_shareholder_name','Shareholder name','required');
		$this->form_validation->set_rules('purchase_share_name','Share name','required');
		if ($this->form_validation->run() == FALSE) {
			$template['share_names'] = $this->getShareNames();
			$template['body'] = 'SharePurchase/add';
			$template['script'] = 'SharePurchase/script';
			$this->load->view('template', $template);
		}
		else {
			$insert_array=[
					'purchase_shareholder_name'=>$_POST['purchase_shareholder_name'],
					'purchase_share_id_fk'=>$_POST['purchase_share_name'],
					'created_at'=>date('Y-m-d H:i:s'),
				];
				$result = $this->General_model->add($this->table,$insert_array);
				$response_text = 'share added successfully';
				if($result){
	            $this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
				}
				else{
	            $this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
				}
				 redirect('/SharePurchase/', 'refresh');
		}
	}
	public function edit($share_id){
		$template['body'] = 'Share/add';
		$template['script'] = 'Share/script';
		$template['records'] = $this->General_model->get_row($this->table,'share_id',$share_id);
    $this->load->view('template', $template);
	}

	public function getSharePurchase(){
		// $this->load->model('Allotment_model');
      	$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
        $param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10';
        $param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
        $param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
        $param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
        $param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';
    	$data = $this->SharePurchase_model->getSharePurchase($param);
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
