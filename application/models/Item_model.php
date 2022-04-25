<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Item_model extends CI_Model{

	public function __construct()
    {
        parent::__construct();
    }


	public function view_by()
	{
		$status=1;
		$this->db->select('*');
		$this->db->from('tbl_product');
		$this->db->where('product_status', $status);
		$query = $this->db->get();
		return $query->result();
	}



}
?>
