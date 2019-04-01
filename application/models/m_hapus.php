<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_hapus extends CI_Model {

	public function hapusDataFakultas($tb,$form){
        $wh ['kd_fakultas'] = $form['id_fakultas'];
        $this->db->where($wh);
		$data = $this->db->delete($tb);
		echo $this->session->set_flashdata('message',"Data berhasil di tambahkan");
		return $data;
	}

}