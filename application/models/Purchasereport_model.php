<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Purchasereport_model extends CI_Model{

	public function __construct()
    {
        parent::__construct();
    }
	public function getPurchaseReport($param){
        $arOrder = array('','invoice_no','shop','product_num1');
        $invoice_no =(isset($param['invoice_no']))?$param['invoice_no']:'';
		$product_num1 =(isset($param['product_num1']))?$param['product_num1']:'';
		//$shop =(isset($param['shop']))?$param['shop']:'';
		$start_date =(isset($param['start_date']))?$param['start_date']:'';
        $end_date =(isset($param['end_date']))?$param['end_date']:'';
		
        if($invoice_no){
            $this->db->where('invoice_number', $invoice_no); 
        }
		if($product_num1){
            $this->db->like('tbl_vendor.vendorname', $product_num1); 
        }
		//if($shop!=0){
           // $this->db->where('shop_id_fk', $shop); 
       // }
		if($start_date){
            $this->db->where('purchase_date >=', $start_date);
        }
        if($end_date){
            $this->db->where('purchase_date <=', $end_date); 
        }
		$this->db->where("purchase_status",1);
		
        if ($param['start'] != 'false' and $param['length'] != 'false') {
           // $this->db->limit($param['length'],$param['start']);
        }
		$this->db->select('*,COUNT(invoice_number) as prcount,SUM(total_price) as total');
		$this->db->from('tbl_purchase');
		$this->db->join('tbl_product','product_id = product_id_fk');
		$this->db->join('tbl_vendor','vendor_id = vendor_id_fk');
		$this->db->group_by('invoice_number', 'DESC');
        $query = $this->db->get();
        
		$data['data'] = $query->result();
        $data['recordsTotal'] = $this->getPurchaseTotalCount($param);
        $data['recordsFiltered'] = $this->getPurchaseTotalCount($param);
        return $data;

	}
	public function getPurchaseTotalCount($param){
        $invoice_no =(isset($param['invoice_no']))?$param['invoice_no']:'';
		$product_num =(isset($param['product_num']))?$param['product_num']:'';
		//$shop =(isset($param['shop']))?$param['shop']:'';
		$start_date =(isset($param['start_date']))?$param['start_date']:'';
        $end_date =(isset($param['end_date']))?$param['end_date']:'';
		
		if($invoice_no){
            $this->db->where('invoice_number', $invoice_no); 
        }
		if($product_num){
            $this->db->like('tbl_product.product_num', $product_num); 
        }
		////if($shop!=0){
            //$this->db->where('shop_id_fk', $shop); 
        //}
		if($start_date){
            $this->db->where('purchase_date >=', $start_date);
        }
        if($end_date){
            $this->db->where('purchase_date <=', $end_date); 
        }
		$this->db->where("purchase_status",1);
		$this->db->select('*,COUNT(invoice_number) as prcount,SUM(total_price) as total');
		$this->db->from('tbl_purchase');
		$this->db->join('tbl_product','product_id = product_id_fk');
		$this->db->join('tbl_vendor','vendor_id = vendor_id_fk');
		$this->db->group_by('invoice_number', 'DESC');
        $query = $this->db->get();
		return $query->num_rows();
	}
	function get_shop($sessid)
	{
		$this->db->select('*');
		$this->db->from('tbl_user');
		$this->db->where('log_id_fk',$sessid);
		$this->db->where('status',1);
		$query = $this->db->get();
		return $query->result();
	}
	public function get_productnum()
	{
		$this->db->select('*');
		$this->db->from('tbl_product');
		$this->db->where('product_status', 1);
		$this->db->order_by('product_name');
		$query = $this->db->get();
		
		$product_num = array();
		if ($query -> result()) {
		foreach ($query->result() as $productnum) {
		$product_num[$productnum-> product_id] = $productnum -> product_name;
			}
		return $product_num;
		} else {
		return FALSE;
		}
	}
}
?>