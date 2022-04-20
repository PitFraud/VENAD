<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class FCR extends MY_Controller {
	public $table = '';
	public $page  = 'Vehicles';
	public function __construct() {
		parent::__construct();
		$this->load->model('General_model');
		$this->load->model('Member_model');
		$this->load->model('Vaccination_model');
		$this->load->model('FCR_model');
		$this->load->model('Vehicles_model');
	}
	public function index(){
		$template['notifications']=$this->General_model->get_notifications();
		$template['body'] = 'FCR/list';
		$template['script'] = 'FCR/script';
		$this->load->view('template', $template);
	}
	public function getFCR(){
	      	$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
	        $param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10';
	        $param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
	        $param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
	        $param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
	        $param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';
	    		// $data = $this->FCR_model->getFCR($param);
					$data['data'] = $this->FCR_model->getFCRDetails($param);
	    	$json_data = json_encode($data);
	    	echo $json_data;
	}
	public function getFeedConvertionRatioDetails(){
		$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
		$param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10';
		$param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
		$param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
		$param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
		$param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';
		$data = $this->FCR_model->get_feed_conversion_ratio_details($param);
		$json_data = json_encode($data);
		echo $json_data;
	}
}
