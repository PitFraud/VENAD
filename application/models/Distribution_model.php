<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Distribution_model extends CI_Model{

	public function __construct(){
		parent::__construct();
	}

	public function getDistributions($param){
		$arOrder = array('','item_name');
		$searchValue =($param['searchValue'])?$param['searchValue']:'';
		if($searchValue){
			$this->db->like('item_name', $searchValue);
		}
		// $this->db->where("allotmen",1);
		if ($param['start'] != 'false' and $param['length'] != 'false') {
			$this->db->limit($param['length'],$param['start']);
		}
		// $this->db->select('*');
    // $query = $this->db->get('tbl_drivers');
    // $data['data'] = $query->result();
		$query=$this->db->select('*,tbl_distributions.created_at as created_date')
		->join('tbl_unit','tbl_unit.unit_id=tbl_distributions.dist_unit','left')
		->join('tbl_production_itemlist','tbl_production_itemlist.item_id=tbl_distributions.dist_item_id_fk','left')
		->join('tbl_member','tbl_member.member_id=tbl_distributions.dist_member_id_fk','left')
		->order_by('tbl_distributions.created_at','DESC')->get('tbl_distributions');

		$data['data'] = $query->result();
		$data['recordsTotal'] = $this->getClassinfoTotalCount($param);
		$data['recordsFiltered'] = $this->getClassinfoTotalCount($param);
		return $data;
	}

	public function getClassinfoTotalCount($param = NULL){

	}

	public function getMembers(){
		$query=$this->db->select('*')->get('tbl_member');
		return $query->result();
	}

	public function getUnits(){
		$query=$this->db->select('*')->get('tbl_unit');
		return $query->result();
	}

	public function getProducts(){
		$query=$this->db->select('*')->get('tbl_production_itemlist');
		return $query->result();
	}

	public function get_stock_balance($item_id){
		$query = $this->db->select('item_quantity')
		->where('item_id',$item_id)
		->get('tbl_production_itemlist');
		return intval($query->row()->item_quantity);
	}


}
