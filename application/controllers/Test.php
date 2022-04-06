<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');
class Test extends MY_Controller {
	public function __construct() {
		parent::__construct();
		if(! $this->is_logged_in()){
			redirect('/login');
		}
		$this->load->model('General_model');
		$this->load->model('Test_model');
	}

	public function modifyTable(){
		$this->load->dbforge();
		$fields = array(
			'production_qr' => array(
				'name' => 'production_qr',
				'type' => 'VARCHAR',
				'constraint' => 3000,
				'default' => NULL,
			),
		);
		// $query=$this->dbforge->modify_column('tbl_production_details', $fields);
		if($query){	echo "Success"; } else { echo "failed"; }
	}

	public function truncateTable(){
		// $query=$this->db->truncate('tbl_messbill_fees');
		// $query=$this->db->truncate('tbl_messbill');
		// $query=$this->db->truncate('tbl_feeds');
		// $query=$this->db->truncate('tbl_receive_back');
		$query=$this->db->truncate('commission_history');
		if($query){	echo "Success"; } else { echo "failed"; }
	}

	public function add_colum(){
		$this->load->dbforge();
		$fields = array(
			'd_details_dob' => array(
				'type' => 'DATE',
				'null' =>true,
			),
			'd_details_shop_name' => array(
				'type' => 'VARCHAR',
				'constraint'=>200,
				'null' =>true,
			),
			'd_details_gst_no' => array(
				'type' => 'VARCHAR',
				'constraint'=>200,
				'null' =>true,
			),
			'd_details_photo' => array(
				'type' => 'VARCHAR',
				'constraint'=>200,
				'null' =>true,
			),

		);
		//$query=$this->dbforge->add_column('tbl_direct_details', $fields);
		if($query){	echo "Success"; } else { var_dump($query); echo "failed"; }
	}

	public function dropColumn(){
		$this->load->dbforge();
		$query=$this->dbforge->drop_column('tbl_biometric_logs', 'bio_entry_overtime');
		if($query){	echo "Success"; } else { echo "failed"; }
	}

	public function alterTable(){
		$this->load->dbforge();
		$fields=[
			'feed_code'=>[
				'type'=>'VARCHAR',
				'constraint'=>100,
			],
		];
		//$query = $this->dbforge->add_column('tbl_feed_item',$fields);  //uncomment this line
		if($query){	echo "Success"; } else { $this->db->_error_message(); echo "failed"; }
	}

	public function createTable(){
		$this->load->dbforge();
		$fields=[
			'tbl_vaccination_schedule'=>[
				'type'=>'INT',
				'constraint'=>'11',
				'auto_increment'=>TRUE
			],
			'history_member_id_fk'=>[
				'type'=>'INT',
				'constraint'=>'11',
			],
			'history_commission_amount'=>[
				'type'=>'FLOAT',
				'constraint'=>'11',
			],
			'history_status'=>[
				'type'=>'BOOLEAN',
				'default'=>'1',
			],
			'created_at'=>[
				'type'=>'DATETIME',
			],
			'updated_at'=>[
				'type'=>'TIMESTAMP',
			],
		];
		$this->dbforge->add_field($fields);
		$this->dbforge->add_key('history_id',TRUE);
		//edit here table name
		// $query=$this->dbforge->create_table('commission_history');
		if($query){	echo "Success"; } else { echo "failed"; }
	}

	public function getDatabase(){
		$this->load->dbutil();
		$prefs=array(
			'format'      => 'zip',
			'filename'    => 'my_db_backup_.sql'
		);
		$backup =& $this->dbutil->backup($prefs);
		$db_name = 'backup-on-'. date("Y-m-d-H-i-s") .'.zip';
		// $save = 'pathtobkfolder/'.$db_name;
		// $this->load->helper('file');
		// write_file($save, $backup);
		$this->load->helper('download');
		force_download($db_name, $backup);
	}

	public function gettable(){
		$this->result=$this->Test_model->getSingleTableData('tbl_vaccination_schedule');
		echo"<pre>",print_r($this->result),"</pre>"; die;
	}

	public function showDynamicInputbox(){
		$template['body'] = 'Test/list';
		$template['script'] = 'Test/script';
		$this->load->view('template', $template);
	}

	public function testImage(){
		$this->load->view('Test/barcode');
	}
}
