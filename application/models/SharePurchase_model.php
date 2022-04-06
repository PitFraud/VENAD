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
		$query=$this->db->select('*,tbl_share_purchase_details.created_at as created_date')
		->join('tbl_shares','tbl_shares.share_id=tbl_share_purchase_details.purchase_share_id_fk','left')
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



}

