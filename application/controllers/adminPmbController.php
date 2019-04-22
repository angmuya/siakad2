<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminPmbController extends CI_Controller {
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
		
		public function index (){
			redirect ('home');			
		}
		
		public function posting (){
			$this->m_security->cekRoleAkses('admpmb/posting');
			$pageData = array (
				'title'=> 'Posting',
				'konten'=> 'pmb/v_posting',
				''=>$this->m_admin->getDataTable('tb_thn_akademik'),
			);
			
			$this->load->view('tema',$pageData);		
		}
		
		public function rincian_biaya (){
			echo "posting";			
		}
		
		
		public function proses_input_data_posting (){
			$this->m_security->cekRoleAkses('admpmb/posting');
			$form = $this->input->post();
			$this->m_security->cekDataKosong($form['isi_post']);
			$this->m_input->SendDataPosting('tb_posting',$form);
		}
}