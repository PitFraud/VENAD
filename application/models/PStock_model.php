<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class PStock_model extends CI_Model{

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
        $this->db->where("item_status",1);
        if ($param['start'] != 'false' and $param['length'] != 'false') {
        	$this->db->limit($param['length'],$param['start']);
        }
		$this->db->select('*,DATE_FORMAT(updated_at,\'%d/%m/%Y\') AS date');
		$this->db->from('tbl_production_itemlist');
		$this->db->order_by('item_id', 'ASCE');
        $query = $this->db->get();

        $data['data'] = $query->result();
        $data['recordsTotal'] = $this->getClassinfoTotalCount($param);
        $data['recordsFiltered'] = $this->getClassinfoTotalCount($param);
        return $data;

	}

	public function getClassinfoTotalCount($param = NULL){

		$searchValue =($param['searchValue'])?$param['searchValue']:'';
        if($searchValue){
            $this->db->like('item_name', $searchValue);
        }
		$this->db->select('*');
		$this->db->from('tbl_production_itemlist');
        $this->db->where("item_status",1);
		$this->db->order_by('item_id', 'ASCE');
        $query = $this->db->get();
    	return $query->num_rows();
    }


    public function receiptList($item_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_production_itemlist');
        $this->db->where('item_id',$item_id);
        $query = $this->db->get();
        return $query->result();
    }

		public function gettable($table){
			$query=$this->db->select('*')->get($table);
			return $query->result();
		}

}
?>
