<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_karyawan extends CI_Model {

	public function check_login($email,$password)
	{
		$this->db->where(array('email'=>$email,
								'password'=>$password,
								'status'=>'1'));
		$query=$this->db->get('karyawan');
		if($query->num_rows()>0) return true;
		else return false;
	}
	
	public function check_login_bpm($email,$password)
	{
		$this->db->where(array('email'=>$email,
								'password'=>$password,
								'jabatan'=>'Bussiness Project Manager',
								'status'=>'1'));
		$query=$this->db->get('karyawan');
		if($query->num_rows()>0) return true;
		else return false;
	}
	
	public function check_login_timteknis($email,$password)
	{
		$this->db->where(array('email'=>$email,
								'password'=>$password,
								'jabatan'=>'Tim Teknis',
								'status'=>'1'));
		$query=$this->db->get('karyawan');
		if($query->num_rows()>0) return true;
		else return false;
	}
	
	public function check_login_pm($email,$password)
	{
		$this->db->where(array('email'=>$email,
								'password'=>$password,
								'jabatan'=>'Project Manager',
								'status'=>'1'));
		$query=$this->db->get('karyawan');
		if($query->num_rows()>0) return true;
		else return false;
	}
	
	public function view_karyawan()
	{
		//$this->load->database();
		$this->db->order_by("nik", "asc");
		$query = $this->db->get('karyawan');
		return $query->result_array();
	}
	
	public function delete_karyawan($nik)
	{
		$this->db->where('nik',$nik);
		$this->db->delete('karyawan');
	}

	public function insert_karyawan($nik,$email,$password,$nama_karyawan,$jabatan,$status)
	{
		$data = array(
		'nik' => $nik,
		'email' => $email,
		'password' => MD5($password),
		'nama_karyawan' => $nama_karyawan,
		'jabatan' => $jabatan,
		'status' => $status
		);
		$this->db->insert('karyawan', $data);
	}
	
	public function get_karyawan($nik)
	{
		$this->db->where("nik",$nik);
		$query=$this->db->get('karyawan');
		return $query->result_array();
	}
	
	public function update_karyawan($nik,$email,$nama_karyawan,$jabatan,$status)
	{
		$data = array (
		'email' => $email,
		'nama_karyawan' => $nama_karyawan,
		'jabatan' => $jabatan,
		'status' => $status
		);
		$this->db->where('nik',$nik);
		$this->db->update('karyawan',$data);
	}
}
