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

			$template['member_types']=$this->getMemberTypes();

			$template['products']=$this->getProducts();

			$template['units']=$this->getUnits();

			$template['vaccinationdays']=$this->getVaccinationdays();

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

					'allot_weight'=>$_POST['weight'],

					'allot_unit_fk'=>$_POST['unit'],

					'allot_vaccine_fk'=>$_POST['vaccination_days'],

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

				// echo"<pre>",print_r($insert_array),"</pre>"; die;

				// $result = $this->General_model->add($this->table,$insert_array);

				// $response_text = 'Alloted successfully';

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

		$template['records'] = $this->General_model->get_row($this->table,'allot_id',$allot_id);

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


}
