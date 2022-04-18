<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class IntegrationDetails_model extends CI_Model{
	public function __construct()
    {
        parent::__construct();
    }
    public function getIntegrationStock($param){
		$searchValue =($param['searchValue'])?$param['searchValue']:'';
        if($searchValue){
            $this->db->like('tbl_member.member_name', $searchValue);
            $this->db->like('tbl_product.product_name', $searchValue);
        }
        if ($param['start'] != 'false' and $param['length'] != 'false') {
        	$this->db->limit($param['length'],$param['start']);
        }
		$this->db->select('*');
		$this->db->from('tbl_allotment');
        $this->db->join('tbl_product','tbl_product.product_id=tbl_allotment.allot_item_id','left');
        $this->db->join('tbl_member','tbl_member.member_id=tbl_allotment.allot_member_id_fk','left');
        $this->db->join('tbl_unit','tbl_unit.unit_id=tbl_allotment.allot_unit_fk','left');
		$this->db->order_by('allot_id', 'DESC');
        $query = $this->db->get();
        $data['data'] = $query->result();
        $data['recordsTotal'] = $this->getClassinfoTotalCount($param);
        $data['recordsFiltered'] = $this->getClassinfoTotalCount($param);
        return $data;
	}
	public function getClassinfoTotalCount($param = NULL){
		$searchValue =($param['searchValue'])?$param['searchValue']:'';
        if($searchValue){
            $this->db->like('tbl_member.member_name', $searchValue);
            $this->db->like('tbl_product.product_name', $searchValue);
        }
		$this->db->select('*');
		$this->db->from('tbl_allotment');
        $this->db->join('tbl_product','tbl_product.product_id=tbl_allotment.allot_item_id','left');
        $this->db->join('tbl_member','tbl_member.member_id=tbl_allotment.allot_member_id_fk','left');
        $this->db->join('tbl_unit','tbl_unit.unit_id=tbl_allotment.allot_unit_fk','left');
		$this->db->order_by('allot_id', 'DESC');
        $query = $this->db->get();
    	return $query->num_rows();
    }

}
?>
