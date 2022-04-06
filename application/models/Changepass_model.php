<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Changepass_model extends CI_Model{

	public function __construct()
    {
        parent::__construct();
    }
	public function getChangepassReport($param){
        $arOrder = array('','email');
        $email =(isset($param['email']))?$param['email']:'';

        if($emailv){
            $this->db->like('email', $email);
        }


        if ($param['start'] != 'false' and $param['length'] != 'false') {
            $this->db->limit($param['length'],$param['start']);
        }
		$this->db->select('*');
		$this->db->from('tbl_login');
		//$this->db->join('tbl_category','category_id = category_id_fk');
		$this->db->order_by('id', 'DESC');
        $query = $this->db->get();

		$data['data'] = $query->result();
        $data['recordsTotal'] = $this->getChangepassReportTotalCount($param);
        $data['recordsFiltered'] = $this->getChangepassReportTotalCount($param);
        return $data;

	}
	public function getChangepassReportTotalCount($param){
        $email =(isset($param['email']))?$param['email']:'';
		if($email){
            $this->db->like('email', $email);
        }
		$this->db->where("status",1);
		$this->db->select('*');
		$this->db->from('tbl_login');
		//$this->db->join('tbl_category','category_id = category_id_fk');
		$this->db->order_by('id', 'DESC');
        $query = $this->db->get();
		return $query->num_rows();
	}
	function get_Changepass()
	{
		$this->db->select('*');
		$this->db->from('tbl_login');
		$this->db->where('status',1);
		$query = $this->db->get();
		return $query->result();
	}

	public function view_by()
	{
		$this->db->select('*');
		$this->db->from('tbl_login');
		$this->db->where('status', 1);
		$query = $this->db->get();

		$emails = array();
		if ($query -> result()) {
		foreach ($query->result() as $email) {
		$emails[$email-> id] = $email -> email;
			}
		return $emails;
		} else {
		return FALSE;
		}
	}

	public function getrlogin($rid)
	{
		$this->db->select('*');
		$this->db->from('tbl_rlogin');

		$this->db->where('r_status', 1);
		$this->db->where('r_region_id', $rid);

		$query=$this->db->get();
		 if($query->num_rows() > 0)
        {
            return $query->row();
        }
        return false;
	}

	public function getlogin($rid)
	{
		$this->db->select('*');
		$this->db->from('tbl_login');

		$this->db->where('status', 1);
		$this->db->where('rid', $rid);

		$query=$this->db->get();
		 if($query->num_rows() > 0)
        {
            return $query->row();
        }
        return false;
	}
}
?>
