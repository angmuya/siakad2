<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {

	public function getDataLogin($a,$b){
		
		$wh=array(
			'user_name'=>$a,
			'password'=>md5($b),
		);
		$this->db->from('tb_user');
		$this->db->join('tb_role','tb_user.level_id=tb_role.id_role','left');
		$this->db->where($wh);
		$data = $this->db->get();
		return $data;
	}

 
}
