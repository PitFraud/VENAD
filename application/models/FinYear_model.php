<?php
Class FinYear_model extends CI_Model{

	public function getFinYearTable($param){
		$arOrder = array('','fin_year');
		$searchValue =($param['searchValue'])?$param['searchValue']:'';
        if($searchValue){
            $this->db->like('fin_year', $searchValue);
            $this->db->or_like('fin_no_of_share_holders', $searchValue); 
        }
        $this->db->where("status",1);
        if ($param['start'] != 'false' and $param['length'] != 'false') {
        	$this->db->limit($param['length'],$param['start']);
        }
		$this->db->select('*');
		$this->db->from('tbl_finyear');
		$this->db->order_by('finyear_id', 'DESC');
        $query = $this->db->get();
		
        $data['data'] = $query->result();
        $data['recordsTotal'] = $this->getFinYearTotalCount($param);
        $data['recordsFiltered'] = $this->getFinYearTotalCount($param);
        return $data;

	}
	public function getFinYearTotalCount($param = NULL){

		$searchValue =($param['searchValue'])?$param['searchValue']:'';
        if($searchValue){
            $this->db->like('fin_year', $searchValue);
            $this->db->or_like('fin_no_of_share_holders', $searchValue);
        }
		$this->db->select('*');
		$this->db->from('tbl_finyear');
		$this->db->order_by('finyear_id', 'DESC');
		$this->db->where("status",1);
        $query = $this->db->get();
    	return $query->num_rows();
    }
	
}

?>