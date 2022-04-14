<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class General_model extends CI_Model{
	public function __construct()
    {
        parent::__construct();
    }
	// Return all records in the table
    public function get_all($table)
    {
        $q = $this->db->get($table);
        if($q->num_rows() > 0)
        {
            return $q->result();
        }
        return array();
    }
	// Return all records from the table based on id
    public function getall($table,$id)
    {
		$this->db->where($id);
        $q = $this->db->get($table);
        if($q->num_rows() > 0)
        {
            return $q->result();
        }
        return array();
    }
    // Return only one row
    public function get_row($table,$primaryfield,$id)
    {
        $this->db->where($primaryfield,$id);
        $q = $this->db->get($table);
        if($q->num_rows() > 0)
        {
            return $q->row();
        }
        return false;
    }
    public function get_rowLoan($table,$primaryfield,$id)
    {
        $this->db->select('*,tbl_member.member_name,tbl_member.member_id,');
        $this->db->from('tbl_loan');
        $this->db->join('tbl_member','loan_member = member_id');
        $this->db->where($primaryfield,$id);
        $q = $this->db->get();
        if($q->num_rows() > 0)
        {
            return $q->row();
        }
        return false;
    }
    public function get_rowCag($table,$primaryfield,$id)
    {
        $this->db->where($primaryfield,$id);
        $q = $this->db->get($table);
        if($q->num_rows() > 0)
        {
            return $q->row();
        }
        return false;
    }
 
    // Return one only field value
    public function get_data($table,$primaryfield,$fieldname,$id)
    {
        $this->db->select($fieldname);
        $this->db->where($primaryfield,$id);
        $q = $this->db->get($table);
        if($q->num_rows() > 0)
        {
            return $q->result();
        }
        return array();
    }
    // Insert into table
    public function add($table,$data)
    {
        return $this->db->insert($table, $data);
    }
    public function addCag($table,$data)
    {
        return $this->db->insert($table, $data);
    }
    
    // Insert into table and return last insert id
    public function add_returnID($table,$data)
    {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
       
    }
    // Update data to table
    public function update($table,$data,$primaryfield,$id)
    {
        $this->db->where($primaryfield, $id);
        $q = $this->db->update($table, $data);
        return $q;
    }
    public function deleteCag($table,$data,$primaryfield,$id)
    {
        $this->db->where($primaryfield, $id);
        $q = $this->db->update($table, $data);
        return $q;
    }
     public function updateCag($table,$data,$primaryfield,$id)
    {
        $this->db->where($primaryfield, $id);
        $q = $this->db->update($table, $data);
        return $q;
    }
	// Update data to table
    public function updat($table,$data,$primaryfield,$id,$secondaryfield,$id1)
    {
        $this->db->where($primaryfield, $id);
		$this->db->where($secondaryfield, $id1);
        $q = $this->db->update($table, $data);
        return $q;
    }
	// Update data to table
    public function upda($table,$data,$primaryfield,$id,$secondaryfield,$idk,$thirdfield,$idke)
    {
        $this->db->where($primaryfield, $id);
		$this->db->where($secondaryfield, $idk);
		$this->db->where($thirdfield, $idke);
        $q = $this->db->update($table, $data);
        return $q;
    }
	// Update data to table without ID
    public function updatefin($table,$data)
    {
        $q = $this->db->update($table, $data);
        return $q;
    }
     // Delete record from table
    public function delete($table,$primaryfield,$id)
    {
    	$this->db->where($primaryfield,$id);
    	$this->db->delete($table);
    }
     // Check whether a value has duplicates in the database
    public function has_duplicate($value, $tabletocheck, $fieldtocheck)
    {
        $this->db->select($fieldtocheck);
        $this->db->where($fieldtocheck,$value);
        $result = $this->db->get($tabletocheck);
        if($result->num_rows() > 0) {
            return true;
        }
        else {
            return false;
        }
    }
     // Check whether the field has any reference from other table
    // Normally to check before delete a value that is a foreign key in another table
    public function has_child($value, $tabletocheck, $fieldtocheck)
    {
        $this->db->select($fieldtocheck);
        $this->db->where($fieldtocheck,$value);
        $result = $this->db->get($tabletocheck);
        if($result->num_rows() > 0) {
            return true;
        }
        else {
            return false;
        }
    }
     // Return an array to use as reference or dropdown selection
    public function get_ref($table,$key,$value,$dropdown=false)
    {
        $this->db->from($table);
        $this->db->order_by($value);
        $result = $this->db->get();
        $array = array();
        if ($dropdown)
            $array = array("" => "Please Select");
        if($result->num_rows() > 0) {
            foreach($result->result_array() as $row) {
            $array[$row[$key]] = $row[$value];
            }
        }
        return $array;
    }
    public function admin_data($user_id){
        $this->db->select('*');
         $this->db->from('admin_login');
         $this->db->where('id',$user_id);
         $query = $this->db->get();
         return $query->row();
    }
    public function getAdminData($id){
        $this->db->select('*');
        $this->db->from('admin_login');
        $this->db->where("id",$id);
        $query = $this->db->get();
        return $query->row();
    }
    public function view_by()
    {
        $status=1;
        $this->db->select('*');
        $this->db->from('districts');
        // $this->db->where('animator_status', $status);
        $this->db->order_by('id');
        $query = $this->db->get();
        return $query->result();
      /*  $districts = array();
        if ($query -> result()) {
            foreach ($query->result() as $key) {
                $districts[$key-> id] = $key -> districts;
            }
            return $districts;
        } else {
            return FALSE;
        }*/
    }
    public function gfedloan_update($upnrm_gfedloan_id,$new_gfedloan_issue_loanamt,$new_gfedloan_balance)
    {
        $this->db->set('gfedloan_issue_loanamt', $new_gfedloan_issue_loanamt);
        $this->db->set('gfedloan_balance', $new_gfedloan_balance);
        $this->db->where('gfedloan_id', $upnrm_gfedloan_id);
        $this->db->update('tbl_group_fedaration_loan'); 
    }
    public function get_loan($upnrmloan_id)
    {
        $this->db->select('upnrmloan_amount,upnrm_gfedloan_id');
        $this->db->from('tbl_upnrmloan');
        $this->db->where('upnrmloan_id',$upnrmloan_id);
        $query = $this->db->get();
        return $query->result();
    }
    public function get_gfedloan($upnrm_gfedloan_id)
    {
        $this->db->select('gfedloan_issue_loanamt,gfedloan_balance');
        $this->db->from('tbl_group_fedaration_loan');
        $this->db->where('gfedloan_id',$upnrm_gfedloan_id);
        $query = $this->db->get();
        return $query->result();
    }
    public function gbankloan_update($ksbcdc_gbankloan_id,$new_gbankloan_issue_loanamt,$new_gbankloan_balance)
    {
        $this->db->set('gbankloan_issue_loanamt', $new_gbankloan_issue_loanamt);
        $this->db->set('gbankloan_balance', $new_gbankloan_balance);
        $this->db->where('gbankloan_id', $ksbcdc_gbankloan_id);
        $this->db->update('tbl_group_bank_loan'); 
    }
    public function get_ksbcdcloan($ksbcdcloan_id)
    {
        $this->db->select('ksbcdcloan_amount,ksbcdc_gbankloan_id');
        $this->db->from('tbl_ksbcdcloan');
        $this->db->where('ksbcdcloan_id',$ksbcdcloan_id);
        $query = $this->db->get();
        return $query->result();
    }
    public function get_gbankloan($ksbcdc_gbankloan_id)
    {
        $this->db->select('gbankloan_issue_loanamt,gbankloan_balance');
        $this->db->from('tbl_group_bank_loan');
        $this->db->where('gbankloan_id',$ksbcdc_gbankloan_id);
        $query = $this->db->get();
        return $query->result();
    }
    public function gpdsloan_update($hds_gpdsloan_id,$new_gpdsloan_issue_loanamt,$new_gpdsloan_balance)
    {
        $this->db->set('gpdsloan_issue_loanamt', $new_gpdsloan_issue_loanamt);
        $this->db->set('gpdsloan_balance', $new_gpdsloan_balance);
        $this->db->where('gpdsloan_id', $hds_gpdsloan_id);
        $this->db->update('tbl_group_pds_loan'); 
    }
    public function get_hdsloan($hdsloan_id)
    {
        $this->db->select('hdsloan_amount,hds_gpdsloan_id');
        $this->db->from('tbl_hdsloan');
        $this->db->where('hdsloan_id',$hdsloan_id);
        $query = $this->db->get();
        return $query->result();
    }
    public function get_gpdsloan($hds_gpdsloan_id)
    {
        $this->db->select('gpdsloan_issue_loanamt,gpdsloan_balance');
        $this->db->from('tbl_group_pds_loan');
        $this->db->where('gpdsloan_id',$hds_gpdsloan_id);
        $query = $this->db->get();
        return $query->result();
    }
     public function get_grouploan($loan_loan_id)
    {
        $this->db->select('loan_refund,loan_repayment,loan_intrest_amt,paid_intrest');
        $this->db->from('tbl_loan');
        $this->db->where('loan_id',$loan_loan_id);
        $query = $this->db->get();
        return $query->result();
    }
      public function get_grouploan_repayment($loan_repayment_id)
    {
        $this->db->select('loan_repayment_amt,loan_intrest_amt');
        $this->db->from('tbl_loan_repayment');
        $this->db->where('loan_repayment_id',$loan_repayment_id);
        $query = $this->db->get();
        return $query->result();
    }
    public function grouploan_update($loan_loan_id,$new_loan_refund,$new_loan_repayment,$new_intrest_amt,$new_paid_intrest)
    {
        $this->db->set('loan_refund', $new_loan_refund);
        $this->db->set('loan_repayment', $new_loan_repayment);
        $this->db->set('loan_intrest_amt', $new_intrest_amt);
        $this->db->set('paid_intrest', $new_paid_intrest);
        $this->db->where('loan_id', $loan_loan_id);
        $this->db->update('tbl_loan');
    }
    //upnrmloan
     public function get_fedloan($upnrmloan_internalid)
    {
        $this->db->select('upnrmloan_refund,upnrmloan_repayment,upnrm_intrest_amt,paid_intrest');
        $this->db->from('tbl_upnrmloan');
        $this->db->where('upnrmloan_id',$upnrmloan_internalid);
        $query = $this->db->get();
        return $query->result();
    }
      public function get_fedloan_repayment($upnrmloan_repayment_id)
    {
        $this->db->select('upnrmloan_repayment_amt,upnrmloan_intrest_amt');
        $this->db->from('tbl_upnrmloan_repayment');
        $this->db->where('upnrmloan_repayment_id',$upnrmloan_repayment_id);
        $query = $this->db->get();
        return $query->result();
    }
    public function fedloan_update($upnrmloan_internalid,$new_upnrmloan_refund,$new_upnrmloan_repayment,$new_intrest_amt,$new_paid_intrest)
    {
        $this->db->set('upnrmloan_refund', $new_upnrmloan_refund);
        $this->db->set('upnrmloan_repayment', $new_upnrmloan_repayment);
        $this->db->set('upnrm_intrest_amt', $new_intrest_amt);
        $this->db->set('paid_intrest', $new_paid_intrest);
        $this->db->where('upnrmloan_id', $upnrmloan_internalid);
        $this->db->update('tbl_upnrmloan');
    }
     //pdsloan
     public function get_hdsloans($hdsloan_internalid)
    {
        $this->db->select('hdsloan_refund,hdsloan_repayment,hdsloan_intrest_amt,paid_intrest');
        $this->db->from('tbl_hdsloan');
        $this->db->where('hdsloan_id',$hdsloan_internalid);
        $query = $this->db->get();
        return $query->result();
    }
      public function get_hdsloan_repayment($hdsloan_repayment_id)
    {
        $this->db->select('hdsloan_repayment_amt,hdsloan_intrest_amt');
        $this->db->from('tbl_hdsloan_repayment');
        $this->db->where('hdsloan_repayment_id',$hdsloan_repayment_id);
        $query = $this->db->get();
        return $query->result();
    }
    public function hdsloan_update($hdsloan_internalid,$new_hdsloan_refund,$new_hdsloan_repayment,$new_intrest_amt,$new_paid_intrest)
    {
        $this->db->set('hdsloan_refund', $new_hdsloan_refund);
        $this->db->set('hdsloan_repayment', $new_hdsloan_repayment);
        $this->db->set('hdsloan_intrest_amt', $new_intrest_amt);
        $this->db->set('paid_intrest', $new_paid_intrest);
        $this->db->where('hdsloan_id', $hdsloan_internalid);
        $this->db->update('tbl_hdsloan');
    }
     //bank loan
     public function get_ksbcdcloans($ksbcdcloan_internalid)
    {
        $this->db->select('ksbcdcloan_refund,ksbcdcloan_repayment,ksbcdcloan_intrest_amt,paid_intrest');
        $this->db->from('tbl_ksbcdcloan');
        $this->db->where('ksbcdcloan_id',$ksbcdcloan_internalid);
        $query = $this->db->get();
        return $query->result();
    }
      public function get_ksbcdcloan_repayment($ksbcdcloan_repayment_id)
    {
        $this->db->select('ksbcdcloan_repayment_amt,ksbcdcloan_intrest_amt');
        $this->db->from('tbl_ksbcdcloan_repayment');
        $this->db->where('ksbcdcloan_repayment_id',$ksbcdcloan_repayment_id);
        $query = $this->db->get();
        return $query->result();
    }
    public function ksbcdcloan_update($ksbcdcloan_internalid,$new_ksbcdcloan_refund,$new_ksbcdcloan_repayment,$new_intrest_amt,$new_paid_intrest)
    {
        $this->db->set('ksbcdcloan_refund', $new_ksbcdcloan_refund);
        $this->db->set('ksbcdcloan_repayment', $new_ksbcdcloan_repayment);
        $this->db->set('ksbcdcloan_intrest_amt', $new_intrest_amt);
        $this->db->set('paid_intrest', $new_paid_intrest);
        $this->db->where('ksbcdcloan_id', $ksbcdcloan_internalid);
        $this->db->update('tbl_ksbcdcloan');
    }
    //delete add_on_loan 
     public function get_add_on_loan($add_on_loan_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_add_on_loan');
        $this->db->where('add_on_loan_id',$add_on_loan_id);
        $query = $this->db->get();
        return $query->result();
    }
     public function get_grouploan_addon($group_loan_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_loan');
        $this->db->where('loan_id',$group_loan_id);
        $query = $this->db->get();
        return $query->result();
    }
    public function addon_loan_update($group_loan_id,$new_loan_refund,$new_add_on_loan,$new_loan_outstand)
    {
        $this->db->set('loan_refund', $new_loan_refund);
        $this->db->set('add_on_loan', $new_add_on_loan);
        $this->db->set('loan_outstand', $new_loan_outstand);
        $this->db->where('loan_id', $group_loan_id);
        $this->db->update('tbl_loan');
    }
     public function update_stock($nwstk,$product_id){
        $date=date('Y-m-d');
        $this->db->set('product_stock', $nwstk);
        $this->db->set('product_update_date', $date);
        $this->db->where('product_id', $product_id);
        $this->db->update('tbl_product'); 
    }
}
?>