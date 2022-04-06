<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class State_model extends CI_Model{

	public function __construct()
    {
        parent::__construct();
    }
    public function getClassinfoTable($param){
		$arOrder = array('','state_name');
		$searchValue =($param['searchValue'])?$param['searchValue']:'';
        if($searchValue){
            $this->db->like('state_name', $searchValue);
        }
        $this->db->where("state_status",1);
        if ($param['start'] != 'false' and $param['length'] != 'false') {
        	$this->db->limit($param['length'],$param['start']);
        }
		$this->db->select('*');
		$this->db->from('tbl_state');
		$this->db->order_by('state_id', 'ASCE');
        $query = $this->db->get();

        $data['data'] = $query->result();
        $data['recordsTotal'] = $this->getClassinfoTotalCount($param);
        $data['recordsFiltered'] = $this->getClassinfoTotalCount($param);
        return $data;

	}

	public function getClassinfoTotalCount($param = NULL){

		$searchValue =($param['searchValue'])?$param['searchValue']:'';
        if($searchValue){
            $this->db->like('state_name', $searchValue);
        }
		$this->db->select('*');
		$this->db->from('tbl_state');
        $this->db->where("state_status",1);
		$this->db->order_by('state_id', 'ASCE');
        $query = $this->db->get();
    	return $query->num_rows();
    }

		public function getStates(){
			$query=$this->db->select('*')->get('tbl_state');
			$result=$query->result();
			return $result;
		}

		public function get_state_login_credentials(){
				$this->db->select('*');
				$this->db->from('tbl_login');
				$this->db->where('user_name!=','admin');
				$this->db->where('user_type',5);
				$this->db->join('tbl_state','tbl_state.state_id=tbl_login.mem_id','left');
				$this->db->order_by('user_name');
				$query = $this->db->get();
				$data['data']=$query->result();
				return $data;
		}

}
?>
