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
		$this->load->library('session');
		$this->load->model(array('m_admin','m_input','m_hapus','m_update'));
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
	

	public function program_studi(){
		$this->m_security->cekRoleAkses('admin');
		$pageData = array (
			'title'=> 'Program Studi',
			'konten'=> 'v_prodi',
			'dataprodi'=>$this->m_admin->getDataprodi('tb_prodi'),
		);
		
		$this->load->view('tema',$pageData);
	}



	//zone proses
	public function proses_input_data_fakultas(){
		$this->m_security->cekRoleAkses('admin');
		$dataForm = $this->input->post();	
		$this->m_security->cekDataKosong($dataForm['nama_fakultas']);
		$this->m_input->InputDataFakultas('tb_fakultas',$dataForm);
		
		redirect('admin/fakultas');
	}

	// akhir zone proses

	// Zone Edit
	public function edit_data_fakultas(){
		$this->m_security->cekRoleAkses('admin');
		$dataform = $this->input->post();
		$this->m_security->cekDataKosong($dataform['id_fakultas']);
		$this->m_update->updateDataFakultas('tb_fakultas',$dataform);
		redirect('admin/fakultas');
	}

	//Akhir Zone Edit


	//Zone Hapus
	public function delete_fakultas(){
		$this->m_security->cekRoleAkses('admin');
		$dataform = $this->input->post();
		$this->m_security->cekDataKosong($dataform['id_fakultas']);
		$this->m_hapus->hapusDataFakultas('tb_fakultas',$dataform);
		redirect('admin/fakultas');
	}
	//Akhir Zona Hapus
	public function latihan(){
		$this->load->view('latihan');
	}

	public function latihan2(){
		
	}
	
}	