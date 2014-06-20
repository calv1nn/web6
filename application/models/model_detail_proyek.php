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
		//$this->db->join('laporan','proyek_detail.id_pekerjaan=laporan.status_laporan');
		$this->db->where('proyek.kode_proyek',$id_pekerjaan);
		$query = $this->db->get();
		//return $query;
		return $query->result_array();
	}
	
	public function insert_detail_proyek($id_pekerjaan,$kode_proyek,$nik,$nama_pekerjaan,$start_date,$end_date,$progress,$kategori)
	{
		$data = array(
		'id_pekerjaan' => $id_pekerjaan,
		'kode_proyek' => $kode_proyek,
		'nik' => $nik,
		'nama_pekerjaan' => $nama_pekerjaan,
		'start_date' => $start_date,
		'end_date' => $end_date,
		'progress' => $progress,
		'kategori' => $kategori
		);
		$this->db->insert('proyek_detail', $data);
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
	
	public function get_progress($id_pekerjaan)
	{
		$this->db->select('*');
		$this->db->from('laporan');
		$this->db->join('proyek_detail','laporan.id_pekerjaan=proyek_detail.id_pekerjaan');
		$this->db->where('id_pekerjaan',$id_pekerjaan);
		$query = $this->db->get();
		return $query;
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
	
	public function get_id_pekerjaan($id_pekerjaan)
	{	
		$this->db->select('id_pekerjaan');
		$this->db->where("id_pekerjaan",$id_pekerjaan);
		$query=$this->db->get('proyek_detail');
		return $query->result_array();
	}
	
	public function get_id_laporan($id_laporan)
	{	
		$this->db->select('id_laporan');
		$this->db->where("id_laporan",$id_laporan);
		$query=$this->db->get('id_laporan');
		return $query->result_array();
	}
	
	public function get_nama_file($id_laporan)
	{	
		$this->db->select('nama_file');
		$this->db->where("id_laporan",$id_laporan);
		$query=$this->db->get('laporan');
		return $query->result_array();
	}
	
	public function show($laporan){
		$this->db->select('*');
		$data = $this->db->get($laporan);
		if($data->num_rows() > 0){
		return $data->result_array();
		}else
		{
		return false;
		}
	}
 
	public function insert($data,$laporan){
		$this->db->insert($laporan, $data);
		}
 
	public function view_download($id_laporan)
	{
		$this->db->select('*');
		$this->db->from('laporan');
		$this->db->join('proyek_detail','laporan.id_pekerjaan=proyek_detail.id_pekerjaan');
		$this->db->where('proyek_detail.id_pekerjaan',$id_laporan);
		$query = $this->db->get();
		//return $query;
		return $query->result_array();
	}
	
	public function update_status_laporan2($id_laporan)
      {
              $data = array (
              
              'status_laporan' => 2
              );
              $this->db->where('id_laporan',$id_laporan);
              $this->db->update('laporan',$data);
      }
      
      public function update_status_laporan($id_laporan)
      {
              $data = array (
              
              'status_laporan' => 1
              );
              $this->db->where('id_laporan',$id_laporan);
              $this->db->update('laporan',$data);
      }
	
	
}
