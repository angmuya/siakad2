<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminMasterController extends CI_Controller {
		public function __construct() {
		parent::__construct();
		date_default_timezone_set("Asia/Jakarta");
		$session = $this->session->userdata('lvl');
		switch ($session) {
			case "":
			redirect ('login');
			break;
		}
		$this->load->library('session');
		$this->load->model(array('m_admin','m_input','m_hapus','m_update'));
		}
		

		public function tahun_akademik(){
		$this->m_security->cekRoleAkses('adm/tahun_akademik');
		$pageData = array (
			'title'=> 'Tahun Akademik',
			'konten'=> 'v_tahun_akademik',
			'datatahun'=>$this->m_admin->getDataTable('tb_thn_akademik'),
		);
		
		$this->load->view('tema',$pageData);
		}
		
		

}