<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class FeedPurchase extends MY_Controller {
	public $table = 'tbl_feed_purchase';
	public $page  = 'FeedPurchase';
	public function __construct() {
		parent::__construct();
		$this->load->model('General_model');
		$this->load->model('Member_model');
		$this->load->model('Allotment_model');
		$this->load->model('Vaccination_model');
		$this->load->model('Feed_model');
	}

	public function index(){
		$template['body'] = 'FeedPurchase/list';
		$template['script'] = 'FeedPurchase/script';
		$this->load->view('template', $template);
	}

	public function add(){
		$this->form_validation->set_rules('feed_name','Feed Name','required');
		$this->form_validation->set_rules('vendor_name','Vendor Name','required');
		$this->form_validation->set_rules('quantity','Quantity','required');
		$this->form_validation->set_rules('price','Price','required');
		$this->form_validation->set_rules('unit','Unit','required');
		if ($this->form_validation->run() == FALSE) {
      $template['feeds'] = $this->getFeedNames();
      $template['shareholders'] = $this->getShareholders();
      $template['units'] = $this->getUnits();
			$template['body'] = 'FeedPurchase/add';
			$template['script'] = 'FeedPurchase/script';
			$this->load->view('template', $template);
		}
		else {
			$total_price=intval($_POST['quantity'])*intval($_POST['price']);
			$insert_array=[
					'purchase_item_fk'=>$_POST['feed_name'],
					'purchase_vendor_name'=>$_POST['vendor_name'],
					'purchase_quantity'=>$_POST['quantity'],
					'purchase_unit_fk'=>$_POST['unit'],
					'purchase_price'=>$_POST['price'],
					'purchase_total_cost'=>$total_price,
					'purchase_status'=>1,
					'created_at'=>date('Y-m-d H:i:s'),
				];
				$result = $this->General_model->add($this->table,$insert_array);
				$response_text = 'Feed purchase added successfully';
				if($result){
	            $this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
				}
				else{
	            $this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
				}
				 redirect('/FeedPurchase/', 'refresh');
		}
	}
	public function edit($vaccination_id){
		$template['body'] = 'Feeds/add';
		$template['script'] = 'Feeds/script';
		$template['records'] = $this->General_model->get_row($this->table,'vaccination_id',$vaccination_id);
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

	public function getinvoice($purchase_id)
	{
		$template['body'] = 'FeedPurchase/Invoice';
		$template['script'] = 'FeedPurchase/script-invoice';
		$template['records'] = $this->Feed_model->get_invc($purchase_id);
		$this->load->view('template', $template);
	}
}
