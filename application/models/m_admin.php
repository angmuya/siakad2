<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {

	
	public function getDataTable($table){
		
		$data = $this->db->get($table);
		return $data->result();
		
	}
	
	public function getDataFakultasByID($table,$id){
		$wh['kd_jurusan'] = $id['id'];
		$data = $this->db->get_where($table,$wh);
		return $data->result();
		
	}

	public function getDataMhs($table){
		$wh['NPM'] = '1811001';
		$data = $this->db->get_where($table,$wh);
		return $data->result();
	}

	public function getDataprodi($table){
		
		$this->db->from($table);
		$this->db->join('tb_fakultas','tb_fakultas.kd_fakultas=tb_prodi.kd_fakultas','left');
		$data = $this->db->get();
		return $data->result();
		
	}

}