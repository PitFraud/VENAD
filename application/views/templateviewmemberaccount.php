<?php
$data['memberaccount'] = $this->Member_model->viewMemberAccount($member_id);
$this->load->view('template/headercag');
$this->load->view('template/leftnavigation_cag');
$this->load->view($body, $data);
$this->load->view('template/footer');
$this->load->view($script);
?>