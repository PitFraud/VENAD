<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class SharePurchase_model extends CI_Model{

	public function __construct(){
		parent::__construct();
	}

	public function getSharePurchase($param){
		$arOrder = array('','purchase_shareholder_name');
		$searchValue =($param['searchValue'])?$param['searchValue']:'';
		if($searchValue){
			$this->db->like('purchase_shareholder_name', $searchValue);
		}
		// $this->db->where("allotmen",1);
		if ($param['start'] != 'false' and $param['length'] != 'false') {
			$this->db->limit($param['length'],$param['start']);
		}
		// $this->db->select('*');
    // $query = $this->db->get('tbl_share_purchase_details');
    // $data['data'] = $query->result();
		$query=$this->db->select('*,tbl_share_purchase_details.created_at as created_date,tbl_share_purchase_details.*')
		->join('tbl_shares','tbl_shares.share_id=tbl_share_purchase_details.purchase_share_id','left')
		->join('tbl_share_settings','tbl_share_settings.settings_share_id=tbl_share_purchase_details.purchase_share_id','left')
		->join('tbl_member','tbl_member.member_id=tbl_share_purchase_details.purchase_shareholder_id','left')
		->order_by('tbl_share_purchase_details.purchase_id','DESC')->get('tbl_share_purchase_details');

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



	public function getSharesDetails(){

		$query=$this->db->select('*')->get('tbl_shares');

		return $query->result();

	}

	public function getShareHolderCount()
	{
		$this->db->select('COUNT(*) AS count');
		$this->db->from('tbl_share_purchase_details');
		$this->db->where('purchase_status',1);
		$query = $this->db->get();
		return $query->result();
	}

	public function get_shareholders(){
		$query=$this->db->select('*')->where('member_type',1)->get('tbl_member');
		return $query->num_rows()>0 ? $query->result() : false;
	}

	public function get_single_share_details($id){
		$query=$this->db->select('*')
		->join('tbl_share_settings','tbl_share_settings.settings_id=tbl_shares.share_id','left')
		->where('share_id',$id)
		->get('tbl_shares');
		return $query->num_rows()>0 ? $query->row() : false;
	}

	public function get_shares(){
		$query=$this->db->select('*')->get('tbl_shares');
		return $query->num_rows()>0 ? $query->result() : false;
	}



}
