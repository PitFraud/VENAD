<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Purchase_model extends CI_Model{

	public function __construct()
	{
		parent::__construct();
	}
	public function getPurchaseReport($param){
		$arOrder = array('','invoice_number','shop');
		$invoice_number =(isset($param['invoice_number']))?$param['invoice_number']:'';
		$shop =(isset($param['shop']))?$param['shop']:'';
		if($invoice_number){
			$this->db->like('invoice_number', $invoice_number);
		}
		if($shop!=0){
			$this->db->where('shop_id_fk', $shop);
		}
		$this->db->where("purchase_status",1);

		if ($param['start'] != 'false' and $param['length'] != 'false') {
			$this->db->limit($param['length'],$param['start']);
		}
		$this->db->select('*,COUNT(invoice_number) as prcount,ROUND(SUM(total_price),2) as total,DATE_FORMAT(purchase_date,\'%d/%m/%Y\') as purchase_dat');
		$this->db->from('tbl_purchase');
		$this->db->join('tbl_product','product_id = product_id_fk');
		$this->db->join('tbl_vendor','vendor_id = vendor_id_fk');
		$this->db->group_by('invoice_number');
		$this->db->group_by('vendor_id_fk');
		$this->db->order_by('purchase_date','DESC');
		$query = $this->db->get();

		$data['data'] = $query->result();
		$data['recordsTotal'] = $this->getPurchaseReportTotalCount($param);
		$data['recordsFiltered'] = $this->getPurchaseReportTotalCount($param);
		return $data;

	}
	public function getPurchaseReportTotalCount($param){
		$invoice_number =(isset($param['invoice_number']))?$param['invoice_number']:'';
		$shop =(isset($param['shop']))?$param['shop']:'';
		if($invoice_number){
			$this->db->like('invoice_number', $invoice_number);
		}
		if($shop!=0){
			$this->db->where('shop_id_fk', $shop);
		}
		$this->db->where("purchase_status",1);
		$this->db->select('*,COUNT(invoice_number) as prcount,SUM(total_price) as total,DATE_FORMAT(purchase_date,\'%d/%m/%Y\') as purchase_date');
		$this->db->from('tbl_purchase');
		$this->db->join('tbl_product','product_id = product_id_fk');
		$this->db->join('tbl_vendor','vendor_id = vendor_id_fk');
		$this->db->group_by('invoice_number');
		$this->db->group_by('vendor_id_fk');
		$this->db->order_by('purchase_date', 'DESC');
		$query = $this->db->get();
		return $query->num_rows();
	}
	function gettax()
	{
		$this->db->select('tax_id,taxamount');
		$this->db->where("tax_status",1);
		$query = $this->db->get('tbl_taxdetails');
		$tax_name = array();
		if($query->result()){
			foreach ($query->result() as $tax_names) {
				$tax_name[$tax_names->tax_id] = $tax_names->taxamount;
			}
			return $tax_name;
		}
		else{
			return FALSE;
		}
	}

	function getproductname(){
		$this->db->select('product_id,product_name');
		$this->db->where("product_status",1);
		$query = $this->db->get('tbl_product');
		$product_name = array();
		if($query->result()){
			foreach ($query->result() as $product_names) {
				$product_name[$product_names->product_id] = $product_names->product_name;
			}
			return $product_name;
		}
		else{
			return FALSE;
		}
	}
// #####################################################################################################
	function getproductcode(){
		$query=$this->db->select('product_id,product_code')->where('product_status',1)->get('tbl_product');
		$result=$query->result();
		return $result;
	}

	function getsalesproductcode(){
		$query=$this->db->select('item_id,product_code')->get('tbl_production_itemlist');
		$result=$query->result();
		return $result;
	}

	function gethsncodes(){
		$query=$this->db->select('hsn_id,hsncode')->get('tbl_hsncode');
		$result=$query->result();
		return $result;
	}

	public function get_single_hsn_details($id){
		$query=$this->db->select('*')->where('hsn_id',$id)->get('tbl_hsncode');
		$result=$query->row();
		return $result;
	}

	// ######################################################################################################

	function getproductname1($p_id)
	{
		$this->db->select('product_name');
		$this->db->where("product_id",$p_id);
		$this->db->where("product_status",1);
		$query = $this->db->get('tbl_product');
		return $query->result();

	}

	public function fetchPrice($fk)
	{
		$this->db->select('product_price');
		$this->db->from('tbl_product');
		$this->db->where('product_id',$fk);
		$query = $this->db->get();
		return $query->row();
	}

	public function getAmount($tax_id)
	{
		$this->db->select('*');
		$this->db->from('tbl_taxdetails');
		$this->db->where('tax_id',$tax_id);
		$this->db->where('tax_status',1);
		$query = $this->db->get();
		return $query->row();
	}

	public function getprice($product_num)
	{
		$this->db->select('product_price');
		$this->db->from('tbl_product');
		$this->db->where('product_id',$product_num);
		$this->db->where('product_status',1);
		$query = $this->db->get();
		return $query->result;
	}
	public function get_invc($auto_invoice)
	{
		$this->db->select('*');
		$this->db->from('tbl_purchase');
		$this->db->where('purchase_status',1);
		$this->db->join('tbl_product','tbl_product.product_id = tbl_purchase.product_id_fk','left');
		$this->db->join('tbl_vendor','tbl_vendor.vendor_id = tbl_purchase.vendor_id_fk','left');
		//$this->db->join('tbl_size','tbl_size.size_id = tbl_product.product_size');
		//$this->db->join('tbl_taxdetails','tbl_taxdetails.tax_id = tbl_purchase.tax_id_fk','left');
		$this->db->where('auto_invoice',$auto_invoice);
		$query = $this->db->get();
		return $query->result();
	}
	function get_shop($sessid)
	{
		$this->db->select('*');
		$this->db->from('tbl_user');
		$this->db->where('log_id_fk',$sessid);
		$this->db->where('status',1);
		$query = $this->db->get();
		if($query){
			return $query->result();
		}
		else{
			return 0;
		}
	}
	function get_fyear()
	{
		$this->db->select('*');
		$this->db->from('tbl_finyear');
		$this->db->where('fin_status',1);
		$this->db->where('status',1);
		$query = $this->db->get();
		return $query->result();
	}
	// function get_stk($prid)
	// {
	// 	$this->db->select('*');
	// 	$this->db->from('tbl_masterstock');
	// 	$this->db->where('product_id_fk',$prid);
	// 	$query = $this->db->get();
	// 	return $query->result();
	// }

	function get_stk($prid)
	{
		$this->db->select('*');
		$this->db->from('tbl_product');
		$this->db->where('product_id',$prid);
		$query = $this->db->get();
		return $query->result();
	}
	public function get_gst($vendor_id)
	{
		$this->db->select('vendorgst');
		$this->db->from('tbl_vendor');
		$this->db->where('vendor_id',$vendor_id);
		$query = $this->db->get();
		return $query->result();
	}
	// public function get_old_bal($sup_id)
	// {
	// 	$this->db->select('*');
	// 	$this->db->from('tbl_vendor');
	// 	$this->db->where('vendor_id',$sup_id);
	// 	$this->db->order_by('vendor_id', 'DESC');
	// 	$this->db->limit(1);
	// 	$query = $this->db->get();
	// 	return $query->result();
	// }

	public function get_old_bal($sup_id)
	{
		$this->db->select('tbl_supp_acc.old_balance AS old_balance');
		$this->db->from('tbl_vendor');
		$this->db->join('tbl_supp_acc','sup_id_fk = vendor_id');
		$this->db->where('vendor_id',$sup_id);
		$this->db->order_by('sacc_id', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get();
		return $query->result();
	}
	public function get_row($auto_invoice)
	{
		$this->db->select('*');
		$this->db->from('tbl_purchase');
		$this->db->join('tbl_product','tbl_product.product_id = tbl_purchase.product_id_fk');
		$this->db->join('tbl_vendor','tbl_vendor.vendor_id = tbl_purchase.vendor_id_fk');
		$this->db->join('tbl_taxdetails','tbl_taxdetails.tax_id = tbl_purchase.tax_id_fk');
		$this->db->where('auto_invoice',$auto_invoice);
		$this->db->where('purchase_status',1);
		$query = $this->db->get();
		return $query->result();
	}
	public function get_data($purchase_id)
	{
		$this->db->select('*');
		$this->db->from('tbl_purchase');
		$this->db->join('tbl_product','tbl_product.product_id = tbl_purchase.product_id_fk');
		$this->db->join('tbl_vendor','tbl_vendor.vendor_id = tbl_purchase.vendor_id_fk');
		$this->db->join('tbl_taxdetails','tbl_taxdetails.tax_id = tbl_purchase.tax_id_fk');
		$this->db->where('purchase_id',$purchase_id);
		$query = $this->db->get();
		return $query->result();
	}
	public function get_tax($tax_id_fk)
	{
		$this->db->select('taxamount');
		$this->db->from('tbl_taxdetails');
		$this->db->where('tax_id',$tax_id_fk);
		$query = $this->db->get();
		return $query->result();
	}
	public function getrow($purchase_id)
	{
		$this->db->select('invoice_number');
		$this->db->from('tbl_purchase');
		$this->db->where('purchase_id',$purchase_id);
		$this->db->where('purchase_status',1);
		$query = $this->db->get();
		return $query->result();
	}
	public function get_invc_no()
	{
		$this->db->select('invoice_number');
		$this->db->from('tbl_purchase');
		$this->db->where('purchase_status',1);
		$query = $this->db->get();
		return $query->result();
	}
	public function invoice_check($inv_no,$vendor_id)
	{
		$this->db->select('invoice_number');
		$this->db->from('tbl_purchase');
		$this->db->where('purchase_status',1);
		$this->db->where('vendor_id_fk',$vendor_id);
		$this->db->where('invoice_number',$inv_no);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function getItemsNames($item_code)
	{
		$this->db->select('product_id,product_name,product_code');
		$this->db->from('tbl_product');
		$this->db->where('product_code',$item_code);
		$this->db->where('product_status',1);
		$query = $this->db->get();
		return $query->result();
	}
}
?>
