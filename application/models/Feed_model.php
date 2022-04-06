<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Feed_model extends CI_Model{

	public function __construct(){
		parent::__construct();
	}

	public function getFeedsDetails($param){
		$arOrder = array('','feeds_name');
		$searchValue =($param['searchValue'])?$param['searchValue']:'';
		if($searchValue){
			$this->db->like('feeds_name', $searchValue);
		}
		// $this->db->where("allotmen",1);
		if ($param['start'] != 'false' and $param['length'] != 'false') {
			$this->db->limit($param['length'],$param['start']);
		}
		$query=$this->db->select('*,tbl_feeds.created_at as created_date')
		->join('tbl_allotment','tbl_allotment.allot_id=tbl_feeds.feeds_allotment_fk','left')
		->join('tbl_unit','tbl_unit.unit_id=tbl_feeds.feeds_unit','left')
		->join('tbl_feed_item','tbl_feed_item.feed_id=tbl_feeds.feeds_id_fk','left')
		->join('tbl_product','tbl_product.product_id=tbl_allotment.allot_item_id','left')
		->join('tbl_member','tbl_member.member_id=tbl_allotment.allot_member_id_fk','left')
		->order_by('tbl_feeds.feeds_id','DESC')->get('tbl_feeds');

		$data['data'] = $query->result();
		$data['recordsTotal'] = $this->getClassinfoTotalCount($param);
		$data['recordsFiltered'] = $this->getClassinfoTotalCount($param);
		return $data;
	}

	public function getClassinfoTotalCount($param = NULL){

	}

	public function getShareholders(){
		$query=$this->db->select('*')->where('member_type',1)->get('tbl_member');
		return $query->result();
	}

	public function getMembers(){
		$query=$this->db->select('*')->get('tbl_member');
		return $query->result();
	}

	public function getUnits(){
		$query=$this->db->select('*')->get('tbl_unit');
		return $query->result();
	}

	public function add_new_feed($feed_name){
		$insert_array=[
			'feed_name'=>$feed_name,
			'created_at'=>date('Y-m-d H:i:s')
		];
		$query=$this->db->insert('tbl_feed_item', $insert_array);
		if($query){
			return true;
		}
		else{
			return false;
		}
	}

	public function get_feeds_details(){
		$query=$this->db->select('*')->get('tbl_feed_item');
		$result=$query->result();
		return $result;
	}

	public function get_feed_purchase_details(){
			$query=$this->db->select('*,tbl_feed_purchase.created_at as purchase_date')
			->join('tbl_unit','tbl_unit.unit_id=tbl_feed_purchase.purchase_unit_fk','left')
			->join('tbl_feed_item','tbl_feed_item.feed_id=tbl_feed_purchase.purchase_item_fk','left')
			->order_by('tbl_feed_purchase.purchase_id','DESC')->get('tbl_feed_purchase');
			$data['data'] = $query->result();
			return $data;
	}

	public function get_total_feeding_count($id){
		$query=$this->db->select('*,SUM(tbl_feeds.feeds_quantity) as total_feed_given')
		->join('tbl_feeds','tbl_feeds.feeds_allotment_fk=tbl_allotment.allot_id','left')
		->where('allot_id',$id)
		->get('tbl_allotment');
		$result=$query->row();
		return $result;
	}

	public function get_invc($purchase_id)
	{
		$this->db->select('*');
		$this->db->from('tbl_feed_purchase');
		$this->db->where('purchase_status',1);
		$this->db->join('tbl_unit','tbl_unit.unit_id=tbl_feed_purchase.purchase_unit_fk','left');
		$this->db->join('tbl_feed_item','tbl_feed_item.feed_id=tbl_feed_purchase.purchase_item_fk','left');
		$this->db->where('purchase_id',$purchase_id);
		$query = $this->db->get();
		return $query->result();
	}

	public function get_feed_stock_details($feeds_id)
	{
		$query = $this->db->select('feed_stock')
		->where('feed_id',$feeds_id)
		->get('tbl_feed_item');
		return intval($query->row()->feed_stock);				  
	}

}
