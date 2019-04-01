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
	
}