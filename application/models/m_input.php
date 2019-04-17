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

	public function DataTahunAkademik ($table,$input){
		$inp = array (
			'id_thn'=> $input['id_smt'],
			'nama_ta'=> $input['ta'],
			'jen_semester' => $input['semester'],
			'status_ta' => '1',

		);
		$data = $this->db->insert($table,$inp);
		echo $this->session->set_flashdata('message',"Tahun Akademik Berhasil di buat");
		return $data;
	}
	
	public function InputDataMhs ($table,$input){
			
		$this->db->select_max('nim');   
		$query = $this->db->get($table);  //cek dulu apakah ada sudah ada kode di tabel.    
		$makecode = date('y').$input['pil_fakultas'];
		
		if($query->num_rows() <> 0){      
			 //cek kode jika telah tersedia    
			 $data = $query->row();  
			$nim = substr($data->nim,0,-3);
			if ($nim == $makecode){
			$kode = substr($data->nim,4)+1;
			}else{
				$kode = "001";
			}
		}
		else{      
			 $kode = "001";  //cek jika kode belum terdapat pada table
		}

		$res_kode = $makecode.sprintf("%03d",$kode); 
		$tgl_lahir = substr($input['tgl_lahir_mhs'],6).substr($input['tgl_lahir_mhs'],2,-4).substr($input['tgl_lahir_mhs'],0,-8);
		
		$inp = array (
			'nim'=> $res_kode,
			'pass'=> hash('sha512',md5($tgl_lahir)),
			'tgl_pen'=> $input['tgl_pen'],
			'no_pen'=> $input['no_pen'],
			'nama_mhs'=> $input['nm_mhs'],
			'tp_lahir'=> $input['tmp_lahir_mhs'],
			'tgl_lahir'=> $tgl_lahir ,
			'jenis_kelamin'=> $input['jk'],
			'agama'=> $input['agama'],
			'pekerjaan'=> $input['pekerjaan_mhs'],
			'status_mhs'=> $input['status_mhs'],
			'alamat'=> $input['alamat_t_mhs'].' No. '.$input['alamat_no_mhs'].' Rt / Rw '.$input['alamat_rt_mhs'].'/'.$input['alamat_rw_mhs'],
			'thn_masuk' => date('Y'),
			'kd_fakultas' => $input['pil_fakultas'],
			'kd_jurusan' => substr($input['pil_jurusan'],2),
			'ps_studi' => substr($input['pil_jurusan'],0,-2),
			'no_tlp' => $input['no_hp_mhs'],
			'nm_ortu'=> $input['nama_ortu'],
			'pkj_ortu' => $input['pekerjaan_ortu'],
			'alamat_ortu'=> $input['alamat_t_ortu'].' No. '.$input['alamat_no_ortu'].' Rt / Rw '.$input['alamat_rt_ortu'].'/'.$input['alamat_rw_ortu'],
			'no_tlp_ortu'=> $input['no_hp_ortu'],
			'id_kelas_jenis'=> $input['pil_jadwal'],
			
		);
		$data = $this->db->insert($table,$inp);
		echo $this->session->set_flashdata('message',"Mahasiswa Sudah Berhasil Terdaftar");
		return $data;
	}

}