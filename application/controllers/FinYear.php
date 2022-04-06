<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class FinYear extends MY_Controller {
	public $table = 'tbl_finyear';
	public $page  = 'FinYear';
	public function __construct() {
		parent::__construct();
        if(! $this->is_logged_in()){
          redirect('/login');
		}
    $this->load->model('General_model');
		$this->load->model('FinYear_model');

	}
	public function index()
	{
		$template['body'] = 'FinYear/list';
		$template['script'] = 'FinYear/script';
		$this->load->view('template', $template);
	}
	public function get(){

		$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
        $param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10';
        $param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
        $param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
        $param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
        $param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';

    	$data = $this->FinYear_model->getFinYearTable($param);
    	//var_dump($data);
    	$json_data = json_encode($data);
    	echo $json_data;
    }
	public function add(){
		$this->form_validation->set_rules('fin_year', 'Year', 'required');
		if ($this->form_validation->run() == FALSE) {
			$template['body'] = 'FinYear/add';
			$template['script'] = 'FinYear/script';
			$this->load->view('template', $template);
		}
		else {
			$start_date = str_replace('/', '-', $this->input->post('start_date'));
			$start_date =  date("Y-m-d",strtotime($start_date));
			$end_date = str_replace('/', '-', $this->input->post('end_date'));
			$end_date =  date("Y-m-d",strtotime($end_date));
			$currentfn = $this->input->post('currentfn');
			if($currentfn==1)
			 {
				 $fnst = 1;
				 $data = array('fin_status' => 0 );
				 $this->General_model->updatefin($this->table,$data);
				 echo "1";
			 }
			 else
			 {
					 $fnst = 0;
					 echo "2";
			 }
			 $event_image = $_FILES['audit_report']['name'];
			 $file_name = rand(1000,100000000).'.pdf';
			 if($event_image != NULL){
				$config['upload_path']          = './upload/pdf';
				$config['allowed_types']        = 'pdf|csv';
				$config['file_name']			=	$file_name;
				$this->load->library('upload', $config);
				if(!$this->upload->do_upload('audit_report'))
				{
					$error = array('error' => $this->upload->display_errors());
				}
				else
				{
					$data = array('upload_data' => $this->upload->data());
				}
			}

			$datas = array(
						'fin_year' => $this->input->post('fin_year'),
						'fin_no_of_share_holders' => $this->input->post('share_holder'),
						'fin_share_capital' => $this->input->post('share_cap'),
						'fin_business_turn_over' => $this->input->post('business_turnover'),
						'fin_income_tax_period' => $this->input->post('income_tax_period'),
						'fin_net_profit' => $this->input->post('net_profit'),
						'fin_per_bonus' => $this->input->post('percentage_bonus'),
						'fin_divident_bonus' => $this->input->post('divident_bonus'),
						'fin_audit_report' => $file_name,
						'fin_startdate' => $start_date,
						'fin_enddate' => $end_date,
						'fin_status' => $fnst,
						'status' =>1
						);
			$fin_year_id = $this->input->post('finyear_id');
			if($fin_year_id){
				 $data['fin_year_id'] = $fin_year_id;
				 $result = $this->General_model->update($this->table,$datas,'finyear_id',$fin_year_id);
				 $response_text = 'Financial Year  updated';
				 echo "3";
			}
			else{
				$result = $this->General_model->add($this->table,$datas);
				$response_text = 'Financial Year updated';
				echo "4";
			}
			if($result){
	            $this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
			}
			else{
	            $this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
			}
	        // redirect('/FinYear/', 'refresh');
			$template['body'] = 'FinYear/list';
			$template['script'] = 'FinYear/script';
			$this->load->view('template', $template);
		}
		}
	public function edit($finyear_id){
		$template['body'] = 'FinYear/add';
		$template['script'] = 'FinYear/script';
		$template['records'] = $this->General_model->get_row($this->table,'finyear_id',$finyear_id);
    $this->load->view('template', $template);
	}
	public function delete(){

        $finyear_id = $this->input->post('finyear_id');
        $updateData = array('status' => 0);
        $data = $this->General_model->update($this->table,$updateData,'finyear_id',$finyear_id);
        if($data) {
            $response['text'] = 'Deleted successfully';
            $response['type'] = 'success';
        }
        else{
            $response['text'] = 'Something went wrong';
            $response['type'] = 'error';
        }
        $response['layout'] = 'topRight';
        $data_json = json_encode($response);
        echo $data_json;
        // redirect('/FinYear/', 'refresh');
    }

	public function auditPrint($finyear_id)
	{
		$template['pdf'] = $this->General_model->get_row('tbl_finyear','finyear_id',$finyear_id);
		$template['body'] ='FinYear/print';
		$template['script'] ='FinYear/script';
		$this->load->view('template',$template);
	}
}
