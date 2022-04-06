<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Driver_model extends CI_Model{

	public function __construct(){
		parent::__construct();
	}

	public function getDrivers($param){
		$arOrder = array('','driver_name');
		$searchValue =($param['searchValue'])?$param['searchValue']:'';
		if($searchValue){
			$this->db->like('driver_name', $searchValue);
		}
		// $this->db->where("allotmen",1);
		if ($param['start'] != 'false' and $param['length'] != 'false') {
			$this->db->limit($param['length'],$param['start']);
		}
		$this->db->select('*');
    $query = $this->db->get('tbl_drivers');
    $data['data'] = $query->result();
		// $query=$this->db->select('*')
		// ->join('tbl_unit','tbl_unit.unit_id=tbl_commision.commission_per_unit_id','left')
		// ->order_by('tbl_commision.commission_id','DESC')->get('tbl_commision');

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

}
