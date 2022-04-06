<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Feeditem_model extends CI_Model{

	public function __construct(){
		parent::__construct();
	}

	public function getFeedsDetails($param){
		$arOrder = array('','feeds_name');
		$searchValue =($param['searchValue'])?$param['searchValue']:'';
		if($searchValue){
			$this->db->like('feeds_name', $searchValue);
		}
		// $this->db->where("allotmen",1);
		if ($param['start'] != 'false' and $param['length'] != 'false') {
			$this->db->limit($param['length'],$param['start']);
		}
		$query=$this->db->select('*')
        ->where('feed_status',1)
		->get('tbl_feed_item');

		$data['data'] = $query->result();
		$data['recordsTotal'] = $this->getClassinfoTotalCount($param);
		$data['recordsFiltered'] = $this->getClassinfoTotalCount($param);
		return $data;
	}

	public function getClassinfoTotalCount($param = NULL){
        $arOrder = array('','feeds_name');
		$searchValue =($param['searchValue'])?$param['searchValue']:'';
		if($searchValue){
			$this->db->like('feeds_name', $searchValue);
		}
		$query=$this->db->select('*')
        ->where('feed_status',1)
		->get('tbl_feed_item');

		return $data = $query->num_rows();
	}


}
