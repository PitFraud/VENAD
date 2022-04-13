<?php
defined('BASEPATH') or exit('No direct script access allowed');
class ReceiveItem extends MY_Controller
{
	// public $table = 'tbl_receive_item';
	public $table = 'tbl_receive_back';
	public $page  = 'ReceiveItem';
	public function __construct()
	{
		parent::__construct();
		$this->load->model('General_model');
		$this->load->model('Member_model');
		$this->load->model('Allotment_model');
		$this->load->model('ReceiveItem_model');
	}

	public function index()
	{
		$template['body'] = 'ReceiveItem/list';
		$template['script'] = 'ReceiveItem/script';
		$this->load->view('template', $template);
	}

	public function add()
	{
		$this->form_validation->set_rules('quantity', 'quantity', 'required');
		if ($this->form_validation->run() == FALSE) {
			$template['allotment_details'] = $this->getAllotments();
			//var_dump($template['allotment_details']);die;
			$template['members'] = $this->getMembers();
			$template['member_types'] = $this->getMemberTypes();
			$template['units'] = $this->getUnits();
			$template['commisions'] = $this->getCommision();
			$template['body'] = 'ReceiveItem/add';
			$template['script'] = 'ReceiveItem/script';
			$template['items'] = 'Product/script';
			$this->load->view('template', $template);
		} else {
			$integration_type = $_POST['integration_type'];
			$insert_array = [
				'rec_allotment_fk' => $_POST['allotment'],
				'rec_quantity' => $_POST['quantity'],
				'rec_weight' => $_POST['weight'],
				'rec_unit' => $_POST['unit'],
				'rec_given_feeds_total' => $_POST['feed_given'],
				'rec_fcr' => $_POST['fcr'],
			];
			$rec_id = $this->input->post('rec_id');
			if ($rec_id) {
				$data['rec_id'] = $rec_id;
				$result = $this->General_model->update($this->table, $insert_array, 'rec_id', $rec_id);
				$response_text = 'Receive item updated successfully';
				if(!empty($integration_type)){
					if($integration_type == 1){
						$broiler_stock = $this->General_model->get_row('tbl_integration_stock','integration_stock_type',1);
						$qty = $broiler_stock->integration_stock_qty;
						$weight = $broiler_stock->integration_stock_weight;
						$new_qty = $qty + $_POST['quantity'];
						$new_weight = $weight + $_POST['weight'];
						$insert_stock = [
							'integration_stock_qty'=>$new_qty,
							'integration_stock_weight'=>$new_weight,
						];
						$result2 = $this->General_model->update('tbl_integration_stock',$insert_stock,'integration_stock_type',1);
					}
					else if($integration_type == 2){
						$broiler_stock = $this->General_model->get_row('tbl_integration_stock','integration_stock_type',2);
						$qty = $broiler_stock->integration_stock_qty;
						$weight = $broiler_stock->integration_stock_weight;
						$new_qty = $qty + $_POST['quantity'];
						$new_weight = $weight + $_POST['weight'];
						$insert_stock = [
							'integration_stock_qty'=>$new_qty,
							'integration_stock_weight'=>$new_weight,
						];
						$result2 = $this->General_model->update('tbl_integration_stock',$insert_stock,'integration_stock_type',2);
					}
				}
			} else {
				$result = $this->General_model->add($this->table, $insert_array);
				$response_text = 'Received item added  successfully';
				if(!empty($integration_type)){
					if($integration_type == 1){
						$broiler_stock = $this->General_model->get_row('tbl_integration_stock','integration_stock_type',1);
						$qty = $broiler_stock->integration_stock_qty;
						$weight = $broiler_stock->integration_stock_weight;
						$new_qty = $qty + $_POST['quantity'];
						$new_weight = $weight + $_POST['weight'];
						$insert_stock = [
							'integration_stock_qty'=>$new_qty,
							'integration_stock_weight'=>$new_weight,
						];
						$result2 = $this->General_model->update('tbl_integration_stock',$insert_stock,'integration_stock_type',1);
					}
					else if($integration_type == 2){
						$broiler_stock = $this->General_model->get_row('tbl_integration_stock','integration_stock_type',2);
						$qty = $broiler_stock->integration_stock_qty;
						$weight = $broiler_stock->integration_stock_weight;
						$new_qty = $qty + $_POST['quantity'];
						$new_weight = $weight + $_POST['weight'];
						$insert_stock = [
							'integration_stock_qty'=>$new_qty,
							'integration_stock_weight'=>$new_weight,
						];
						$result2 = $this->General_model->update('tbl_integration_stock',$insert_stock,'integration_stock_type',2);
					}
				}
			}
			if ($result) {
				$this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
			} else {
				$this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
			}
			redirect('/ReceiveItem/', 'refresh');
		}
	}

