<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Allotment_integration_model extends CI_Model{
	public function __construct()
    {
        parent::__construct();
    }
	public function getSaleReport($param){
		$start_date =(isset($param['start_date']))?$param['start_date']:'';
        $end_date =(isset($param['end_date']))?$param['end_date']:'';

        if ($param['start'] != 'false' and $param['length'] != 'false') {
            $this->db->limit($param['length'],$param['start']);
        }
		
		$this->db->select('*,((allot_quantity/rec_given_feeds_total)/7) AS feed_consumption,((rec_weight/rec_quantity)/7) AS body_weight_ratio,(((rec_weight/rec_quantity)/7)/1000) AS body_weight_kg');
    	$this->db->from('tbl_allotment');
        $this->db->join('tbl_receive_back','tbl_receive_back.rec_allotment_fk=tbl_allotment.allot_id');
        $this->db->join('tbl_feeds','tbl_feeds.feeds_allotment_fk=tbl_allotment.allot_id');
		$this->db->order_by('tbl_allotment.allot_id','DESC');

        $query = $this->db->get();
		$data['data'] = $query->result();
        $data['recordsTotal'] = $this->getSaleReportTotalCount($param);
        $data['recordsFiltered'] = $this->getSaleReportTotalCount($param);
        return $data;
	}
	public function getSaleReportTotalCount($param){
		$start_date =(isset($param['start_date']))?$param['start_date']:'';
        $end_date =(isset($param['end_date']))?$param['end_date']:'';
		
		$this->db->select('*');
    	$this->db->from('tbl_allotment');
        $this->db->join('tbl_receive_back','tbl_receive_back.rec_allotment_fk=tbl_allotment.allot_id');
        $this->db->join('tbl_feeds','tbl_feeds.feeds_allotment_fk=tbl_allotment.allot_id');
		$this->db->order_by('tbl_allotment.allot_id','DESC');

        $query = $this->db->get();
		return $query->num_rows();
	}
	
}
?>
