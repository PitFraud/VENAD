<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Product_model extends CI_Model{

	public function __construct()
    {
        parent::__construct();
    }
    public function getClassinfoTable($param){
		$arOrder = array('','product_name');
		$searchValue =($param['searchValue'])?$param['searchValue']:'';
        $item_name = ($param['item_name'])?$param['item_name']:'';
        if($searchValue){
            $this->db->like('product_name', $searchValue);
        }
        if($item_name){
            $this->db->like('product_name', $item_name);
            $this->db->or_like('product_code', $item_name);
        }
        $this->db->where("product_status",1);
        if ($param['start'] != 'false' and $param['length'] != 'false') {
        	$this->db->limit($param['length'],$param['start']);
        }

		$query=$this->db->select('*')->join('tbl_unit','tbl_unit.unit_id=tbl_product.product_unit','left')->order_by('tbl_product.product_id','DESC')->get('tbl_product');

    $data['data'] = $query->result();
    $data['recordsTotal'] = $this->getClassinfoTotalCount($param);
    $data['recordsFiltered'] = $this->getClassinfoTotalCount($param);
    return $data;
	}

	public function getClassinfoTotalCount($param = NULL){

		$searchValue =($param['searchValue'])?$param['searchValue']:'';
        if($searchValue){
            $this->db->like('product_name', $searchValue);
        }
		$this->db->select('*');
		$this->db->from('tbl_product');
        $this->db->where("product_status",1);
		$this->db->order_by('product_id', 'ASCE');
        $query = $this->db->get();
    	return $query->num_rows();
    }

    function get_unit(){


        $status=1;
        $this->db->select('*');
        $this->db->from('tbl_unit');
        $this->db->where('unit_status', $status);
        $this->db->order_by('unit_id');
        $query = $this->db->get();
        return $query->result();

    }

		public function getCategoryInfoTable()
		{
			$this->db->select('*');
			$this->db->from('tbl_unit');
			$this->db->where('unit_status', $status);
			$this->db->order_by('unit_id');
			$query = $this->db->get();
			return $query->result();
		}

}
?>
