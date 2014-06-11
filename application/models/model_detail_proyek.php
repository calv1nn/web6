<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_detail_proyek extends CI_Model {
	function __construct() {
	parent::__construct();
	
	}

	public function view_detail_proyek($id_pekerjaan)
	{
		//$this->load->database();
		//$this->db->order_by("id_pekerjaan", "asc");
	//	$query = $this->db->get('proyek_detail');
		//return $query->result_array();
		
		$this->db->select('*');
		$this->db->from('proyek');
		$this->db->join('proyek_detail','proyek_detail.kode_proyek=proyek.kode_proyek');
		$this->db->join('karyawan','proyek_detail.nik=karyawan.nik');
		$this->db->where('proyek.kode_proyek',$id_pekerjaan);
		$query = $this->db->get();
		//return $query;
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
	
		public function get_nama_proyek($id_pekerjaan)
	{
		$this->db->select('nama_proyek,kode_proyek');
		$this->db->where("kode_proyek",$id_pekerjaan);
		$query=$this->db->get('proyek');
		return $query->result_array();
	}
	
	public function get_kode_proyek($kode_proyek)
	{	
		$this->db->select('kode_proyek');
		$this->db->where("kode_proyek",$kode_proyek);
		$query=$this->db->get('proyek');
		return $query->result_array();
	}
	
	function get_nik()
	{
		$this->db->from('karyawan');
		$this->db->order_by('nik');
		$result = $this->db->get();
		$return = array();
		if($result->num_rows() > 0) {
			foreach($result->result_array() as $row) {
				$return[$row['nik']] = $row['nama_karyawan'];
			}
		}
	
		return $return;
	}
	
	public function show($table){
		$this->db->select('*');
		$data = $this->db->get($table);
		if($data->num_rows() > 0){
		return $data->result_array();
		}else
		{
		return false;
		}
	}
 
	public function insert($data,$table){
		$this->db->insert($table, $data);
		}
 
	
}