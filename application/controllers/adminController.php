<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller {
		public function __construct() {
		parent::__construct();
		date_default_timezone_set("Asia/Jakarta");
		if ($this->session->userdata('lvl') == ''){
			redirect ('login');
			
		}
		if ($this->session->userdata('lvl') == '0'){
			redirect ('login?error=status&belum&aktiv');
			
		}
			
		$this->load->model(array('m_admin','m_input'));
		}
	public function index(){
		redirect('home');	
	}
	
	public function home(){
		$pageData = array (
			'title'=> 'Home',
			'konten'=> 'v_home',
		);
		
		$this->load->view('tema',$pageData);
	}
	
	public function fakultas(){
		$this->m_security->cekRoleAkses('admin');
		$pageData = array (
			'title'=> 'Fakultas',
			'konten'=> 'v_fakultas',
			'datafakultas'=>$this->m_admin->getDataFakultas('tb_fakultas'),
		);
		
		$this->load->view('tema',$pageData);
	}
	
	public function proses_input_data_fakultas(){
		$this->m_security->cekRoleAkses('admin');
		$dataForm = $this->input->post();	
		$this->m_security->cekDataKosong($dataForm);
		$this->m_input->InputDataFakultas('tb_fakultas',$dataForm);
		redirect('admin/fakultas');
	}
	
	public function program_studi(){
		$this->m_security->cekRoleAkses('admin');
		$pageData = array (
			'title'=> 'Program Studi',
			'konten'=> 'v_fakultas',
			'datafakultas'=>$this->m_admin->getDataFakultas('tb_fakultas'),
		);
		
		$this->load->view('tema',$pageData);
	}
	
	public function edit_fakultas(){
		$this->m_security->cekRoleAkses('admin');
		$this->load->view('v_edit_data_fakultas');
	}
	
}	