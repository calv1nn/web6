<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_proyek extends CI_Model {

	public function view_proyek()
	{
		//$this->load->database();
		$this->db->order_by("progress", "asc");
		$query = $this->db->get('proyek');
		return $query->result_array();
	}
	
	public function view_proyek2()
	{
		//$this->load->database();
		$this->db->where("end_date", less_than(date('Y-m-d')));
		$query = $this->db->get('proyek');
		return $query->result_array();
	}
	
	public function insert_proyek($kode_proyek,$nama_proyek,$start_date,$end_date,$client,$progress)
	{
		$data = array(
		'kode_proyek' => $kode_proyek,
		'nama_proyek' => $nama_proyek,
		'start_date' => $start_date,
		'end_date' => $end_date,
		'client' => $client,
		'progress' => $progress
		);
		$this->db->insert('proyek', $data);
	}
	
	public function get_proyek($kode_proyek)
	{
		$this->db->where("kode_proyek",$kode_proyek);
		$query=$this->db->get('proyek');
		return $query->result_array();
	}
	
	public function update_proyek($kode_proyek,$nama_proyek,$start_date,$end_date,$client)
	{
		$data = array (
		'nama_proyek' => $nama_proyek,
		'start_date' => $start_date,
		'end_date' => $end_date,
		'client' => $client
		);
		$this->db->where('kode_proyek',$kode_proyek);
		$this->db->update('proyek',$data);
	}
	
}