<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class CommissionDetails extends MY_Controller {
	public $table = 'tbl_commision_details';
	public $page  = 'Commission';
	public function __construct() {
		parent::__construct();
		$this->load->model('General_model');
		$this->load->model('Member_model');
		$this->load->model('Allotment_model');
		$this->load->model('Commission_model');
		$this->load->model('Commission_details_model');
		$this->load->model('ReceiveItem_model');
	}
	public function index(){
		$template['notifications']=$this->General_model->get_notifications();
		$template['body'] = 'CommissionDetails/list';
		$template['script'] = 'CommissionDetails/script';
		$this->load->view('template', $template);
	}
	public function add(){
		$this->form_validation->set_rules('commission_amount', 'quantity', 'required');
		if ($this->form_validation->run() == FALSE) {
			$template['notifications']=$this->General_model->get_notifications();
			$template['members']=$this->getMembers();
			$template['units']=$this->getUnits();
			$template['body'] = 'CommissionDetails/add';
			$template['script'] = 'CommissionDetails/script';
			$template['items'] = 'Product/script';
			$this->load->view('template', $template);
		}
		else {
			$insert_array=[
					'commission_name'=>$_POST['commission_name'],
					'commission_amount'=>$_POST['commission_amount'],
					'commission_per_unit_id'=>$_POST['commission_unit'],
					'created_at'=>date('Y-m-d H:i:s'),
				];
				$result = $this->General_model->add($this->table,$insert_array);
				$response_text = 'Commission added successfully';
				if($result){
	            $this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
				}
				else{
	            $this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
				}
				redirect('/Commission/', 'refresh');
		}
	}
	public function getCommissions(){
		// $this->load->model('Allotment_model');
    	$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
        $param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10';
        $param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
        $param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
        $param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
        $param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';
    	$data = $this->Commission_model->getCommissions($param);
    	$json_data = json_encode($data);
    	echo $json_data;
	}
	public function getMembers(){
		$data = $this->Allotment_model->getMembers();
		return $data;
	}
	public function getUnits(){
		$data = $this->Allotment_model->getUnits();
		return $data;
	}
	public function getReceivals(){
		// $this->load->model('Allotment_model');
    	$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
      $param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10';
      $param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
      $param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
      $param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
      $param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';
    	$data = $this->ReceiveItem_model->getReceivals($param);
    	$json_data = json_encode($data);
    	echo $json_data;
	}
	public function add_commission(){
		$commission_amount=$_POST['commission_amount'];
		$member_id=$_POST['member_id'];
		$rec_id=$_POST['rec_id'];
		$allot_id=$_POST['allot_id'];
		$result = $this->Commission_details_model->update_receival_commission($rec_id,$commission_amount);
		$result1=$this->Commission_details_model->add_commission_history($allot_id,$member_id,$commission_amount);
		$response_text = 'Commission added successfully';
		if($result&&$result1){
			$this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
		}
		else{
			$this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
		}
		redirect('/CommissionDetails/', 'refresh');
	}
}
