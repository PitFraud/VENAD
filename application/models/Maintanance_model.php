<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Maintanance_model extends CI_Model{

	public function __construct(){
		parent::__construct();
	}

	public function getMaintanance($param){
		$arOrder = array('','vehicle_name');
		$searchValue =($param['searchValue'])?$param['searchValue']:'';
		if($searchValue){
			$this->db->like('vehicle_name', $searchValue);
		}
		if ($param['start'] != 'false' and $param['length'] != 'false') {
			$this->db->limit($param['length'],$param['start']);
		}
		$this->db->select('*');
		$this->db->join('tbl_vehicle','tbl_vehicle.vehicle_id=tbl_maintanance_history.history_vehicle_fk');
    $this->db->join('tbl_drivers','tbl_drivers.driver_id=tbl_maintanance_history.history_incharge_driver_fk');
    $query = $this->db->get('tbl_maintanance_history');
    $data['data'] = $query->result();
		$data['recordsTotal'] = $this->getClassinfoTotalCount($param);
		$data['recordsFiltered'] = $this->getClassinfoTotalCount($param);
		return $data;
	}

	public function getClassinfoTotalCount($param = NULL){
		$searchValue =($param['searchValue'])?$param['searchValue']:'';
				if($searchValue){
						$this->db->like('vehicle_name', $searchValue);
				}
		$this->db->select('*');
		$this->db->from('tbl_vehicle');
				$this->db->where("vehicle_status",1);
		$this->db->order_by('vehicle_id', 'ASCE');
				$query = $this->db->get();
			return $query->num_rows();
		}


}
