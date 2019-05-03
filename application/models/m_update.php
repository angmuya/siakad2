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
	
		public function UpdateDataIdentitas ($table,$data){
			
		$inp = array (
				'nama_singkat' => $data['nama_pendek'],
				'nama_panjang' => $data['nama_lengkap'],
				'thn_berdiri'=> $data['thn_berdiri'],
				'alamat'=> $data['a_jalan'],
				'kel'=> $data['a_kel'],
				'kec'=> $data['a_kec'],
				'kota'=> $data['a_kota'],
				'prov'=> $data['a_prov'],
				'no_tlp'=> ltrim($data['no_hp'],'0'),
		);
		$id['id_identitas'] = '1';
		$data = $this->db->where($id);
		$data = $this->db->update($table,$inp);
		echo "<div class='alert alert-success alert-dismisible fade show animated shake' role='alert' >
					<strong>SUCCESS !!!</strong> Data Berhasil Di Ubah!!!
					<button type='button' class='close' data-dismiss='alert' area-label='close' >
						<span aria-hidden='true' >&times;</span>
					</button>
				</div>";
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

	public function noAktivkanTa($table,$form){
		$upd = array (
			'status_ta' => '0',
		);

		$wh['id_thn'] = $form['id_ta'];
        $this->db->where($wh);
        $data = $this->db->update($table,$upd);

        echo $this->session->set_flashdata('message',"Data Tahun Akadmik ".$form['id_ta']." di Nonaktivkan...");
		return $data;
	}

	public function AktivkanTa($table,$form){
		$upd = array (
			'status_ta' => '1',
		);

		$wh['id_thn'] = $form['id_ta'];
        $this->db->where($wh);
        $data = $this->db->update($table,$upd);

        echo $this->session->set_flashdata('message',"Data Tahun Akadmik ".$form['id_ta']." di Aktivkan...");
		return $data;

	}
	
	public function ubahStatusDataMhs($table,$form){
		
		if ($form['status'] <= 2){
			echo "<div class='alert alert-danger alert-dismisible fade show animated shake' role='alert' >
					<strong>GAGAL !!!</strong> Calon Mahasiswa Belum Melengkapi Data Pada Aplikasi web !!!
					<button type='button' class='close' data-dismiss='alert' area-label='close' >
						<span aria-hidden='true' >&times;</span>
					</button>
				</div>";
		}else{
		$upd = array (
			'status' => '4',
		);

		$wh['no_pendaftaran'] = $form['no_pay'];
        $this->db->where($wh);
        $data = $this->db->update($table,$upd);
			echo "<div class='alert alert-success alert-dismisible fade show animated shake' role='alert' >
					<strong>SUCCESS !!!</strong> Konfirmasi berhasil di lakukan!!!
					<button type='button' class='close' data-dismiss='alert' area-label='close' >
						<span aria-hidden='true' >&times;</span>
					</button>
				</div>";
		}
	}
	
}