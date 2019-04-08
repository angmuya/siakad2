<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_combobox extends CI_Controller {
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
        $data = array(
            "result_prodi" => $this->m_admin->getProdiByFakultas('tb_prodi',$dataform)
        );
        $this->load->view('combobox/v_fakultasgetprodi',$data);
    }


}