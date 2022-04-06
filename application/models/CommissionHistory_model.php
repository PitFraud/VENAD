<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class CommissionHistory_model extends CI_Model{

	public function __construct()
    {
        parent::__construct();
    }
    public function get_commission_history($param){
		$arOrder = array('','member_name');
		$searchValue =($param['searchValue'])?$param['searchValue']:'';
        if($searchValue){
            $this->db->like('member_name', $searchValue);
        }
        if ($param['start'] != 'false' and $param['length'] != 'false') {
        	$this->db->limit($param['length'],$param['start']);
        }

		$query=$this->db->select('*,tbl_allotment.created_at as allot_date,')
		->join('tbl_allotment','tbl_allotment.allot_id=tbl_commission_history.history_allotment_fk','left')
		->join('tbl_product','tbl_product.product_id=tbl_allotment.allot_item_id','left')
		->join('tbl_unit','tbl_unit.unit_id=tbl_allotment.allot_unit_fk','left')
		->join('tbl_member','tbl_member.member_id=tbl_allotment.allot_member_id_fk','left')
		->get('tbl_commission_history');
        $data['data'] = $query->result();
        $data['recordsTotal'] = $query->num_rows();
        $data['recordsFiltered'] = $query->num_rows();
        return $data;

	}

	public function getClassinfoTotalCount($param = NULL){

		$searchValue =($param['searchValue'])?$param['searchValue']:'';
        if($searchValue){
            $this->db->like('district_name', $searchValue);
        }
		$this->db->select('*');
		$this->db->from('tbl_district');
        $this->db->where("district_status",1);
		$this->db->order_by('district_id', 'ASCE');
        $query = $this->db->get();
    	return $query->num_rows();
    }

	public function getDistricts(){
		$query=$this->db->select('*')->get('tbl_district');
		$result=$query->result();
		return $result;
	}

	public function get_districts_where($id){
		$query=$this->db->select('*')->where('district_state_id_fk',$id)->get('tbl_district');
		$result=$query->result();
		return $result;
	}

	public function get_district_credentials(){
			$this->db->select('*');
			$this->db->from('tbl_login');
			$this->db->where('user_name!=','admin');
			$this->db->where('user_type',6);
			$this->db->join('tbl_district','tbl_district.district_id=tbl_login.mem_id','left');
			$this->db->order_by('user_name');
			$query = $this->db->get();
			$data['data']=$query->result();
			return $data;
	}

}
?>
