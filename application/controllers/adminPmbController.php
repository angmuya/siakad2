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
				'dataposting'=>$this->m_admin->getDataPosting('tb_posting'),
			);
			
			$this->load->view('tema',$pageData);		
		}
		
		public function proses_konfirmasi (){
			$dataform = $this->input->post();
			if(empty($dataform['no_pay'])){
				echo "Data Tidak Boleh Kosong";
			}else{
			
				$pagedata = array (
				'cek' => $this->m_security->cekInputanKode('tb_calon_mahasiswa',$dataform),
				'pad' => $this->m_admin->GetDataMhsByKodePembayaran('tb_calon_mahasiswa',$dataform),
				);
					$this->load->view('pmb/v_detail_pembayaran',$pagedata);
				}
		}
		
		public function proses_konfirmasi_pembayaran (){
			$dataform = $this->input->post();
			
			$dataform['no_pay'];
			$dataform['status'];
			
			if (isset($dataform['no_pay'])){
				$this->m_update->ubahStatusDataMhs('tb_calon_mahasiswa',$dataform);
		
				}
				
	
		}
		
		public function rincian_biaya (){
			$this->m_security->cekRoleAkses('admpmb/rincian_biaya');
			$form = $this->input->post();
			if (isset($form['tambahkan_rincian'])){
				$this->m_input->KirimDataRincianBiaya('tb_biaya_kuliah',$form);
				redirect('admpmb/rincian_biaya');
			}
			$pageData = array (
				'title'=> 'Input Rincian Biaya',
				'konten'=> 'pmb/v_rincian_biaya',
				'datakelas'=>$this->m_admin->getDataTable('tb_kelas_jenis'),
			);
			
			$this->load->view('tema',$pageData);
					
		}
		
		public function getRincianBiayaById (){
			$this->m_security->cekRoleAkses('admpmb/rincian_biaya');
			$datafom = $this->input->post();
				$pageData = array (
				'rincian_biaya'=>$this->m_admin->getDataRincianBiayaById('tb_biaya_kuliah',$datafom),
				'jen_kelas'=>$this->m_admin->getDataKelasJenisRow('tb_kelas_jenis',$datafom),
			);
			
			$this->load->view('pmb/v_rincian_biayabyid',$pageData);
		}
		
		public function konfirmasi_pembayaran (){
		
			$this->m_security->cekRoleAkses('admpmb/konfirmasi_pembayaran');
			$pageData = array (
				'title'=> 'Konfirmasi Pembayaran',
				'konten'=> 'pmb/v_konfirmasi_pembayaran',
				'pay'=> '',
			);
			
			$this->load->view('tema',$pageData);		
		}
		
		
		public function proses_input_data_posting (){
			$this->m_security->cekRoleAkses('admpmb/posting');
			$form = $this->input->post();
			$this->m_security->cekDataKosong($form['isi_post']);
			$this->m_input->SendDataPosting('tb_posting',$form);
		}
}