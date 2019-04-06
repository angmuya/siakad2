<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MasterMenu extends CI_Controller {

    public function __construct() {
		parent::__construct();
		date_default_timezone_set("Asia/Jakarta");
		$session = $this->session->userdata('lvl');
		switch ($session) {
			case "":
			redirect ('login');
			break;
		}
		$this->load->library('session');
		$this->load->model(array('m_admin','m_input','m_hapus','m_update'));
		}



    public function index (){
        $this->m_security->cekRoleAkses('masterMenu');
        $pageData = array (
			'title'=> 'Master Menu',
            'konten'=> 'template/menu/v_master_menu',
            'datares' => $this->m_admin->getDataTable('tb_role'),
		);
		
		$this->load->view('tema',$pageData);
    }

    public function setting_role ($a=null){
        $this->m_security->cekRoleAkses('masterMenu');

        
    }



}