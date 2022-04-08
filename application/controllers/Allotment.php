<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Allotment extends MY_Controller {
	public $table = 'tbl_allotment';
	public $page  = 'Allotment';
	public function __construct() {
		parent::__construct();
		$this->load->model('General_model');
		$this->load->model('Member_model');
		$this->load->model('Allotment_model');
	}


	public function index(){
		$template['body'] = 'Allotment/list';
		$template['script'] = 'Allotment/script';
		$this->load->view('template', $template);
	}


	public function add(){
		$this->form_validation->set_rules('quantity', 'quantity', 'required');
		if ($this->form_validation->run() == FALSE) {
			$template['members']=$this->getMembers();
			//var_dump($template['members']);die;
			$template['member_types']=$this->getMemberTypes();
			$template['products']=$this->getProducts();
			$template['units']=$this->getUnits();
			// $template['vaccinationdays']=$this->getVaccinationdays();
			$template['item_type']=$this->Allotment_model->getItemType();
			$template['item_unit']=$this->Allotment_model->getItemUnit();
			// member - pop up modal details
			$template['modal_member_type']=$this->Allotment_model->getModalMemberType();
			$template['modal_member_state']=$this->Allotment_model->getModalMemberState();
			// end of member
			//var_dump($template['modal_member_type']);die;
			$template['body'] = 'Allotment/add';
			$template['script'] = 'Allotment/script';
			$template['items'] = 'Product/script';
			$this->load->view('template', $template);
		}
		else {
			$allot_id = $this->input->post('allot_id');
			$insert_array=[
					'allot_item_id'=>$_POST['item_type'],
					'allot_quantity'=>$_POST['quantity'],
					'allot_member_id_fk'=>$_POST['member_name'],
					'allot_integration_code'=>strtoupper($_POST['integration_code']),
					'allot_weight'=>$_POST['weight'],
					'allot_unit_fk'=>$_POST['unit'],
					'created_at'=>date('Y-m-d H:i:s'),
				];
				if($allot_id){
                     $data['allot_id'] = $allot_id;
                     $result = $this->General_model->update($this->table,$insert_array,'allot_id',$allot_id);
                     $response_text = 'Allotment details updated successfully';
               }
				else{
                     $result = $this->General_model->add($this->table,$insert_array);
                     $response_text = 'Panchayath added  successfully';
                }

				if($result){
	            $this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
				}
				else{
	            $this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
				}
			  redirect('/Allotment/', 'refresh');
		}
	}



	public function edit($allot_id){
		$template['members']=$this->getMembers();
		$template['member_types']=$this->getMemberTypes();
		$template['products']=$this->getProducts();
		$template['units']=$this->getUnits();
		$template['vaccinationdays']=$this->getVaccinationdays();
		$template['body'] = 'Allotment/add';
		$template['script'] = 'Allotment/script';
		//$template['records'] = $this->General_model->get_row($this->table,'allot_id',$allot_id);
		$template['records'] = $this->Allotment_model->editAllotementRecord($allot_id);
		//var_dump($template['records']);die;
    	$this->load->view('template', $template);
	}

	public function getAllotments(){
		// $this->load->model('Allotment_model');
    	$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
        $param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10';
        $param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
        $param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
        $param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
        $param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';
    	$data = $this->Allotment_model->getAllotments($param);
    	$json_data = json_encode($data);
    	echo $json_data;
	}

	public function getMembers(){
		$data = $this->Allotment_model->getMembers();
		return $data;
	}

	public function getMembersWhere(){
		$id=$_POST['id'];
		$data = $this->Allotment_model->whereGetMembers($id);
		$json_data = json_encode($data);
		echo $json_data;
	}

	public function getMemberTypes(){
		$data = $this->Allotment_model->getMemberTypes();
		return $data;
	}

	public function getUnits(){
		$data = $this->Allotment_model->getUnits();
		return $data;
	}

	public function getVaccinationdays(){
		$data = $this->Allotment_model->getVaccinationdays();
		return $data;
	}

	public function getProducts(){
		$data = $this->Allotment_model->get_products();
		return $data;
	}

	public function view(){
		$template['body'] = 'Allotment/list-allotment';
		$template['script'] = 'Allotment/script-allotment';
		$this->load->view('template', $template);
	}

	public function getAllot(){
		// $this->load->model('Allotment_model');
		$mem_id= $this->session->userdata('mem_id');
    	$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
        $param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10';
        $param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
        $param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
        $param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
        $param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';
    	$data = $this->Allotment_model->getAllot($param,$mem_id);
    	$json_data = json_encode($data);
    	echo $json_data;
	}

	public function delete(){
        $allot_id = $this->input->post('allot_id');
        $updateData = array('allot_status' => 0);
        $data = $this->General_model->delete($this->table,'allot_id',$allot_id);
        if($data) {
            $response['text'] = 'Deleted successfully';
            $response['type'] = 'success';
        }
        else{
            $response['text'] = 'Success';
            $response['type'] = 'success';
        }
        $response['layout'] = 'topRight';
        $data_json = json_encode($response);
        echo $data_json;
		redirect('/Allotment/', 'refresh');

    }

    public function pview(){
		$template['body'] = 'Allotment/list-pallotment';
		$template['script'] = 'Allotment/script-pallotment';
		$this->load->view('template', $template);
	}


	public function getPAllot(){
		// $this->load->model('Allotment_model');
		$mem_id= $this->session->userdata('mem_id');
    	$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
        $param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10';
        $param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
        $param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
        $param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
        $param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';
    	$data = $this->Allotment_model->getPAllot($param,$mem_id);

    	$json_data = json_encode($data);
    	echo $json_data;
	}

	public function receipt($allot_id){
		$template['body'] = 'Allotment/receipt';
		$template['script'] = 'Allotment/script-receipt';
		$template['records'] = $this->Allotment_model->getallotment($allot_id);
		$this->load->view('template', $template);
	}

	public function addItem()
	{
		$this->form_validation->set_rules('item_name', 'Item Name', 'required');
		if ($this->form_validation->run() == TRUE) {
			$insert_array=[
				'product_name'=>$_POST['item_name'],
				'product_code'=>$_POST['item_code'],
				'product_type'=>$_POST['item_type'],
				'product_sub_type'=>0,
				'product_unit'=>$_POST['item_unit'],
				'product_open_stock'=>$_POST['opening_stck'],
				'product_stock'=>$_POST['opening_stck'],
				'min_stock'=>$_POST['minimum_stck'],
				'product_des'=>$_POST['description'],
				'product_status'=>1,
				'product_created_date'=>date('Y-m-d H:i:s'),
				'product_updated_date'=>date('Y-m-d H:i:s'),
			];

			$result = $this->General_model->add('tbl_product',$insert_array);
			if($result)
			{
				$response_text = 'Successfully added Item';
				$this->session->set_flashdata('response',$response_text);
				redirect('Allotment/add','refresh');
			}
			else
			{
				$response_text = 'Something went Wrong';
				$this->session->set_flashdata('response',$response_text);
				redirect('Allotment/add','refresh');
			}

		}
		else
		{
			$response_text = 'Failed!, Enter All Fields';
			$this->session->set_flashdata('response',$response_text);
			redirect('Allotment/add','refresh');
		}		
	}


	public function addMember()
	{
		$insert_array = [];
		$insert_array = [
			'member_name'=>$_POST['mem_name'],
			'member_type'=>$_POST['mem_type'],
			'member_mid'=>$_POST['mem_id'],
			'member_gender'=>$_POST['mem_gender'],
			'member_address'=>$_POST['mem_address'],
			'member_dob'=>$_POST['mem_dob'],
			'member_state'=>$_POST['mem_state'],
			'member_district'=>$_POST['mem_district'],
			'member_panchayath'=>$_POST['mem_panchayat'],
		];

		$result = $this->General_model->add('tbl_member',$insert_array);
		if($result){
			$response = 'Member Added Successfully';
			$this->session->set_flashdata('response',$response);
			redirect('Allotment/add');
		}
		else{
			$response = 'Something Went Wrong try Again Later';
			$this->session->set_flashdata('response',$response);
			redirect('Allotment/add');
		}
	}

	public function getMemberDistrict()
	{
		$district_id = $_POST['dist_id'];
		$data['records'] = $this->Allotment_model->getMemberDistrictDetails($district_id);
		echo json_encode($data);
	}

	public function getMemberPanchayat()
	{
		$panchayat_id = $_POST['panchayat_id'];
		$data['records'] = $this->Allotment_model->getMemberPanchayatDetails($panchayat_id);
		echo json_encode($data);
	}

}

