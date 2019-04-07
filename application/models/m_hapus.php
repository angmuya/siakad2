<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_hapus extends CI_Model {

	public function hapusDataFakultas($tb,$form){
        $wh ['kd_fakultas'] = $form['id_fakultas'];
        $this->db->where($wh);
		$data = $this->db->delete($tb);
		echo $this->session->set_flashdata('message',"Data berhasil di Hapus");
		return $data;
	}

	public function hapusDataProdi($tb,$form){
        $wh ['kd_prodi'] = $form['kd_prodi'];
        $this->db->where($wh);
		$data = $this->db->delete($tb);
		echo $this->session->set_flashdata('message',"Data berhasil di Hapus");
		return $data;
	}

	public function hapusDataMhs($tb,$form){
        $wh ['NPM'] = $form['id_npm'];
        $this->db->where($wh);
		$data = $this->db->delete($tb);
		echo $this->session->set_flashdata('message',"Data berhasil di Hapus");
		return $data;
	}

	public function hapusDataMatkul($tb,$form){
        $wh ['kd_mk'] = $form['kd_mk'];
        $this->db->where($wh);
		$data = $this->db->delete($tb);
		echo $this->session->set_flashdata('message',"Data berhasil di Hapus");
		return $data;
	}

	public function hapusGrupMenu($table,$form){
		$wh['id_menu'] = $form['id_menu'];
		$this->db->where($wh);
		$data = $this->db->delete($table);
		echo $this->session->set_flashdata('message',"Data berhasil di Hapus");
		return $data;

	}

}