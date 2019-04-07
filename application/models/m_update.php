<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_update extends CI_Model {
	
	public function updateDataFakultas ($table,$form){

        $masuk = array (
			'nm_fakultas'=>$form['nama_fakultas'],
			'dekan'=>$form['nama_dekan'],
			'pd1'=>$form['pd1'],
			'pd2'=>$form['pd2'],
			'pd3'=>$form['pd3'],
			'pd4'=>$form['pd4'],
			'kasubag_perkuliahan'=>$form['kasubag_perkuliahan'],
			'kasubag_akademik'=>$form['kasubag_akademik'],
		
		);
		
        $wh['kd_fakultas'] = $form['id_fakultas'];
        $this->db->where($wh);
        $data = $this->db->update($table,$masuk);

        echo $this->session->set_flashdata('message',"Data berhasil di ubah...");
		return $data;
		
	}

	public function updateDataProdi ($table,$form){

        $upd = array (
			'nm_prodi'=>$form['nm_prodi'],
			'ketua_prodi'=>$form['ketua_prodi'],
			'sekretaris_prodi'=>$form['sekretaris_prodi'],
			'p_studi'=>$form['p_studi'],
			'kd_fakultas'=>$form['kd_fakultas'],
		
		);
		
        $wh['kd_prodi'] = $form['kd_prodi'];
        $this->db->where($wh);
        $data = $this->db->update($table,$upd);

        echo $this->session->set_flashdata('message',"Data berhasil di ubah...");
		return $data;
		
	}

	public function updateDataMatkul($table,$form) {
		$upd = array (
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

		$wh['id_mk'] = $form['id_mk'];
        $this->db->where($wh);
        $data = $this->db->update($table,$upd);

        echo $this->session->set_flashdata('message',"Data berhasil di ubah...");
		return $data;
	}
	
}