<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginUser extends CI_Controller {	
	
		public function __construct(){
		parent::__construct();
		date_default_timezone_set("Asia/Jakarta");
	}
	
	public function index()
	{
		redirect('login');
	}
	
	public function login()
	{
		if(!$this->session->userdata('username') == ''){
			redirect('home');
		}else{
		$pageD = array(
			'title' => 'Selamat Datang',
		);
		$this->load->view('v_login',$pageD);
		}
	}
	
	public function ProsesLogin(){
	try{	
		$data = $this->input->post();
		$lo = $this->m_login->getDataLogin($data['id_user'],$data['password']);
		if ($lo->num_rows() == 1){
			foreach ($lo->result() as $b){
				
				$se_data = array (
					"kd_user" => $b->id_user,
					"nama_user" => $b->Nama.''.$b->NamaMhs,
					"username" => $b->user_name,
					"nama_role" => $b->nama_role,
					"lvl" => $b->level_id,
					"no_id" => $b->NPM.''.$b->NIP,
				);
				$sesi = $this->session->set_userdata($se_data);
			}
			redirect('home');
		}else{
			echo $this->session->set_flashdata('message',"Username & Password Salah , Silahkan Coba Lagi");
			redirect('login');
		}
	}catch (Exception $e){
			ExceptionHandler::handle($e);
	}
	}
	
	public function logout()
	{
		session_destroy();
		redirect('login');
	}
}
