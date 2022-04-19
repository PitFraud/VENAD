<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ProductionStock extends MY_Controller {
	public $table = 'tbl_production_itemlist';
	public $page  = 'PStock';
	public function __construct() {
		parent::__construct();
       if(! $this->is_logged_in()){
          redirect('/login');
        }
        $this->load->model('General_model');
        $this->load->model('ProductionStock_model');
        $this->load->model('Member_model');
	}
	public function index()
	{
		$template['notifications']=$this->General_model->get_notifications();
		$template['body'] = 'ProductionStock/list';
		$template['script'] = 'ProductionStock/script';
		$this->load->view('template', $template);
	}
	public function get(){
		$this->load->model('ProductionStock_model');
    	$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
        $param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10';
        $param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
        $param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
        $param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
        $param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';
    	$data = $this->ProductionStock_model->getClassinfoTable($param);
    	$json_data = json_encode($data);
    	echo $json_data;
    }

}
