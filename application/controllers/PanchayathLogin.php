<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class PanchayathLogin extends MY_Controller {
	public $table = 'tbl_login';
	public $page  = 'PanchayathLogin';
	public function __construct() {
		parent::__construct();
		$this->load->model('General_model');
		$this->load->model('Member_model');
		$this->load->model('Allotment_model');
		$this->load->model('State_model');
		 $this->load->model('Panchayath_model');
	}
	public function index(){
		$template['body'] = 'PanchayathLogin/list';
		$template['script'] = 'PanchayathLogin/script';
		$this->load->view('template', $template);
	}

	public function add(){
		$this->form_validation->set_rules('user_name', 'Name', 'required');
		
		if ($this->form_validation->run() == FALSE) {
			//$template['states'] = $this->getStateDetails();
			$template['districts'] = $this->Panchayath_model->get_districts();
			$template['body'] = 'PanchayathLogin/add';
			$template['script'] = 'PanchayathLogin/script';
			$template['panchayath'] = $this->Panchayath_model->get_panchayath();
			$this->load->view('template', $template);
		}
		else {
			
			$insert_data = array(
						'user_name' => $this->input->post('user_name'),
						'password'=> $this->input->post('password'),
						'user_type' => '7',
						'mem_id' => $this->input->post('panchayath_id'),
						'status' => 1
			);
			$id = $this->input->post('id');
				if($id){
					 
                    $insert_data['id'] = $id;
                    
					$result = $this->General_model->update($this->table,$insert_data,'id',$id);
                    
                     $response_text = 'Plogin updated successfully';
                }
                else
                {
			//print_r($insert_data); die;
			$result = $this->General_model->add($this->table,$insert_data);
			 $response_text = 'Plogin Added successfully';
			}
			// var_dump($result); die;
			if($result){
				$this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
			}
			else{
				$this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
			}
			redirect('/PanchayathLogin/', 'refresh');
		}
	}

	

		public function get(){
			$this->load->model('Panchayath_model');
			$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
	        $param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10'; 
	        $param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
	        $param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
	        $param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
	        $param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';
				$data = $this->Panchayath_model->getClassinfoTable1($param);
    			$json_data = json_encode($data);
    			echo $json_data;
    }


    public function delete(){
        $id = $this->input->post('id');
        $updateData = array('status' => 0);
        $data = $this->General_model->update($this->table,$updateData,'id',$id);
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
// 		redirect('/Glogin/', 'refresh');
    }
	public function edit($id){
		$template['body'] = 'PanchayathLogin/add';
		$template['script'] = 'PanchayathLogin/script';
		$template['panchayath'] = $this->Panchayath_model->get_panchayath();
		$template['records'] = $this->General_model->get_row($this->table,'id',$id);
    	$this->load->view('template', $template);
	}

	public function addPanchayat()
	{
		$this->form_validation->set_rules('panchayat', 'Panchayat Name', 'required');
		$this->form_validation->set_rules('district', 'Select District', 'required');
		$this->form_validation->set_rules('p_num', 'Phone Number', 'required');
		$this->form_validation->set_rules('incharge', 'Incharge Name', 'required');
		
		if ($this->form_validation->run() == TRUE) {
		$data = array(
			'panchayath_name' => $this->input->post('panchayat'),
			'panchayath_district' => $this->input->post('district'),
			'panchayath_address' => $this->input->post('address'),
			'panchayath_number' => $this->input->post('p_num'),
			'panchayath_incharge' => $this->input->post('incharge'),
			'panchayath_status' => 1,
			'panchayath_created_at' => date('Y-m-d h:i:s'),
			'panchayath_updated_at' => date('Y-m-d h:i:s')
		);
		$result = $this->General_model->add('tbl_panchayath',$data);
		if($result){
			$response_text = 'added Panchayat';
			$this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
		}
		else
		{
			$this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
		}
		redirect('PanchayathLogin/add','refresh');
		}
	}

}
