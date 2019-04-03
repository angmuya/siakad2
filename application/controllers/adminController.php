<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller {
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

	public function mata_kuliah(){
		$this->m_security->cekRoleAkses('admin');
		$pageData = array (
			'title'=> 'Mata Kuliah',
			'konten'=> 'v_matkul',
			'datamatkul'=>$this->m_admin->getDataMatkul('tb_matakuliah'),
		);
		
		$this->load->view('tema',$pageData);
	}

	public function data_mhs(){ //get data Mhs
		$this->m_security->cekRoleAkses('admin');
		$pageData = array (
			'title'=> 'Mahasiswa',
			'konten'=> 'v_mahasiswa',
			'dataprodi'=>$this->m_admin->getDataProdi('tb_prodi'),
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

	public function proses_input_data_prodi(){
		$this->m_security->cekRoleAkses('admin');
		$dataForm = $this->input->post();	
		$this->m_security->cekDataKosong($dataForm['nm_prodi']);
		$this->m_input->InputDataProdi('tb_prodi',$dataForm);

		redirect('admin/program_studi');
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

	public function edit_data_prodi(){
		$this->m_security->cekRoleAkses('admin');
		$dataform = $this->input->post();
		$this->m_security->cekDataKosong($dataform['kd_prodi']);
		$this->m_update->updateDataProdi('tb_prodi',$dataform);
		redirect('admin/program_studi');
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

	public function delete_prodi (){
		$this->m_security->cekRoleAkses('admin');
		$dataform = $this->input->post();
		$this->m_security->cekDataKosong($dataform['kd_prodi']);
		$this->m_hapus->hapusDataProdi('tb_prodi',$dataform);
		redirect('admin/program_studi');
	}
	//Akhir Zona Hapus
	public function latihan(){
	$this->load->view('latihan',array('error' => ' '));
		
	}

	public function latihan2(){
		$gambar = $_FILES['gambar']['name'];

		$config['upload_path']          = './assets/upload';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 100;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;
	 
		$this->load->library('upload', $config);
	 
		if ( ! $this->upload->do_upload('gambar')){
			$error = array('error' => 'gagal bro');
			$this->load->view('latihan', $error);
		}else{

			
	}
}
	
}	