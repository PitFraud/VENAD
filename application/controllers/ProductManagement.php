<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require 'vendor/autoload.php';
use CodeItNow\BarcodeBundle\Utils\QrCode;
use CodeItNow\BarcodeBundle\Utils\BarcodeGenerator;
class ProductManagement extends MY_Controller {
	public $table = 'tbl_production_itemlist';
	public $table1 = 'tbl_production_details';
	public $page  = 'ProductManagement';
	public function __construct() {
		parent::__construct();
		$this->load->model('General_model');
		$this->load->model('Member_model');
		$this->load->model('Allotment_model');
		$this->load->model('ProductManagement_model');
		$this->load->model('Sale_model');
	}
	public function index(){
		$template['body'] = 'ProductManagement/list';
		$template['script'] = 'ProductManagement/script';
		$this->load->view('template', $template);
	}
	public function add(){
		$this->form_validation->set_rules('name', 'name', 'required');
		if ($this->form_validation->run() == FALSE) {
			$template['members']=$this->getMembers();
			$template['units']=$this->getUnits();
			$template['body'] = 'ProductManagement/add';
			$template['script'] = 'ProductManagement/script';
			$this->load->view('template', $template);
		}
		else {
			$insert_array=[
				'item_name'=>$_POST['name'],
				'product_code'=>strtoupper($_POST['prod_codes']),
				'created_at'=>date('Y-m-d H:i:s'),
			];
			$item_codes = $this->input->post('item_code');
			if(!empty($item_codes)){
				$result = $this->General_model->update($this->table,$insert_array,'item_id',$item_codes);
				$response_text = 'Item Updated Successfully';
			}
			else{
				$result = $this->General_model->add($this->table,$insert_array);
				$response_text = 'Item added successfully';
			}
			if($result){
				$this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
			}
			else{
				$this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
			}
			redirect('/ProductManagement/', 'refresh');
		}
	}
	public function delete(){
		$item_id = $this->input->post('item_id');
		$updateData = array('allot_status' => 0);
		$data = $this->General_model->delete($this->table,'item_id',$item_id);
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
		redirect('/ProductManagement/', 'refresh');
	}
	public function edit($item_id){
		$template['members']=$this->getMembers();
		$template['units']=$this->getUnits();
		//$template['records'] = $this->General_model->get_row($this->table,'item_id',$item_id);
		$template['records'] = $this->ProductManagement_model->getitemlistss($item_id);
		//var_dump($template['records']); die;
		$template['body'] = 'ProductManagement/add';
		$template['script'] = 'ProductManagement/script';
		$this->load->view('template', $template);
	}
	public function getProductionItems(){
		// $this->load->model('Allotment_model');
		$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
		$param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10';
		$param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
		$param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
		$param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
		$param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';
		$data = $this->ProductManagement_model->getProductionItems($param);
		$json_data = json_encode($data);
		echo $json_data;
	}
	public function addProductionDetails(){
		$template['productionItems']=$this->getProductionItemsList();
		$template['units']=$this->getUnits();
		$template['body'] = 'ProductManagement/addProductionDetails';
		$template['script'] = 'ProductManagement/script';
		$this->load->view('template', $template);
	}
	public function addProductionDetailsData(){
		$insert_array=[
			'production_item_id_fk'=>$_POST['item_name'],
			'production_mfd'=>$_POST['mfd'],
			'production_expiry'=>$_POST['expiry_date'],
			'production_quantity'=>$_POST['quantity'],
			'production_row_mat_count'=>$_POST['row_mat_count'],
			'production_unit_id_fk'=>$_POST['unit'],
			'production_packet_weight'=>$_POST['packet_weight'],
			'production_chicken_count'=>$_POST['chicken_used_count'],
			'production_chicken_weight'=>$_POST['chicken_weight_count'],
			'production_chicken_waste'=>$_POST['prod_waste'],
			'production_price'=>$_POST['price'],
			'production_code'=>strtoupper($_POST['prod_code']),
			'created_at'=>date('Y-m-d H:i:s'),
		];
		$production_id = $this->input->post('production_id');
		if($production_id){
			$data['production_id'] = $production_id;
			$result = $this->General_model->update($this->table1,$insert_array,'production_id',$production_id);
			$response_text = 'Panchayath updated successfully';
			redirect('/ProductManagement/showProductionDetails', 'refresh');
		}
		else{
			$result_id = $this->General_model->add_returnID($this->table1,$insert_array);
			$item = $this->Sale_model->get_product($_POST['item_name']);
			$item_price =$_POST['price'];
			$item_id=$_POST['item_name'];
			$item_quantity1 =$item[0]->item_quantity;
			$item_quantity =$item_quantity1+$_POST['quantity'];
			$uData1 = array('item_price' =>$item_price,
							'item_quantity' =>$item_quantity,
								);
			$result = $this->General_model->update($this->table,$uData1,'item_id',$item_id);
			if($result_id){
				$response=$this->ProductManagement_model->getProductionDetailsWhere($result_id);
				if($response){
					$product_name=$response->item_name;
					$mfd=$response->production_mfd;
					$expiry_date=$response->production_expiry;
					$quantity=$response->production_quantity;
					$packet_weight=$response->production_packet_weight;
					$production_code=$response->production_code;
					$qr=$this->generateQr($product_name,$mfd,$expiry_date,$quantity,$packet_weight,$production_code);
					$barcode=$this->generateBarcode($product_name,$mfd,$expiry_date,$quantity,$packet_weight);
					// var_dump($barcode); die;
					if(!empty($qr) && !empty($barcode)){
						$condition=[
							'production_id'=>$result_id
						];
						$condition1=[
							'item_id'=>$item_id
						];
						$insert_array=[
							'production_qr'=>$qr,
							'production_barcode'=>$barcode,
						];
						$insert_array1=[
							'item_latest_qr'=>$qr,
							'item_latest_barcode'=>$barcode,
						];
						// $status=$this->ProductManagement_model->update_data_new($condition,$insert_array);
						$status=$this->General_model->update('tbl_production_details',$insert_array,'production_id',$result_id);
						$status1=$this->General_model->update('tbl_production_itemlist',$insert_array1,'item_id',$item_id);
						if($status&&$status1){
							$response_text = 'Production details added successfully';
							$this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
						}
						else{
							$this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
						}
						redirect('/ProductManagement/showProductionDetails', 'refresh');
					}
				}
			}
		}
	}
	public function editProductionDetails($item_id){
		$template['productionItems']=$this->getProductionItemsList();
		$template['units']=$this->getUnits();
		$template['body'] = 'ProductManagement/addProductionDetails';
		$template['script'] = 'ProductManagement/script';
		$template['records'] = $this->General_model->get_row($this->table1,'production_id',$item_id);
		$this->load->view('template', $template);
	}
	public function showProductionDetails(){
		$template['productionItems']=$this->getProductionItemsList();
		$template['units']=$this->getUnits();
		$template['body'] = 'ProductManagement/showProductionDetails';
		$template['script'] = 'ProductManagement/script';
		$this->load->view('template', $template);
	}
	public function getProductionDetails(){
		$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
		$param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10';
		$param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
		$param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
		$param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
		$param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';
		$data = $this->ProductManagement_model->getProductionDetails($param);
		$json_data = json_encode($data);
		echo $json_data;
	}
	public function generateQr($product_name,$mfd,$expiry_date,$quantity,$packet_weight,$production_code){
		$item_desciption="Visit us : http://venadfarms.com/index.php/our-farm/ \n";
		$item_desciption.="Product details : \n";
		$item_desciption.="Code : ".$production_code."\n";
		$item_desciption.="Product name : ".$product_name."\n";
		$item_desciption.="Manufacturing date : ".$mfd."\n";
		$item_desciption.="Expiry date : ".$expiry_date."\n";
		$item_desciption.="Quantity : ".$quantity."\n";
		$item_desciption.="Packet Weight : ".$packet_weight." gms \n";
		$qrCode = new QrCode();
		$qrCode
		->setText($item_desciption)
		->setSize(300)
		->setPadding(10)
		->setErrorCorrection('high')
		->setForegroundColor(array('r' => 0, 'g' => 0, 'b' => 0, 'a' => 0))
		->setBackgroundColor(array('r' => 255, 'g' => 255, 'b' => 255, 'a' => 0))
		->setLabel('Scan Qr Code')
		->setLabelFontSize(16)
		->setImageType(QrCode::IMAGE_TYPE_PNG);
		$qr_image=$qrCode->generate();
		return $qr_image;
		// echo '<img src="data:'.$qrCode->getContentType().';base64,'.$qrCode->generate().'" />';
	}
	public function generateBarcode($product_name,$mfd,$expiry_date,$quantity,$packet_weight){
		$item_desciption="Visit us : http://venadfarms.com/index.php/our-farm/ \n";
		$item_desciption.="Product name : ".$product_name."\n";
		$item_desciption.="Manufacturing date : ".$mfd."\n";
		$item_desciption.="Expiry date : ".$expiry_date."\n";
		$item_desciption.="Quantity : ".$quantity."\n";
		$item_desciption.="Packet Weight : ".$packet_weight." gms \n";
		$barcode = new BarcodeGenerator();
		$barcode->setText($item_desciption);
		// $barcode->setType(BarcodeGenerator::Code39Extended);
		$barcode->setType(BarcodeGenerator::Code128);
		$barcode->setScale(1);
		$barcode->setThickness(30);
		$barcode->setFontSize(12);
		$barcode->setLabel('Scan Barcode');
		$barcode_image = $barcode->generate();
		return $barcode_image;
		// echo '<img src="data:image/png;base64,'.$code.'" />';
	}
	public function generateQr_(){
		$qrCode = new QrCode();
		$qrCode
		->setText('test')
		->setSize(300)
		->setPadding(10)
		->setErrorCorrection('high')
		->setForegroundColor(array('r' => 0, 'g' => 0, 'b' => 0, 'a' => 0))
		->setBackgroundColor(array('r' => 255, 'g' => 255, 'b' => 255, 'a' => 0))
		->setLabel('Scan Qr Code')
		->setLabelFontSize(16)
		->setImageType(QrCode::IMAGE_TYPE_PNG)
		;
		// $qr_image=$qrCode->generate();
		// return $qr_image;
		echo '<img src="data:'.$qrCode->getContentType().';base64,'.$qrCode->generate().'" />';
	}
	public function getSingleProductionDetails(){
		$id=$_POST['id'];
		$data=$this->ProductManagement_model->getProductionDetailsWhere($id);
		$json_data = json_encode($data);
		echo $json_data;
	}
	public function getMembers(){
		$data = $this->Allotment_model->getMembers();
		return $data;
	}
	public function getUnits(){
		$data = $this->Allotment_model->getUnits();
		return $data;
	}
	public function getProductionItemsList(){
		$data=$this->ProductManagement_model->getProductionItemsList();
		return $data;
	}
	public function getDatabase(){
		$this->load->dbutil();
		$prefs=array(
			'format'      => 'zip',
			'filename'    => 'my_db_backup_.sql'
		);
		$backup =& $this->dbutil->backup($prefs);
		$db_name = 'backup-on-'. date("Y-m-d-H-i-s") .'.zip';
		// $save = 'pathtobkfolder/'.$db_name;
		// $this->load->helper('file');
		// write_file($save, $backup);
		$this->load->helper('download');
		force_download($db_name, $backup);
	}

	public function getStockValue()
	{
		$item_id = $this->input->post('item_id');
		$data = $this->ProductManagement_model->getStockslist($item_id);
		echo json_encode($data);
	}

	public function getChickenWeightQty()
	{
		$chicken_type = $this->input->post('chicken_type');
		$data = $this->ProductManagement_model->getChickenTypeWeightList($chicken_type);
		echo json_encode($data);
	}
}
