<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_proyek extends CI_Model {

	public function view_proyek()
	{
		//$this->load->database();
		$this->db->order_by("kode_proyek", "asc");
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
	
}