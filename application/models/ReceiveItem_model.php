<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ReceiveItem_model extends CI_Model{



	public function __construct(){

        parent::__construct();

  }



	public function getReceivals($param){

	$arOrder = array('','product_name');

	$searchValue =($param['searchValue'])?$param['searchValue']:'';

			if($searchValue){

					$this->db->like('product_name', $searchValue);

			}

			// $this->db->where("allotmen",1);

			if ($param['start'] != 'false' and $param['length'] != 'false') {

				$this->db->limit($param['length'],$param['start']);

			}

	// $query=$this->db->select('*,tbl_receive_back.created_at as receival_date')

	// ->join('tbl_allotment','tbl_allotment.allotment_id=tbl_receive_back.rec_allotment_fk','left')

	// ->join('tbl_product','tbl_product.product_id=tbl_allotment.allot_item_id','left')

	// ->join('tbl_member_type','tbl_member_type.member_type_id=tbl_allotment.allot_member_id_fk','left')

	// ->join('tbl_unit','tbl_unit.unit_id=tbl_receive_back.rec_unit','left')

	// ->order_by('tbl_receive_back.rec_id','DESC')->get('tbl_receive_back');

	$query=$this->db->select('*,tbl_receive_back.created_at as date_of_receival')
	->join('tbl_allotment','tbl_allotment.allot_id=tbl_receive_back.rec_allotment_fk','left')
	->join('tbl_product','tbl_product.product_id=tbl_allotment.allot_item_id','left')
	->join('tbl_member','tbl_member.member_id=tbl_allotment.allot_member_id_fk','left')
	->join('tbl_member_type','tbl_member_type.member_type_id=tbl_member.member_type','left')
	->join('tbl_unit','tbl_unit.unit_id=tbl_receive_back.rec_unit','left')
	->get('tbl_receive_back');





	// echo"<pre>",print_r($query->result()),"</pre>"; die;



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



		public function getback($param, $mem_id){

	$arOrder = array('','product_name');

	$searchValue =($param['searchValue'])?$param['searchValue']:'';

			if($searchValue){

					$this->db->like('product_name', $searchValue);

			}

			// $this->db->where("allotmen",1);

			$this->db->where('tbl_allotment.allot_member_id_fk', $mem_id);

			if ($param['start'] != 'false' and $param['length'] != 'false') {

				$this->db->limit($param['length'],$param['start']);

			}

	// $query=$this->db->select('*,tbl_receive_back.created_at as receival_date')

	// ->join('tbl_allotment','tbl_allotment.allotment_id=tbl_receive_back.rec_allotment_fk','left')

	// ->join('tbl_product','tbl_product.product_id=tbl_allotment.allot_item_id','left')

	// ->join('tbl_member_type','tbl_member_type.member_type_id=tbl_allotment.allot_member_id_fk','left')

	// ->join('tbl_unit','tbl_unit.unit_id=tbl_receive_back.rec_unit','left')

	// ->order_by('tbl_receive_back.rec_id','DESC')->get('tbl_receive_back');

	$query=$this->db->select('*,tbl_receive_back.created_at as date_of_receival')

	->join('tbl_allotment','tbl_allotment.allot_id=tbl_receive_back.rec_allotment_fk','left')

	->join('tbl_product','tbl_product.product_id=tbl_allotment.allot_item_id','left')

	->join('tbl_member_type','tbl_member_type.member_type_id=tbl_allotment.allot_member_id_fk','left')

		->join('tbl_unit','tbl_unit.unit_id=tbl_receive_back.rec_unit','left')

	->get('tbl_receive_back');





	// echo"<pre>",print_r($query->result()),"</pre>"; die;



	$data['data'] = $query->result();

	$data['recordsTotal'] = $this->getClassinfobackTotalCount($param, $mem_id);

	$data['recordsFiltered'] = $this->getClassinfobackTotalCount($param, $mem_id);

	return $data;

}



public function getClassinfobackTotalCount($param = NULL, $mem_id){

	$searchValue =($param['searchValue'])?$param['searchValue']:'';

			if($searchValue){

					$this->db->like('product_name', $searchValue);

			}

	$this->db->select('*');

	$this->db->from('tbl_receive_back');

	$this->db->join('tbl_allotment','tbl_allotment.allot_id=tbl_receive_back.rec_allotment_fk','left');

	$this->db->where('allot_member_id_fk', $mem_id);

			$query = $this->db->get();

		return $query->num_rows();

	}


	public function getpback($param, $mem_id){
	$arOrder = array('','product_name');
	$searchValue =($param['searchValue'])?$param['searchValue']:'';
			if($searchValue){
					$this->db->like('product_name', $searchValue);
			}
			$this->db->where("member_panchayath",$mem_id);
			$this->db->where('tbl_allotment.allot_member_id_fk', $mem_id);
			if ($param['start'] != 'false' and $param['length'] != 'false') {
				$this->db->limit($param['length'],$param['start']);
			}
	// $query=$this->db->select('*,tbl_receive_back.created_at as receival_date')
	// ->join('tbl_allotment','tbl_allotment.allotment_id=tbl_receive_back.rec_allotment_fk','left')
	// ->join('tbl_product','tbl_product.product_id=tbl_allotment.allot_item_id','left')
	// ->join('tbl_member_type','tbl_member_type.member_type_id=tbl_allotment.allot_member_id_fk','left')
	// ->join('tbl_unit','tbl_unit.unit_id=tbl_receive_back.rec_unit','left')
	// ->order_by('tbl_receive_back.rec_id','DESC')->get('tbl_receive_back');
	$query=$this->db->select('*,tbl_receive_back.created_at as date_of_receival')
	->join('tbl_allotment','tbl_allotment.allot_id=tbl_receive_back.rec_allotment_fk','left')
	->join('tbl_product','tbl_product.product_id=tbl_allotment.allot_item_id','left')
	->join('tbl_member','tbl_member.member_id=tbl_allotment.allot_member_id_fk','left')
	->join('tbl_member_type','tbl_member_type.member_type_id=tbl_allotment.allot_member_id_fk','left')
		->join('tbl_unit','tbl_unit.unit_id=tbl_receive_back.rec_unit','left')
	->get('tbl_receive_back');


	// echo"<pre>",print_r($query->result()),"</pre>"; die;

	$data['data'] = $query->result();
	$data['recordsTotal'] = $this->getClassinfobackTotalCount1($param, $mem_id);
	$data['recordsFiltered'] = $this->getClassinfobackTotalCount1($param, $mem_id);
	return $data;
}

public function getClassinfobackTotalCount1($param = NULL, $mem_id){
	$searchValue =($param['searchValue'])?$param['searchValue']:'';
			if($searchValue){
					$this->db->like('product_name', $searchValue);
			}
	$this->db->select('*');
	$this->db->from('tbl_receive_back');
	$this->db->join('tbl_allotment','tbl_allotment.allot_id=tbl_receive_back.rec_allotment_fk','left');
	$this->db->join('tbl_member','tbl_member.member_id=tbl_allotment.allot_member_id_fk','left');
	$this->db->where("member_panchayath",$mem_id);
			$query = $this->db->get();
		return $query->num_rows();
	}



}
