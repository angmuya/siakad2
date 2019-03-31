<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_input extends CI_Model {

	public function InputDataFakultas ($tb,$form){
		$wh = array (
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
		
		$data = $this->db->insert($tb,$wh);
		return $data;
	}

}