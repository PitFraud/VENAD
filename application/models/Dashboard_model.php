<?php
Class Dashboard_model extends CI_Model{
	public function fin_year()
	{
		$this->db->where('fin_status',1);
		$query=$this->db->get('tbl_finyear');
		return $query->row();
	}
	public function customers()
	{
		$this->db->where('custstatus',1);
		$query=$this->db->get('tbl_customer');
		return $query->num_rows();
	}
	public function vendors()
	{
		$this->db->where('vendorstatus ',1);
		$query=$this->db->get('tbl_vendor');
		return $query->num_rows();
	}
	public function stock()
	{
		$this->db->select('stockid');
		$this->db->from('tbl_stock');
		$this->db->where('status', 1);
		$query=$this->db->get();
		return $query->num_rows();
	}
	public function masterstock()
	{
		$this->db->select('master_stockid');
		$this->db->from('tbl_masterstock');
		$this->db->where('masterstatus', 1);
		$query=$this->db->get();
		return $query->num_rows();
	}
	public function stockavilable()
	{
		$this->db->select('master_stockid');
		$this->db->from('tbl_masterstock');
		$this->db->where('master_stock >', 10);
		$this->db->where('masterstatus', 1);
		$query=$this->db->get();
		return $query->num_rows();
	}
	public function stockunavilable()
	{
		$this->db->select('master_stockid');
		$this->db->from('tbl_masterstock');
		$this->db->where('master_stock =', 0);
		$this->db->where('masterstatus', 1);
		$query=$this->db->get();
		return $query->num_rows();
	}
	public function stock_reachedbelow()
	{
		$this->db->select('master_stockid');
		$this->db->from('tbl_masterstock');
		$this->db->where('master_stock <', 10);
		$this->db->where('master_stock >', 0);
		$this->db->where('masterstatus', 1);
		$query=$this->db->get();
		return $query->num_rows();
	}
	public function getBranch()
	{
		$this->db->select('*');
		$this->db->from('tbl_shop');
		$this->db->where('status',1);
		$this->db->order_by('shpid','ASC');
		$this->db->limit('5');
        $query = $this->db->get();
    	return $query->result();
	}
	public function shop()
	{
		$this->db->where('status',1);
		$query=$this->db->get('tbl_shop');
		return $query->num_rows();
	}
	public function log_id()
	{
		$this->db->select('masterlog_id');
		$this->db->from('tbl_masterlog');
		$this->db->order_by('masterlog_id','DESC');
		$this->db->limit(1);
		$this->db->where('masterlog_status', 1);
		$query=$this->db->get();
		return $query->result();
	}
	public function stock_movement($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_stock');
		$this->db->join('tbl_product','tbl_product.product_id = product_id_fk');
		//$this->db->join('tbl_size','tbl_size.size_id = size_id_fk');
		$this->db->where('masterlog_id_fk',$id);
		$this->db->where('status', 1);
		$query=$this->db->get();
		return $query->result();
	}
	public function products()
	{
		$this->db->where('product_status',1);
		$query=$this->db->get('tbl_product');
		return $query->num_rows();
	}
	public function purchases()
	{
		$this->db->where('purchase_status',1);
		$query=$this->db->get('tbl_purchase');
		return $query->num_rows();
	}
	public function sales()
	{
		$this->db->where('sale_status',1);
		$query=$this->db->get('tbl_sale');
		return $query->num_rows();
	}
	public function masterstockdetails()
	{
		$this->db->select('*');
		$this->db->from('tbl_masterstock');
		$this->db->join('tbl_product','tbl_product.product_id = product_id_fk');
		// $this->db->join('tbl_category','tbl_category.category_id = tbl_product.category_id_fk');
		// $this->db->join('tbl_size','tbl_size.size_id = size_id_fk');
		$this->db->where('masterstatus', 1);
		$query=$this->db->get();
		return $query->result();
	}
	public function getpanchayath($pid)
	{
		$this->db->select('*,count(tbl_member.member_id) AS member_count');
		$this->db->from('tbl_panchayath');
		$this->db->join('tbl_district','panchayath_district= district_id');
		$this->db->join('tbl_member','member_panchayath = panchayath_id');
		$this->db->where('panchayath_status', 1);
		$this->db->where('panchayath_id',$pid);
		$query=$this->db->get();
		 if($query->num_rows() > 0)
        {
            return $query->row();
        }
        return false;
	}
	public function getpmember($pid)
	{
		$this->db->select('*,count(tbl_member.member_id) AS member_count');
		$this->db->from('tbl_member');
		$this->db->where('member_status', 1);
		$this->db->where('member_panchayath',$pid);
		$query=$this->db->get();
		 if($query->num_rows() > 0)
        {
            return $query->row();
        }
        return false;
	}
	public function getregion($rid)
	{
		$this->db->select('*,count(tbl_cag.cag_id) AS rcag_count');
		$this->db->from('tbl_unit');
		$this->db->where('cag_status', 1);
		$this->db->where('unit_id', $rid);
		$this->db->join('tbl_cag','cag_unit = unit_id');
		$query=$this->db->get();
		 if($query->num_rows() > 0)
        {
            return $query->row();
        }
        return false;
	}
		public function getRpanchayath($rid)
	{
		$this->db->select('*');
		$this->db->from('tbl_cag');
		$this->db->join('tbl_fedaration','cag_fedaration = fedaration_id');
		//$this->db->where("cag_status",1);
		$this->db->where('cag_unit',$rid);
        $this->db->group_by('tbl_cag.cag_fedaration');
		//$this->db->order_by('tbl_cag.cag_id', 'ASC');
        $query = $this->db->get();
    	return $query->num_rows();
	}
	public function getRmember($rid)
	{
		$this->db->select('*');
		$this->db->from('tbl_cag');
		$this->db->where('member_status', 1);
		$this->db->where('cag_status', 1);
		$this->db->where('cag_unit',$rid);
		$this->db->join('tbl_member','member_group = cag_id');
		$query = $this->db->get();
    	return $query->num_rows();
	}
	//Dashboard main login
	//-----------
	public function getadminpanchayath()
	{
		$this->db->where('panchayath_status',1);
		$query=$this->db->get('tbl_panchayath');
		return $query->num_rows();
	}
	public function getmember()
	{
		$this->db->where('member_status',1);
		$query=$this->db->get('tbl_member');
		return $query->num_rows();
	}
	public function getemployee()
	{
		$this->db->where('emp_status',1);
		$query=$this->db->get('tbl_employee');
		return $query->num_rows();
	}
	public function getfeeds()
	{
		$this->db->select('*,sum(purchase_quantity) as purchase_quantity');
		$this->db->from('tbl_feed_purchase');
		$this->db->join('tbl_unit','unit_id=purchase_unit_fk');
		$this->db->where('purchase_status', 1);
		$query=$this->db->get();
		 if($query->num_rows() > 0)
        {
            return $query->row();
        }
        return false;
	}
	public function getchicks()
	{
		$this->db->select('*,sum(product_stock) as product_stock');
		$this->db->from('tbl_product');
		$this->db->where('product_status', 1);
		$this->db->where('product_type', 1);
		$query=$this->db->get();
		 if($query->num_rows() > 0)
        {
            return $query->row();
        }
        return false;
	}
	public function getproducts()
	{
		$status=1;
		$this->db->select('*');
		$this->db->from('tbl_production_itemlist');
		$this->db->where('item_status', $status);
		$this->db->order_by('item_id');
		$query = $this->db->get();
		return $query->result();
	}
public function getallotment()
	{
		$this->db->select('*,sum(allot_quantity) as allot_quantity');
		$this->db->from('tbl_allotment');
		$this->db->where('allot_status', 1);
		$query=$this->db->get();
		 if($query->num_rows() > 0)
        {
            return $query->row();
        }
        return false;
	}
	public function getrec()
	{
		$this->db->select('*,sum(rec_quantity) as rec_quantity');
		$this->db->from('tbl_receive_back');
		$this->db->where('rec_status', 1);
		$query=$this->db->get();
		 if($query->num_rows() > 0)
        {
            return $query->row();
        }
        return false;
	}
	public function getfeed()
	{
		$this->db->select('*,sum(feeds_quantity) as feeds_quantity');
		$this->db->from('tbl_feeds');
		$this->db->where('feeds_status', 1);
		$query=$this->db->get();
		 if($query->num_rows() > 0)
        {
            return $query->row();
        }
        return false;
	}
	public function getsharemember($mem_id)
	{
		$this->db->select('*');
		$this->db->from('tbl_member');
		$this->db->join('tbl_login','mem_id=member_id');
		$this->db->join('tbl_state','member_state= state_id','left');
		$this->db->join('tbl_district','member_district= district_id','left');
		$this->db->join('tbl_panchayath','member_panchayath= panchayath_id','left');
		$this->db->where('status', 1);
		$this->db->where('member_id', $mem_id);
		$this->db->where('user_type',1);
		$query=$this->db->get();
		 if($query->num_rows() > 0)
        {
            return $query->row();
        }
        return false;
	}
	public function getsharefeed($mem_id)
	{
		$this->db->select('*,sum(feeds_quantity) as feeds_quantity');
		$this->db->from('tbl_feeds');
		$this->db->join('tbl_allotment','allot_id=feeds_allotment_fk');
		$this->db->where('allot_member_id_fk', $mem_id);
		$this->db->where('feeds_status', 1);
		$query=$this->db->get();
		 if($query->num_rows() > 0)
        {
            return $query->row();
        }
        return false;
	}
	public function getsallotment($mem_id)
	{
		$this->db->select('*,sum(allot_quantity) as allot_quantity');
		$this->db->from('tbl_allotment');
		$this->db->where('allot_status', 1);
		$this->db->where('allot_member_id_fk', $mem_id);
		$query=$this->db->get();
		 if($query->num_rows() > 0)
        {
            return $query->row();
        }
        return false;
	}
	public function get_notifications(){
		$day_before_yesterday = date('Y-m-d',strtotime("-2 days"));
		$yesterday = date('Y-m-d',strtotime("-1 days"));
		$query=$this->db->select('*')->order_by('reminder_date','DESC')->limit(6)->get('tbl_reminders');
		$result=$query->result();
		return $result;
	}
	public function getBranchDetails($param)
    {
		$searchValue =($param['searchValue'])?$param['searchValue']:'';
		if($searchValue){
			$this->db->like('branch_name', $searchValue);
			$this->db->or_like('branch_address', $searchValue);
		}
		if ($param['start'] != 'false' and $param['length'] != 'false') {
			$this->db->limit($param['length'],$param['start']);
		}
        $this->db->select('*');
        $this->db->from('tbl_branch');
        $this->db->where('branch_status',1);
        $query = $this->db->get();
        $data['data'] = $query->result();
        $data['recordsTotal'] = $this->getBranchDetailsCount($param);
		$data['recordsFiltered'] = $this->getBranchDetailsCount($param);
        return $data;
    }
    public function getBranchDetailsCount($param)
    {
		$searchValue =($param['searchValue'])?$param['searchValue']:'';
		if($searchValue){
			$this->db->like('branch_name', $searchValue);
			$this->db->or_like('branch_address', $searchValue);
		}
        $this->db->select('*');
        $this->db->from('tbl_branch');
        $this->db->where('branch_status',1);
        $query = $this->db->get();
        return $query->num_rows();
    }
	public function getEstablishmentsDetails($param)
    {
		$searchValue =($param['searchValue'])?$param['searchValue']:'';
		if($searchValue){
			$this->db->like('member_name', $searchValue);
			$this->db->or_like('member_mid', $searchValue);
		}
		if ($param['start'] != 'false' and $param['length'] != 'false') {
			$this->db->limit($param['length'],$param['start']);
		}
        $this->db->select('*');
        $this->db->from('tbl_member');
        $this->db->where('member_status',1);
		$this->db->where_in('member_type',['0','2']);
        $query = $this->db->get();
        $data['data'] = $query->result();
        $data['recordsTotal'] = $this->getEstablishmentsDetailsCount($param);
		$data['recordsFiltered'] = $this->getEstablishmentsDetailsCount($param);
        return $data;
    }
    public function getEstablishmentsDetailsCount($param)
    {
		$searchValue =($param['searchValue'])?$param['searchValue']:'';
		if($searchValue){
			$this->db->like('member_name', $searchValue);
			$this->db->or_like('member_mid', $searchValue);
		}
		$this->db->select('*');
        $this->db->from('tbl_member');
        $this->db->where('member_status',1);
		$this->db->where_in('member_type',['0','2']);
        $query = $this->db->get();
        return $query->num_rows();
    }
	public function getLicensesDetails($param)
    {
		$searchValue =($param['searchValue'])?$param['searchValue']:'';
		if($searchValue){
			$this->db->like('branch_name', $searchValue);
			$this->db->or_like('branch_address', $searchValue);
		}
		if ($param['start'] != 'false' and $param['length'] != 'false') {
			$this->db->limit($param['length'],$param['start']);
		}
        $this->db->select('*');
        $this->db->from('tbl_licenses');
        $this->db->where('license_status',1);
		//$this->db->where_in('member_type',['0','2']);
        $query = $this->db->get();
        $data['data'] = $query->result();
        $data['recordsTotal'] = $this->getLicensesDetailsCount($param);
		$data['recordsFiltered'] = $this->getLicensesDetailsCount($param);
        return $data;
    }
    public function getLicensesDetailsCount($param)
    {
		$searchValue =($param['searchValue'])?$param['searchValue']:'';
		if($searchValue){
			$this->db->like('branch_name', $searchValue);
			$this->db->or_like('branch_address', $searchValue);
		}
		$this->db->select('*');
        $this->db->from('tbl_licenses');
        $this->db->where('license_status',1);
		//$this->db->where_in('member_type',['0','2']);
        $query = $this->db->get();
        return $query->num_rows();
    }
}
?>
