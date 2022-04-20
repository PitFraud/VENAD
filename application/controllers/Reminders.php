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
		$template['notifications']=$this->General_model->get_notifications();
		$template['body'] = 'Reminders/list';
		$template['script'] = 'Reminders/script';
		$this->load->view('template', $template);
	}
	public function add(){
		$this->form_validation->set_rules('reminder_title','reminder title','required');
		if ($this->form_validation->run() == FALSE) {
			$template['notifications']=$this->General_model->get_notifications();
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
		$template['notifications']=$this->General_model->get_notifications();
		$template['body'] = 'Reminders/add';
		$template['script'] = 'Reminders/script';
		$template['records'] = $this->General_model->get_row($this->table,'reminder_id',$reminder_id);
    	$this->load->view('template', $template);
	}

	public function getHeaderNotitificationList(){
		$result=$this->Reminders_model->get_header_notification_list();
		var_dump($result); die;
		echo "<pre>",print_r($result),"</pre>"; die;
	}

	public function date_and_time_operations(){
		$this->load->helper('date');

		echo date(DATE_RFC822, time()); die;

		$date='31-05-1995'; // convert this to timestamp intiger;
		$timestamp=strtotime($date);
		// echo $timestamp; die;
		// convert this timestamp to date string
		$date1="%Y-%m-%d";
		// $new_date=mdate($date1,$timestamp);
		// var_dump($new_date); die;
// ----------------------------------------------------------------------------
$format = 'DATE_RFC822';
$time = time();
// echo standard_date($format, $time); //output : Sat, 16 Apr 22 01:13:46 +0530

// --------------------------------------------------------------------------

$theDate    = new DateTime('2020-03-08');
// echo $stringDate = $theDate->format('Y-m-d H:i:s');

// -----------------------------------------------------------------------

$dateFormat = new DateTime(); // this will return current date
// echo $stringDate = $date->format(DATE_ATOM);

// ---------------------------------------------------------------------------

$date = explode("/",date('d/m/Y/h/i/s'));
list($day,$month,$year,$hour,$min,$sec) = $date;
// echo $month.'/'.$day.'/'.$year.' '.$hour.':'.$min.':'.$sec;

//output: 03/08/2020 02:01:06

// -----------------Compare two dates in codeigniter---------------------

$date1   =   '2020-01-01';
$date2   =   '05/01/2020';

$d1 = new DateTime($date1);
$d2 = new DateTime($date2); // Can use date/string just like strtotime.
if($d2>$d1){
	// echo 'Date '.$date2.' is grater then '.$date1;
}

// ------------------------------------------------------------------------

$date1  =   "2020-01-01";
$date2  =   "2020-01-05";

$d1     =   date_create("2020-01-01");
$d2     =   date_create("2020-01-05");
$diff   =   date_diff($d1,$d2);

print"<prE>";
print_r($diff);
print"</pre>";

if($diff->invert=="0"){
    echo 'Date '.$date2.' is grater then '.$date1;
}

// the above code will give result as
// 2
// 3
// 4
// 5
// 6
// 7
// 8
// 9
// 10
// 11
// 12
// 13
// 14
// 15
// 16
// 17
// 18
// 19
//
// DateInterval Object
// (
//     [y] => 0
//     [m] => 0
//     [d] => 4
//     [h] => 0
//     [i] => 0
//     [s] => 0
//     [weekday] => 0
//     [weekday_behavior] => 0
//     [first_last_day_of] => 0
//     [invert] => 0
//     [days] => 4
//     [special_type] => 0
//     [special_amount] => 0
//     [have_weekday_relative] => 0
//     [have_special_relative] => 0
// )
// Date 2020-01-05 is grater then 2020-01-01

	}
}
