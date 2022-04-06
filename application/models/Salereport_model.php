<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Salereport_model extends CI_Model{

	public function __construct()
    {
        parent::__construct();
    }
	public function getSaleReport($param){
        $arOrder = array('','invoice_no','shop','product_num1');
        $invoice_no =(isset($param['invoice_no']))?$param['invoice_no']:'';
		$product_num1 =(isset($param['product_num1']))?$param['product_num1']:'';
		$shop =(isset($param['shop']))?$param['shop']:'';
		$start_date =(isset($param['start_date']))?$param['start_date']:'';
        $end_date =(isset($param['end_date']))?$param['end_date']:'';

        if($invoice_no){
            $this->db->where('tbl_sale.invoice_number', $invoice_no);
        }
		if($product_num1){
            $this->db->like('tbl_product.product_name', $product_num1);
        }
		if($shop!=0){
            $this->db->where('shop_id_fk', $shop);
        }
		if($start_date){
            $this->db->where('sale_date >=', $start_date);
        }
        if($end_date){
            $this->db->where('sale_date <=', $end_date);
        }
		$this->db->where("sale_status",1);

        if ($param['start'] != 'false' and $param['length'] != 'false') {
            //$this->db->limit($param['length'],$param['start']);
        }
		$this->db->select('*,tbl_sale.total_price as total,tbl_sale.invoice_number as invoice_number,((sale_price-((sale_price*100)/(100+taxamount)))/2)*sale_quantity as sgst, (taxamount/2) as taxper,((sale_price*100)/(100+taxamount)) as rate,DATE_FORMAT(sale_date,\'%d/%m/%Y\') as sale_date');
    	$this->db->from('tbl_sale');
    	$this->db->join('tbl_product','product_id = product_id_fk');
    		$this->db->join('tbl_customer','cust_id = tbl_sale.customer_name','left');
    	//$this->db->join('tbl_shopstock','tbl_shopstock.product_id_fk = tbl_sale.product_id_fk');

    	$this->db->join('tbl_taxdetails','tbl_taxdetails.tax_id = tbl_sale.tax_id_fk');
		//$this->db->group_by('tbl_sale.invoice_number', 'DESC');
		$this->db->order_by('tbl_sale.invoice_number','ASC');
        $query = $this->db->get();

		$data['data'] = $query->result();
        $data['recordsTotal'] = $this->getSaleReportTotalCount($param);
        $data['recordsFiltered'] = $this->getSaleReportTotalCount($param);
        return $data;

	}
	public function getSaleReportTotalCount($param){
        $invoice_no =(isset($param['invoice_no']))?$param['invoice_no']:'';
		$product_num =(isset($param['product_num']))?$param['product_num']:'';
		$shop =(isset($param['shop']))?$param['shop']:'';
		$start_date =(isset($param['start_date']))?$param['start_date']:'';
        $end_date =(isset($param['end_date']))?$param['end_date']:'';

		if($invoice_no){
            $this->db->where('tbl_sale.invoice_number', $invoice_no);
        }
		if($product_num){
            $this->db->like('tbl_product.product_num', $product_num);
        }
		if($shop!=0){
            $this->db->where('shop_id_fk', $shop);
        }
		if($start_date){
            $this->db->where('sale_date >=', $start_date);
        }
        if($end_date){
            $this->db->where('sale_date <=', $end_date);
        }
		$this->db->where("sale_status",1);
		$this->db->select('*,tbl_sale.total_price as total,tbl_sale.invoice_number as invoice_number');
    	$this->db->from('tbl_sale');
    	$this->db->join('tbl_product','product_id = product_id_fk');
    	$this->db->join('tbl_customer','cust_id = tbl_sale.customer_name','left');
    	//$this->db->join('tbl_size','tbl_size.size_id = tbl_product.	product_size');
    	$this->db->join('tbl_taxdetails','tbl_taxdetails.tax_id = tbl_sale.tax_id_fk');
		//$this->db->group_by('tbl_sale.invoice_number', 'DESC');
		$this->db->order_by('tbl_sale.invoice_number','ASC');
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

	public function getSalesReportNew(){
		// $arOrder = array('','item_name');
		// $searchValue =($param['searchValue'])?$param['searchValue']:'';
		// // if($searchValue){
		// // 	$this->db->like('item_name', $searchValue);
		// // }
		// // $this->db->where("allotmen",1);
		// if ($param['start'] != 'false' and $param['length'] != 'false') {
		// 	$this->db->limit($param['length'],$param['start']);
		// }
		$query=$this->db->select('*,tbl_distributions.created_at as created_date')
		->join('tbl_unit','tbl_unit.unit_id=tbl_distributions.dist_unit','left')
		->join('tbl_production_itemlist','tbl_production_itemlist.item_id=tbl_distributions.dist_item_id_fk','left')
		->join('tbl_member','tbl_member.member_id=tbl_distributions.dist_member_id_fk','left')
		->order_by('tbl_distributions.created_at','DESC')->get('tbl_distributions');
		$data['data'] = $query->result();
		// $data['recordsTotal'] = $this->getClassinfoTotalCount($param);
		// $data['recordsFiltered'] = $this->getClassinfoTotalCount($param);
	}
	public function getClassinfoTotalCount($param = NULL){

	}
}
?>
