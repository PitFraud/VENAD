<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ProductManagement_model extends CI_Model{

	public function __construct(){
		parent::__construct();
	}

	public function getProductionItems($param){
		$arOrder = array('','product_name');
		$searchValue =($param['searchValue'])?$param['searchValue']:'';
		if($searchValue){
			$this->db->like('product_name', $searchValue);
		}
		// $this->db->where("allotmen",1);
		if ($param['start'] != 'false' and $param['length'] != 'false') {
			$this->db->limit($param['length'],$param['start']);
		}
		$query=$this->db->select('*')->order_by('item_id','DESC')->get('tbl_production_itemlist');

		$data['data'] = $query->result();
		$data['recordsTotal'] = $this->getClassinfoTotalCount($param);
		$data['recordsFiltered'] = $this->getClassinfoTotalCount($param);
		return $data;
	}

	public function getProductionDetails($param){
		$arOrder = array('','production_id');
		$searchValue =($param['searchValue'])?$param['searchValue']:'';
		if($searchValue){
			$this->db->like('production_id', $searchValue);
		}
		// $this->db->where("allotmen",1);
		if ($param['start'] != 'false' and $param['length'] != 'false') {
			$this->db->limit($param['length'],$param['start']);
		}
		$query=$this->db->select('*,tbl_production_details.created_at as created_date')
		->join('tbl_unit','tbl_unit.unit_id=tbl_production_details.production_unit_id_fk','left')
		->join('tbl_production_itemlist','tbl_production_itemlist.item_id=tbl_production_details.production_item_id_fk','left')
		->order_by('production_id','DESC')
		->get('tbl_production_details');
		$data['data'] = $query->result();
		$data['recordsTotal'] = $this->getClassinfoTotalCount($param);
		$data['recordsFiltered'] = $this->getClassinfoTotalCount($param);
		return $data;
	}

	public function getProductionDetailsWhere($id){

		$query=$this->db->select('*,tbl_production_details.created_at as created_date')
		->join('tbl_unit','tbl_unit.unit_id=tbl_production_details.production_unit_id_fk','left')
		->join('tbl_production_itemlist','tbl_production_itemlist.item_id=tbl_production_details.production_item_id_fk','left')
		->where('production_id',$id)
		->order_by('production_id','DESC')
		->get('tbl_production_details');
		$data = $query->row();
		return $data;
	}

	public function update_data($condition,$data_array){
		// var_dump($data_array); die;
		$this->db->set($data_array);
		$this->db->where($condition);
		$query=$this->db->update('tbl_production_details');
		return $query ? true : false;
	}

	public function update_data_new($condition,$data_array){
		$this->db->set($data_array);
		$this->db->where($condition);
		$query=$this->db->update('tbl_production_details');
		return $query ? true : false;
	}

	public function getClassinfoTotalCount($param = NULL){
		$searchValue =($param['searchValue'])?$param['searchValue']:'';
		if($searchValue){
			$this->db->like('product_name', $searchValue);
		}
		$this->db->select('*');
		$this->db->from('tbl_production_itemlist');
		$this->db->where("item_status",1);
		$this->db->order_by('item_id', 'ASCE');
		$query = $this->db->get();
		return $query->num_rows();
	}



	public function getMembers(){
		$query=$this->db->select('*')->get('tbl_member');
		return $query->result();
	}

	public function getUnits(){
		$query=$this->db->select('*')->get('tbl_unit');
		return $query->result();
	}

	public function getProductionItemsList(){
		$query=$this->db->select('*')->get('tbl_production_itemlist');
		return $query->result();
	}

	public function getitemlistss($item_id)
	{
		$this->db->select('*');
		$this->db->from('tbl_production_itemlist');
		$this->db->where('item_status',1);
		// $this->db->order_by('item_id', 'ASCE');
		$this->db->where('item_id',$item_id);
		$query = $this->db->get();
		return $query->result();
	}

}
