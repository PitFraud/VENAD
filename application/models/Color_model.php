<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Color_model extends CI_Model{

	public function __construct()
    {
        parent::__construct();
    }
    public function getCategoryTable($param){
		$arOrder = array('','color_name');
		$searchValue =($param['searchValue'])?$param['searchValue']:'';
        if($searchValue){
            $this->db->like('color_name', $searchValue);
        }
        $this->db->where("color_status",1);

        // if ($param['order'] != 'false' and $param['dir'] != 'false') {
            // $order_field = $arOrder[$param['order']];
            // $this->db->order_by($order_field,$param['dir']);
        // }
        if ($param['start'] != 'false' and $param['length'] != 'false') {
        	$this->db->limit($param['length'],$param['start']);
        }
		$this->db->select('*');
		$this->db->from('tbl_color');
		$this->db->order_by('color_id', 'DESC');
        $query = $this->db->get();
        //echo $this->db->last_query();
		//exit();

        $data['data'] = $query->result();
        $data['recordsTotal'] = $this->getCategoryTotalCount($param);
        $data['recordsFiltered'] = $this->getCategoryTotalCount($param);
        return $data;

	}

	public function getCategoryTotalCount($param = NULL){

		$searchValue =($param['searchValue'])?$param['searchValue']:'';
        if($searchValue){
            $this->db->like('color_name', $searchValue);
        }
		$this->db->select('*');
		$this->db->from('tbl_color');
        $this->db->where("color_status",1);
		$this->db->order_by('color_id', 'DESC');
        $query = $this->db->get();
    	return $query->num_rows();
    }
	public function view_by()
	{
		$status=1;
		$this->db->select('*');
		$this->db->from('tbl_color');
		$this->db->where('color_status', $status);
		$query = $this->db->get();

		$color_names = array();
		if ($query -> result()) {
		foreach ($query->result() as $color_name) {
		$color_names[$color_name-> color_id] = $color_name -> color_name;
			}
		return $color_names;
		} else {
		return FALSE;
		}
	}
		public function view_byname()
		{
		$status=1;
		$this->db->select('*');
		$this->db->from('category');
		$this->db->where('category_status', $status);
		$query = $this->db->get();
		return $query->result();
		}
    public function getlast($insert_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_category');
        $this->db->where('category_id', $insert_id);
        $query = $this->db->get();
        return $query->result();
    }

}
?>
