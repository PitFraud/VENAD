<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	private $params;
	private $result;

	public function __construct(){
    parent::__construct();
		$this->load->model('General_model');
		$this->load->model('Login_model');
		if(isset($_POST)){
			$this->params=$_POST;
		}
		if(isset($_REQUEST)){
		  $this->param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
		  $this->param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10';
		  $this->param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
		  $this->param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
		  $this->param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
		  $this->param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';
		}
  }

	public function index(){
		$template['body']='Dashboard/list';
		$template['script']='Dashboard/script';
		$template['student_count']=$this->getAllStudentCount();
		$template['staff_count']=$this->getAllStaffCount();
		$template['room_count']=$this->getTotalRoomCount();
		$template['total_bed_count']=$this->getTotalBedCount();
		$template['available_bed_count']=$this->getAvailableBedCount();
		$template['complaints_count']=$this->getComplaintsCount();
		$template['total_expense']=$this->getTotalPurchaseExpense();
		$template['total_income']=$this->getTotalIncome();
		$this->load->view('template',$template);
	}

	public function getAllStudentCount(){
		$records=$this->General_model->get_data('tbl_students',$this->param);
		return count($records['data']);
	}

	public function getAllStaffCount(){
		$records=$this->General_model->get_data('tbl_staff',$this->param);
		return count($records['data']);

	}

	public function getUserBasicDetails(){
		$user_id=$this->params['user_id'];
		$condition=[
			'login_id'=>$user_id
		];
		$records=$this->General_model->get_data_where('tbl_login',$condition);
		if($records){
			$this->result['status']=true;
			$this->result['records']=$records;
		}
		else{
			$this->result['status']=false;
			$this->result['message']="No records found!";
		}
	}

	public function getTotalRoomCount(){
		$total_rooms_count=$this->General_model->getTotalNumberOfRooms();
		return $total_rooms_count;
	}

	public function getTotalBedCount(){
		$total_beds_count=$this->General_model->getTotalNumberOfBeds();
		return $total_beds_count;
	}

	public function getAvailableBedCount(){
		$total_beds_count=$this->getTotalBedCount();
		$booked_beds=$this->General_model->getAllBookedBedCount();
		$avl_bed_count=intval($total_beds_count)-intval($booked_beds);
		return $avl_bed_count;
	}

	public function getComplaintsCount(){
		$complaints_count=$this->General_model->getTotalNumberOfComplaints();
		return $complaints_count;
	}

	public function getTotalPurchaseExpense(){
		$totalExpense=$this->General_model->getTotalPurchaseExpense();
		return $totalExpense;
	}

	public function getTotalIncome(){
		$totalIncome=$this->General_model->getTotalIncome();
		return $totalIncome;
	}

	

	public function __destruct(){
    if(isset($this->result)){
      echo json_encode($this->result);
    }
  }

}
