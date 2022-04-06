<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Reminders_model extends CI_Model{

	public function __construct(){
		parent::__construct();
	}

	public function getReminders($param){
		$arOrder = array('','reminder_title');
		$searchValue =($param['searchValue'])?$param['searchValue']:'';
		if($searchValue){
			$this->db->like('reminder_title', $searchValue);
		}
		if ($param['start'] != 'false' and $param['length'] != 'false') {
			$this->db->limit($param['length'],$param['start']);
		}
		$query=$this->db->select('*,DATE_SUB(reminder_date,INTERVAL 2 DAY) as beforetwodays')->order_by('reminder_date','ASC')->get('tbl_reminders');
    $data['data'] = $query->result();
		$data['recordsTotal'] = $this->getClassinfoTotalCount($param);
		$data['recordsFiltered'] = $this->getClassinfoTotalCount($param);
		return $data;
	}

	public function getClassinfoTotalCount($param = NULL){
		$searchValue =($param['searchValue'])?$param['searchValue']:'';
				if($searchValue){
						$this->db->like('reminder_title', $searchValue);
				}
		$this->db->select('*');
		$this->db->from('tbl_reminders');
				$this->db->where("reminder_status",1);
		$this->db->order_by('reminder_id', 'ASCE');
				$query = $this->db->get();
			return $query->num_rows();
		}


}
