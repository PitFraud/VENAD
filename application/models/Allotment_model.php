<?php
ob_Start();
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Allotment_model extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
	public function getAllotments($param){
		$arOrder = array('','product_name');
		$searchValue =($param['searchValue'])?$param['searchValue']:'';
		if($searchValue){
			$this->db->like('product_name', $searchValue);
		}
		// $this->db->where("allotmen",1);
		if ($param['start'] != 'false' and $param['length'] != 'false') {
			$this->db->limit($param['length'],$param['start']);
		}
		$query=$this->db->select('*,tbl_allotment.created_at as allotment_date,tbl_vaccination.vaccination_name as vaccinenamedays, DATE_ADD(tbl_allotment.created_at, INTERVAL tbl_vaccination.vaccination_days DAY) AS vaccination_date, DATE_SUB(DATE_ADD(tbl_allotment.created_at, INTERVAL tbl_vaccination.vaccination_days DAY), INTERVAL 2 DAY) AS beforetwodays')
		->join('tbl_vaccination','tbl_vaccination.vaccination_id=tbl_allotment.allot_vaccine_fk','left')
		->join('tbl_product','tbl_product.product_id=tbl_allotment.allot_item_id','left')
		->join('tbl_unit','tbl_unit.unit_id=tbl_allotment.allot_unit_fk','left')
		->join('tbl_member','tbl_member.member_id=tbl_allotment.allot_member_id_fk','left')
		->join('tbl_member_type','tbl_member_type.member_type_id=tbl_member.member_type','left')
		->order_by('tbl_allotment.allot_id','DESC')->get('tbl_allotment');
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
	public function getAllot($param,$mem_id){
		$arOrder = array('','product_name');
		$searchValue =($param['searchValue'])?$param['searchValue']:'';
		if($searchValue){
			$this->db->like('product_name', $searchValue);
		}
		$this->db->where("allot_member_id_fk",$mem_id);
		if ($param['start'] != 'false' and $param['length'] != 'false') {
			$this->db->limit($param['length'],$param['start']);
		}
		$query=$this->db->select('*,tbl_allotment.created_at as allotment_date,tbl_vaccination.vaccination_name as vaccinenamedays, DATE_ADD(tbl_allotment.created_at, INTERVAL tbl_vaccination.vaccination_days DAY) AS vaccination_date, DATE_SUB(DATE_ADD(tbl_allotment.created_at, INTERVAL tbl_vaccination.vaccination_days DAY), INTERVAL 2 DAY) AS beforetwodays')
		->join('tbl_vaccination','tbl_vaccination.vaccination_id=tbl_allotment.allot_vaccine_fk')
		->join('tbl_product','tbl_product.product_id=tbl_allotment.allot_item_id','left')
		->join('tbl_unit','tbl_unit.unit_id=tbl_allotment.allot_unit_fk','left')
		->join('tbl_member','tbl_member.member_id=tbl_allotment.allot_member_id_fk','left')
		->join('tbl_member_type','tbl_member_type.member_type_id=tbl_member.member_type','left')
		->order_by('tbl_allotment.allot_id','DESC')->get('tbl_allotment');
		$data['data'] = $query->result();
		$data['recordsTotal'] = $this->getClassinfoallotTotalCount($param,$mem_id);
		$data['recordsFiltered'] = $this->getClassinfoallotTotalCount($param,$mem_id);
		return $data;
	}
	public function getClassinfoallotTotalCount($param = NULL,$mem_id){
		$searchValue =($param['searchValue'])?$param['searchValue']:'';
		if($searchValue){
			$this->db->like('product_name', $searchValue);
		}
		$this->db->select('*');
		$this->db->from('tbl_allotment');
		$this->db->where("allot_status",1);
		$this->db->where("allot_member_id_fk",$mem_id);
		$this->db->order_by('allot_id', 'ASCE');
		$query = $this->db->get();
		return $query->num_rows();
	}
	public function getallotment($allot_id)
	{
		$this->db->select('*,tbl_allotment.created_at as created_at');
		$this->db->from('tbl_allotment');
		$this->db->join('tbl_member','tbl_member.member_id=tbl_allotment.allot_member_id_fk','left');
		$this->db->join('tbl_member_type','tbl_member_type.member_type_id=tbl_member.member_type','left');
		$this->db->join('tbl_product','tbl_product.product_id=tbl_allotment.allot_item_id','left');
		$this->db->join('tbl_unit','unit_id=allot_unit_fk','left');
		$this->db->where("allot_status",1);
		$this->db->where("allot_id",$allot_id);
		$this->db->order_by('allot_id', 'ASCE');
		$q = $this->db->get();
        if($q->num_rows() > 0)
        {
            return $q->row();
        }
        return false;
	}
	public function getMembers(){
		$query=$this->db->select('*')->get('tbl_member');
		return $query->result();
	}
	public function getMembersWhere($id){
		$query=$this->db->select('*')->where('member_mid',$id)->get('tbl_member');
		$result=$query->result();
		$json_data = json_encode($result);
		echo $json_data;
	}
	public function whereGetMembers($id){
		$query=$this->db->select('*')->where('member_type',$id)->get('tbl_member');
		$result=$query->result();
		return $result;
	}
	public function getMemberTypes(){
		$query=$this->db->select('*')->get('tbl_member_type');
		return $query->result();
	}
	public function getUnits(){
		$query=$this->db->select('*')->get('tbl_unit');
		return $query->result();
	}
	public function getVaccinationdays(){
		$query=$this->db->select('*')->get('tbl_vaccination');
		return $query->result();
	}
	public function get_products(){
		$query=$this->db->select('*')->get('tbl_product');
		return $query->result();
	}
	public function getCommision(){
		$query=$this->db->select('*')->get('tbl_commision');
		return $query->result();
	}
//This function is to fetch data for feeds page curresponding records of alloted items
	public function getAllotmentsDetails(){
		$query=$this->db->select('*,tbl_allotment.created_at as allotment_date,tbl_vaccination.vaccination_name as vaccinenamedays, DATE_ADD(tbl_allotment.created_at, INTERVAL tbl_vaccination.vaccination_days DAY) AS vaccination_date, DATE_SUB(DATE_ADD(tbl_allotment.created_at, INTERVAL tbl_vaccination.vaccination_days DAY), INTERVAL 2 DAY) AS beforetwodays')
		->join('tbl_vaccination','tbl_vaccination.vaccination_id=tbl_allotment.allot_vaccine_fk')
		->join('tbl_product','tbl_product.product_id=tbl_allotment.allot_item_id','left')
		->join('tbl_unit','tbl_unit.unit_id=tbl_allotment.allot_unit_fk','left')
		->join('tbl_member','tbl_member.member_id=tbl_allotment.allot_member_id_fk','left')
		->join('tbl_member_type','tbl_member_type.member_type_id=tbl_member.member_type','left')
		->order_by('tbl_allotment.allot_id','DESC')->get('tbl_allotment');
		$data = $query->result();
		return $data;
	}
	public function getstock($param){
		$arOrder = array('','product_name');
		$searchValue =($param['searchValue'])?$param['searchValue']:'';
		if($searchValue){
			$this->db->like('product_name', $searchValue);
		}
		// $this->db->where("allotmen",1);
		if ($param['start'] != 'false' and $param['length'] != 'false') {
			$this->db->limit($param['length'],$param['start']);
		}
		$query=$this->db->select('*,(sum(product_stock)-sum(purchase_quantity)) as old_stock,(sum(allot_quantity)-sum(rec_quantity)) as rec,,(sum(product_stock)+sum(rec_quantity))-(sum(allot_quantity)) as balance')
		->join('tbl_vaccination','tbl_vaccination.vaccination_id=tbl_allotment.allot_vaccine_fk')
		->join('tbl_product','tbl_product.product_id=tbl_allotment.allot_item_id','left')
		->join('tbl_unit','tbl_unit.unit_id=tbl_allotment.allot_unit_fk','left')
		->join('tbl_member','tbl_member.member_id=tbl_allotment.allot_member_id_fk','left')
		->join('tbl_member_type','tbl_member_type.member_type_id=tbl_member.member_type','left')
		->join('tbl_purchase','tbl_purchase.product_id_fk=tbl_product.product_id')
		->join('tbl_receive_back','rec_allotment_fk=allot_id')
		->order_by('tbl_allotment.allot_id','DESC')->get('tbl_allotment');
		$data['data'] = $query->result();
		$data['recordsTotal'] = $this->getClassinfostockTotalCount($param);
		$data['recordsFiltered'] = $this->getClassinfostockTotalCount($param);
		return $data;
	}
	public function getClassinfostockTotalCount($param = NULL){
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
	public function get_allotment_list(){
		$query=$this->db->select('*')
		->join('tbl_member','tbl_member.member_id=tbl_allotment.allot_member_id_fk','left')
		->join('tbl_product','tbl_product.product_id=tbl_allotment.allot_item_id','left')
		->join('tbl_unit','tbl_unit.unit_id=tbl_allotment.allot_unit_fk','left')
		// ->join('tbl_member','tbl_member.member_id=tbl_allotment.allot_member_id_fk','left')
		// ->join('tbl_member_type','tbl_member_type.member_type_id=tbl_member.member_type','left')
		->get('tbl_allotment');
		return $query->result();
	}
	// public function get_allotment_details_report($param){
	// 	$arOrder = array('','product_name');
	// 	$searchValue =($param['searchValue'])?$param['searchValue']:'';
	// 	if($searchValue){
	// 		$this->db->like('product_name', $searchValue);
	// 	}
	// 	// $this->db->where("allotmen",1);
	// 	if ($param['start'] != 'false' and $param['length'] != 'false') {
	// 		$this->db->limit($param['length'],$param['start']);
	// 	}
	//
	// 	$query=$this->db->select('*,(sum(product_stock)-sum(purchase_quantity)) as old_stock,(sum(allot_quantity)-sum(rec_quantity)) as rec,,(sum(product_stock)+sum(rec_quantity))-(sum(allot_quantity)) as balance')
	// 	->join('tbl_vaccination','tbl_vaccination.vaccination_id=tbl_allotment.allot_vaccine_fk')
	// 	->join('tbl_product','tbl_product.product_id=tbl_allotment.allot_item_id','left')
	// 	->join('tbl_unit','tbl_unit.unit_id=tbl_allotment.allot_unit_fk','left')
	// 	->join('tbl_member','tbl_member.member_id=tbl_allotment.allot_member_id_fk','left')
	// 	->join('tbl_member_type','tbl_member_type.member_type_id=tbl_member.member_type','left')
	// 	->join('tbl_purchase','tbl_purchase.product_id_fk=tbl_product.product_id')
	// 	->join('tbl_receive_back','rec_allotment_fk=allot_id')
	// 	->order_by('tbl_allotment.allot_id','DESC')->get('tbl_allotment');
	//
	// 	$data['data'] = $query->result();
	// 	$data['recordsTotal'] = $this->getClassinfostockTotalCount($param);
	// 	$data['recordsFiltered'] = $this->getClassinfostockTotalCount($param);
	// 	return $data;
	// }
		public function getItemType()
		{
			$this->db->select('prod_cat_id,prod_cat_name');
			$this->db->from('tbl_product_category');
			$this->db->where('prod_cat_status',1);
			$query = $this->db->get();
			return $query->result();
		}
		public function getItemUnit()
		{
			$this->db->select('unit_id,unit_name');
			$this->db->from('tbl_unit');
			$this->db->where('unit_status',1);
			$query = $this->db->get();
			return $query->result();
		}
		public function editAllotementRecord($allot_id)
		{
			$this->db->select('*');
			$this->db->from('tbl_allotment');
			$this->db->join('tbl_member','tbl_member.member_id=tbl_allotment.allot_member_id_fk');
			$this->db->join('tbl_member_type','tbl_member_type.member_type_id=tbl_member.member_type');
			$this->db->where('tbl_allotment.allot_status',1);
			$this->db->where('tbl_allotment.allot_id',$allot_id);
			$query = $this->db->get();
			return $query->result();
		}
		public function getModalMemberType()
		{
			$this->db->select('member_type_id,member_type_name');
			$this->db->from('tbl_member_type');
			$this->db->where('member_type_status',1);
			$query = $this->db->get();
			return $query->result();
		}
		public function getModalMemberState()
		{
			$this->db->select('state_id,state_name');
			$this->db->from('tbl_state');
			$this->db->where('state_status',1);
			$query = $this->db->get();
			return $query->result();
		}
		public function getMemberDistrictDetails($district_id)
		{
			$this->db->select('district_id,district_name');
			$this->db->from('tbl_district');
			$this->db->where('district_status',1);
			$this->db->where('district_state_id_fk',$district_id);
			$query = $this->db->get();
			return $query->result();
		}
		public function getMemberPanchayatDetails($panchayat_id)
		{
			$this->db->select('panchayath_id,panchayath_name');
			$this->db->from('tbl_panchayath');
			$this->db->where('panchayath_status',1);
			$this->db->where('panchayath_district',$panchayat_id);
			$query = $this->db->get();
			return $query->result();
		}

		public function getIntegrationTypeList($allot_id)
		{
			$this->db->select('allot_integration_type');
			$this->db->from('tbl_allotment');
			$this->db->where('allot_status',1);
			$this->db->where('allot_id',$allot_id);
			$query = $this->db->get();
			return $query->row();
		}
}
