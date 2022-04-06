<?php
$this->load->view('template/header');
$this->load->view('template/leftnavigation_hr');
$this->load->view($body);
$this->load->view('template/footer');
$this->load->view($script);
?>