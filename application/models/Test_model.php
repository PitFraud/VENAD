<?php
class Test_model extends CI_Model{

  public function __construct(){
        parent::__construct();
  }

  public function getSingleTableData($table){
    $query=$this->db->select('*')->get($table);
    return $query->result();
  }

}
?>
