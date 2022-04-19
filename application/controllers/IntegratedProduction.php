<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class IntegratedProduction extends MY_Controller {
	public $table = 'tbl_feed_item';
	public $page  = 'Feed_item';
	public function __construct() {
		parent::__construct();
		$this->load->model('General_model');
		$this->load->model('Feeditem_model');
	}
	public function index(){
		$template['notifications']=$this->General_model->get_notifications();
		$template['body'] = 'IntegratedProduction/list';
		$template['script'] = 'IntegratedProduction/script';
		$this->load->view('template', $template);
	}
	public function add(){
		$this->form_validation->set_rules('feed_item','Feed Name','required');
		if ($this->form_validation->run() == FALSE) {
			$template['notifications']=$this->General_model->get_notifications();
			$template['body'] = 'IntegratedProduction/add';
			$template['script'] = 'IntegratedProduction/script';
			$this->load->view('template', $template);
		}
		else {
			$insert_array=[
					'feed_name'=>$_POST['feed_item'],
					'feed_code'=>strtoupper($_POST['feed_code']),
					'created_at'=>date('Y-m-d H:i:s'),
                    'updated_at'=>date('Y-m-d H:i:s'),
					'feed_status'=>1,
				];
				$feed_id = $this->input->post('feed_id');
				if($feed_id){
                     $data['feed_id'] = $feed_id;
                     $result = $this->General_model->update($this->table,$insert_array,'feed_id',$feed_id);
                     $response_text = 'Feeds updated successfully';
                }
				else{
                     $result = $this->General_model->add($this->table,$insert_array);
                     $response_text = 'Feeds added  successfully';
                }
				if($result){
	            $this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
				}
				else{
	            $this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
				}
				 redirect('/Feeditem/', 'refresh');
		}
	}
	public function edit($feed_id){
		$template['notifications']=$this->General_model->get_notifications();
		$template['body'] = 'IntegratedProduction/add';
		$template['script'] = 'IntegratedProduction/script';
		$template['records'] = $this->General_model->get_row($this->table,'feed_id',$feed_id);
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
    	$data = $this->Feeditem_model->getFeedsDetails($param);
    	$json_data = json_encode($data);
    	echo $json_data;
	}
	public function delete(){
		$feed_id = $this->input->post('feed_id');
		$data = $this->General_model->delete($this->table,'feed_id',$feed_id);
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
    }
}
