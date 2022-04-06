<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Commission_details_model extends CI_Model{

	public function __construct(){
		parent::__construct();
	}

	public function getCommissions($param){
		$arOrder = array('','product_name');
		$searchValue =($param['searchValue'])?$param['searchValue']:'';
		if($searchValue){
			$this->db->like('product_name', $searchValue);
		}
		// $this->db->where("allotmen",1);
		if ($param['start'] != 'false' and $param['length'] != 'false') {
			$this->db->limit($param['length'],$param['start']);
		}
		$query=$this->db->select('*,tbl_commision.created_at as commission_date')
		->join('tbl_unit','tbl_unit.unit_id=tbl_commision.commission_per_unit_id','left')
		->order_by('tbl_commision.commission_id','DESC')->get('tbl_commision');

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

	public function update_receival_commission($rec_id,$commission_amount){
		$update_rows = array(
			'is_commission_received' => 1,
			'commission_amount'=>$commission_amount
		);
		$this->db->where('rec_id',$rec_id);
		$result = $this->db->update('tbl_receive_back', $update_rows);
		return $result;
	}

	public function add_commission_history($allot_id,$member_id,$commission_amount){
		$insert_array=[
			'history_allotment_fk'=>$allot_id,
			'history_member_id_fk'=>$member_id,
			'history_commission_amount'=>$commission_amount,
			'created_at'=>date('Y-m-d H:i:s')
		];
		$query=$this->db->insert('tbl_commission_history', $insert_array);
		if($query){ return true; } else{ return false; }
	}

}
