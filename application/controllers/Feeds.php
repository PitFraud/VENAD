<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Feeds extends MY_Controller {
	public $table = 'tbl_feeds';
	public $page  = 'Feeds';
	public function __construct() {
		parent::__construct();
		$this->load->model('General_model');
		$this->load->model('Member_model');
		$this->load->model('Allotment_model');
		$this->load->model('Vaccination_model');
		$this->load->model('Feed_model');
	}
	public function index(){
		$template['body'] = 'Feeds/list';
		$template['script'] = 'Feeds/script';
		$this->load->view('template', $template);
	}

	public function add(){
		$this->form_validation->set_rules('allotment','Allotment','required');
		if ($this->form_validation->run() == FALSE) {
      $template['allotment_details'] = $this->getAllotments();
      $template['shareholders'] = $this->getShareholders();
      $template['feed_names'] = $this->getFeedNames();
      $template['units'] = $this->getUnits();
			$template['body'] = 'Feeds/add';
			$template['script'] = 'Feeds/script';
			$this->load->view('template', $template);
		}
		else {

			$insert_array=[
					'feeds_allotment_fk'=>$_POST['allotment'],
					'feeds_distribution_date'=>$_POST['distribution_date'],
					'feeds_id_fk'=>$_POST['feeds_name'],
					'feeds_details'=>$_POST['feeds_details'],
					'feeds_quantity'=>$_POST['feeds_quantity'],
					'feeds_unit'=>$_POST['unit'],
					'created_at'=>date('Y-m-d H:i:s'),
				];
				$feeds_id = $this->input->post('feeds_id');
				if($feeds_id){
                     $data['feeds_id'] = $feeds_id;
                     $result = $this->General_model->update($this->table,$insert_array,'feeds_id',$feeds_id);
                     $response_text = 'Feeds updated successfully';
                }
				else{
                     $result = $this->General_model->add($this->table,$insert_array);
                     $response_text = 'Feeds added  successfully';
                }

				if($result){
					$feed_id = $_POST['feeds_name'];
					$feed_qty = $_POST['feeds_quantity'];
					$old_stock = intval($this->General_model->get_row('tbl_feed_item','feed_id',$feed_id)->feed_stock);
					if(!empty($old_stock)){
						$new_stock = $old_stock - $feed_qty;
						$insert_datas = [
							'feed_stock' => $new_stock,
						];
						$result = $this->General_model->update('tbl_feed_item',$insert_datas,'feed_id',$feed_id);	
					}
					else{
						return false;
					}
				}
				if($result){
	            $this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
				}
				else{
	            $this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
				}
				 redirect('/Feeds/', 'refresh');
		}
	}
	public function edit($feeds_id){
		$template['allotment_details'] = $this->getAllotments();
		$template['shareholders'] = $this->getShareholders();
		$template['feed_names'] = $this->getFeedNames();
		$template['units'] = $this->getUnits();
		$template['body'] = 'Feeds/add';
		$template['script'] = 'Feeds/script';
		$template['records'] = $this->General_model->get_row($this->table,'feeds_id',$feeds_id);
    $this->load->view('template', $template);
	}

	public function getFeedsDetails(){
		// $this->load->model('Allotment_model');
    	$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
        $param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10';
        $param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
        $param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
        $param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
        $param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';
    	$data = $this->Feed_model->getFeedsDetails($param);
    	$json_data = json_encode($data);
    	echo $json_data;
	}
	public function delete(){
		$feeds_id = $this->input->post('feeds_id');

		$data = $this->General_model->delete($this->table,'feeds_id',$feeds_id);
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
redirect('/Feeds/', 'refresh');
    }
	public function getMembers(){
		$data = $this->Allotment_model->getMembers();
		return $data;
	}
	public function getShareholders(){
		$data = $this->Feed_model->getShareholders();
		return $data;
	}
	public function getUnits(){
		$data = $this->Allotment_model->getUnits();
		return $data;
	}
	public function getAllotments(){
		$data = $this->Allotment_model->getAllotmentsDetails();
		return $data;
	}

	public function getAllotedFeedDetails(){
		$allotment_id=$this->input->post('allotment_id');
		$result=$this->Feed_model->get_total_feeding_count($allotment_id);
		$data_json = json_encode($result);
		echo $data_json;
	}

	public function getFeedNames(){
		$data = $this->Feed_model->get_feeds_details();
		return $data;
	}

	public function getFeedStock()
	{
		$feeds_id = $_POST['feeds_id'];
		$data = $this->Feed_model->get_feed_stock_details($feeds_id);
		echo json_encode($data);
	}
}
