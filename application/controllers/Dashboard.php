<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends MY_Controller {
	public $page  = 'Dashboard';
	public function __construct() {
		parent::__construct();
		if (! $this->is_logged_in()){
			redirect('/login');
		}
		$this->load->model('General_model');
		$this->load->model('Dashboard_model');
	}
	public function index(){
		$template['notifications']=$this->General_model->get_notifications();
		$template['fin_year']  = $this->Dashboard_model->fin_year();
		$template['panchayath']  = $this->Dashboard_model->getadminpanchayath();
		$template['member']  = $this->Dashboard_model->getmember();
		$template['employee']  = $this->Dashboard_model->getemployee();
		$template['chicks']  = $this->Dashboard_model->getchicks();
		$template['feeds']  = $this->Dashboard_model->getfeeds();
		$template['products']  = $this->Dashboard_model->getproducts();
		$template['allot']  = $this->Dashboard_model->getallotment();
		$template['rec']  = $this->Dashboard_model->getrec();
		$template['feed']  = $this->Dashboard_model->getfeed();
		$template['notifications']=$this->Dashboard_model->get_notifications();
		if($this->session->userdata['user_type']=='1')
		{
			$mem_id= $this->session->userdata('mem_id');
			$template['mem_id']=$mem_id;
			$template['member']  = $this->Dashboard_model->getsharemember($mem_id);
			$template['sfeed']  = $this->Dashboard_model->getsharefeed($mem_id);
			$template['sallot']  = $this->Dashboard_model->getsallotment($mem_id);
		}
		if($this->session->userdata['user_type']=='7')
		{
			$mem_id= $this->session->userdata('mem_id');
			$template['mem_id']=$mem_id;
			$template['panchayath']  = $this->Dashboard_model->getpanchayath($mem_id);
			$template['pmember']  = $this->Dashboard_model->getpmember($mem_id);
		}
		$template['body'] = 'Dashboard/list';
		$template['script'] = 'Dashboard/script';
		$this->load->view('template', $template);
	}
	public function getBranches()
	{
		$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
		$param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10';
		$param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
		$param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
		$param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
		$param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';
		$result = $this->Dashboard_model->getBranchDetails($param);
		echo json_encode($result);
	}
	public function getEstablishments()
	{
		$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
		$param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10';
		$param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
		$param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
		$param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
		$param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';
		$result = $this->Dashboard_model->getEstablishmentsDetails($param);
		echo json_encode($result);
	}
	public function getLicenses()
	{
		$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
		$param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10';
		$param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
		$param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
		$param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
		$param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';
		$result = $this->Dashboard_model->getLicensesDetails($param);
		echo json_encode($result);
	}
}
