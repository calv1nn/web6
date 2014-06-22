<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_load_pekerjaan extends CI_Model {

	public function view_load_pekerjaan($kode_proyek)
	{
		//$this->load->database();
		//$this->db->order_by("id_pekerjaan", "asc");
	//	$query = $this->db->get('proyek_detail');
		//return $query->result_array();
		
		$this->db->select('*');
		$this->db->from('load_pekerjaan');
		$this->db->join('proyek','proyek.kode_proyek=load_pekerjaan.kode_proyek');
		$this->db->join('karyawan','load_pekerjaan.nik=karyawan.nik');
		$this->db->where('proyek.kode_proyek',$kode_proyek);
		$query = $this->db->get();
		//return $query;
		return $query->result_array();
	}
	
	public function get_nik()
	{	
		$this->db->select('*');
		$this->db->from('karyawan');
		$this->db->order_by('nik');
		$result = $this->db->get();
		
		return $result->result_array();
	}
	
	public function get_nama_proyek($kode_proyek)
	{
		$this->db->select('nama_proyek,kode_proyek');
		$this->db->where("kode_proyek",$kode_proyek);
		$query=$this->db->get('proyek');
		return $query->result_array();
	}
	
	public function insert_load_pekerjaan($data)
	{
		$this->db->insert('load_pekerjaan', $data);
	}
	
	public function get_load($kode_proyek)
	{
		$this->db->select('*');
		$this->db->from('load_pekerjaan');
		$this->db->join('proyek','proyek.kode_proyek=load_pekerjaan.kode_proyek');
		//$this->db->join('karyawan','load_pekerjaan.nik=karyawan.nik');
		//$this->db->where('load_pekerjaan.kode_proyek',$kode_proyek);
		$query = $this->db->get();
		//return $query;
		return $query->result_array();
	}
}	
?>