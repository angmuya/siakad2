<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		date_default_timezone_set("Asia/Jakarta");
		
		//load model manual
		$this->load->model('m_login');
	
	}

	public function index()
	{
		if ($this->session->userdata('username') == ''){
			$a = array (
			"pesan" => "",
			);
			$this->load->view('login',$a);
		}else{
		 redirect ('a');
		}
	}
	
	public function prosesLogin()
	{
		
		$urldire = $this->input->post('url');
		$user = $this->input->post('username');
		$pass = md5($this->input->post('password'));
		
		$lo = $this->m_login->getDataLogin($user,$pass);
		if ($lo->num_rows() == 1){
			foreach ($lo->result() as $b){
				
				$se_data = array (
					"kd_user" => $b->kd_user,
					"username" => $b->username,
					"nama_user" => $b->nama_user,
					"label1" => $b->label1,
					"label2" => $b->label2,
					"ava" => $b->avatar,
					"lvl" => $b->lvl,
					"jab" => $b->jab,
				);
				$sesi = $this->session->set_userdata($se_data);
			}
				if ($this->session->userdata('lvl') == '0'){
					$a = array (
					"pesan" => "Terjadi Kesalahan, Silahkan Hubungi Admin!!!",
					);
					$this->load->view('login',$a);
				}else{
				redirect ($urldire);
				}
			
		}else {
			$a = array (
			"pesan" => "Username or password Salah!!!",
			);
			$this->load->view('login',$a);
		}
	}
	
	public function logout()
	{
		session_destroy();
		redirect('login');
	}
	
	public function logo()
	{
		echo "logo";
	}
}
