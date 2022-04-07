<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vehicles_model extends CI_Model{



	public function __construct(){

		parent::__construct();

	}



	public function getVehicles($param){

		$arOrder = array('','vehicle_name');

		$searchValue =($param['searchValue'])?$param['searchValue']:'';

		if($searchValue){

			$this->db->like('vehicle_name', $searchValue);

		}

		if ($param['start'] != 'false' and $param['length'] != 'false') {

			$this->db->limit($param['length'],$param['start']);

		}

		$query=$this->db->select('*')

		->join('tbl_vehicle_types','tbl_vehicle_types.type_id=tbl_vehicle.vehicle_type_fk','left')

		->join('tbl_vehicle_group','tbl_vehicle_group.group_id=tbl_vehicle.vehicle_group_fk','left')

		->get('tbl_vehicle');



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



		public function getVehicles_root($param){

		$arOrder = array('','vehicle_name');

		$searchValue =($param['searchValue'])?$param['searchValue']:'';

		if($searchValue){

			$this->db->like('vehicle_name', $searchValue);

		}

		if ($param['start'] != 'false' and $param['length'] != 'false') {

			$this->db->limit($param['length'],$param['start']);

		}

		$this->db->select('*');

		$this->db->from('tbl_vechicles_root');

		$this->db->join('tbl_vehicle','vehicle_id=vehicle_id_fk');

		$this->db->join('tbl_drivers','driver_id=driver_id_fk');

		$this->db->where("tbl_vechicles_root.status",1);

		$this->db->order_by('vroot_id', 'ASCE');

		$query = $this->db->get();

    	$data['data'] = $query->result();

		$data['recordsTotal'] = $this->getClassinforootTotalCount($param);

		$data['recordsFiltered'] = $this->getClassinforootTotalCount($param);

		return $data;

	}



	public function getClassinforootTotalCount($param = NULL){

		$searchValue =($param['searchValue'])?$param['searchValue']:'';

				if($searchValue){

						$this->db->like('vehicle_name', $searchValue);

				}

		$this->db->select('*');

		$this->db->from('tbl_vechicles_root');

		$this->db->join('tbl_vehicle','vehicle_id=vehicle_id_fk');

		$this->db->join('tbl_drivers','driver_id=driver_id_fk');

		$this->db->where("tbl_vechicles_root.status",1);

		$this->db->order_by('vroot_id', 'ASCE');

				$query = $this->db->get();

			return $query->num_rows();

		}



		 public function getrout($vroot_id)

	    {

	        $this->db->select('*');

	        $this->db->from('tbl_vechicles_root');

	       	$this->db->join('tbl_vehicle','vehicle_id=vehicle_id_fk');

			$this->db->join('tbl_drivers','driver_id=driver_id_fk');

			$this->db->where("tbl_vechicles_root.status",1);

	        $this->db->where('vroot_id',$vroot_id);

	        $q = $this->db->get();

	        if($q->num_rows() > 0)

	        {

	            return $q->row();

	        }

	        return false;

	    }



	     public function getroutitem($vroot_id)

	    {

	        $this->db->select('*');

	        $this->db->from('tbl_vehicles_item');

	       	$this->db->join('tbl_production_itemlist','item_id=item_id_fk');

			//$this->db->where("tbl_vechicles_root.status",1);

	        $this->db->where('root_id_fk',$vroot_id);

	       $query = $this->db->get();

			return $query->result();

	    }





		public function getvehicle()

		{

			$status=1;

			$this->db->select('*');

			$this->db->from('tbl_vehicle');

			$this->db->where('vehicle_status', $status);

			$this->db->order_by('vehicle_name');

			$query = $this->db->get();

			return $query->result();

		}



		public function getdriver()

	{

		$status=1;

		$this->db->select('*');

		$this->db->from('tbl_drivers');

		$this->db->where('status', $status);

		$this->db->order_by('driver_name');

		$query = $this->db->get();

		return $query->result();

	}





		public function getproducts()

	{

		$status=1;

		$this->db->select('*');

		$this->db->from('tbl_production_itemlist');

		$this->db->where('item_status', $status);

		$this->db->order_by('item_name');

		$query = $this->db->get();

		return $query->result();

	}



	public function get_vehicle_types(){

		$query=$this->db->select('*')->get('tbl_vehicle_types');

		$result=$query->result();

		return $result;

	}



	public function get_vehicle_groups(){

		$query=$this->db->select('*')->get('tbl_vehicle_group');

		$result=$query->result();

		return $result;

	}

	public function getRouteDetails($vroot_id)
	{
		$this->db->select('*');
		$this->db->from('vehicle_destination');
		$this->db->where('v_destination_fk_id',$vroot_id);
		$this->db->where('v_destination_status',1);
		$query = $this->db->get();
		return $query->result();
	}





}

