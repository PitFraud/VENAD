<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ShareSettings extends MY_Controller {
	public $table = 'tbl_share_settings';
	public $page  = 'ShareSettings';
	public function __construct() {
		parent::__construct();
		$this->load->model('General_model');
		$this->load->model('Member_model');
		$this->load->model('Allotment_model');
		$this->load->model('Share_model');
		$this->load->model('ShareSettings_model');
	}

	public function index(){
		$template['share_list']=$this->ShareSettings_model->get_shares();
		$template['body'] = 'ShareSettings/list';
		$template['script'] = 'ShareSettings/script';
		$this->load->view('template', $template);
	}

	public function modifyShareSettings(){
		$existanceResult=$this->ShareSettings_model->check_existance($_POST['share_id']);
		$insert_array=[
			'settings_share_id'=>$_POST['share_id'],
			'settings_share_period'=>$_POST['share_period'],
			'settings_period_type'=>$_POST['period_type'],
			'settings_divident_percent'=>$_POST['divident_percentage'],
		];
		if($existanceResult){
			// $condition=['settings_share_id'=>$_POST['share_id']];
			// $result=$this->ShareSettings_model->updateSettings($condition,$insert_array);
			$result = $this->General_model->update($this->table,$insert_array,'settings_share_id',$_POST['share_id']);
			$message="Changes added successfully ";
		}
		else{
			// $result=$this->ShareSettings_model->newSettings($data);
			$result = $this->General_model->add($this->table,$insert_array);
			$message="New settings added successfully";
		}
		if($result){
					$this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$message&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
		}
		else{
					$this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
		}
		redirect('/ShareSettings/', 'refresh');
	}

	public function getSingleShareSettingsDetails(){
		$result=$this->ShareSettings_model->get_single_item_details($_POST['share_id']);
		echo json_encode($result);
	}

	public function getCurrentSettings(){
		$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
		$param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10';
		$param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
		$param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
		$param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
		$param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';
		$data = $this->ShareSettings_model->get_current_share_settings($param);
		$json_data = json_encode($data);
		echo $json_data;
	}

	public function showModifySettingsPage(){
		$template['share_list']=$this->ShareSettings_model->get_shares();
		$template['body'] = 'ShareSettings/modificationpage';
		$template['script'] = 'ShareSettings/script';
		$this->load->view('template', $template);
	}
}
