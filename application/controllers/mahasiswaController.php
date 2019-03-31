<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MahasiswaController extends CI_Controller {
		public function __construct() {
		parent::__construct();
		date_default_timezone_set("Asia/Jakarta");
		if ($this->session->userdata('lvl') == ''){
			redirect ('login');
			
		}
		if ($this->session->userdata('lvl') == '0'){
			redirect ('login?error=status&belum&aktiv');
			
		}

		}
	public function index(){
		redirect('home');	
	}
	
	public function nilai(){
		$this->m_security->cekRoleAkses('mahasiswa');
		$pageData = array (
			'title'=> 'Nilai',
			'konten'=> 'v_home',
		);
		
		$this->load->view('tema',$pageData);
	}
	
}	