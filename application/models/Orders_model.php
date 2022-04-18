<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Orders_model extends CI_Model{
	public function __construct()
    {
        parent::__construct();
    }
    public function getClassinfoTable($param){
		$arOrder = array('','item_name');
		$searchValue =($param['searchValue'])?$param['searchValue']:'';
        if($searchValue){
            $this->db->like('item_name', $searchValue);
        }
        $this->db->where("status !=",2);
        if ($param['start'] != 'false' and $param['length'] != 'false') {
        	$this->db->limit($param['length'],$param['start']);
        }
		$this->db->select('*');
		$this->db->from('tbl_orders');
		$this->db->join('tbl_production_itemlist','tbl_production_itemlist.item_id= tbl_orders.item_id','left');
		$this->db->join('tbl_member','tbl_member.member_id= tbl_orders.user_id','left');
		// $this->db->order_by('order_id', 'DESC');
        $query = $this->db->get();
        $data['data'] = $query->result();
        $data['recordsTotal'] = $this->getClassinfoTotalCount($param);
        $data['recordsFiltered'] = $this->getClassinfoTotalCount($param);
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

	public function get_all_products(){
		$query=$this->db->select('*')->get('tbl_production_itemlist');
		return $query->num_rows()>0 ? $query->result() : false;
	}

	public function update_delivery_status($order_id){
		$update_array=[
			'status'=>1
		];
		$query=$this->db->where('order_id',$order_id)->update('tbl_orders',$update_array);
		return $query ? true : false;
	}
}
?>
