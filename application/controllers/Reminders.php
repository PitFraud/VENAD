<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Reminders extends MY_Controller {
	public $table = 'tbl_reminders';
	public $page  = 'Reminders';
	public function __construct() {
		parent::__construct();
		$this->load->model('General_model');
		$this->load->model('Member_model');
		$this->load->model('Vaccination_model');
		$this->load->model('Reminders_model');
	}
	public function index(){
		$template['body'] = 'Reminders/list';
		$template['script'] = 'Reminders/script';
		$this->load->view('template', $template);
	}
	public function add(){
		$this->form_validation->set_rules('reminder_title','reminder title','required');
		if ($this->form_validation->run() == FALSE) {
			$template['body'] = 'Reminders/add';
			$template['script'] = 'Reminders/script';
			$this->load->view('template', $template);
		}
		else {
			$insert_array=[
					'reminder_title'=>$_POST['reminder_title'],
					'reminder_description'=>$_POST['reminder_description'],
					'reminder_broadcast_time'=>$_POST['brodcast_time'],
					'reminder_no_of_times '=>$_POST['no_of_times'],
					'reminder_date'=>$_POST['reminder_date'],
					'created_at'=>date('Y-m-d H:i:s'),
				];

				$reminder_id=$this->input->post('reminder_id');
				if($reminder_id){
										 $data['reminder_id'] = $reminder_id;
										 $result = $this->General_model->update($this->table,$insert_array,'reminder_id',$reminder_id);
										 $response_text = 'Reminder updated successfully';
								}
				else{
										 $result = $this->General_model->add($this->table,$insert_array);
										 $response_text = 'Reminder added successfully';
								}
				if($result){
	            $this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
				}
				else{
	            $this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
				}
				 redirect('/Reminders/', 'refresh');
		}
	}

	public function getReminders(){
	      	$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
	        $param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10';
	        $param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
	        $param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
	        $param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
	        $param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';
	    		$data = $this->Reminders_model->getReminders($param);
	    		$json_data = json_encode($data);
	    		echo $json_data;
	}
	public function edit($reminder_id){
		$template['body'] = 'Reminders/add';
		$template['script'] = 'Reminders/script';
		$template['records'] = $this->General_model->get_row($this->table,'reminder_id',$reminder_id);
    	$this->load->view('template', $template);
	}
}
