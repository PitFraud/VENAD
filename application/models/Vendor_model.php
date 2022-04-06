<?php
Class Vendor_model extends CI_Model{

	public function getVendorTable($param){
		$arOrder = array('','vendorname');
		$searchValue =($param['searchValue'])?$param['searchValue']:'';
        if($searchValue){
            $this->db->like('vendorname', $searchValue); 
        }
        $this->db->where("vendorstatus",1);
		
        if ($param['start'] != 'false' and $param['length'] != 'false') {
        	$this->db->limit($param['length'],$param['start']);
        }
		$this->db->select('*');
		$this->db->from('tbl_vendor');
		$this->db->order_by('vendor_id', 'DESC');
        $query = $this->db->get();
		
        $data['data'] = $query->result();
        $data['recordsTotal'] = $this->getVendorTotalCount($param);
        $data['recordsFiltered'] = $this->getVendorTotalCount($param);
        return $data;

	}
	public function getVendorTotalCount($param = NULL){

		$searchValue =($param['searchValue'])?$param['searchValue']:'';
        if($searchValue){
            $this->db->like('vendorname', $searchValue); 
        }
		$this->db->select('*');
		$this->db->from('tbl_vendor');
		$this->db->order_by('vendor_id', 'DESC');
        $this->db->where("vendorstatus",1);
        $query = $this->db->get();
    	return $query->num_rows();
    }
	public function view_by()
	{
		$status=1;
		$this->db->select('*');
		$this->db->from('tbl_vendor');
		$this->db->where('vendorstatus', $status);
		$this->db->order_by('vendorname');
		$query = $this->db->get();
		
		$vendor_names = array();
		if ($query -> result()) {
		foreach ($query->result() as $vendor_name) {
		$vendor_names[$vendor_name-> vendor_id] = $vendor_name -> vendorname;
			}
		return $vendor_names;
		} else {
		return FALSE;
		}
	}
	
}

?>