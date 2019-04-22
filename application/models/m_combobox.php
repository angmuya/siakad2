<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_combobox extends CI_Model {
    

    public function getProdiByFakultas($table,$form){
		
		$this->db->where('kd_fakultas',$form['kd_fakultas']);
		$data = $this->db->get($table);
		return $data->result();
    }
    
    public function getCssClassByGrupName($table,$a){

        $this->db->where('nm_grup_menu',$a['grup']);
        $data = $this->db->get($table);
        return $data->result();
    }

    public function getDataSubmenuByIdGrup($grup){

      $this->db->from('tb_se_submenu as tbA');
      $this->db->join('tb_se_grup_menu as tbB','tbA.grup_menu_s=tbB.id_grup','left');
      $this->db->where('id_grup',$grup);
      $data = $this->db->get();
      return $data->result();
    }

    public function getLinkBySubmenu($table,$form){

      $this->db->where('id_submenu',$form['get_link']);
      $data = $this->db->get($table);
      return $data->result();
    }
	
	public function getIdNoUrut($table,$form){
		
		$this->db->select_max('urutan_menu');   
		$this->db->where('grup_menu_s',$form['grup_id_res']);
		$query = $this->db->get($table);  //cek dulu apakah ada sudah ada kode di tabel.    

		if($query->num_rows() <> 0){      
			 //cek kode jika telah tersedia    
			$data = $query->row();  
			$kode = $data->urutan_menu + 1;

		}
		else{      
			 $kode = "1" ; //cek jika kode belum terdapat pada table
		}

		$res_kode = $kode; 
		return $res_kode;
    }

}