<?php
Class HSNcode_model extends CI_Model{
	public function getHSNcodeTable($param){
		$arOrder = array('','hsncode');
		$searchValue =($param['searchValue'])?$param['searchValue']:'';
		if($searchValue){
			$this->db->like('hsncode', $searchValue);
		}
		$this->db->where("hsn_status",1);
		if ($param['start'] != 'false' and $param['length'] != 'false') {
			$this->db->limit($param['length'],$param['start']);
		}
		$this->db->select('*');
		$this->db->from('tbl_hsncode');
		// $this->db->where("hsn_project_id_fk",$prid);
		$this->db->order_by('hsn_id', 'DESC');
		$query = $this->db->get();
		$data['data'] = $query->result();
		$data['recordsTotal'] = $query->num_rows();
		$data['recordsFiltered'] = $query->num_rows();
		return $data;
	}
	public function getHSNcodeTotalCount($param = NULL,$prid){
		$searchValue =($param['searchValue'])?$param['searchValue']:'';
		if($searchValue){
			$this->db->like('hsncode', $searchValue);
		}
		$this->db->select('*');
		$this->db->from('tbl_hsncode');
		$this->db->order_by('hsn_id', 'DESC');
		$this->db->where("hsn_status",1);
		$this->db->where("hsn_project_id_fk",$prid);
		$query = $this->db->get();
		return $query->num_rows();
	}
	public function gethsncode()
	{
		$status=1;
		$this->db->select('*');
		$this->db->from('tbl_hsncode');
		$this->db->where('hsn_status', $status);
		$this->db->order_by('hsncode');
		$query = $this->db->get();
		return $query->result();
	}
}
?>
