<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ShareSettings_model extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
	public function getShares($param){
		$arOrder = array('','share_name');
		$searchValue =($param['searchValue'])?$param['searchValue']:'';
		if($searchValue){
			$this->db->like('share_name', $searchValue);
		}
		// $this->db->where("allotmen",1);
		if ($param['start'] != 'false' and $param['length'] != 'false') {
			$this->db->limit($param['length'],$param['start']);
		}
		$this->db->select('*');
    $query = $this->db->get('tbl_shares');
		$data['data'] = $query->result();
		$data['recordsTotal'] = $this->getClassinfoTotalCount($param);
		$data['recordsFiltered'] = $this->getClassinfoTotalCount($param);
		return $data;
	}

	public function get_shares(){
		$query=$this->db->select('*')->get('tbl_shares');
		return $query->num_rows()>0 ? $query->result() : false;
	}

	public function check_existance($id){
		$query=$this->db->select('settings_id')->where('settings_id',$id)->get('tbl_share_settings');
		return $query->num_rows()>0 ? true : false;
	}

	public function updateSettings($condition,$update_array){
		$query=$this->db->where($condition)->update('tbl_share_settings',$update_array);
		return $query ? true : false;
	}

	public function newSettings($insert_array){
		$query=$this->db->insert('tbl_share_settings', $insert_array);
		return $query ? true : false;
	}

	public function get_single_item_details($id){
		$query=$this->db->select('*')->where('settings_id',$id)->get('tbl_share_settings');
		return $query->num_rows()>0 ? $query->row() : false;
	}

	public function get_current_share_settings($param){
		$arOrder = array('','share_name');
		$searchValue =($param['searchValue'])?$param['searchValue']:'';
		if($searchValue){
			$this->db->like('share_name', $searchValue);
		}
		// $this->db->where("allotmen",1);
		if ($param['start'] != 'false' and $param['length'] != 'false') {
			$this->db->limit($param['length'],$param['start']);
		}
		$query=$this->db->select('tbl_shares.share_name,tbl_shares.share_value,tbl_share_settings.*')
		->join('tbl_share_settings','tbl_share_settings.settings_share_id=tbl_shares.share_id','left')
		->order_by('tbl_shares.share_id','DESC')
		->get('tbl_shares');
		// return $query->num_rows()>0 ? $query->result() : false;
		$data['data'] = $query->result();
		$data['recordsTotal'] = $query->num_rows();
		$data['recordsFiltered'] = $query->num_rows();
		return $data;
	}

}