	public function edit($rec_id)
	{
		$template['allotment_details'] = $this->getAllotments();
		$template['members'] = $this->getMembers();
		$template['member_types'] = $this->getMemberTypes();
		$template['units'] = $this->getUnits();
		$template['commisions'] = $this->getCommision();
		$template['body'] = 'ReceiveItem/add';
		$template['script'] = 'ReceiveItem/script';
		$template['items'] = 'Product/script';
		$template['records'] = $this->General_model->get_row($this->table, 'rec_id', $rec_id);
		$this->load->view('template', $template);
	}

	public function delete()
	{
		$rec_id = $this->input->post('rec_id');
		$data = $this->General_model->delete($this->table, 'rec_id', $rec_id);
		if ($data) {
			$response['text'] = 'Deleted successfully';
			$response['type'] = 'success';
		} else {
			$response['text'] = 'Success';
			$response['type'] = 'success';
		}
		$response['layout'] = 'topRight';
		$data_json = json_encode($response);
		echo $data_json;
		redirect('/ReceiveItem/', 'refresh');
	}

	public function getReceivals()
	{
		// $this->load->model('Allotment_model');
		$param['draw'] = (isset($_REQUEST['draw'])) ? $_REQUEST['draw'] : '';
		$param['length'] = (isset($_REQUEST['length'])) ? $_REQUEST['length'] : '10';
		$param['start'] = (isset($_REQUEST['start'])) ? $_REQUEST['start'] : '0';
		$param['order'] = (isset($_REQUEST['order'][0]['column'])) ? $_REQUEST['order'][0]['column'] : '';
		$param['dir'] = (isset($_REQUEST['order'][0]['dir'])) ? $_REQUEST['order'][0]['dir'] : '';
		$param['searchValue'] = (isset($_REQUEST['search']['value'])) ? $_REQUEST['search']['value'] : '';
		$data = $this->ReceiveItem_model->getReceivals($param);
		$json_data = json_encode($data);
		echo $json_data;
	}

	public function view()
	{
		$template['body'] = 'ReceiveItem/list-back';
		$template['script'] = 'ReceiveItem/script-back';
		$this->load->view('template', $template);
	}

	public function getback()
	{
		// $this->load->model('Allotment_model');
		$mem_id = $this->session->userdata('mem_id');
		$param['draw'] = (isset($_REQUEST['draw'])) ? $_REQUEST['draw'] : '';
		$param['length'] = (isset($_REQUEST['length'])) ? $_REQUEST['length'] : '10';
		$param['start'] = (isset($_REQUEST['start'])) ? $_REQUEST['start'] : '0';
		$param['order'] = (isset($_REQUEST['order'][0]['column'])) ? $_REQUEST['order'][0]['column'] : '';
		$param['dir'] = (isset($_REQUEST['order'][0]['dir'])) ? $_REQUEST['order'][0]['dir'] : '';
		$param['searchValue'] = (isset($_REQUEST['search']['value'])) ? $_REQUEST['search']['value'] : '';
		$data = $this->ReceiveItem_model->getback($param, $mem_id);
		$json_data = json_encode($data);
		echo $json_data;
	}

	public function pview()
	{
		$template['body'] = 'ReceiveItem/list-pback';
		$template['script'] = 'ReceiveItem/script-pback';
		$this->load->view('template', $template);
	}

	public function getpback()
	{
		// $this->load->model('Allotment_model');
		$mem_id = $this->session->userdata('mem_id');
		$param['draw'] = (isset($_REQUEST['draw'])) ? $_REQUEST['draw'] : '';
		$param['length'] = (isset($_REQUEST['length'])) ? $_REQUEST['length'] : '10';
		$param['start'] = (isset($_REQUEST['start'])) ? $_REQUEST['start'] : '0';
		$param['order'] = (isset($_REQUEST['order'][0]['column'])) ? $_REQUEST['order'][0]['column'] : '';
		$param['dir'] = (isset($_REQUEST['order'][0]['dir'])) ? $_REQUEST['order'][0]['dir'] : '';
		$param['searchValue'] = (isset($_REQUEST['search']['value'])) ? $_REQUEST['search']['value'] : '';
		$data = $this->ReceiveItem_model->getpback($param, $mem_id);
		$json_data = json_encode($data);
		echo $json_data;
	}

	public function getMembers()
	{
		$data = $this->Allotment_model->getMembers();
		return $data;
	}

	public function getMemberTypes()
	{
		$data = $this->Allotment_model->getMemberTypes();
		return $data;
	}

	public function getUnits()
	{
		$data = $this->Allotment_model->getUnits();
		return $data;
	}

	public function getCommision()
	{
		$data = $this->Allotment_model->getCommision();
		return $data;
	}

	public function getAllotments()
	{
		$data = $this->Allotment_model->getAllotmentsDetails();
		return $data;
	}

	public function getIntegrationType()
	{
		$allot_id = $this->input->post('allot_id');
		$data = $this->Allotment_model->getIntegrationTypeList($allot_id);
		echo json_encode($data);
	}
}
