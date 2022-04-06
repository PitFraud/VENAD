<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');
class Test_new extends MY_Controller {
	public function __construct() {
		parent::__construct();
         if(! $this->is_logged_in()){
            redirect('/login');
        }
    $this->load->model('General_model');
	}

  public function dbDownload(){
		$this->load->dbutil();
		$prefs=array(
			'format'      => 'zip',
			'filename'    => 'my_db_backup_.sql'
		);
		$backup =& $this->dbutil->backup($prefs);
		$db_name = 'venad'. date("Y-m-d-H-i-s") .'.zip';
		// $save = 'pathtobkfolder/'.$db_name;
		// $this->load->helper('file');
		// write_file($save, $backup);
		$this->load->helper('download');
		force_download($db_name, $backup);
	}

}
