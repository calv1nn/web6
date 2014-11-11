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
		$this->db->where('status',1);
		$this->db->where('peran','Tim Teknis');
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
		
		$this->db->select('count(load_pekerjaan.nik) as row4');
		$this->db->from('load_pekerjaan');
		$this->db->join('proyek','proyek.kode_proyek=load_pekerjaan.kode_proyek');
		$this->db->where('load_pekerjaan.nik',$data['nik']);
		$query = $this->db->get();
		
		
		foreach ($query->result_array() as $row){
			$jumlah_pekerjaan = $row['row4'];
		} 
		
		$data1 = array (
				'jumlah_pekerjaan' => $jumlah_pekerjaan
              );
              $this->db->where('nik',$data['nik']);
              $this->db->update('karyawan',$data1);
		
	}
	
	// public function get_load($kode_proyek)
	// {
		// $sql = "select karyawan.nik, karyawan.nama_karyawan
		// from karyawan
		// where karyawan.status = 1 and karyawan.peran = 'Tim Teknis'
		// ";
		// $a = $this->db->query($sql)->result_array();
		// return $a; 		
// // var_dump($azz);exit;
		
	// }
	
	public function get_load($kode_proyek)
	{
		$sql = "select karyawan.nik, karyawan.nama_karyawan
		from karyawan
		where karyawan.status = 1 and karyawan.peran = 'Tim Teknis' and karyawan.nik not in (select nik from load_pekerjaan where kode_proyek = $kode_proyek)
		";
		$a = $this->db->query($sql)->result_array();		
		
		$azz = array();
		if(count($a) > 0)
		{	
		$i = 0;
		foreach ($a as $a1)
			{	
				$aa[$i] = $a1['nik'];
				$sql1 = 'select karyawan.nik, karyawan.nama_karyawan, 8-sum(load_pekerjaan_detail.jam) as jam_sisa
				from load_pekerjaan_detail, karyawan 
				where karyawan.nik = load_pekerjaan_detail.nik and load_pekerjaan_detail.nik = '.$aa[$i];
				$ab = $this->db->query($sql1);
					foreach($ab->result() as $v){
					$nik_a = $v->nik;
					if($nik_a == '')
					{
						$sql_jam_sisa = 'select karyawan.nik, karyawan.nama_karyawan, 8 as jam_sisa
													from karyawan
													where karyawan.status = 1 and karyawan.peran = "Tim Teknis" and karyawan.nik ='.$aa[$i];
						$sql_jam_sisa1 = $this->db->query($sql_jam_sisa)->result_array();
						foreach ($sql_jam_sisa1 as $sql_jam_sisa2)
						{	
						$s = array('nik'=>$sql_jam_sisa2['nik'],'nama_karyawan'=>$sql_jam_sisa2['nama_karyawan'],'jam_sisa'=>$sql_jam_sisa2['jam_sisa']);
						array_push($azz,$s);
						}
					}
					else
					{
					$s = array('nik'=>$v->nik,'nama_karyawan'=>$v->nama_karyawan,'jam_sisa'=>$v->jam_sisa);
					array_push($azz,$s);
					}
					}
				$i++;
			}
		}
		// var_dump($azz);exit;
		return $azz; 
	}
	
}	
?>