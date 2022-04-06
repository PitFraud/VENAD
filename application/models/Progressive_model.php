<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Progressive_model extends CI_Model{

	public function __construct()
	{
		parent::__construct();
	}

    public function getProgressiveReport($param)
    {
        $arOrder = array('','item_name');
		$searchValue =($param['searchValue'])?$param['searchValue']:'';
		if($searchValue){
			$this->db->like('item_name', $searchValue);
		}
		// $this->db->where("allotmen",1);
		if ($param['start'] != 'false' and $param['length'] != 'false') {
			$this->db->limit($param['length'],$param['start']);
		}

        $this->db->select('item_id,item_name,COALESCE(tbl_dist.created_at,null) AS batch_date,COALESCE(alloted_qty,0) AS alloted_qty,COALESCE(total_supply,0) AS total_supply,item_status');
        $this->db->from('tbl_production_itemlist');
        $this->db->join('(SELECT dist_item_id_fk,created_at,SUM(COALESCE(dist_quantity_fk,0)) AS alloted_qty,COUNT(dist_item_id_fk) AS total_supply FROM tbl_distributions WHERE dist_status = 1 GROUP BY dist_item_id_fk ) AS tbl_dist','tbl_dist.dist_item_id_fk=tbl_production_itemlist.item_id','left');
        $this->db->where('item_status',1);
        $query = $this->db->get();
		$data['data'] = $query->result();
		$data['recordsTotal'] = $this->getProgressiveReportCount($param);
		$data['recordsFiltered'] = $this->getProgressiveReportCount($param);
        return $data;
    }

    public function getProgressiveReportCount($param)
    {
        $searchValue =($param['searchValue'])?$param['searchValue']:'';
		if($searchValue){
			$this->db->like('item_name', $searchValue);
		}
        $this->db->select('item_id,item_name,COALESCE(tbl_dist.created_at,null) AS batch_date,COALESCE(alloted_qty,0) AS alloted_qty,COALESCE(total_supply,0) AS total_supply,item_status');
        $this->db->from('tbl_production_itemlist');
        $this->db->join('(SELECT dist_item_id_fk,created_at,SUM(COALESCE(dist_quantity_fk,0)) AS alloted_qty,COUNT(dist_item_id_fk) AS total_supply FROM tbl_distributions WHERE dist_status = 1 GROUP BY dist_item_id_fk ) AS tbl_dist','tbl_dist.dist_item_id_fk=tbl_production_itemlist.item_id','left');
        $this->db->where('item_status',1);
        $query = $this->db->get();
		return $query->num_rows();
    }
}
?>
