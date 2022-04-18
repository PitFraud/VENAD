<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class IntegrationDetails extends MY_Controller {
	public $table = 'tbl_feed_item';
	public $page  = 'Feed_item';
	public function __construct() {
		parent::__construct();
		$this->load->model('General_model');
		$this->load->model('IntegrationDetails_model');
	}

	public function index(){
		$template['body'] = 'IntegrationDetails/list';
		$template['script'] = 'IntegrationDetails/script';
		$this->load->view('template', $template);
	}

	public function get(){
    	$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
        $param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10';
        $param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
        $param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
        $param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
        $param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';
    	$data = $this->IntegrationDetails_model->getIntegrationStock($param);
    	$json_data = json_encode($data);
    	echo $json_data;
	}

}
