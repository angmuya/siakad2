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
      $this->db->where('nm_grup_menu',$grup);
      $data = $this->db->get();
      return $data->result();
    }

    public function getLinkBySubmenu($table,$form){

      $this->db->where('id_submenu',$form['get_link']);
      $data = $this->db->get($table);
      return $data->result();
    }

}