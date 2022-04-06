<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class VaccinationSchedule_model extends CI_Model{
	public function __construct(){
		parent::__construct();
	}

	public function get_vaccine_list(){
		$query=$this->db->select('*')->get('tbl_vaccination');
		return $query->result();
	}

	public function get_schedule_details($param){
		$arOrder = array('','vaccination_name');
		$searchValue =($param['searchValue'])?$param['searchValue']:'';
		if($searchValue){
			$this->db->like('vaccination_name', $searchValue);
		}
		if ($param['start'] != 'false' and $param['length'] != 'false') {
			$this->db->limit($param['length'],$param['start']);
		}
		$query=$this->db->select('*')
		->join('tbl_allotment','tbl_allotment.allot_id=tbl_vaccination_schedule.schedule_allotment_fk','left')
		->join('tbl_member','tbl_member.member_id=tbl_allotment.allot_member_id_fk','left')
		->join('tbl_vaccination','tbl_vaccination.vaccination_id=tbl_vaccination_schedule.schedule_vaccine_fk','left')
		->order_by('tbl_vaccination_schedule.created_at','DESC')
		->get('tbl_vaccination_schedule');
		$data['data'] = $query->result();
		return $data;
	}

	public function getAllotmentsList(){
		$query=$this->db->select('*,tbl_allotment.created_at as allotment_date,tbl_vaccination.vaccination_name as vaccinenamedays, DATE_ADD(tbl_allotment.created_at, INTERVAL tbl_vaccination.vaccination_days DAY) AS vaccination_date, DATE_SUB(DATE_ADD(tbl_allotment.created_at, INTERVAL tbl_vaccination.vaccination_days DAY), INTERVAL 2 DAY) AS beforetwodays')
		->join('tbl_vaccination','tbl_vaccination.vaccination_id=tbl_allotment.allot_vaccine_fk')
		->join('tbl_product','tbl_product.product_id=tbl_allotment.allot_item_id','left')
		->join('tbl_unit','tbl_unit.unit_id=tbl_allotment.allot_unit_fk','left')
		->join('tbl_member','tbl_member.member_id=tbl_allotment.allot_member_id_fk','left')
		->join('tbl_member_type','tbl_member_type.member_type_id=tbl_member.member_type','left')
		->order_by('tbl_allotment.allot_id','DESC')->get('tbl_allotment');
		return $query->result();
	}

	public function getreceipt($schedule_id)
	{
		$q=$this->db->select('*,tbl_allotment.created_at as allotment_date,tbl_vaccination.vaccination_name as vaccinenamedays, DATE_ADD(tbl_allotment.created_at, INTERVAL tbl_vaccination.vaccination_days DAY) AS vaccination_date, DATE_SUB(DATE_ADD(tbl_allotment.created_at, INTERVAL tbl_vaccination.vaccination_days DAY), INTERVAL 2 DAY) AS beforetwodays');
		$this->db->from('tbl_vaccination_schedule');
		$this->db->join('tbl_allotment','tbl_allotment.allot_id=tbl_vaccination_schedule.schedule_allotment_fk','left');
		$this->db->join('tbl_vaccination','tbl_vaccination.vaccination_id=tbl_allotment.allot_vaccine_fk');
		$this->db->join('tbl_product','tbl_product.product_id=tbl_allotment.allot_item_id','left');
		$this->db->join('tbl_unit','tbl_unit.unit_id=tbl_allotment.allot_unit_fk','left');
		$this->db->join('tbl_member','tbl_member.member_id=tbl_allotment.allot_member_id_fk','left');
		$this->db->join('tbl_member_type','tbl_member_type.member_type_id=tbl_member.member_type','left');
		$this->db->where("schedule_id",$schedule_id);
		$this->db->where("schedule_status",1);
		$q = $this->db->get();
        if($q->num_rows() > 0)
        {
            return $q->row();
        }
        return false;
	}

}
