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

	public function getDataMhs($table,$key){
		$wh['nim'] = $key;
		$data = $this->db->get_where($table,$wh);
		return $data->result();
	}

	public function getDataGrup($tbl,$id){
		$wh['id_role'] = $id;	
		$data = $this->db->get_where($tbl,$wh);
		return $data->result();
	}

	public function getDataSubmenu($tbl,$id){
		$wh['grup_id'] = $id;	
		$data = $this->db->get_where($tbl,$wh);
		return $data->result();
	}

	public function getDataprodi($table){
		
		$this->db->from($table);
		$this->db->join('tb_fakultas','tb_fakultas.kd_fakultas=tb_prodi.kd_fakultas','left');
		$data = $this->db->get();
		return $data->result();
		
	}

	public function getKodeMK($field,$tbl){
		
		$this->db->select_max($field);   
		$query = $this->db->get($tbl);  //cek dulu apakah ada sudah ada kode di tabel.    

		if($query->num_rows() <> 0){      
			 //cek kode jika telah tersedia    
			 $data = $query->row();      
			$kode = substr($data->kd_mk,2)+1;
		}
		else{      
			 $kode = "MK001";  //cek jika kode belum terdapat pada table
		}

		$res_kode = 'MK'.sprintf("%03d",$kode); 
		return $res_kode;
	}

	public function searchDataMhs($table,$keyword){
		
		$this->db->where('thn_masuk',$keyword['ta']);
		$data = $this->db->get($table);
		return $data;
	}

	public function getProdiByFakultas($table,$form){
		
		$this->db->where('kd_fakultas',$form['kd_fakultas']);
		$data = $this->db->get($table);
		return $data->result();
	}

	

}