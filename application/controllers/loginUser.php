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
		if (empty($data['id_user'])){
			echo "<div class='alert alert-danger alert-dismisible fade show animated bounce' role='alert' >
					<strong>WARNING !!!</strong> Username Harus Diisi !!!
					<button type='button' class='close' data-dismiss='alert' area-label='close' >
						<span aria-hidden='true' >&times;</span>
					</button>
				</div>";
		}elseif (empty($data['password'])){
			echo "<div class='alert alert-danger alert-dismisible fade show animated bounce' role='alert' >
					<strong>WARNING !!!</strong> Password Harus Diisi !!!
					<button type='button' class='close' data-dismiss='alert' area-label='close' >
						<span aria-hidden='true' >&times;</span>
					</button>
				</div>";
		}else{
		$lo = $this->m_login->getDataLogin($data['id_user'],$data['password']);
		if ($lo->num_rows() == 1){
			foreach ($lo->result() as $b){
				
				$se_data = array (
					"kd_user" => $b->id_user,
					"nama_user" => $b->nama_user,
					"username" => $b->user_name,
					"nama_role" => $b->nama_role,
					"lvl" => $b->level_id,
				);
				$sesi = $this->session->set_userdata($se_data);
			}
			echo "1";
		}else{
			echo "<div class='alert alert-danger alert-dismisible fade show animated bounce' role='alert' >
					<strong>WARNING !!!</strong> Username Dan Password Salah!!!
					<button type='button' class='close' data-dismiss='alert' area-label='close' >
						<span aria-hidden='true' >&times;</span>
					</button>
				</div>";
			
		}
		}
	}catch (Exception $e){
			ExceptionHandler::handle($e);
	}
	}
	
	public function logout()
	{
		$this->session->sess_destroy('lvl');
		redirect('login');
	}
}
