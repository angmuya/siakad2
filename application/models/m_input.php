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

}