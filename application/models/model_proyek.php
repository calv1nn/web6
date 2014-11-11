<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_proyek extends CI_Model {

	public function view_proyek()
	{
		//$this->load->database();
		
		$sql1 = 'select end_date, id_pekerjaan from proyek_detail';
				$ab = $this->db->query($sql1);
					foreach($ab->result() as $v){
					$tgl_end = $v->end_date;
					$id_pekerjaan = $v->id_pekerjaan;
					$tgl_now = date('Y-m-d');
					// var_dump($tgl_end);exit;
					if(strtotime($tgl_end)< strtotime($tgl_now))
					{
						$sqldel = "delete from load_pekerjaan_detail where id_pekerjaan = $id_pekerjaan";
						$adel = $this->db->query($sqldel);
					}
					}
		
		$sql = "select proyek.*,karyawan.nama_karyawan from proyek,karyawan where proyek.nik_proyek_manager=karyawan.nik";
		return $this->db->query($sql)->result_array();   
	}
	
	public function view_proyek_chart()
	{
		//$this->load->database();
		$sql = "select proyek.*,karyawan.nama_karyawan from proyek,karyawan where proyek.nik_proyek_manager=karyawan.nik and proyek.progress!=100";
		return $this->db->query($sql)->result_array();   
	}
	
	public function view_proyek2()
	{
		//$this->load->database();
		$this->db->where("end_date", less_than(date('Y-m-d')));
		$query = $this->db->get('proyek');
		return $query->result_array();
	}
	
	public function insert_proyek($nik,$kode_proyek,$nama_proyek,$start_date,$end_date,$client,$progress)
	{
		$data = array(
		'kode_proyek' => $kode_proyek,
		'nama_proyek' => $nama_proyek,
		'start_date' => $start_date,
		'end_date' => $end_date,
		'client' => $client,
		'progress' => $progress,
		'nik_proyek_manager' => $nik
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
	$sql_cek = "select start_date, end_date from proyek where kode_proyek = ".$kode_proyek;
	$a_cek = $this->db->query($sql_cek)->result_array();
	foreach ($a_cek as $a1_cek)
	{	
	$aa_cek = $a1_cek['start_date'];
	$bb_cek = $a1_cek['end_date'];
	}
	if($aa_cek != $start_date || $bb_cek != $end_date)
	{
		$sql = "select * from proyek_detail where kode_proyek = ".$kode_proyek;
		// var_dump($sql);exit;
		$a = $this->db->query($sql)->result_array();
		if(count($a) > 0)
		{	
		foreach ($a as $a1)
			{	
			$aa = $a1['id_pekerjaan'];
			// var_dump($aa);exit;
				$sql_edttgl = "update proyek_detail set start_date = NULL, end_date = NULL where id_pekerjaan = ".$aa;
				// var_dump($sql_edttgl);exit;
				$a_edttgl = $this->db->query($sql_edttgl);
			}
		}
	}
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