<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Panchayath_model extends CI_Model{

	public function __construct()
    {
        parent::__construct();
    }
    public function getClassinfoTable($param){
		$arOrder = array('','panchayath_name');
		$searchValue =($param['searchValue'])?$param['searchValue']:'';
        if($searchValue){
            $this->db->like('panchayath_name', $searchValue);
        }
        $this->db->where("panchayath_status",1);
        if ($param['start'] != 'false' and $param['length'] != 'false') {
        	$this->db->limit($param['length'],$param['start']);
        }
		$this->db->select('*');
		$this->db->from('tbl_panchayath');
		$this->db->join('tbl_district','panchayath_district= district_id','left');
		$this->db->order_by('panchayath_id', 'DESC');
        $query = $this->db->get();

        $data['data'] = $query->result();
        $data['recordsTotal'] = $this->getClassinfoTotalCount($param);
        $data['recordsFiltered'] = $this->getClassinfoTotalCount($param);
        return $data;

	}

	public function getClassinfoTotalCount($param = NULL){

		$searchValue =($param['searchValue'])?$param['searchValue']:'';
        if($searchValue){
            $this->db->like('panchayath_name', $searchValue);
        }
		$this->db->select('*');
		$this->db->from('tbl_panchayath');
        $this->db->where("panchayath_status",1);
		$this->db->order_by('panchayath_id', 'DESC');
        $query = $this->db->get();
    	return $query->num_rows();
    }

	public function get_panchayath_names_where($dist_id){
		$query=$this->db->select('*')->where('panchayath_district',$dist_id)->get('tbl_panchayath');
		return $query->result();
	}

	public function get_panchayath_credentials(){
		$this->db->select('*');
		$this->db->from('tbl_login');
		$this->db->where('user_name!=','admin');
		$this->db->where('user_type',7);
		$this->db->join('tbl_panchayath','tbl_panchayath.panchayath_id=tbl_login.mem_id','left');
		$this->db->order_by('user_name');
		$query = $this->db->get();
		$data['data']=$query->result();
		return $data;
	}

	public function get_panchayath(){
		$this->db->select('*');
		$this->db->from('tbl_panchayath');
        $this->db->where("panchayath_status",1);
		$this->db->order_by('panchayath_id', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}


	  public function getClassinfoTable1($param){
		$arOrder = array('','panchayath_name');
		$searchValue =($param['searchValue'])?$param['searchValue']:'';
        if($searchValue){
            $this->db->like('panchayath_name', $searchValue);
        }
        $this->db->where("status",1);
        if ($param['start'] != 'false' and $param['length'] != 'false') {
        	$this->db->limit($param['length'],$param['start']);
        }
		$this->db->select('*');
		$this->db->from('tbl_login');
		$this->db->where('user_type',7);
		$this->db->join('tbl_panchayath','tbl_panchayath.panchayath_id=tbl_login.mem_id','left');
        $query = $this->db->get();

        $data['data'] = $query->result();
        $data['recordsTotal'] = $this->getClassinfoTotalCount1($param);
        $data['recordsFiltered'] = $this->getClassinfoTotalCount1($param);
        return $data;

	}

	public function getClassinfoTotalCount1($param = NULL){

		$searchValue =($param['searchValue'])?$param['searchValue']:'';
        if($searchValue){
            $this->db->like('panchayath_name', $searchValue);
        }
		$this->db->select('*');
		$this->db->from('tbl_login');
		$this->db->where('user_type',7);
		$this->db->join('tbl_panchayath','tbl_panchayath.panchayath_id=tbl_login.mem_id','left');
        $query = $this->db->get();
    	return $query->num_rows();
    }

	public function get_districts()
	{
		$this->db->select('district_id,district_name');
		$this->db->from('tbl_district');
		$this->db->where('district_status',1);
        $query = $this->db->get();
		return $query->result();
	}

}
?>
