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

  public function cekRoleAkses($link){
    
    $wh = array (
      "link" => $link,
      "id_role" => $this->session->userdata('lvl'),
    );
    $this->db->from('tb_master_menu as tbA');
		$this->db->join('tb_master_submenu as tbB','tbA.id_menu=tbB.grup_id','left');
		$this->db->where($wh);
    $data = $this->db->get();
    
    if (!$data->num_rows() > 0 ){
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

  public function inputHistory ($isi,$a){

    $inp = array (
      'id_history'=> null,
      'id_user' => $this->session->userdata('username'),
      'nama_user'=> $this->session->userdata('username'),
      'tgl' => date('d-m-Y'),
      'time' => date('H:m:s'),
      'kegiatan'=> $isi.' : '.$a,


    );
    $this->db->insert('tb_history',$inp);


  }


}
