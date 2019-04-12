<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_input extends CI_Model {

	public function InputDataFakultas ($tb,$form){
		$in = array (
			'kd_fakultas'=>NULL,
			'nm_fakultas'=>$form['nama_fakultas'],
			'dekan'=>$form['nama_dekan'],
			'pd1'=>$form['pd1'],
			'pd2'=>$form['pd2'],
			'pd3'=>$form['pd3'],
			'pd4'=>$form['pd4'],
			'kasubag_perkuliahan'=>$form['kasubag_perkuliahan'],
			'kasubag_akademik'=>$form['kasubag_akademik'],
		
		);
		
		$data = $this->db->insert($tb,$in);
		echo $this->session->set_flashdata('message',"Data berhasil di tambahkan");
		return $data;
	}

	public function InputDataProdi ($table,$form){
		$in = array (
			'kd_prodi'=>null,
			'nm_prodi'=>$form['nm_prodi'],
			'ketua_prodi'=>$form['ketua_prodi'],
			'sekretaris_prodi'=>$form['sekretaris_prodi'],
			'p_studi'=>$form['p_studi'],
			'kd_fakultas'=>$form['kd_fakultas']
		);
		
		$data = $this->db->insert($table,$in);
		echo $this->session->set_flashdata('message',"Data berhasil di tambahkan");
		return $data;

	}

	public function InputDataMatkul($tbl,$kode,$form){
		$in = array (
			'id_mk' => null,
			'kd_mk' => $kode,
			'nm_mk' => $form['nm_matkul'],
			'semester' => $form['semester'],
			'smt' => $form['smt'],
			'kredit' => null,
			'kd_kk'=> null,
			'kd_prodi' => $form['kd_prodi'],
			'tahun_k' => date('Y'),
			'NIP' => $form['nip'],
			'kd_fakultas'=>$form['kd_fakultas']
		);

		$data = $this->db->insert($tbl,$in);
		echo $this->session->set_flashdata('message',"Data berhasil di tambahkan");
		return $data;
	}

	public function insertGrupMenu($table,$formdata){
		$in = array (
			'id_menu'=>null,
			'grup_name'=> $formdata['grup_menu'],
			'css_class'=> $formdata['css_class'],
			'id_role' => $formdata['id_role'],
			'urut_grup_master'=>$formdata['urut'],

		);
		$data = $this->db->insert($table,$in);
		echo $this->session->set_flashdata('message',"Data berhasil di tambahkan");
		return $data;
	}

	public function insertGrupSubmenu($table,$form){
		$in = array(
			"id_sub"=>null,
			"sub_menu"=>$form['sub_menu'],
			"link"=>$form['link_url'],
			"grup_id"=>$form['id_submenu'],
			"urut_m_submenu"=>$form['urut'],
		);
		$data = $this->db->insert($table,$in);
		echo $this->session->set_flashdata('message',"Data berhasil di tambahkan");
		return $data;
	}

}