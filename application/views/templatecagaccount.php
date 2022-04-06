<?php
$data['cag'] = $this->Cag_model->getAllCagDetails();
$this->load->view('template/headercag');
$this->load->view('template/leftnavigation_cag');
$this->load->view($body, $data);
$this->load->view('template/footer');
$this->load->view($script);
?>