<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {

	public function getDataLogin($a,$b){
		
		$wh=array(
			'user_name'=>$a,
			'password'=>md5($b),
		);
		
		$this->db->from('tb_user');
		$this->db->join('tb_role','tb_user.level_id=tb_role.id_role');
		$this->db->join('tb_dosen','tb_user.user_name=tb_dosen.NIP','left');
		$this->db->join('tb_mahasiswa','tb_user.user_name=tb_mahasiswa.NPM','left');
		$this->db->where($wh);
		$data = $this->db->get();
		echo $this->session->set_flashdata('message',"Data berhasil di tambahkan");
		return $data;
	}

 
}
