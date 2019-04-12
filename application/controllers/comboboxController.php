<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ComboboxController extends CI_Controller {
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


    public function index () {
        $this->load->view('combobox/v_semester');

    }

    public function getProdiByFakultas(){
        $dataform = $this->input->post();
        $this->m_security->cekDataKosong($dataform['kd_fakultas']);
        $data = array(
            "result_prodi" => $this->m_combobox->getProdiByFakultas('tb_prodi',$dataform)
        );
        $this->load->view('combobox/v_fakultasgetprodi',$data);
    }

    public function getCssClassByGrupName(){
        $dataform = $this->input->post();
        $this->m_security->cekDataKosong($dataform['grup']);
        $data = array(
            "result_css_class" => $this->m_combobox->getCssClassByGrupName('tb_se_grup_menu',$dataform)
        );
        $this->load->view('combobox/v_getCssClassByGrupName',$data);
    }

    public function getLinkBySubmenu(){
        $dataform = $this->input->post();
        $this->m_security->cekDataKosong($dataform['get_link']);
        $data = array(
            "result_link" => $this->m_combobox->getLinkBySubmenu('tb_se_submenu',$dataform)
        );
        $this->load->view('combobox/v_getLinkBySubmenu',$data);
        
    }

	public function getIdTaBySemester(){
        $dataform = $this->input->post();
        $this->m_security->cekDataKosong($dataform['semester']);
        $data = array(
            "semester" => $dataform['semester'],
        );
        $this->load->view('combobox/v_getIdTaBySemester',$data);
        
    }
    


}