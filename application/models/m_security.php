<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_security extends CI_Model {

  public function guestOnlyGuard($ajax = false){
    if($this->session->userdata('id_user')){
      if($ajax) throw new UserException('Kamu tidak berhak mengakses resource ini', UNAUTHORIZED_CODE);
      redirect(strtolower($this->session->userdata('nama_role')));
    }
  }

  public function userOnlyGuard($ajax = false){
    if(!$this->session->has_userdata('id_user')){
      if($ajax) throw new UserException('Kamu tidak berhak mengakses resource ini', UNAUTHORIZED_CODE);
      redirect('login');
    }
  }

  public function cekRoleAkses($role, $ajax = false){
    if(strtolower($this->session->userdata('nama_role')) != $role){
      if($ajax) throw new UserException('Kamu tidak berhak mengakses resource ini', UNAUTHORIZED_CODE);
      redirect(strtolower($this->session->userdata('nama_role')));
    }
  }

  public function rolesOnlyGuard($roles = [], $ajax = false){
    if(!in_array(strtolower($this->session->userdata('nama_role')), $roles)){
      if($ajax) throw new UserException('Kamu tidak berhak mengakses resource ini', UNAUTHORIZED_CODE);
      redirect(strtolower($this->session->userdata('nama_role')));
    }
  }

  public function cekDataKosong($data){
	  if(empty($data)){
		redirect(strtolower($this->session->userdata('nama_role')));
	  }
  }


}
