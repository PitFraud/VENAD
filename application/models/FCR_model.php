<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class FCR_model extends CI_Model{

	public function __construct(){
		parent::__construct();
	}

	public function getFCR($param){
		$arOrder = array('','feeds_name');
		$searchValue =($param['searchValue'])?$param['searchValue']:'';
		if($searchValue){
			$this->db->like('item_name', $searchValue);
		}
		if ($param['start'] != 'false' and $param['length'] != 'false') {
			$this->db->limit($param['length'],$param['start']);
		}
		$query=$this->db->select('*')
			->join('tbl_receive_item','tbl_receive_item.receival_member_id=tbl_allotment.allot_member_id_fk AND tbl_receive_item.receival_item_id=tbl_allotment.allot_item_id','left')
			->join('tbl_feeds','tbl_feeds.feeds_member_fk=tbl_allotment.allot_member_id_fk','left')
			->join('tbl_member','tbl_member.member_id=tbl_allotment.allot_member_id_fk','left')
			->join('tbl_product','tbl_product.product_id=tbl_allotment.allot_item_id','left')
			->join('tbl_unit','tbl_unit.unit_id=tbl_allotment.allot_unit_fk','left')
			->join('tbl_product','tbl_product.product_id=tbl_allotment.allot_item_id','left')
			->get('tbl_allotment');

    $data['data'] = $query->result();
		$data['recordsTotal'] = $this->getClassinfoTotalCount($param);
		$data['recordsFiltered'] = $this->getClassinfoTotalCount($param);
		return $data;
	}

	public function get_feed_conversion_ratio_details($param){
		$arOrder = array('','feeds_name');
		$searchValue =($param['searchValue'])?$param['searchValue']:'';
		if($searchValue){
			$this->db->like('item_name', $searchValue);
		}
		if ($param['start'] != 'false' and $param['length'] != 'false') {
			$this->db->limit($param['length'],$param['start']);
		}
		// $query1=$this->db->select('*')->get('tbl_feeds');
		$query=$this->db->select('*,SUM(tbl_feeds.feeds_quantity) as total_feeds_given, tbl_allotment.created_at as alloted_date,tbl_receive_back.updated_at as receival_date')
		->join('tbl_allotment','tbl_allotment.allot_id=tbl_receive_back.rec_allotment_fk','left')
		->join('tbl_product','tbl_product.product_id=tbl_allotment.allot_item_id','left')
		->join('tbl_feeds','tbl_feeds.feeds_allotment_fk=tbl_allotment.allot_id','left')
		->join('tbl_member','tbl_member.member_id=tbl_allotment.allot_member_id_fk','left')
		->join('tbl_unit','tbl_unit.unit_id=tbl_allotment.allot_unit_fk','left')
		->get('tbl_receive_back');
		$data['data'] = $query->result();
		$data['recordsTotal'] = $query->num_rows();
		$data['recordsFiltered'] = $query->num_rows();
		return $data;
	}

	public function getClassinfoTotalCount($param = NULL){
		$searchValue =($param['searchValue'])?$param['searchValue']:'';
				if($searchValue){
						$this->db->like('vehicle_name', $searchValue);
				}
		$this->db->select('*');
		$this->db->from('tbl_vehicles');
				$this->db->where("vehicle_status",1);
		$this->db->order_by('vehicle_id', 'ASCE');
				$query = $this->db->get();
			return $query->num_rows();
		}

		public function getFCRDetails($param = NULL){
			$searchValue =($param['searchValue'])?$param['searchValue']:'';
					if($searchValue){
							$this->db->like('product_name', $searchValue);
					}
			$query=$this->db->select('*,SUM(tbl_feeds.feeds_quantity) as feeds_given_total')
			->join('tbl_allotment','tbl_allotment.allot_id=tbl_receive_back.rec_allotment_fk')
			->join('tbl_feeds','tbl_feeds.feeds_allotment_fk=tbl_allotment.allot_item_id')
			->join('tbl_product','tbl_product.product_id=tbl_allotment.allot_item_id')
			->join('tbl_unit','tbl_unit.unit_id=tbl_receive_back.rec_unit')
			->order_by('tbl_receive_back.created_at','DESC')
			->get('tbl_receive_back');
			return $query->result();
		}
}
