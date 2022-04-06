<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Sale extends MY_Controller {
	public $table = 'tbl_sale';
	public $tbl_stock = 'tbl_production_itemlist';
	public $tbl_customer = 'tbl_customer';
	public $tbl_daybuk = 'tbl_daybuk';
	public $tbl_ledgerbuk = 'tbl_ledgerbuk';
	public $page  = 'Sale';
	public function __construct() {
		parent::__construct();
         if(! $this->is_logged_in()){
            redirect('/login');
        }
        $this->load->model('General_model');
		$this->load->model('Sale_model');
		$this->load->model('Purchase_model');
		$this->load->model('Customer_model');
		$this->load->model('Dashboard_model');
	}
	public function index()
	{
		$template['notifications']=$this->Dashboard_model->get_notifications();
		$template['body'] = 'Sale/list';
		$template['script'] = 'Sale/script';
		$this->load->view('template',$template);
	}
	public function add(){
	    $user=$this->session->userdata('shop_id');
	    $prid =$this->session->userdata('prid');
		$cond = [
			'member_type_status' => 1
		];
		$template['prid'] = $prid;
		$template['member_type'] = $this->General_model->getall('tbl_member_type',$cond);
		$template['customer_names'] = $this->Customer_model->view_by();
		$template['tax_names'] = $this->Sale_model->view_by();
		$this->form_validation->set_rules('customer_name', 'Customer Name', 'required');
		if ($this->form_validation->run() == FALSE) {
		$invno = $this->Sale_model->get_invoiceno($user);
			if(isset($invno->invoice_number)){$inv=$invno->invoice_number;}else{
					$inv='VFPCK-00000';
			}
			list($alpha,$numeric) = sscanf($inv, "%[A-Z,-]%d");
			$s=substr($inv,6);
			$y=$s+1;
			$inv_no = str_pad($y, 5, "0", STR_PAD_LEFT);
			$template['invno'] = $alpha.$inv_no;
			//$template['customers'] = $this->Sale_model->get_members();
			$template['customer_names'] = $this->Customer_model->view_by();
			$template['body'] = 'Sale/add';
			$template['script'] = 'Sale/script';
			$this->load->view('template', $template);
		}
		else {
			$sessid = $this->session->userdata['id'];
		//	$shopid = $this->Sale_model->get_shop($sessid);
			$finyear = $this->Sale_model->get_fyear();
			if(isset($finyear[0]->fin_year)){$fin=$finyear[0]->fin_year;}else{$fin=0;}
			//if(isset($shopid[0]->shop_id_fk)){$shid=$shopid[0]->shop_id_fk;}else{$shid=0;}
			/*-------------Dynamic Contents-------------*/
			$temp =count($this->input->post('product_id_fk'));
			$product_id_fk = $this->input->post('product_id_fk');
			$hsn = $this->input->post('hsn');
			$sale_quantity = $this->input->post('purchase_quantity');
			$sale_price = $this->input->post('selling_price');
			$discount_price = $this->input->post('discount_price');
			$tax_id_fk = $this->input->post('taxtype');
			$sale_total_price = $this->input->post('purchase_total_price');
			$sale_date = str_replace('/', '-', $this->input->post('purchase_date'));
			$sale_date =  date("Y-m-d",strtotime($sale_date));
			$invc_no = $this->input->post('bill_no');
			$paid_amt = $this->input->post('paid_amt');
			$old_balance = $this->input->post('old_bal');
			if(empty($old_balance)){
				$old_balance = 0;
				$new_old_balance = $paid_amt - $old_balance;
			}
			else
			{
				$old_balance = $this->input->post('old_bal');
				$new_old_balance = $old_balance - $paid_amt;
				if($new_old_balance > 0){
					$new_old_balance = $old_balance - $paid_amt;
				}
				else
				{
					$new_old_balance = 0;
				}
			}

			/*-------------Static Contents-------------*/
			$this->load->helper('string');
			$invoice_no = random_string('alnum',10);
			$grand_total = $this->input->post('net_total');
			$shop_id=$this->session->userdata('shop_id');
			 for($i=0;$i<$temp;$i++){
				$stok = $this->Sale_model->get_stk($product_id_fk[$i]);
				$nwstk = $stok[0]->production_quantity - $sale_quantity[$i];
				$data = array(
						'product_id_fk' => $product_id_fk[$i],
						'finyear'=>$fin,
						'customer_name' =>$this->input->post('customer_name'),
						'member_type' =>$this->input->post('member_type'),
						'customer_phone' => $this->input->post('customer_phone'),
						'customer_email' => $this->input->post('customer_email'),
						'customer_address' => $this->input->post('customer_address'),
						'customer_gst' => $this->input->post('customer_gst'),
						'invoice_number' => $invc_no,
						'auto_invoice' =>$invoice_no,
						'customer_paid_amt' =>$paid_amt,
						'customer_old_bal'=>$new_old_balance,
						'hsn' => $hsn[$i],
						'sale_quantity' => $sale_quantity[$i],
						'sale_price' => $sale_price[$i],
						'discount_price' => $discount_price[$i],
						'total_price' => $sale_total_price[$i],
						'sale_date' => $sale_date,
						'tax_id_fk' =>$tax_id_fk[$i],
						'sale_status' => 1
							);

				$stok[$i] = $this->Sale_model->get_stok($product_id_fk[$i],$shop_id);
				$this->General_model->add($this->table,$data);
            	$nwstk = $stok[$i][0]->item_quantity - $sale_quantity[$i];

				$uData = array(
								'item_quantity' =>$nwstk,
								'updated_at' =>date('Y-m-d h:i:s'),
								);

				$result = $this->General_model->update($this->tbl_stock,$uData,'item_id',$product_id_fk[$i]);

				if(is_numeric($new_old_balance)){
					$customer_id = $this->input->post('customer_name');
					$check_user_if_exist = $this->General_model->get_row('tbl_mem_account','mem_acc_id_fk',$customer_id);
					if(!empty($check_user_if_exist)){
						$data3 =array(
							'mem_acc_old_bal' => $new_old_balance,
						);
						$result = $this->General_model->update('tbl_mem_account',$data3,'mem_acc_id_fk',$customer_id);
					}
					else
					{
						$data3 = array(
							'mem_acc_id_fk' => $customer_id,
							'mem_acc_old_bal' => $new_old_balance,
							'mem_acc_status' => 1,
						);
						$result = $this->General_model->add('tbl_mem_account',$data3);
					}
				}

				}

	       redirect('/Sale/invoice/'.$invoice_no, 'refresh');
		}
	}
	public function invoice($invoice_no)
	{
		$template['body'] = 'Sale_Invoice/Invoice2';
		$template['script'] = 'Sale_Invoice/script';
		$template['records'] = $this->Sale_model->get_invc($invoice_no);
		$this->load->view('template', $template);
	}
	public function invoiceview($invoice_no)
	{
		$template['body'] = 'Sale_Invoice/Invoice2';
		$template['script'] = 'Sale_Invoice/script';
		$template['records'] = $this->Sale_model->get_invoice($invoice_no);
		//var_dump($template['records']);die;
		//echo "<pre>"; print_r($template['records']);
		$this->load->view('template', $template);
	}
	public function get(){

		$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
        $param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10';
        $param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
        $param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
        $param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
        $param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';
				$param['product_num'] = (isset($_REQUEST['product_num']))?$_REQUEST['product_num']:'';
				$start_date =(isset($_REQUEST['start_date']))?$_REQUEST['start_date']:'';
        $end_date =(isset($_REQUEST['end_date']))?$_REQUEST['end_date']:'';

		if($start_date){
            $start_date = str_replace('/', '-', $start_date);
            $param['start_date'] =  date("Y-m-d",strtotime($start_date));
        }

        if($end_date){
            $end_date = str_replace('/', '-', $end_date);
            $param['end_date'] =  date("Y-m-d",strtotime($end_date));
        }

       // $sessid = $this->session->userdata['id'];
		//$shopid = $this->Sale_model->get_shop($sessid);
		//if(isset($shopid[0]->shop_id_fk)){$shid=$shopid[0]->shop_id_fk;}else{$shid=0;}
		//$param['shop'] =$shid;

		$data = $this->Sale_model->getSaleReport($param);
		$json_data = json_encode($data);
    	echo $json_data;
    }
	public function delete(){
        $product_id = $this->input->post('product_id');
        $updateData = array('product_status' => 0);
        $data = $this->General_model->update($this->table,$updateData,'product_id',$product_id);
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
		redirect('/Sale/', 'refresh');
    }
	public function edit($product_id){
		$template['body'] = 'Sale/add';
		$template['script'] = 'Sale/script';
		$template['category_names'] = $this->Category_model->view_by();
		$template['records'] = $this->General_model->get_row($this->table,'product_id',$product_id);
    	$this->load->view('template', $template);

	}
	function getproductnum(){

	header('Content-Type: application/x-json; charset=utf-8');

	$result = $this->Sale_model->getproductnum();
	echo json_encode($result);

    }

    public function getproductname(){
	header('Content-Type: application/x-json; charset=utf-8');
	$result = $this->Sale_model->getproductnames();
	echo json_encode($result);
    }

    public function getprice()
	{
	$product_id_fk = $this->input->post('product_id_fk');
	$data = $this->Sale_model->getprice($product_id_fk);
	$json_data = json_encode($data);
	echo $json_data;
	}

	// function get_price(){

	// //header('Content-Type: application/x-json; charset=utf-8');
	// $product_id = $this->input->post('product_num');
	// print_r($product_id);
	// exit();
	// $result = $this->Sale_model->get_price($product_id);
	// echo json_encode($result);

 //    }

	 public function get_price(){

	//header('Content-Type: application/x-json; charset=utf-8');
	$product_id = $this->input->post('p_id');
	//print_r($product_id);
	//exit();
	$result = $this->Sale_model->get_price($product_id);
	echo json_encode($result);

    }
	function gettax(){

	header('Content-Type: application/x-json; charset=utf-8');
	$result = $this->Sale_model->gettax();
	echo json_encode($result);

    }
	public function get_purchasedetails(){
	    $product_num = $this->input->post('product_num');
		//$product_size = $this->input->post('product_size');
		//$data = $this->Sale_model->get_purchasedetails($product_num,$product_size);
		$data = $this->Sale_model->get_purchasedetails2($product_num);
		$data_json = json_encode($data);
    	echo $data_json;
	}
	public function getstock(){
		$product_id =$this->input->post('product_id');
		$shop_id = $this->input->post('shop_id');

		$stok = $this->Sale_model->get_stok($product_id,$shop_id);
		//if(isset($stok[0]->production_quantity)){$mas=$stok[0]->production_quantity;}else{$mas=0;};
		if(isset($stok[0]->item_quantity)){$mas=$stok[0]->item_quantity;}else{$mas=0;};
		$json_data = json_encode($mas);
		echo $json_data;
	}
	public function getproduct()
	{
		header('Content-Type: application/x-json; charset=utf-8');
		$product_cmpny = $this->input->post('product_cmpny');
		$product_size = $this->input->post('product_size');
		$data = $this->Sale_model->getproduct($product_cmpny,$product_size);
		$data_json = json_encode($data);
		echo $data_json;

    }
	public function getproductcompany()
	{
		header('Content-Type: application/x-json; charset=utf-8');
		$product_size = $this->input->post('product_size');
		$data = $this->Sale_model->getproductcompany($product_size);
		$data_json = json_encode($data);
		echo $data_json;

	}

	 public function getproductname1(){
    $prod_id = $this->input->post('p_id');
	$data['product'] = $this->Sale_model->getproductname1($prod_id);
	echo json_encode($data);
    }

	// function get_memberaddress(){

	// 	$id = $this->input->post('member_id');

	// 	$data = $this->Sale_model->get_memberaddress($id);

	// 	echo json_encode($data);


	// }

	function get_memberaddress(){

		$id = $this->input->post('id');

		//$data = $this->Sale_model->get_memberaddress($id);

		//echo json_encode($data);

		$records = $this->Sale_model->get_memberaddress($id);
		$data_json = json_encode($records);
        echo $data_json;
	}

	function get_phone(){

		$id = $this->input->post('id');

		//$data = $this->Sale_model->get_memberaddress($id);

		//echo json_encode($data);

		$records = $this->Sale_model->get_phone($id);
		$data_json = json_encode($records);
        echo $data_json;
	}

	public function getOldBalance()
	{
		$id = $this->input->post('id');
		$data = $this->Sale_model->getOldBalanceDetails($id);
		echo json_encode($data);
	}

	public function getMemberList()
	{
		$mem_id = $_POST['mem_id'];
		$data = $this->Sale_model->getMemberlists($mem_id);
		echo json_encode($data);
	}
}
