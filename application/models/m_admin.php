<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {

	
	public function getDataFakultas ($table){
		
		$data = $this->db->get($table);
		return $data->result();
		
	}
	
	public function getDataFakultasByID($table,$id){
		$wh['kd_jurusan'] = $id['id'];
		$data = $this->db->get_where($table,$wh);
		return $data->result();
		
	}

}