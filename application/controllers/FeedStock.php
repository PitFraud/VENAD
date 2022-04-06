<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class FeedStock extends MY_Controller {
	public $table = 'tbl_feed_purchase';
	public $page  = 'FeedStock';
	public function __construct() {
		parent::__construct();
		$this->load->model('General_model');
		$this->load->model('Member_model');
		$this->load->model('Allotment_model');
		$this->load->model('Vaccination_model');
		$this->load->model('Feed_model');
	}

	public function index(){
		$template['body'] = 'FeedStock/list';
		$template['script'] = 'FeedStock/script';
		$this->load->view('template', $template);
	}

	public function getFeedPurchaseDetails(){
    	$data = $this->Feed_model->get_feed_purchase_details();
    	$json_data = json_encode($data);
    	echo $json_data;
	}
	public function delete(){
        $vaccination_id = $this->input->post('vaccination_id');
        $updateData = array('status' => 0);
        $data = $this->General_model->update($this->table,$updateData,'vaccination_id',$vaccination_id);
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
         redirect('/Vaccination/', 'refresh');
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

	public function addNewFeed(){
		$feed_name=$this->input->post('feed_name');
		$result=$this->Feed_model->add_new_feed($feed_name);
		if($result){
			redirect('/FeedPurchase/add', 'refresh');
		}
	}

	public function getFeedNames(){
		$data = $this->Feed_model->get_feeds_details();
		return $data;
	}
}
