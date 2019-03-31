<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class A extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->library('encryption');
		date_default_timezone_set("Asia/Jakarta");
		$urldire = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		if ($this->session->userdata('lvl') == ''){
			redirect ('login?url='.$urldire);
			
		}
		if ($this->session->userdata('lvl') == '0'){
			redirect ('login?url='.$urldire);
			
		}
		
		//kumpulan url
		$urlip = "dashboard/ip";
	}

	public function index(){
		$byid = $this->session->userdata('lvl');
		$s=array(
			"title" => 'Beranda Logbook',
			"isi" => 'konten',
			"p" => $this->m_data->GetDataLog($byid),
			"note" => $this->m_data->GetDataNote($byid),
		);
		
		$this->load->view('tema',$s);
	}
	
	
	//Halaman IP
	public function ip($a = null ,$ax=null,$id=null,$ud=null,$nm=null){
		if ($this->session->userdata('lvl') != '1'){
			redirect ('a');
			
		}
		if ($a == null){
		$s=array(
			"title" => 'List Ip Address',
			"isi" => 'v_list_ip',
			"key" => $this->m_data->getIPadd(),
		);
		
		$this->load->view('tema',$s);
		
		}

		if ($a == "v"){
			
			$s=array(
			"title" => 'List Ip Address',
			"isi" => 'view_ip',
			"key" => $this->m_data->getIPadd(),
			"axs" => $this->m_data->viewIPaddr($ax),
			
		);
		
		$this->load->view('tema',$s);
			
		}
	
		
		if ($a == "e"){
			
			$s=array(
			"title" => 'Edit Ip Address',
			"isi" => 'v_edit_ip',
			"ip"=> $id,
			"ip2"=> $ud,
			"nama"=> $nm,
			"key" => $this->m_data->getIPadd(),
			"ax" => $this->m_data->viewIPaddr($ax),
			
		);
		
		$this->load->view('tema',$s);
			
		}
		if ($a == 'prosesedit'){
			echo 'proses edit ip';
		}
		
		if ($a == "new"){
			$s=array(
			"title" => 'Add Ip Address',
			"isi" => 'v_new_ip',
			"ip"=> $id,
			"ip2"=> $ud,
			"nama"=> $nm,
			"key" => $this->m_data->getIPadd(),
			
		);
		
		$this->load->view('tema',$s);
			
		}
		
		if ($a == "prosesnew"){
		$a1 = $this->input->post('nama_ip');
		$a2 = $this->input->post('ip_local');
		$a3 = $this->input->post('ip_public');
		$a4 = slug($this->input->post('nama_ip').''.$this->input->post('ip_local').''.$this->input->post('ip_public'));
		
		$this->m_data->AddNewIPA($a1,$a2,$a3,$a4);
			redirect('dashboard/ip');
		}
	}
	
	// Halaman LOG
	public function lg($a1=null,$a2=null,$a3=null,$a4=null,$a5=null){
	if ($a1==null){
		
		$byid = $this->session->userdata('lvl');
		$s=array(
			"title" => 'Beranda Logbook',
			"isi" => 'konten',
			"p" => $this->m_data->GetDataLog($byid),
			"note" => $this->m_data->GetDataNote($byid),
		);
		
		$this->load->view('tema',$s);
		
	}
	if ($a1=='e'){
		$s=array(
			"title" => 'Edit Logbook',
			"isi" => 'v_edit_log',
		
			"ciah" => $this->m_data->GetDataLogedit($a3,$a5),
		);
		
		$this->load->view('tema',$s);
		
	}
	
	
	if ($a1=='new'){
		$s=array(
			"title" => 'New Logbook',
			"isi" => 'addlog',
			
		);
		
		$this->load->view('tema',$s);
		
	}
	if ($a1=='edit'){
	
	$this->load->view('addlog');
		
	}
	if ($a1=='editnote'){
	
	$this->load->view('v_editnote');
		
	}
	
	
	if ($a1=='editlogproses'){
		$id = $this->input->post('id_log');
		$isi = $this->input->post('isiedit');
		
		if (empty($isi)){
			echo "<script>";
			  echo "alert('Jangan Edit Data Kosong')  //not showing an alert box.
					window.location.href='".base_url('a')."';
					</script>";
		}else{
			
			$this->m_data->editDataLog($id,$isi);
		
		redirect ('a');
		}
		
	}
	
	if ($a1=='noteedit'){
		$id = $this->input->post('id_note');
		$isi = $this->input->post('isinote');
		
		if (empty($isi)){
			echo "<script>";
			  echo "alert('Jangan Edit Data Kosong')  //not showing an alert box.
					window.location.href='".base_url('a')."';
					</script>";
		}else{
			
			$this->m_data->editDataNote($id,$isi);
		
		redirect ('a');
		}
		
	}
	
	if ($a1=='newlogproses'){
		
		$z2 = $this->input->post('isi');
		$z3 = date('Y-m-d H:i:s');
		$z6 = $this->session->userdata('kd_user');
		if (empty($z2)){
			  echo "<script>";
			  echo "alert('Data tidak Boleh Kosong')  //not showing an alert box.
					window.location.href='".base_url('a')."';
					</script>";
		}else{
		$this->m_data->sendDataLog($z2,$z3,$z6);
		
		redirect ('a');
		};
		
	}
	}
	// Halaman Admin
	public function admin ($a1=null,$a2=null,$a3=null,$a4=null,$a5=null){
		if ($this->session->userdata('lvl') != '1'){
			redirect ('a');
			
		}
		if ($a1==null){
		$s=array(
			"title" => 'Administrator',
			"isi" => 'admin',
			"ke" => $this->m_data->getDuser(),
			"kes" => $this->m_data->getDcatUser(),
		);	
		$this->load->view('tema',$s);

		}
		if ($a1=='ucat'){
			$s=array(
			"title" => 'User Categoty',
			"isi" => 'adm_user_cat',
		);	
		$this->load->view('tema',$s);
			
		}
		if ($a1=='urole'){
			$s=array(
			"title" => 'User Role',
			"isi" => 'adm_user_role',
			"ke" => $this->m_data->getDuser(),
			"kes" => $this->m_data->getDcatUser(),
		);	
		$this->load->view('tema',$s);
			
		}
		
		if ($a1=='updrole'){
			$kd_user = $this->input->post('name_role');
			$kd_role = $this->input->post('role');
			
			$this->m_data->UpdUserRole($kd_user,$kd_role);
			
			redirect ('a/admin/urole');
			
		}
		
		if ($a1=='new'){ //Halaman New Account
			$s=array(
			"title" => 'User Categoty',
			"isi" => 'adm_user_acc_new',
			"ke" => $this->m_data->getDuser(),
			"kes" => $this->m_data->getDcatUser(),
		);	
		$this->load->view('tema',$s);
			
		}
		
		if ($a1=='savedata'){ //Halaman Proses Simpan Data user
			
			function warna(){
				
			}
			
			$usernm 	= $this->input->post('user');
			$pass 		= md5($this->input->post('user'));
			$nama_user 	= $this->input->post('nama_user');			
			$label1 	= warna();			
			$label2 	= "success";			
			$ava 		= "componen/dist/img/avatar04.png";			
			$lvl 		= "0";			
			$jab 		= $this->input->post('lvl');			
			
			$cekuser = $this->m_data->cekUsersama($usernm);
			
			
			if ($cekuser->num_rows() > 0){
					echo "<script>
						alert('Username Sudah Ada')  //not showing an alert box.
						window.history.go(-1);
						</script>";
			}else if (empty($usernm)){
				redirect ('a/admin/new');
			}else if (!preg_match("/^[a-zA-Z]*$/",$usernm)){
				echo "<script>
					alert('Username Tidak Boleh Mengandung Spasi')  //not showing an alert box.
					window.history.go(-1);
					</script>";
				
			}else{
			$k = $this->m_data->SendDataUacc($usernm,$pass,$nama_user,$label1,$label2,$ava,$lvl,$jab);
			
			echo "<script>
					alert('Data Sukses Dikirim')
					window.history.go(-1);
					</script>";
			}
			
		}
		
		if ($a1=='v'){ //Halaman view Account
			$s=array(
			"title" => 'User Categoty',
			"isi" => 'adm_user_acc_view',
			"ke" => $this->m_data->getDuser(),
			"kes" => $this->m_data->getDcatUser(),
			"axs" => $this->m_data->GetVacc($a2),
		);	
		$this->load->view('tema',$s);
			
		}
		if ($a1=='editaccproses'){
			//Proses Edit Data
			$id = $this->input->post('id_ac');
			$jab = $this->input->post('jab');
			
			$ch = $this->m_data->EditAccPrs($id,$jab);
			
			if ($ch == true){
				echo "data sdh di kirim";
			}else{
				echo "Gagal Ubah data";
			}
			
		}
		
		if ($a1=='e'){ //Halaman view Account
			$s=array(
			"title" => 'User Categoty',
			"isi" => 'adm_user_acc_edit',
			"ke" => $this->m_data->getDuser(),
			"kes" => $this->m_data->getDcatUser(),
			"axs" => $this->m_data->GetVacc($a2),
		);	
		$this->load->view('tema',$s);
			
		}
		
		if ($a2=='new'){ //Halaman New Category
			$s=array(
			"title" => 'User Categoty',
			"isi" => 'adm_usercat_new',
		);	
		$this->load->view('tema',$s);
			
		}
		

	}
	
	//Halaman Ubah Password
	public function change_password ($a1=null,$s2=null)
	{
		if ($a1==null){
		$s=array(
			"title" => 'Ubah Password',
			"isi" => 'v_ch_pass',
		);	
		$this->load->view('tema',$s);
		}if ($a1=="proses"){
			$user = $this->session->userdata('kd_user');
			$pass_old = md5($this->input->post('pass_old'));
			$new_pass = md5($this->input->post('new_pass'));
			$conf_pass = md5($this->input->post('conf_pass'));
			
			$cek = $this->m_data->cekPasswordUser($user,$pass_old);
			$url = base_url('login/logout');
			if ($cek->num_rows() > 0){
				if ($new_pass == $conf_pass){
					
					$this->m_data->ubahPasswordUser($user,$new_pass);
					
					echo "<script>
					alert('Password Sudah Kami Ubah Silahkan Login Ulang')  //not showing an alert box.
					top.location='$url';
					</script>";
					
				}else{
					echo "<script>
					alert('Password Baru & Konfirmasi Password Harus sama')  //not showing an alert box.
					window.history.go(-1);
					</script>";
				}
			}else if (empty($pass_old)){
				redirect('a/change_password');
			}else{
				echo "<script>
					alert('Password lama Anda salah')  //not showing an alert box.
					window.history.go(-1);
					</script>";
			}
		}
	}
	
	public function checklist($q1=null,$q2=null,$q3=null){
		if ($q2=='work'){
			$q1descrip = base64_decode($q1);
			$s=array(
			"title" => 'WorkSheet Checklist',
			"isi" => 'v_work_checklist',
			"noroom" => $this->m_data->GetNoroom($q1descrip),
			"wak" => $this->m_data->getChecklistCat(),
		);	
		$this->load->view('tema',$s);
		}else if ($q2=='revisi'){
			$q1descrip = base64_decode($q1);
			$s=array(
			"title" => 'WorkSheet Checklist',
			"isi" => 'v_edit_checklist',
			"noroom" => $this->m_data->GetNoroomChed($q1descrip),
			"wak" => $this->m_data->getChecklistCat(),
		);	
		$this->load->view('tema',$s);
		}else if ($q1=='cetak'){
			$cek = $this->m_data->GetCondCetak();
			if ($cek->num_rows () < 26 ){
				echo "Tidak Bisa di Print, Karena Room Belum Semua Terchecklist";
			}else{
			
			$tgl = date('Y-m-d');
			$s = array(
			"v_ch" => $this->m_data->viewList2(),
			"tampil" => $this->m_data->viewCetak($tgl),
			"tgl" => $tgl,
			);
			$this->m_data->UpdateCondRoom(); // Agar kondisi room Aktiv Kembali
			$this->load->view('v_cetak',$s);
			}
		}else if ($q1=='preview'){
			$cond['cond_room'] = "0";
			$print = $this->db->get_where('tb_room',$cond);
			if ($print->num_rows() < 26){
				
			$tgl = date('Y-m-d');
			$s = array(
			"title" => 'Edit Data WorkSheet',
			"isi" => 'v_revisi_checklist',
			"v_ch" => $this->m_data->viewList2(),
			"tampil" => $this->m_data->viewCetak($tgl),
			);
			$this->load->view('tema',$s);
			}else{
				redirect('a/checklist/?preview=Error');
			}
		}else if ($q1=='reprint'){
			$tg = $this->input->post('y').'-'.$this->input->post('m').'-'.$this->input->post('d');
			
			if ($q2=='cetak'){ //Cetak Reprint
				if ($tg==date('Y-m-d')){
					redirect('a/checklist/cetak');
				}else if (empty($this->input->post('y'))){
					redirect('a/checklist/reprint/ReprintError='.crypt(date('s'),'G4R4M'));
				}else if ($this->input->post('y').''.$this->input->post('m').''.$this->input->post('d') > date('Ymd')){
					redirect('a/checklist/reprint/TanggalError='.crypt(date('s'),'G4R4M'));
				}
				else{
					
					$tgl = $tg;
					$s = array(
					"v_ch" => $this->m_data->viewList2(),
					"tampil" => $this->m_data->viewCetak($tgl),
					"tgl" => $tgl,
					);
					
					$this->load->view('v_cetak',$s);
				}
			}
			
			else{
			
			$s = array(
			"title" => 'Edit Data WorkSheet',
			"isi" => 'v_cetak_ulang',
			"tgl" => $tg,
			);
			$this->load->view('tema',$s);
			}
			
		}else if ($q1=='proses'){
			$tgl = date('Y-m-d');
			$noroom = $this->input->post('room');
			$room_id = $this->input->post('room_id');
			$w1 = $this->input->post('w1');
			$w2 = $this->input->post('w2');
			$w3 = $this->input->post('w3');
			$w4 = $this->input->post('w4');
			$w5 = $this->input->post('w5');
			$w6 = $this->input->post('w6');
			$w7 = $this->input->post('w7');
			$w8 = $this->input->post('w8');
			$w9 = $this->input->post('w9');
			$w10 = $this->input->post('w10');
			$w11 = $this->input->post('w11');
			$w12 = $this->input->post('w12');
			$ket = $this->input->post('ket');
		
			if (empty($noroom)){
				echo "Room Tidak Di kenali";
			}else{
			$insert = $this->m_data->kirimDataCheklist($tgl,$noroom,$room_id,$w1,$w2,$w3,$w4,$w5,$w6,$w7,$w8,$w9,$w10,$w11,$w12,$ket); 
			redirect ('a/checklist');
			}
			
		}else{
		$s=array(
			"title" => 'Checklist',
			"isi" => 'v_checklist_it',
			"oper" => $this->m_data->getRoom(),
		);	
		$this->load->view('tema',$s);
			
		}
	}
	
	
	public function latihan(){
		$awal  = date_create('2018-12-18 23:01');
		$akhir = date_create();
		$diff  = date_diff( $awal, $akhir );

		$se = $diff->h ; //menit
		$sel = $diff->i ; //menit
		$selisih = $se.''.$sel;
		
		echo base_url();
	if ($selisih < 10){
		echo "data masih bisa di edit";
	}else{
		echo "selisih waktu : $selisih";
	}
}
public function latih(){
	$part = "222";
	$enc = $this->encryption->encrypt($part);
	$des = $this->encryption->decrypt($enc);
	
	echo $enc."<br>";
	echo $des;
	
}
}
