<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {

	
	public function getDataTable($table){
		
		$data = $this->db->get($table);
		return $data->result();
		
	}
	
	public function getDataTableRow($table){
		
		$data = $this->db->get($table);
		return $data->row();
		
	}
	
	public function getDataKelasJenisRow($table,$data){
		
		$this->db->where('kode_kelas_jenis',$data['id_kelas']);
		$data = $this->db->get($table);
		
		return $data->row();
		
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
	
	public function getDataRincianBiayaById($table,$form){
		
		$this->db->from($table);
		$this->db->where('kd_kelas_jenis',$form['id_kelas']);
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
	
	public function BuatNoPendaftaraan ($field,$tbl){
		
		$this->db->select_max($field);   
		$query = $this->db->get($tbl);  //cek dulu apakah ada sudah ada kode di tabel.    

		if($query->num_rows() <> 0){      
			 //cek kode jika telah tersedia    
			 $data = $query->row();  
			$no_pen = substr($data->no_pen,0,-3);
			if ($no_pen == date('ymd')){
			$kode = substr($data->no_pen,6)+1;
			}else{
				$kode = "001";
			}
		}
		else{      
			 $kode = "001";  //cek jika kode belum terdapat pada table
		}

		$res_kode = date('ymd').sprintf("%03d",$kode); 
		return $res_kode;
	}

	public function searchDataMhs($table,$keyword){
		
		$this->db->where('thn_masuk',$keyword['ta']);
		$data = $this->db->get($table);
		return $data;
	}

	public function getDataGrupDanSubmenu(){

		 $this->db->from('tb_se_submenu as tbA');
		 $this->db->join('tb_se_grup_menu as tbB','tbA.grup_menu_s=tbB.id_grup','left');
		 $data = $this->db->get();
		 return $data->result();

	}

	public function getDataUser(){
		$this->db->from('tb_user as tbA');
		$this->db->join('tb_role as tbB','tbA.level_id=tbB.id_role','left');
		$this->db->where('hide','1');
		$data = $this->db->get();
		return $data->result();

	}
	
	public function getDataTa($table){
		$this->db->order_by('id_thn','DESC');
		$data = $this->db->get($table);
		return $data->result();
		
	}
	
	public function getDataPosting($table){
		
		$this->db->from($table);
		$this->db->join('tb_category_post as tbB',$table.'.category_post=tbB.id_cat_post','left');
		$this->db->order_by('id_post','DESC');
		$data = $this->db->get();
		return $data->result();
		
	}
	
	public function GetDataMhsByKodePembayaran($table,$form){
		
			$wh = $form['no_pay'];
			$this->db->from($table.' as tbA');
			$this->db->join('tb_kelas_jenis as tbB','tbA.id_kelas_jenis=tbB.kode_kelas_jenis');
			$this->db->join('tb_prodi as tbC','tbA.kd_prodi=tbC.kd_prodi','left');
			$this->db->where('no_pendaftaran',$wh);
			$data = $this->db->get();
			
			return $data->row();
		
	}
	
}