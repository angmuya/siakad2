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
      redirect('home');
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

  public function cekDatabolong($data){
	  if(empty($data)){
		
		die();
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

  public function cekMasterMenuGanda($table,$form){
      $wh = array (
        'grup_name' => $form['grup_menu'],
        'id_role' => $form['id_role'],
        'css_class' =>$form['css_class'],
      );
      $cek = $this->db->get_where($table,$wh);

      if ($cek->num_rows() > 0){

      echo $this->session->set_flashdata('message',"Gagal!!! , Master Menu Sudah Ada");
      redirect ('masterMenu/setting_role/'.$form['id_role']);
      }
  }

  public function cekMastersubMenuGanda($table,$form){
	  
      $whe = array (
        'link' => $form['link_url'],
        'grup_id' => $form['id_submenu'],
      );
      $cek = $this->db->get_where($table,$whe);

      if ($cek->num_rows() > 0){

      echo $this->session->set_flashdata('message',"Gagal!!! , Sub Menu Di Master ini Sudah Ada");
      redirect ('masterMenu/sub_menu/'.$form['id_submenu'].'/'.$form['name_grup']);
      }
  }

  public function cekDataAktivTa($table){
    $this->db->where('status_ta','1');
    $data = $this->db->get($table);
    if ($data->num_rows() >= 1){
      echo $this->session->set_flashdata('message',"Gagal!!! , Masih ada Tahun akademik yang aktiv");
      redirect ('adm/tahun_akademik');
    }
  }

  public function cekDataTaSama($table,$form){
    $this->db->where('id_thn',$form['id_smt']);
    $data = $this->db->get($table);
    if ($data->num_rows() >= 1){
      echo $this->session->set_flashdata('message',"Gagal!!! , Tahun Akademik <b>".$form['ta']."</b> Semester <b>".$form['semester']."</b> sudah ada");
      redirect ('adm/tahun_akademik');
    }

  } 
  
  public function cekInputanKode($table,$form){
	$wh['no_pendaftaran'] = $form['no_pay'];
	$wh['status'] = '3';
	$orwh['status'] = '4';
    $this->db->where($wh);
    $this->db->or_where($wh);
    $data = $this->db->get($table);
	
	if ($data->num_rows() == 0){
      return "a" ;
    }


  }


}
