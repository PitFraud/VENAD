<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Stock extends MY_Controller {
	public $table = '';
	public $page  = 'Drivers';
	public function __construct() {
		parent::__construct();
		$this->load->model('General_model');
		$this->load->model('Member_model');
		$this->load->model('Distribution_model');
		$this->load->model('Vaccination_model');
		$this->load->model('Driver_model');
		$this->load->model('Allotment_model');
	}
	public function index(){
		$template['body'] = 'Stock/list';
		$template['script'] = 'Stock/script';
		$template['notifications']=$this->General_model->get_notifications();
		$this->load->view('template', $template);
	}
	public function getStockDetails(){
		$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
        $param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10';
        $param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
        $param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
        $param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
        $param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';
    	$data = $this->Allotment_model->getstock($param);
    	$json_data = json_encode($data);
    	echo $json_data;
	}
}
