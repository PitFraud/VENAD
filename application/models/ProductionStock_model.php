<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ProductionStock_model extends CI_Model{
	public function __construct()
    {
        parent::__construct();
    }
    public function getClassinfoTable($param){
		$arOrder = array('','item_name');
		$searchValue =($param['searchValue'])?$param['searchValue']:'';
        if($searchValue){
            $this->db->like('tbl_production_itemlist.item_name', $searchValue);
        }
        $this->db->where("item_status",1);
        if ($param['start'] != 'false' and $param['length'] != 'false') {
        	$this->db->limit($param['length'],$param['start']);
        }
		$this->db->select('*');
		$this->db->from('tbl_production_details');
        $this->db->join('tbl_production_itemlist','tbl_production_itemlist.item_id=tbl_production_details.production_item_id_fk','left');
        $this->db->join('tbl_unit','tbl_unit.unit_id=tbl_production_details.production_unit_id_fk','left');
        $this->db->join('tbl_integration_stock','tbl_integration_stock.integration_stock_type=tbl_production_details.production_chicken_type','left');
		$this->db->order_by('production_id', 'DESC');
        $query = $this->db->get();
        $data['data'] = $query->result();
        $data['recordsTotal'] = $this->getClassinfoTotalCount($param);
        $data['recordsFiltered'] = $this->getClassinfoTotalCount($param);
        return $data;
	}
	public function getClassinfoTotalCount($param = NULL){
		$searchValue =($param['searchValue'])?$param['searchValue']:'';
        if($searchValue){
            $this->db->like('tbl_production_itemlist.item_name', $searchValue);
        }
		$this->db->select('*');
		$this->db->from('tbl_production_details');
        $this->db->join('tbl_production_itemlist','tbl_production_itemlist.item_id=tbl_production_details.production_item_id_fk','left');
        $this->db->join('tbl_unit','tbl_unit.unit_id=tbl_production_details.production_unit_id_fk','left');
        $this->db->join('tbl_integration_stock','tbl_integration_stock.integration_stock_type=tbl_production_details.production_chicken_type','left');
		$this->db->order_by('production_id', 'DESC');
        $query = $this->db->get();
    	return $query->num_rows();
    }


}
?>
