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
            'konten'=> 'template/menu/v_master_menu_role',
			'breadcrumb' => array(
					'Home' => base_url(),
				 ),
            
			'datares' => $this->m_admin->getDataTable('tb_role'),
			);
				
				$this->load->view('tema',$pageData);
    }

    public function setting_role ($a=null){
			if (empty($a)){
				redirect ('masterMenu');
			}else{
				$this->m_security->cekRoleAkses('masterMenu');
				$pageData = array (
					'title'=> 'Setting Grup Menu',
					'konten'=> 'template/menu/v_master_menu_setting_role',
					'datagrupselect' => $this->m_admin->getDataTable('tb_se_grup_menu'),
					'id_rol'=> $a,
					'datagrup' => $this->m_admin->getDataGrup('tb_master_menu',$a),
					
				);
				
				$this->load->view('tema',$pageData);
			}
        
		}
		
		public function sub_menu ($a=null,$b=null,$c=null){
			$this->m_security->cekRoleAkses('masterMenu');
			if (empty($a)){
				redirect ('masterMenu');
			}else if (empty($b)){
				redirect ('masterMenu');
			}else{
			$pageData = array (
				'title'=> 'Setting sub menu',
				'konten'=> 'template/menu/v_master_submenu_setting_role',
				'id_submenu' => $a,
				'sub_menu_grup'=>$b,
				'datasubmenu' => $this->m_admin->getDataSubmenu('tb_master_submenu',$a),
				'datasubselect' => $this->m_combobox->getDataSubmenuByIdGrup($c),
			);
			
			$this->load->view('tema',$pageData);
		}

		}

		public function proses_input_data_grupmenu(){
			$this->m_security->cekRoleAkses('masterMenu');
			$formdata = $this->input->post();
			$this->m_security->cekDataKosong($formdata['id_role']);
			$this->m_security->cekMasterMenuGanda('tb_master_menu',$formdata);
			$this->m_input->insertGrupMenu('tb_master_menu',$formdata);
			redirect ('masterMenu/setting_role/'.$formdata['id_role']);

		}
		
		public function proses_input_data_se_grupmenu(){
			$this->m_security->cekRoleAkses('masterMenu');
			$formdata = $this->input->post();
			$this->m_security->cekDataKosong($formdata['nm_grup_menu']);
			$this->m_input->insertSeGrupMenu('tb_se_grup_menu',$formdata);
			redirect ('masterMenu/grup_menu');

		}

		public function delete_grupmenu($a=null){
			$this->m_security->cekRoleAkses('masterMenu');
			$form = $this->input->post();
			$this->m_security->cekDataKosong($form['id_menu']);
			$this->m_hapus->hapusGrupMenu('tb_master_menu',$form);
			redirect('masterMenu/setting_role/'.$a);

		}

		public function edit_data_grupmenu(){
			$this->m_security->cekRoleAkses('masterMenu');
			$form = $this->input->post();
			$this->m_security->cekDataKosong($form['id_role']);
			$this->m_update->updateGrupMenu('tb_master_menu',$form);
		}

		public function proses_input_data_submenu(){
			$this->m_security->cekRoleAkses('masterMenu');
			$form = $this->input->post();
			$this->m_security->cekDataKosong($form['id_submenu']);
			$this->m_security->cekMastersubMenuGanda('tb_master_submenu',$form);
			$this->m_input->insertGrupSubmenu('tb_master_submenu',$form);
			redirect('masterMenu/sub_menu/'.$form['id_submenu'].'/'.$form['name_grup']).'/';
		}
		
		public function proses_input_data_se_submenu(){
			$this->m_security->cekRoleAkses('masterMenu');
			$form = $this->input->post();
			$this->m_security->cekDataKosong($form['grup_menu']);
			$this->m_input->insertGrupSeSubmenu('tb_se_submenu',$form);
			redirect('masterMenu/grup_submenu');
		}

		public function grup_menu(){
			$this->m_security->cekRoleAkses('masterMenu/grup_menu');

			$pageData = array (
				'title'=> 'Grup Menu',
				'konten'=> 'template/menu/v_grup_menu',
				'breadcrumb' => array(
					'Home' => base_url(),
				 ),
				'datagrup' => $this->m_admin->getDataTable('tb_se_grup_menu'),
			);
			
			$this->load->view('tema',$pageData);
		}

		public function grup_submenu(){
			$this->m_security->cekRoleAkses('masterMenu/grup_submenu');

			$pageData = array (
				'title'=> 'Grup Sub Menu',
				'konten'=> 'template/menu/v_grup_submenu',
				'datasubmenu' => $this->m_admin->getDataGrupDanSubmenu(),
			);
			
			$this->load->view('tema',$pageData);

		}
		
}