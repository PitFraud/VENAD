<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ShareTransfer_model extends CI_Model{
	public function __construct()
	{
		parent::__construct();
	}
	public function getClassinfoTable(){

		$query=$this->db->select('*,tbl_share_transfer_history.created_at as created_date')
		->join('tbl_shares','tbl_shares.share_id=tbl_share_transfer_history.transfer_share_id','left')
		->get('tbl_share_transfer_history');
		$data['data'] = $query->result();
		$data['recordsTotal'] = $query->num_rows();
		$data['recordsFiltered'] = $query->num_rows();
		return $data;
	}
	public function getClassinfoTotalCount($param = NULL){
		$searchValue =($param['searchValue'])?$param['searchValue']:'';
		if($searchValue){
			$this->db->like('district_name', $searchValue);
		}
		$this->db->select('*');
		$this->db->from('tbl_share_transfer_history');
		$this->db->where("district_status",1);
		$this->db->order_by('district_id', 'ASCE');
		$query = $this->db->get();
		return $query->num_rows();
	}
	public function getDistricts(){
		$query=$this->db->select('*')->get('tbl_share_transfer_history');
		$result=$query->result();
		return $result;
	}
	public function get_districts_where($id){
		$query=$this->db->select('*')->where('district_state_id_fk',$id)->get('tbl_share_transfer_history');
		$result=$query->result();
		return $result;
	}
	public function get_district_credentials(){
		$this->db->select('*');
		$this->db->from('tbl_login');
		$this->db->where('user_name!=','admin');
		$this->db->where('user_type',6);
		$this->db->join('tbl_share_transfer_history','tbl_share_transfer_history.district_id=tbl_login.mem_id','left');
		$this->db->order_by('user_name');
		$query = $this->db->get();
		$data['data']=$query->result();
		return $data;
	}
	public function get_shares(){
		$query=$this->db->select('*')->get('tbl_shares');
		return $query->num_rows()>0 ? $query->result() : false;
	}

	public function get_shareholders(){
		$query=$this->db->select('*')->where('member_type',1)->get('tbl_member');
		return $query->num_rows()>0 ? $query->result() : false;
	}

	public function get_shareholder_share_details($id){
		$query=$this->db->select('*')
		->join('tbl_shares','tbl_shares.share_id=tbl_share_purchase_details.purchase_share_id','left')
		->where('purchase_shareholder_id',$id)
		->group_by('tbl_share_purchase_details.purchase_share_id')
		->get('tbl_share_purchase_details');
		return $query->num_rows()>0 ? $query->result() : false;
	}

	public function get_single_share_total($share_id,$shareholder_id){
		$query=$this->db->select_sum('purchase_qty')
		->where('purchase_share_id',$share_id)
		->where('purchase_shareholder_id',$shareholder_id)
		->get('tbl_share_purchase_details');
		return $query->num_rows()>0 ? $query->row()->purchase_qty : 0;
	}

	public function get_single_current_share_qty($user_id,$share_id){
		$query=$this->db->select('purchase_qty')
		->where('purchase_shareholder_id',$user_id)
		->where('purchase_share_id',$share_id)
		->get('tbl_share_purchase_details');
		return $query->num_rows()>0 ? $query->row()->purchase_qty :0;

	}
}
?>
