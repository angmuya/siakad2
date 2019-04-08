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
		$this->m_security->cekRoleAkses('admin/fakultas');
		$pageData = array (
			'title'=> 'Fakultas',
			'konten'=> 'v_fakultas',
			'datafakultas'=>$this->m_admin->getDataTable('tb_fakultas'),
		);
		
		$this->load->view('tema',$pageData);
	}
	

	public function program_studi(){
		$this->m_security->cekRoleAkses('admin/program_studi');
		$pageData = array (
			'title'=> 'Program Studi',
			'konten'=> 'v_prodi',
			'dataprodi'=>$this->m_admin->getDataprodi('tb_prodi'),
		);
		
		$this->load->view('tema',$pageData);
	}

	public function mata_kuliah(){
		$this->m_security->cekRoleAkses('admin/mata_kuliah');
		$pageData = array (
			'title'=> 'Mata Kuliah',
			'konten'=> 'v_matkul',
			'kode'=> $this->m_admin->getKodeMK('kd_mk','tb_matakuliah'),
			'datamatkul'=>$this->m_admin->getDataTable('tb_matakuliah'),
		);
		
		$this->load->view('tema',$pageData);
	}

	public function data_mhs($a=null){ //get data Mhs
		$this->m_security->cekRoleAkses('admin/mahasiswa');

		switch ($a){
			case "search":
				
				$keyword = $this->input->post();
				if (!$keyword==null){
				$pageData = array (
					'title'=> 'Mahasiswa',
					'konten'=> 'v_mahasiswa',
					'datamhs'=>$this->m_admin->searchDataMhs('tb_mahasiswa',$keyword),
				);
			
				$this->load->view('tema',$pageData);
			}else{
				redirect ('admin/mahasiswa');
			}
			break;

			default :

				$pageData = array (
					'title'=> 'Search Mahasiswa',
					'konten'=> 'v_search_mahasiswa',
				);
				
				$this->load->view('tema',$pageData);
			break;
		}

		
		
	}

 

	//zone proses
	public function proses_input_data_fakultas(){
		$this->m_security->cekRoleAkses('admin/fakultas');
		$dataForm = $this->input->post();	
		$this->m_security->cekDataKosong($dataForm['nama_fakultas']);
		$this->m_security->inputHistory("Input Data Fakultas",$dataForm['nama_fakultas']);
		$this->m_input->InputDataFakultas('tb_fakultas',$dataForm);
		
		redirect('admin/fakultas');
	}

	public function proses_input_data_prodi(){
		$this->m_security->cekRoleAkses('admin/program_studi');
		$dataForm = $this->input->post();	
		$this->m_security->cekDataKosong($dataForm['nm_prodi']);
		$this->m_input->InputDataProdi('tb_prodi',$dataForm);

		redirect('admin/program_studi');
	}

	public function proses_input_data_matkul(){
		$this->m_security->cekRoleAkses('admin/mata_kuliah');
		$k = $this->m_admin->getKodeMK('kd_mk','tb_matakuliah');
		$dataForm = $this->input->post();	
		$this->m_security->cekDataKosong($dataForm['nm_matkul']);
		$this->m_input->InputDataMatkul('tb_matakuliah',$k,$dataForm);

		redirect('admin/mata_kuliah');
	}

	// akhir zone proses

	// Zone Edit
	public function edit_data_fakultas(){
		$this->m_security->cekRoleAkses('admin/fakultas');
		$dataform = $this->input->post();
		$this->m_security->cekDataKosong($dataform['id_fakultas']);
		$this->m_update->updateDataFakultas('tb_fakultas',$dataform);
		redirect('admin/fakultas');
	}

	public function edit_data_prodi(){
		$this->m_security->cekRoleAkses('admin/program_studi');
		$dataform = $this->input->post();
		$this->m_security->cekDataKosong($dataform['kd_prodi']);
		$this->m_update->updateDataProdi('tb_prodi',$dataform);
		redirect('admin/program_studi');
	}

	public function edit_data_matkul(){
		$this->m_security->cekRoleAkses('admin/mata_kuliah');
		$dataform = $this->input->post();
		$this->m_security->cekDataKosong($dataform['id_mk']);
		$this->m_update->updateDataMatkul('tb_matakuliah',$dataform);
		redirect('admin/mata_kuliah');
	}

	//Akhir Zone Edit


	//Zone Hapus
	public function delete_fakultas(){
		$this->m_security->cekRoleAkses('admin/fakultas');
		$dataform = $this->input->post();
		$this->m_security->cekDataKosong($dataform['id_fakultas']);
		$this->m_security->inputHistory("Hapus Data Fakultas by name ",$dataform['nama_fakultas']);
		$this->m_hapus->hapusDataFakultas('tb_fakultas',$dataform);
		redirect('admin/fakultas');
	}

	public function delete_prodi (){
		$this->m_security->cekRoleAkses('admin/program_studi');
		$dataform = $this->input->post();
		$this->m_security->cekDataKosong($dataform['kd_prodi']);
		$this->m_hapus->hapusDataProdi('tb_prodi',$dataform);
		redirect('admin/program_studi');
	}

	public function delete_matkul (){
		$this->m_security->cekRoleAkses('admin/mata_kuliah');
		$dataform = $this->input->post();
		$this->m_security->cekDataKosong($dataform['kd_mk']);
		$this->m_hapus->hapusDataMatkul('tb_matakuliah',$dataform);
		redirect('admin/mata_kuliah');
	}

	public function delete_mhs (){
		$this->m_security->cekRoleAkses('admin/mahasiswa');
		$dataform = $this->input->post();
		$this->m_security->cekDataKosong($dataform['id_npm']);
		$this->m_hapus->hapusDataMhs('tb_mahasiswa',$dataform);
		redirect('admin/mahasiswa');
	}

	
	//Akhir Zona Hapus
	public function latihan(){
	
		$pageData = array (
			'title'=> 'Latihan 1',
			'konten'=> 'latihan1',
		);
		
		$this->load->view('tema',$pageData);
		
	}

	public function latihan2(){
		$this->load->view('latihan2');
}

	public function latihan3(){

		$dol = $this->m_admin->getDataTable('tb_mahasiswa');

	echo json_encode($dol);
	}

	public function latihan4(){
		$data = $this->m_admin->getKodeMK('kd_mk','tb_matakuliah');

		echo $data;
		}

}	