<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_data extends CI_Model {

	public function GetDataLog($a)
	{
		$id['lvl'] = $a;
		$this->db->from('tblog');
		$this->db->join('user','user.kd_user=tblog.kd_usr','left');
		$this->db->order_by("time_log","desc");
		$this->db->where($id);
		$data = $this->db->get();
		
		return $data;
	}
	
	public function getDuser()
	{
		$this->db->from('user');
		$this->db->join('tb_cat_user','tb_cat_user.kd_cat_user=user.lvl','left');
		$data = $this->db->get();
		
		return $data;
	}
	public function getDcatUser()
	{
		
		$data = $this->db->get('tb_cat_user');
		
		return $data;
	}
	
	public function getIPadd()
	{
		$this->db->order_by("nama_ip","asc");
		$data = $this->db->get('ip_address');
		
		return $data;
	}
	
	
	
	public function sendDataLog($a2,$a3,$a6)
	{
		$kirim = array (
			"kd_log" => "NULL",
			"isi" => $a2,
			"time_log" => $a3,
			"kd_usr" => $a6,
		);
		$data = $this->db->insert('tblog',$kirim);
		return $data;
	}
	
	public function AddNewIPA($a1,$a2,$a3,$a4)
	{
		$kirim = array (
			"id_ip" => "NULL",
			"nama_ip" => $a1,
			"no_ip_local" => $a2,
			"no_ip_public" => $a3,
			"slug_ip" => $a4,
		);
		$data = $this->db->insert('ip_address',$kirim);
		return $data;
	}
	
	public function viewIPaddr($a1)
	{
		$kirim = array (
			"slug_ip" => $a1,
		);
		$data = $this->db->get_where('ip_address',$kirim);
		return $data;
	}
	
	public function GetVacc($a1)
	{
		$kirim = array (
			"kd_user" => $a1,
		);
		$data = $this->db->get_where('user',$kirim);
		return $data;
	}
	
	
	public function GetDataLogedit($a1,$a2)
	{
		$kirim = array (
			"kd_log" => $a1,
			"kd_usr" => $a2,
		);
		$data = $this->db->get_where('tblog',$kirim);
		return $data;
	}
	
	public function editDataLog($wh,$a2)
	{
		$whe['kd_log'] = $wh ;
		$kirim = array (
			"isi" => $a2,
		);
		$data = $this->db->update('tblog',$kirim,$whe);
		return $data;
	}
	
	public function editDataNote($wh,$a2)
	{
		$whe['kd_note'] = $wh ;
		$kirim = array (
			"isi_note" => $a2,
		);
		$data = $this->db->update('tb_note',$kirim,$whe);
		return $data;
	}
	
	public function SendDataUacc($a1,$a2,$a3,$a4,$a5,$a6,$a7,$a8)
	{
		$kirim = array (
			'kd_user' => 'NULL',
			'username' => $a1,
			'pass' => $a2,
			'nama_user' => $a3,
			'label1' => $a4,
			'label2' => $a5,
			'avatar' => $a6,
			'lvl' => $a7,
			'jab' => $a8,
		);
		
	$dt = $this->db->insert('user',$kirim);
	return $dt;
	}
	
	public function UpdUserRole ($a1,$a2)
	{
		$wh['kd_user'] = $a1;
		$up['lvl'] = $a2;
		
		$this->db->update('user',$up,$wh);
	}
	
	public function cekPasswordUser($id,$pold){
		$where['kd_user'] = $id;
		$where['pass'] = $pold;
		
		$dt = $this->db->get_where('user',$where);
		return $dt;
	}
	
	public function ubahPasswordUser($id,$npas){
		$wh['kd_user'] = $id;
		$sn['pass']=$npas;
		
		$dt = $this->db->update('user',$sn,$wh);
		return $dt;
	}
	
	public function cekUsersama($user){
		$wh['username'] = $user;
		
		return $this->db->get_where('user',$wh);
		
	}
	
	public function EditAccPrs($a1,$a2){
		$wh['kd_user'] = $a1;
		$ch['jab'] = $a2;
		
		return $this->db->update('user',$ch,$wh);
		
	}
	
	public function GetDataNote($id){
		$wh['kd_lvl']	= $id;
		
		return $this->db->get_where('tb_note',$wh);
	}
	
	public function getRoom()
	{
		$this->db->order_by("id_room","asc");
		$data = $this->db->get('tb_room');
		
		return $data;
	}
	
	public function getChecklistCat()
	{
		$this->db->order_by("id_check","asc");
		$data = $this->db->get('tb_checklist');
		
		return $data;
	}
	
	public function GetNoroom($a)
	{
		$wh['id_room']=$a;
		$data = $this->db->get_where('tb_room',$wh);
		
		return $data;
	}
	
	public function GetNoroomChed($a)
	{
		$wh['id_work_cheklist']=$a;
		$data = $this->db->get_where('tb_work_checklist',$wh);
		
		return $data;
	}
	
	public function viewCetak($a)
	{
		$this->db->order_by("kd_room","asc");
		$wh['tgl_work']=$a;
		$data = $this->db->get_where('tb_work_checklist',$wh);
		
		return $data;
	}
	
	public function viewList2()
	{
		
		$data = $this->db->get('tb_checklist');
		
		return $data;
	}
	
	public function GetDisabledButton()
	{
		$wh['tgl_work'] = date('Y-m-d');
		$data = $this->db->get_where('tb_work_checklist',$wh);
		
		return $data;
	}
	
	public function kirimDataCheklist($tgl,$noroom,$room_id,$w1,$w2,$w3,$w4,$w5,$w6,$w7,$w8,$w9,$w10,$w11,$w12,$ket)
	{
		$wh = array (
			"id_work_cheklist" =>NULL,
			"tgl_work" =>$tgl,
			"no_room" =>$noroom,
			"kd_room" =>$room_id,
			"keterangan" =>$ket,
			"w1" =>$w1,
			"w2" =>$w2,
			"w3" =>$w3,
			"w4" =>$w4,
			"w5" =>$w5,
			"w6" =>$w6,
			"w7" =>$w7,
			"w8" =>$w8,
			"w9" =>$w9,
			"w10" =>$w10,
			"w11" =>$w11,
			"w12" =>$w12,
		);
		$whw['id_room'] = $room_id;
		$ch['cond_room'] = '1';
		$data = $this->db->insert('tb_work_checklist',$wh);
		$data = $this->db->update('tb_room',$ch,$whw);
		
		return $data;
	}
	
	public function UpdateCondRoom (){
		$ch['cond_room'] = '0';
		$data = $this->db->update('tb_room',$ch);
		return $data;
	}
	
	public function GetCondCetak (){
		$wh['tgl_work'] = date('Y-m-d');
		$data = $this->db->get_where('tb_work_checklist',$wh);
		return $data;
	}
	

}
