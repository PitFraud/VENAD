<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Distribution extends MY_Controller {
	public $table = 'tbl_distributions';
	public $page  = 'Distribution';
	public function __construct() {
		parent::__construct();
		$this->load->model('General_model');
		$this->load->model('Member_model');
		$this->load->model('Distribution_model');
		$this->load->model('Vaccination_model');
		$this->load->model('Driver_model');
		$this->load->model('Allotment_model');
	}
	public function index(){
		$template['body'] = 'Distribution/list';
		$template['script'] = 'Distribution/script';
		$this->load->view('template', $template);
	}
	public function add(){
		$this->form_validation->set_rules('production_item','production_item','required');
		if ($this->form_validation->run() == FALSE) {
			$template['production_items']=$this->getProductionItems();
			$template['members']=$this->getMembers();
			$template['member_types']=$this->getMemberTypes();
			$template['units']=$this->getUnits();
			$template['body'] = 'Distribution/add';
			$template['script'] = 'Distribution/script';
			$this->load->view('template', $template);
		}
		else {
			// echo"<pre>",print_r($_POST),"</pre>"; die;
			$data=[
					'dist_item_id_fk'=>$_POST['production_item'],
					'dist_member_id_fk'=>$_POST['member_name'],
					'dist_quantity_fk'=>$_POST['quantity'],
					'dist_weight'=>$_POST['weight'],
					'dist_unit'=>$_POST['unit'],
					'dist_code'=>$_POST['dist_code'],
					'created_at'=>date('Y-m-d H:i:s'),
				];
				$dist_id = $this->input->post('dist_id');
				if($dist_id){
                     $data['dist_id'] = $dist_id;
                     $result = $this->General_model->update($this->table,$data,'dist_id',$dist_id);
                     $response_text = 'Distribution updated successfully';
                }
				else{
                     $result = $this->General_model->add($this->table,$data);
                     $response_text = 'Distribution added  successfully';
                }
				if($result){
					$distribution_qty = intval($_POST['quantity']);
					$product_id = $_POST['production_item'];
					$old_stock = intval($this->General_model->get_row('tbl_production_itemlist','item_id',$product_id)->item_quantity);
					if($distribution_qty > $old_stock){
						return false;
					}
					$new_stock_bal = $old_stock - $distribution_qty;
					$update_array = [
						'item_quantity' => $new_stock_bal
					];
					$result = $this->General_model->update('tbl_production_itemlist',$update_array,'item_id',$product_id);
				}
				if($result){
	            $this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
				}
				else{
	            $this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
				}
				 redirect('/Distribution/', 'refresh');
		}
	}
	public function edit($dist_id){
		$template['production_items']=$this->getProductionItems();
		$template['members']=$this->getMembers();
		$template['member_types']=$this->getMemberTypes();
		$template['units']=$this->getUnits();
		$template['body'] = 'Distribution/add';
		$template['script'] = 'Distribution/script';
		$template['records'] = $this->General_model->get_row($this->table,'dist_id',$dist_id);
    $this->load->view('template', $template);
	}
	public function getDistributions(){
		// $this->load->model('Allotment_model');
      	$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
        $param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10';
        $param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
        $param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
        $param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
        $param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';
    	$data = $this->Distribution_model->getDistributions($param);
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
		public function getMembersWhere(){
			$id=$_POST['id'];
			$data = $this->Allotment_model->getMembersWhere($id);
			return $data;
		}
		public function getMemberTypes(){
			$data = $this->Allotment_model->getMemberTypes();
			return $data;
		}
		public function getUnits(){
			$data = $this->Allotment_model->getUnits();
			return $data;
		}
		public function getProductionItems(){
			$data = $this->Distribution_model->getProducts();
			return $data;
		}
		public function getItemStockBalance(){
			$item_id = $_POST['item_id'];
			$result  = $this->Distribution_model->get_stock_balance($item_id);
			echo json_encode($result);
		}
}
