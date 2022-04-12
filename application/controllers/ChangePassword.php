<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ChangePassword extends MY_Controller {
	public $table = 'tbl_login';
	public $page  = 'Loginmodel';
	public function __construct() {
		parent::__construct();
		$this->load->model('General_model');
		$this->load->model('Loginmodel');
	}
	public function index(){
		$template['body'] = 'changePassword/list';
		$template['script'] = 'changePassword/script';
		$this->load->view('template', $template);
	}
	public function changeUserPassword(){
		// var_dump($_POST); die;
		if($_POST['new_password']===$_POST['confirm_password']){
			$data=[
				'id'=>$_POST['user_id'],
				'password'=>$_POST['old_password']
			];
			$status=$this->Loginmodel->checkUserLogin($data);
			if($status){
				$update_data=['password'=>$_POST['new_password']];
				$condition=['id'=>$_POST['user_id']];
				$response=$this->Loginmodel->update_data($update_data,$condition);
				if($response){
					$message="Password changed successfully";
					$this->session->set_flashdata('message',$message);
					redirect('/ChangePassword');
				}
				else{
					$message="Failed to change password!";
					$this->session->set_flashdata('message',$message);
					redirect('/ChangePassword');
				}
			}
			else{
				$message="Incorrect password!";
				$this->session->set_flashdata('message',$message);
				redirect('/ChangePassword');
			}
		}
		else{
			$message="Passwords are not matching";
			$this->session->set_flashdata('message',$message);
			redirect('/ChangePassword');
		}
	}
}
