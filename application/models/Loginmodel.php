<?php
class Loginmodel extends CI_Model{
    public function checkUserLogin($data){
        $this->db->where($data);
        $query = $this->db->get('tbl_login');
        if($query->num_rows() == 1){
            $this->session->set_userdata($query->row_array());
            return true;
        }
        else{
            return false;
        }
    }

    public function update_data($condition,$update_data){
      $this->db->where($condition);
      $query=$this->db->update('tbl_login', $update_data);
      if($query){
        return true;
      }else{
        return false;
      }
    }
}
?>
