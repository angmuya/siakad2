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
				'breadcrumb' => array(
					'Home' => base_url(),
				 ),
				'datatahun'=>$this->m_admin->getDataTable('tb_thn_akademik'),
			);
			
			$this->load->view('tema',$pageData);
		}

		public function proses_tahun_akademik(){
			$this->m_security->cekRoleAkses('adm/tahun_akademik');
			$dataform = $this->input->post();
			$this->m_security->cekDataTaSama('tb_thn_akademik',$dataform);
			$this->m_security->cekDataAktivTa('tb_thn_akademik');
			$this->m_security->cekDataKosong($dataform['id_smt']);
			$this->m_input->DataTahunAkademik('tb_thn_akademik',$dataform);
			redirect('adm/tahun_akademik');

		}

		public function aktivkan_ta(){
			$this->m_security->cekRoleAkses('adm/tahun_akademik');
			$this->m_security->cekDataAktivTa('tb_thn_akademik');
			$dataform = $this->input->post();
			$this->m_security->cekDataKosong($dataform['id_ta']);
			$this->m_update->AktivkanTa('tb_thn_akademik',$dataform);
			redirect('adm/tahun_akademik');
		}

		public function nonaktivkan_ta(){
			$this->m_security->cekRoleAkses('adm/tahun_akademik');
			$dataform = $this->input->post();
			$this->m_security->cekDataKosong($dataform['id_ta']);
			$this->m_update->noAktivkanTa('tb_thn_akademik',$dataform);
			redirect('adm/tahun_akademik');
		}
		
		public function data_kelas(){
			$this->m_security->cekRoleAkses('adm/data_kelas');
			$pageData = array (
				'title'=> 'Tahun Akademik',
				'konten'=> 'v_jenis_kelas',
				'data_jenis_kelas'=>$this->m_admin->getDataTable('tb_kelas_jenis'),
			);
			
			$this->load->view('tema',$pageData);
		}
		
		public function daftar_mahasiswa_baru(){
			$this->m_security->cekRoleAkses('adm/daftar_mahasiswa_baru');
			$pageData = array (
				'title'=> 'Penerimaan Mahasiswa Baru',
				'konten'=> 'v_tambah_data_mahasiswa',
				'data_jenis_kelas'=>$this->m_admin->getDataTable('tb_kelas_jenis'),
			);
			
			$this->load->view('tema',$pageData);
		}
		
		

}