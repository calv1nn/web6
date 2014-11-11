<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_detail_proyek extends CI_Model {
	function __construct() {
	parent::__construct();
	
	}

	public function view_detail_proyek($id_pekerjaan)
	{
		$adel123_tot_prog = '';
		$sql = "select * 
		from proyek, proyek_detail, karyawan 
		where proyek_detail.kode_proyek=proyek.kode_proyek and proyek_detail.nik=karyawan.nik and proyek.kode_proyek = $id_pekerjaan order by proyek_detail.end_date
		";
		$a = $this->db->query($sql)->result_array();
		// var_dump($a);exit;
		
		if(count($a) > 0)
		{	
		$i = 0;
		foreach ($a as $a1)
			{	
			$aa[$i] = $a1['id_pekerjaan'];
			$bb[$i] = $a1['progress'];
			$cc[$i] = $a1['kode_proyek'];
			// if($bb[$i] == 100){
				// $sqldel = "delete from load_pekerjaan_detail where id_pekerjaan =".$aa[$i];
				// $adel = $this->db->query($sqldel);
				
				$sqldel1 = "select proyek_detail.id_pekerjaan, proyek_detail.progress as progress_detail, proyek.kode_proyek as kode_proyek,
				((to_days(proyek.end_Date)-to_days(proyek.start_date))+1) as durasi_proyek, 
				((to_days(proyek_detail.end_Date)-to_days(proyek_detail.start_date))+1) as durasi_detail, 
				((to_days(proyek_detail.end_Date)-to_days(proyek_detail.start_date))+1)/((to_days(proyek.end_Date)-to_days(proyek.start_date))+1)*100 as progress_proyek,
				(((to_days(proyek_detail.end_Date)-to_days(proyek_detail.start_date))+1)/((to_days(proyek.end_Date)-to_days(proyek.start_date))+1)*100) * proyek_detail.progress / 100 as progress
				from proyek,proyek_detail
				where proyek.kode_proyek=proyek_detail.kode_proyek and proyek_detail.id_pekerjaan =".$aa[$i];
				$adel1 = $this->db->query($sqldel1)->result_array();
						if(count($adel1) > 0)
						{
						foreach ($adel1 as $adel12)
							{
							// $adel123_id = $adel12['id_pekerjaan'];
							// $adel1230 = $adel12['kode_proyek'];
							// $adel123 = $adel12['progress_proyek'];
							// $adel123_dur = $adel12['durasi_detail'];
							$adel123_prog = $adel12['progress'];
							$adel123_tot_prog = $adel123_tot_prog + $adel123_prog;
							
							// $adel1234 = "update proyek set progress = progress + $adel123 where kode_proyek = $adel1230 ";
							// // var_dump($adel1234);exit;
							// $adel12345 = $this->db->query($adel1234);
							
							}
						$adel1234 = "update proyek set progress = $adel123_tot_prog where kode_proyek =".$cc[$i];
						// var_dump($adel1234);exit;
						$adel12345 = $this->db->query($adel1234);	
						}
			// }
			$i++;
			}
		}
		
		return $a;
	}
	
	public function view_detail_proyek2()
	{
		$this->db->select('*');
		$this->db->from('proyek_detail');
		$query = $this->db->get();
		//return $query;
		return $query->result_array();
	}
	
	public function get_nik_()
	{	
		$this->db->select('*');
		$this->db->from('karyawan');
		$this->db->order_by('nik');
		$this->db->where('status',1);
		$this->db->where('peran','Tim Teknis');
		$result = $this->db->get();
		
		return $result->result_array();
	}
	
	public function get_load_all($kode_proyek)
	{	
		$sql = "select karyawan.nik
		from karyawan, load_pekerjaan
		where karyawan.nik = load_pekerjaan.nik and load_pekerjaan.kode_proyek = $kode_proyek
		";
		$a = $this->db->query($sql)->result_array();
		if(count($a) > 0)
		{	
		$i = 0;
		foreach ($a as $a1)
			{	
			$aa[$i] = $a1['nik'];
			$i++;
			}
		}
		return $aa;  
	}
	
	public function get_load_($kode_proyek,$id_pekerjaan)
	{
		// var_dump($id_pekerjaan); exit;
		$sql = "select karyawan.nik
		from karyawan, load_pekerjaan
		where karyawan.nik = load_pekerjaan.nik and load_pekerjaan.kode_proyek = $kode_proyek
		";
		$a = $this->db->query($sql)->result_array();		
		
		$azz = array();
		if(count($a) > 0)
		{	
		$i = 0;
		foreach ($a as $a1)
			{	
				$aa[$i] = $a1['nik'];
				$sql1 = 'select load_pekerjaan_detail.id_pekerjaan, karyawan.nik, karyawan.nama_karyawan, 8-sum(load_pekerjaan_detail.jam) as jam_sisa
				from load_pekerjaan_detail, karyawan, load_pekerjaan 
				where karyawan.nik = load_pekerjaan.nik and load_pekerjaan.kode_proyek = '.$kode_proyek.' and karyawan.nik = load_pekerjaan_detail.nik and load_pekerjaan_detail.nik = '.$aa[$i];
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
						$s = array('nik'=>$sql_jam_sisa2['nik'],'nama_karyawan'=>$sql_jam_sisa2['nama_karyawan'],'jam_sisa'=>$sql_jam_sisa2['jam_sisa'],'check'=>FALSE);
						array_push($azz,$s);
						}
					}
					else
					{
						$sql_check = 'select * from load_pekerjaan_detail, proyek, proyek_detail where proyek.kode_proyek = proyek_detail.kode_proyek and proyek_detail.id_pekerjaan = load_pekerjaan_detail.id_pekerjaan and load_pekerjaan_detail.id_pekerjaan = '.$id_pekerjaan.' and load_pekerjaan_detail.nik = '.$nik_a.' and proyek.kode_proyek = '.$kode_proyek.' and load_pekerjaan_detail.jam > 0';
						// var_dump($sql_check); exit;
						$abc = $this->db->query($sql_check)->result_array();
						// var_dump($abc); exit;
						if(count($abc) > 0)
						{
							// var_dump(count($abc)); exit;
							$s = array('nik'=>$v->nik,'nama_karyawan'=>$v->nama_karyawan,'jam_sisa'=>$v->jam_sisa,'check'=>TRUE);
							array_push($azz,$s);
						}
						else
						{
							// var_dump(count($abc)); exit;
							$s = array('nik'=>$v->nik,'nama_karyawan'=>$v->nama_karyawan,'jam_sisa'=>$v->jam_sisa,'check'=>FALSE);
							array_push($azz,$s);
						}

						
					}
					}
				$i++;
			}
		}
		// var_dump($azz);exit;
		return $azz; 
	}
	
	public function get_load_add($kode_proyek)
	{
		// var_dump($id_pekerjaan); exit;
		$sql = "select karyawan.nik
		from karyawan, load_pekerjaan
		where karyawan.nik = load_pekerjaan.nik and load_pekerjaan.kode_proyek = $kode_proyek
		";
		$a = $this->db->query($sql)->result_array();		
		
		$azz = array();
		if(count($a) > 0)
		{	
		$i = 0;
		foreach ($a as $a1)
			{	
				$aa[$i] = $a1['nik'];
				$sql1 = 'select load_pekerjaan_detail.id_pekerjaan, karyawan.nik, karyawan.nama_karyawan, 8-sum(load_pekerjaan_detail.jam) as jam_sisa
				from load_pekerjaan_detail, karyawan, load_pekerjaan 
				where karyawan.nik = load_pekerjaan.nik and load_pekerjaan.kode_proyek = '.$kode_proyek.' and karyawan.nik = load_pekerjaan_detail.nik and load_pekerjaan_detail.nik = '.$aa[$i];
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
							// var_dump(count($abc)); exit;
							$s = array('nik'=>$v->nik,'nama_karyawan'=>$v->nama_karyawan,'jam_sisa'=>$v->jam_sisa,'check'=>FALSE);
							array_push($azz,$s);
					}
					}
				$i++;
			}
		}
		// var_dump($azz);exit;
		return $azz; 
	}
	
	/*public function view_detail_proyek2($id_pekerjaan)
	{
		//$this->load->database();
		//$this->db->order_by("id_pekerjaan", "asc");
	//	$query = $this->db->get('proyek_detail');
		//return $query->result_array();
		
		$this->db->select('*');
		$this->db->from('proyek');
		$this->db->join('proyek_detail','proyek_detail.kode_proyek=proyek.kode_proyek');
		$this->db->join('laporan','proyek_detail.id_pekerjaan=laporan.id_pekerjaan');
		$this->db->where('proyek.kode_proyek',$id_pekerjaan);
		$query = $this->db->get();
		//return $query;
		return $query->result_array();
	}*/
	
	public function insert_detail_proyek($keterangan,$jam,$id_pekerjaan,$kode_proyek,$nik,$nama_pekerjaan,$start_date,$end_date,$progress)
	{
		$data = array(
		'id_pekerjaan' => $id_pekerjaan,
		'kode_proyek' => $kode_proyek,
		'nik' => $nik,
		'nama_pekerjaan' => $nama_pekerjaan,
		'start_date' => $start_date,
		'end_date' => $end_date,
		'progress' => $progress,
		'jam' => $jam,
		'keterangan' => $keterangan
		);
		$this->db->insert('proyek_detail', $data);
		
		$sql = "select max(id_pekerjaan) as id_pekerjaan from proyek_detail";
		$a = $this->db->query($sql)->result_array();
		if(count($a) > 0)
		{	
		foreach ($a as $a1)
			{	
			$aa = $a1['id_pekerjaan'];
			}
		}
		return $aa;
		
	}
	
	public function edit_detail_proyek($keterangan,$jam,$id_pekerjaan,$kode_proyek,$nik,$nama_pekerjaan,$start_date,$end_date,$progress)
	{
	$sql_cek = "select start_date, end_date from proyek_detail where id_pekerjaan = ".$id_pekerjaan;
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
			$bb = $a1['start_date'];
			$bb_date = strtotime($bb);
			$cc_date = strtotime($end_date);
			// var_dump($aa);exit;
			if($bb_date > $cc_date)
			{
				$sql_edttgl = "update proyek_detail set start_date = NULL, end_date = NULL where id_pekerjaan = ".$aa;
				// var_dump($sql_edttgl);exit;
				$a_edttgl = $this->db->query($sql_edttgl);
			}
			}
		}
	}	
		$data = array(
		'nik' => $nik,
		'nama_pekerjaan' => $nama_pekerjaan,
		'start_date' => $start_date,
		'end_date' => $end_date,
		'jam' => $jam,
		'keterangan' => $keterangan
		);
		$this->db->where('id_pekerjaan',$id_pekerjaan);
		$this->db->update('proyek_detail', $data);

		return $id_pekerjaan;
		
	}
	
	public function update_detail_proyek($id_pekerjaan,$nama_pekerjaan,$nik,$start_date,$end_date,$kategori)
	{
		$data = array (
		'nama_pekerjaan' => $nama_pekerjaan,
		'start_date' => $start_date,
		'end_date' => $end_date,
		'kategori' => $kategori
		);
		$this->db->where('id_pekerjaan',$id_pekerjaan);
		$this->db->update('proyek_detail',$data);
	}
	
	public function get_nama_proyek($id_pekerjaan)
	{
		$this->db->select('nama_proyek,kode_proyek');
		$this->db->where("kode_proyek",$id_pekerjaan);
		$query=$this->db->get('proyek');
		$a = $query->result_array();
		// var_dump($a);exit;
		return $a;
	}
	
		public function get_proyek($kode_proyek)
	{
		$this->db->select('*');
		$this->db->where("kode_proyek",$kode_proyek);
		$query=$this->db->get('proyek');
		$a = $query->result_array();
		// var_dump($a);exit;
		return $a;
	}
	
	public function get_date($kode_proyek)
	{
		$sql1 = "select * from proyek_detail where kode_proyek = $kode_proyek";
		$a1 = $this->db->query($sql1)->result_array();
		// var_dump($a1);exit;
		if(count($a1) > 0)
		{
		$sql = "select distinct max(proyek_detail.end_date) + INTERVAL 1 DAY as start_date, proyek.end_date as end_date 
		from proyek_detail,proyek 
		where proyek_detail.kode_proyek = proyek.kode_proyek and proyek_detail.kode_proyek = $kode_proyek 
		";
		$a = $this->db->query($sql)->result_array();
		// var_dump($a);exit;
		return $a;
		}
		else {
		$sql = "select proyek.start_date as start_date, proyek.end_date as end_date 
		from proyek 
		where proyek.kode_proyek = $kode_proyek 
		";
		$a = $this->db->query($sql)->result_array();
		// var_dump($a);exit;
		return $a;
		}
	}
	
	public function get_date2($kode_proyek)
	{
		$sql = "select proyek.start_date as start_date, proyek.end_date as end_date 
		from proyek 
		where proyek.kode_proyek = $kode_proyek 
		";
		$a = $this->db->query($sql)->result_array();
		// var_dump($a);exit;
		return $a;
		
	}
	
	
	
	public function get_detail_proyek($id_pekerjaan)
	{
		$sql = "select proyek_detail.*, proyek.nama_proyek from proyek_detail, proyek where proyek.kode_proyek = proyek_detail.kode_proyek and id_pekerjaan = $id_pekerjaan
		";
		$a = $this->db->query($sql)->result_array();
		// var_dump($a);exit;
		return $a;
	}
	
	/* public function get_kode_proyek($kode_proyek)
	{	
		$this->db->select('kode_proyek');
		$this->db->where("kode_proyek",$kode_proyek);
		$query=$this->db->get('proyek');
		return $query->result_array();
	} */
	
	function view_team($id_pekerjaan)
	{	
		$sql = "select load_pekerjaan_detail.nik, karyawan.nama_karyawan 
		from load_pekerjaan_detail, karyawan 
		where id_pekerjaan = $id_pekerjaan and load_pekerjaan_detail.nik=karyawan.nik
		";
		$a = $this->db->query($sql)->result_array();
		// var_dump($a);exit;
		return $a;
	}
	
	function progress($id_pekerjaan)
	{	
		$sql = "select nama_pekerjaan, progress
		from proyek_detail 
		where id_pekerjaan = $id_pekerjaan
		";
		$a = $this->db->query($sql)->result_array();
		// var_dump($a);exit;
		return $a;
	}
	
	function edit_progress($progress_pek,$id_pekerjaan)
	{	
		$sql = "update proyek_detail set progress = $progress_pek where id_pekerjaan = $id_pekerjaan
		";
		$a = $this->db->query($sql);
		
		$sql1 = "select kode_proyek from proyek_detail where id_pekerjaan = $id_pekerjaan
		";
		$a1 = $this->db->query($sql1)->result_array();
		foreach($a1 as $v){
			$kode = $v['kode_proyek'];							
		}
		// var_dump($kode);exit;
		return $kode;
	}
	
	function view_team_name($id_pekerjaan)
	{	
		$sql = "select nama_pekerjaan from proyek_detail where id_pekerjaan = $id_pekerjaan
		";
		$a = $this->db->query($sql)->result_array();
		// var_dump($a);exit;
		return $a;
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
	
	function get_nik3($kode_proyek)
	{
		$this->db->from('load_pekerjaan');
		$this->db->join('karyawan','load_pekerjaan.nik=karyawan.nik');
		$this->db->where("kode_proyek",$kode_proyek);
		$result = $this->db->get();
		$return = array();
		if($result->num_rows() > 0) {
			foreach($result->result_array() as $row) {
				$return[$row['nik']] = $row['nama_karyawan'];
			}
		}
		return $return;
	}
	
	function get_jenis_pekerjaan()
	{
		$this->db->from('jenis_pekerjaan');
		$result = $this->db->get();
		$return = array();
		if($result->num_rows() > 0) {
			foreach($result->result_array() as $row) {
				$return[$row['desc']] = $row['desc'];
			}
		}
		return $return;
	}
	
	// function get_nik2($nik,$id_pekerjaan)
	// {
		// $this->db->select('*');
		// $this->db->from('proyek_detail');
		// //$this->db->where("nik",$nik);
		// $this->db->where("id_pekerjaan",$id_pekerjaan);
		// $result = $this->db->get();		
		// $a = $result->result_array();
		// var_dump($a); exit;
		// return $a;
	// }
	
		function get_nik2($nik,$id_pekerjaan)
	{	
		$sql = "select proyek_detail.*, proyek.nik_proyek_manager 
		from proyek_detail, proyek 
		where proyek.kode_proyek = proyek_detail.kode_proyek and proyek_detail.id_pekerjaan = $id_pekerjaan
		";
		$a = $this->db->query($sql)->result_array();
		// var_dump($a);exit;
		return $a;
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
 
	public function insert($data,$laporan)
	{
		$this->db->insert($laporan, $data);
			
		$this->db->select('*');
		$this->db->from('proyek_detail');
		$this->db->join('laporan','proyek_detail.id_pekerjaan=laporan.id_pekerjaan');
		$this->db->where('proyek_detail.id_pekerjaan',$data['id_pekerjaan']);
		$this->db->where('laporan.status_laporan',1);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$i = 0;
			
			foreach($query->result() as $cek) {
				$end = explode('-', $cek->end_date);
				$end_date = $end[2];
				$end_date1= $end[1];
				$end_date2= $end[0];
				
				$start = explode('-', $cek->start_date);
				$start_date = $start[2];
				$start_date1= $start[1];
				$start_date2= $start[0];

				$jd1 = GregorianToJD($end_date1, $end_date, $end_date2);
				$jd2 = GregorianToJD($start_date1, $start_date, $start_date2);
				
				$date_sel = $jd1 - $jd2 + 1;
				
				$i++;
			}
			
			$progres = $i / $date_sel * 100;
			
			$data1 = array (
              
              'progress' => $progres
              );
              $this->db->where('id_pekerjaan',$data['id_pekerjaan']);
              $this->db->update('proyek_detail',$data1);
		}
	}
 
	public function view_download($id_laporan)
	{
		$this->db->select('*,curdate() as sysdate');
		$this->db->from('laporan');
		$this->db->join('proyek_detail','laporan.id_pekerjaan=proyek_detail.id_pekerjaan');
		$this->db->where('proyek_detail.id_pekerjaan',$id_laporan);
		$query = $this->db->get();
		//print_r($query->result_array());die;
		//return $query;
		return $query->result_array();
	}
	
	public function update_status_laporan2($id_laporan,$data)
      {
              $data2 = array (
              
              'status_laporan' => 2
              );
              $this->db->where('id_laporan',$id_laporan);
              $this->db->update('laporan',$data2);
			  //batas update progress
			
			$this->db->select('*');
			$this->db->from('proyek_detail');
			$this->db->join('laporan','proyek_detail.id_pekerjaan=laporan.id_pekerjaan');
			$this->db->where('proyek_detail.id_pekerjaan',$data['id_pekerjaan']);
			$this->db->where('laporan.status_laporan',1);
			$query = $this->db->get();
			//print_r($query);die;
		if($query->num_rows() > 0){
				$i = 0;
			foreach($query->result() as $cek) {
				$end = explode('-', $cek->end_date);
				$end_date = $end[2];
				$end_date1= $end[1];
				$end_date2= $end[0];
				
				$start = explode('-', $cek->start_date);
				$start_date = $start[2];
				$start_date1= $start[1];
				$start_date2= $start[0];

				$jd1 = GregorianToJD($end_date1, $end_date, $end_date2);
				$jd2 = GregorianToJD($start_date1, $start_date, $start_date2);
				
				$date_sel = $jd1 - $jd2 + 1;
				$kd_proyek = $cek->kode_proyek;
				$i++;
			}
			
			$progres = $i / $date_sel * 100;
			
			// $data1 = array (
              
              // 'progress' => $progres
              // );
              // $this->db->where('id_pekerjaan',$data['id_pekerjaan']);
              // $this->db->update('proyek_detail',$data1);
			
		} else {
			$progres = 0 / 0 * 100;
			
			// $data1 = array (
              
              // 'progress' => $progres
            // );
            // $this->db->where('id_pekerjaan',$data['id_pekerjaan']);
            // $this->db->update('proyek_detail',$data1);
			 //PRoyek
						
			$this->db->select('*');
			$this->db->from('proyek_detail');
			$this->db->where('id_pekerjaan',$data['id_pekerjaan']);
			$query = $this->db->get();
			
			if($query->num_rows() > 0){
				foreach($query->result() as $cek) {
					$kode_proyek = $cek->kode_proyek;
				}
				
				$this->db->select('*, sum(progress) as total, count(progress) as jumlah');
				$this->db->from('proyek_detail');
				$this->db->where('kode_proyek',$kode_proyek);
				$query1 = $this->db->get();
				
				if($query1->num_rows() > 0){
					foreach($query1->result() as $row) {		
						if($row->jumlah > 0 ) {
							$progres_p = $row->total / $row->jumlah;
						} else {
							$progres_p = 0;
						}
					}
					
					// $data3 = array (
							// 'progress' => $progres_p
						// );
					  // //print_r($data3);die();
					  // //print_r($cek->kode_proyek);die;
						// $this->db->where('kode_proyek',$cek->kode_proyek);
						// $this->db->update('proyek',$data3);
				}
			}
		}
			
      }
      
      public function update_status_laporan($id_laporan,$data)
      {
              $data2 = array (
              
              'status_laporan' => 1
              );
              $this->db->where('id_laporan',$id_laporan);
              $this->db->update('laporan',$data2);
			     //batas update progress
			
			$this->db->select('*');
			$this->db->from('proyek_detail');
			$this->db->join('laporan','proyek_detail.id_pekerjaan=laporan.id_pekerjaan');
			$this->db->where('proyek_detail.id_pekerjaan',$data['id_pekerjaan']);
			$this->db->where('laporan.status_laporan',1);
			$query = $this->db->get();
			if($query->num_rows() > 0){
				$i = 0;
			foreach($query->result() as $cek) {
				$end = explode('-', $cek->end_date);
				$end_date = $end[2];
				$end_date1= $end[1];
				$end_date2= $end[0];
				
				$start = explode('-', $cek->start_date);
				$start_date = $start[2];
				$start_date1= $start[1];
				$start_date2= $start[0];

				$jd1 = GregorianToJD($end_date1, $end_date, $end_date2);
				$jd2 = GregorianToJD($start_date1, $start_date, $start_date2);
				
				$date_sel = $jd1 - $jd2 + 1;
				
				$i++;
			}
			
			$progres = $i / $date_sel * 100;
			
			// $data1 = array (
              
              // 'progress' => $progres
              // );
              // $this->db->where('id_pekerjaan',$data['id_pekerjaan']);
              // $this->db->update('proyek_detail',$data1);
		
			//PRoyek
			
			
			$this->db->select('*, sum(progress) as total, count(progress) as jumlah');
			$this->db->from('proyek_detail');
			$this->db->where('kode_proyek',$cek->kode_proyek);
			$query = $this->db->get();
	
			if($query->num_rows() > 0){
			foreach($query->result() as $cek) {
				}
			
			$progres_p = $cek->total / $cek->jumlah ;
			
			
			// $data3 = array (
              
              // 'progress' => $progres_p
              // );
			  // //print_r($data3);die();
			  // //print_r($cek->kode_proyek);die;
              // $this->db->where('kode_proyek',$cek->kode_proyek);
			  // $this->db->update('proyek',$data3);
		}
		}
      }
	
}
