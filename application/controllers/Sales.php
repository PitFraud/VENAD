<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Sales extends MY_Controller {
	public $table = 'tbl_sales';
	public $tbl_stock = 'tbl_product';
	public $page  = 'Sales';
	public function __construct() {
		parent::__construct();
         if(! $this->is_logged_in()){
            redirect('/login');
        }
        $this->load->model('General_model');
		$this->load->model('Purchase_model');
		$this->load->model('Sales_model');
		$this->load->model('Vendor_model');
		$this->load->model('Product_model');
		$this->load->model('Tax_model');
	}
	public function index()
	{
		$template['body'] = 'Sales/list';
		$template['script'] = 'Sales/script';
		$template['notifications']=$this->General_model->get_notifications();
		$template['vendor_names'] = $this->Vendor_model->view_by();
		$this->load->view('template', $template);
	}
	public function purc($purchase_id)
	{
		$template['body'] = 'Purchaseview/edit';
		$template['script'] = 'Purchaseview/script';
		$template['notifications']=$this->General_model->get_notifications();
		$template['vendor_names'] = $this->Vendor_model->view_by();
		$template['product_names'] = $this->Product_model->view_by();
		$template['tax_names'] = $this->Tax_model->view_by();
		$template['records'] = $this->Purchase_model->get_data($purchase_id);
		$this->load->view('template', $template);
		//redirect('/Purchase/', 'refresh');
	}
	public function add(){
		$template['vendor_names'] = $this->Vendor_model->view_by();
		$this->form_validation->set_rules('vendor_id', ' Vendor Name', 'required');
		if ($this->form_validation->run() == FALSE) {
			$template['body'] = 'Sales/add';
			$template['script'] = 'Sales/script';
			$template['notifications']=$this->General_model->get_notifications();
			$this->load->view('template', $template);
		}
		else {
			$sessid = $this->session->userdata['id'];
			$shopid = $this->Purchase_model->get_shop($sessid);
			$finyear = $this->Purchase_model->get_fyear();
			if(isset($finyear[0]->fin_year)){$fin=$finyear[0]->fin_year;}else{$fin=0;}
			if(isset($shopid[0]->shop_id_fk)){$shid=$shopid[0]->shop_id_fk;}else{$shid=0;}
			/*-------------Dynamic Contents-------------*/
			$temp =count($this->input->post('product_id_fk'));
			$product_id_fk = $this->input->post('product_id_fk');
			$purchase_quantity = $this->input->post('purchase_quantity');
			$mrp = $this->input->post('mrp');
			$discount_price = $this->input->post('discount_price');
			$tax_id_fk = $this->input->post('taxtype');
			$purchase_total_price = $this->input->post('purchase_total_price');
			$purchase_date = str_replace('/', '-', $this->input->post('purchase_date'));
			$purchase_date =  date("Y-m-d",strtotime($purchase_date));
			/*-------------Static Contents-------------*/
			$this->load->helper('string');
			$numb = '1';
			$auto = random_string('numeric',10);
			$auto_invoice = $numb.$auto;
			$invc_no = $this->input->post('purchase_invoice_number');
			$grand_total = $this->input->post('net_total');
			$vendor_id=$this->input->post('vendor_id');
			for($i=0;$i<$temp;$i++){
				$data = array(
						'product_id_fk' => $product_id_fk[$i],
						'finyear'=>$fin,
						'shop_id_fk'=>$shid,
						'login_id_fk'=>$sessid,
						'vendor_id_fk' =>$vendor_id,
						'invoice_number' => $invc_no,
						'auto_invoice' => $auto_invoice,
						'purchase_quantity' => $purchase_quantity[$i],
						'purchase_price' => $mrp[$i],
						'discount_price' => $discount_price[$i],
						'total_price' => $purchase_total_price[$i],
						'pur_old_bal' => $this->input->post('old_bal'),
						'pur_paid_amt' => $this->input->post('paid_amt'),
						'pur_new_bal' => $this->input->post('new_bal'),
						'purchase_date' => $purchase_date,
						'tax_id_fk' =>$tax_id_fk[$i],
						'purchase_status' => 1
						);
				$shopstock = array(
							//'landing_cost' =>$purchase_price[$i],
							'mrp' =>$mrp[$i],
							);
				$acc_data = array(
							'sup_id_fk' =>$vendor_id,
							'voucher_type' =>'Purchase',
							'old_bal' =>$this->input->post('old_bal'),
							'credit' => $this->input->post('paid_amt'),
							'debit' => $purchase_total_price[$i],
							'new_bal' =>$this->input->post('new_bal'),
							'up_date' =>date('Y-m-d'),
							'slog_status' =>1
							);
				$this->General_model->add($this->tbl_supp_acclog,$acc_data);
				$AccData = array(
								'old_balance' =>$this->input->post('new_bal'),
								);
				$this->General_model->update($this->tbl_supp_acc,$AccData,'sup_id_fk',$vendor_id);
				$this->General_model->update($this->tbl_shopstock,$shopstock,'product_id_fk',$product_id_fk[$i]);
				$this->General_model->add($this->table,$data);
			}
			$Udata  = array(
							//'route_id_fk' =>$this->input->post('route_id'),
							'date'=> date("Y-m-d"),
							'ledger_name'=> 'Purchase',
							'credit'=> 0,
							'debit'=> $this->input->post('paid_amt'),
							'status'=> 1
							);
				$this->General_model->add($this->tbl_daybuk,$Udata);
				$data1  = array(
						'date'=> date("Y-m-d"),
						'ledgerbuk_head'=> 'Purchase',
						'credit'=> 0,
						'debit'=> $this->input->post('paid_amt'),
						'ledgerbuk_status'=> 1
						);
                      $this->General_model->add($this->tbl_ledgerbuk,$data1);
	         redirect('/Purchase/invoice/'.$auto_invoice, 'refresh');
		 }
	}
	public function fetchPrice() {
		if($this->input->post('product_id_fk')) {
			$fk = $this->input->post('product_id_fk');
			$data['price'] = $this->Purchase_model->fetchPrice($fk);
			echo json_encode($data);
		 }
	}
	public function invoice($auto_invoice){
		$template['body'] = 'Purchase_Invoice/Invoice';
		$template['script'] = 'Purchase_Invoice/script';
		$template['notifications']=$this->General_model->get_notifications();
		$template['records'] = $this->Purchase_model->get_invc($auto_invoice);
		$this->load->view('template', $template);
	}
	public function get(){
		$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
        $param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10';
        $param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
        $param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
        $param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
        $param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';
        $sessid = $this->session->userdata['id'];
		$shopid = $this->Purchase_model->get_shop($sessid);
		if(isset($shopid[0]->shop_id_fk)){$shid=$shopid[0]->shop_id_fk;}else{$shid=0;}
		$param['shop'] =$shid;
		$data = $this->Purchase_model->getPurchaseReport($param);
		$json_data = json_encode($data);
    	echo $json_data;
    }
	public function invoice_check()
	{
		$inv_no = $this->input->post('inv_no');
		$vendor_id = $this->input->post('vendor_id');
		$result = $this->Purchase_model->invoice_check($inv_no,$vendor_id);
		$json_data = json_encode($result);
    	echo $json_data;
	}
	public function delete($purchase_id){
        $updateData = array('purchase_status' => 0);
        $data = $this->General_model->update($this->table,$updateData,'purchase_id',$purchase_id);
		$response_text = 'Purchase Details deleted successfully';
        if($data){
			$this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
			}
			else{
			$this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
			}
		redirect('/Purchase/', 'refresh');
    }
	 public function edit(){
			$sessid = $this->session->userdata['id'];
			$shopid = $this->Purchase_model->get_shop($sessid);
			$finyear = $this->Purchase_model->get_fyear();
			if(isset($finyear[0]->fin_year)){$fin=$finyear[0]->fin_year;}else{$fin=0;}
			if(isset($shopid[0]->shop_id_fk)){$shid=$shopid[0]->shop_id_fk;}else{$shid=0;}
			/*-------------Dynamic Contents-------------*/
			$temp =count($this->input->post('product_id'));
			$product_id = $this->input->post('product_id');
			$purchase_quantity = $this->input->post('purchase_quantity');
			$purchase_price = $this->input->post('purchase_price');
			$total= $purchase_quantity * $purchase_price;
			$tax_id_fk = $this->input->post('tax_id');
			$taxamount = $this->Purchase_model->get_tax($tax_id_fk);
			if(isset($taxamount[0]->taxamount)){$tax=$taxamount[0]->taxamount;}else{$tax=0;}
			$purchase_total_price = $total + $tax ;
			$purchase_date = str_replace('/', '-', $this->input->post('purchase_date'));
			$purchase_date =  date("Y-m-d",strtotime($purchase_date));
			/*-------------Static Contents-------------*/
			$invc_no = $this->input->post('invoice_number');
			$grand_total = $this->input->post('net_total');
			$vendor_id=$this->input->post('vendor_id');
				$data = array(
						'product_id_fk' => $product_id,
						'finyear'=>$fin,
						'shop_id_fk'=>$shid,
						'login_id_fk'=>$sessid,
						'vendor_id_fk' =>$vendor_id,
						'invoice_number' => $invc_no,
						'purchase_quantity' => $purchase_quantity,
						'purchase_price' => $purchase_price,
						'total_price' => $purchase_total_price,
						'purchase_date' => $purchase_date,
						'tax_id_fk' =>$tax_id_fk,
						'purchase_status' => 1
						);
			$purchase_id = $this->input->post('purchase_id');
			if($purchase_id){
                     $data['purchase_id'] = $purchase_id;
                     $result = $this->General_model->update($this->table,$data,'purchase_id',$purchase_id);
                     $response_text = 'Purchase Details updated successfully';
			}
			else{
				  $response_text = 'Purchase Details Cannot updated ';
			 }
			if($result){
			$this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
			}
			else{
			$this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
			}
	        redirect('/Purchase/', 'refresh');
	}
	public function view($auto_invoice)
	 {
		$template['body'] = 'Purchase/view';
		$template['script'] = 'Purchase/script';
		$template['notifications']=$this->General_model->get_notifications();
		$template['records'] = $this->Purchase_model->get_row($auto_invoice);
		$this->load->view('template', $template);
	}
	public function gettax(){
	header('Content-Type: application/x-json; charset=utf-8');
	$result = $this->Purchase_model->gettax();
	echo json_encode($result);
    }
	public function getproductname(){
	header('Content-Type: application/x-json; charset=utf-8');
	$result = $this->Purchase_model->getproductname();
	echo json_encode($result);
    }
    public function getproductname1(){
    $prod_id = $this->input->post('p_id');
	$data['product'] = $this->Purchase_model->getproductname1($prod_id);
	echo json_encode($data);
    }
	public function tax_amount()
	{
	$tax_id = $this->input->post('value');
	$data = $this->Purchase_model->getAmount($tax_id);
	$json_data = json_encode($data);
	echo $json_data;
	}
	public function getprice()
	{
	$product_num = $this->input->post('product_num');
	$data = $this->Purchase_model->getprice($product_num);
	$json_data = json_encode($data);
	echo $json_data;
	}
	public function masterStock(){
        $auto_invoice = $this->input->post('auto_invoice');
		$records = $this->Purchase_model->get_invc($auto_invoice);
		for($i=0;$i<count($records);$i++)
		{
			$stok[$i] = $this->Purchase_model->get_stk($records[$i]->product_id_fk);
            $nwstk = $stok[$i][0]->master_stock + $records[$i]->purchase_quantity;
			$updateData = array(
			'finyear' =>date('Y-m-d'),
			'master_stock' =>$nwstk);
			$data = $this->General_model->update($this->tbl_masterstock,$updateData,'product_id_fk',$records[$i]->product_id_fk);
		}
		$upData = array('stockstatus' =>1);
		$stk = $this->General_model->update($this->table,$upData,'auto_invoice',$auto_invoice);
 		if($stk) {
             $response['text'] = 'Updated successfully';
             $response['type'] = 'success';
         }
         else{
             $response['text'] = 'Something went wrong';
             $response['type'] = 'error';
         }
         $response['layout'] = 'topRight';
         $data_json = json_encode($response);
         echo $data_json;
    }
	public function get_gst()
	{
		$vendor_id = $this->input->post('vid');
		$records = $this->Purchase_model->get_gst($vendor_id);
		$data_json = json_encode($records);
        echo $data_json;
	}
	public function get_old_bal()
	{
		$sup_id = $this->input->post('vid');
		$records = $this->Purchase_model->get_old_bal($sup_id);
		$data_json = json_encode($records);
        echo $data_json;
	}
	public function get_view(){
		$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
        $param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'100';
        $param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
        $param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
        $param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
        $param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';
		$invoice_number = $this->input->post('invoice_number');
		$data = $this->Purchase_model->getPurchaseReport($param);
		$json_data = json_encode($data);
    	echo $json_data;
    }
	public function get_invc_no()
	{
		$data = $this->Purchase_model->get_invc_no();
		$json_data = json_encode($data);
    	echo $json_data;
	}
}
