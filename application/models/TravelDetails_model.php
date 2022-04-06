<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class TravelDetails_model extends CI_Model{

	public function __construct(){
		parent::__construct();
	}

	public function getTravelDetails($param){
		$arOrder = array('','travel_id');
		$searchValue =($param['searchValue'])?$param['searchValue']:'';
		if($searchValue){
			$this->db->like('travel_id', $searchValue);
		}
		if ($param['start'] != 'false' and $param['length'] != 'false') {
			$this->db->limit($param['length'],$param['start']);
		}
		$this->db->select('*');
    $this->db->join('tbl_vehicle','tbl_vehicle.vehicle_id=tbl_travel.travel_vehicle_fk');
    $this->db->join('tbl_drivers','tbl_drivers.driver_id=tbl_travel.travel_driver_fk');
    $query = $this->db->get('tbl_travel');
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

		public function getVehicleList(){
				$query=$this->db->select('*')->get('tbl_vehicle');
				return $query->result();
		}
		public function getDrivers(){
				$query=$this->db->select('*')->get('tbl_drivers');
				return $query->result();
		}

		public function get_vehicle_travel_report($param){
				$start_date =(isset($param['start_date']))?$param['start_date']:'';
				$end_date =(isset($param['end_date']))?$param['end_date']:'';

				// if($start_date){
				// 	$this->db->where('tbl_allotment.created_at >=', $start_date);
				// }
				// if($end_date){
				// 	$this->db->where('tbl_allotment.created_at <=', $end_date);
				// }
				// $this->db->where("tbl_allotment.allot_status",1);
				//
				// if ($param['start'] != 'false' and $param['length'] != 'false') {
				// 	// $this->db->limit($param['length'],$param['start']);
				// }
				$this->db->select('*');
		    $this->db->join('tbl_vehicle','tbl_vehicle.vehicle_id=tbl_travel.travel_vehicle_fk');
		    $this->db->join('tbl_drivers','tbl_drivers.driver_id=tbl_travel.travel_driver_fk');
		    $query = $this->db->get('tbl_travel');
				$data['data'] = $query->result();
				$data['recordsTotal'] = $query->num_rows();
				$data['recordsFiltered'] = $query->num_rows();
				return $data;
		}


}
