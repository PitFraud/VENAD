<?php
$this->load->view('template/headercag');
$this->load->view('template/leftnavigation_cag');
$this->load->view($body);
$this->load->view('template/footer');
$data = array(
	'id' => $id
);
$this->load->view($script, $data);
?>