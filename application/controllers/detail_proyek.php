<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Detail_proyek extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_detail_proyek','crud'); //load model dari crud model dan diberi alias dengan nama crud
		$this->load->library('upload'); //load library upload bisa dilakukan disni atau disimpan di autoload
	}

	public function index($id_pekerjaan)
	{
		if ($this->session->userdata('login_valid')){

		$this->load->model('model_detail_proyek');
		$data['detail_proyek']=$this->model_detail_proyek->view_detail_proyek($id_pekerjaan);
		print_r($id_pekerjaan); die;
		$data['edit_detail_proyek']="";
		$this->load->view('detail_proyek',$data);
		}
		else
		{
			redirect("welcome/login");
		}
	}

	public function view_detail_proyek($id_pekerjaan)
	{
		if ($this->session->userdata('email')){

		$this->load->model('model_detail_proyek');
		$data['detail_proyek']=$this->model_detail_proyek->view_detail_proyek($id_pekerjaan);
	//	$data['laporan']=$this->model_detail_proyek->view_detail_proyek2($id_pekerjaan);
		$data['nama_proyek']=$this->model_detail_proyek->get_nama_proyek($id_pekerjaan);
		//print_r($data['laporan']);die;
		$data['edit_detail_proyek']="";
		$this->session->set_userdata('id_pekerjaan',$id_pekerjaan);
		//$this->chart();
		$this->load->view('detail_proyek',$data);
		}
		else
		{
			redirect("welcome/login");
		}
	}

	
	public function view_team($id_pekerjaan)
	{
		if ($this->session->userdata('email')){
		
		$this->load->model('model_detail_proyek');
		$data['team']=$this->model_detail_proyek->view_team($id_pekerjaan);
		$data['team_name']=$this->model_detail_proyek->view_team_name($id_pekerjaan);
		$this->load->view('view_team',$data);
		}
		else
		{
			redirect("welcome/login");
		}
	}
	
	public function progress($id_pekerjaan)
	{
		if ($this->session->userdata('email')){
		
		$this->load->model('model_detail_proyek');
		$nik=$this->session->userdata('nik');
		$data['nik'] = $this->model_detail_proyek->get_nik2($nik,$id_pekerjaan);
		foreach ($data['nik'] as $row) 
		{
			$nik12=$row['nik_proyek_manager'];
		}
		if($nik == $nik12)
		{
			$this->load->model('model_detail_proyek');
			$data['id_pekerjaan'] = $id_pekerjaan;
			$data['prog']=$this->model_detail_proyek->progress($id_pekerjaan);
			$this->load->view('edit_progress',$data);
		}
		else
		{
			echo "<script> alert('You do not have an access to upload');
				document.location='http://localhost/web6/proyek/index';
				</script>";
		}
		
		
		}
		else
		{
			redirect("welcome/login");
		}
	}
	
	public function edit_progress()
	{
		if ($this->session->userdata('email')){
		$this->load->model('model_detail_proyek');
		$progress_pek=$this->input->post("progress_pek");
		$id_pekerjaan=$this->input->post("id_pekerjaan");
		// var_dump($id_pekerjaan);exit;
		$result = $this->model_detail_proyek->edit_progress($progress_pek,$id_pekerjaan);
		// var_dump($result['kode_proyek']); exit;
		redirect("detail_proyek/view_detail_proyek/".$result);
		}
		else
		{
			redirect("welcome/login");
		}
	}
	
	public function add_detail_proyek($kode_proyek)
	{
		if ($this->input->post() != TRUE)
		{
			$this->load->model('model_detail_proyek');
			$nik['kode_proyek'] = $kode_proyek;
			$nik['dropdown'] = $this->model_detail_proyek->get_nik3($kode_proyek);
			$nik['jenis_pekerjaan'] = $this->model_detail_proyek->get_jenis_pekerjaan();
			$nik['proyek']=$this->model_detail_proyek->get_proyek($kode_proyek);
			$nik['date']=$this->model_detail_proyek->get_date($kode_proyek);
			$nik['checkbox'] = $this->model_detail_proyek->get_nik_();
			$nik['getload'] = $this->model_detail_proyek->get_load_add($kode_proyek);
			// var_dump($nik['getload']);exit;
			$this->load->view('add_detail_proyek',$nik);
		}
		else
		{
				$this->load->model('model_detail_proyek');
				$id_pekerjaan=$this->input->post("id_pekerjaan");
				$kode_proyek=$this->input->post("kode_proyek123");
				$nik=$this->input->post("nik123");
				// $nama_pekerjaan=$this->input->post("nama_pekerjaan");
				$start_date=$this->input->post("start_date");
				$end_date=$this->input->post("end_date");
				$progress=$this->input->post("progress");
				// $kategori=$this->input->post("kategori");
				$jam=$this->input->post("jam");
				$nama_pekerjaan=$this->input->post("jenis_pekerjaan");
				$keterangan=$this->input->post("keterangan");
				$niks=$this->input->post("nik");
				// var_dump($jenis_pekerjaan);exit;
				$i = 0;
				$z = 0;
				foreach ($niks as $niks1){
						$aa[$i] = $niks1;
						$sql1 = 'select sum(jam) as jam from load_pekerjaan_detail where nik ='.$aa[$i];
						$ab = $this->db->query($sql1);						
							foreach($ab->result() as $v){
								$jam_a = $v->jam;
								$jam_total = $jam_a + $jam;							
								if($jam_total > 8){
								$z++;
								}								
							}
				$i++;
				}
				// var_dump($z);exit;
				if($z == 0){

				$result = $this->model_detail_proyek->insert_detail_proyek($keterangan,$jam,$id_pekerjaan,$kode_proyek,$nik,$nama_pekerjaan,$start_date,$end_date,$progress);
				$result_all = $this->model_detail_proyek->get_load_all($kode_proyek);
				// var_dump($result_all);exit;				
				foreach ($result_all as $nikz){
						$data = array (
						'jam' => 0,
						'id_pekerjaan' => $result,
						'nik' => $nikz
						);
						$this->db->insert('load_pekerjaan_detail',$data);
				}
				
				foreach ($niks as $cek){
						$data = array (
						'jam' => $jam,
						);
						$this->db->where('id_pekerjaan',$result);
						$this->db->where('nik',$cek);
						$this->db->update('load_pekerjaan_detail',$data);
				}
				
				redirect("detail_proyek/view_detail_proyek/".$kode_proyek);
				}else{
					echo "<script> alert('Ada karyawan yang overload pekerjaan');
					document.location='http://localhost/web6/proyek/index';
					</script>";
					// echo "gagal overload";
				}
		}
	}
	
	public function edit_detail_proyek($kode_proyek,$id_pekerjaan)
	{
	// var_dump($id_pekerjaan);exit;
	if ($this->input->post() != TRUE)
		{
		
		$this->load->model('model_detail_proyek');
		$data['kode_proyek'] = $kode_proyek;
		$data['id_pekerjaan'] = $id_pekerjaan;
		$data['dropdown'] = $this->model_detail_proyek->get_nik3($kode_proyek);
		$data['jenis_pekerjaan'] = $this->model_detail_proyek->get_jenis_pekerjaan();
		$data['getload'] = $this->model_detail_proyek->get_load_($kode_proyek,$id_pekerjaan);
		$data['date']=$this->model_detail_proyek->get_date2($kode_proyek);
		// $data['detail_proyek']=$this->model_detail_proyek->view_detail_proyek2();
		// $data['dropdown'] = $this->model_detail_proyek->get_nik3($kode_proyek);
		$data['edit_detail_proyek']=$this->model_detail_proyek->get_detail_proyek($id_pekerjaan);
		//print_r($data);die;
		$this->load->view('edit_detail_proyek',$data);
		
		}
	else
		{
		// var_dump($id_pekerjaan);exit;
		$this->load->model('model_detail_proyek');
				// $id_pekerjaan=$this->input->post("id_pekerjaan");
				$kode_proyek=$this->input->post("kode_proyek123");
				$nik=$this->input->post("nik123");
				// $nama_pekerjaan=$this->input->post("nama_pekerjaan");
				$start_date=$this->input->post("start_date");
				$end_date=$this->input->post("end_date");
				$progress=$this->input->post("progress");
				// $kategori=$this->input->post("kategori");
				$jam=$this->input->post("jam");
				$nama_pekerjaan=$this->input->post("jenis_pekerjaan");
				$keterangan=$this->input->post("keterangan");
				$niks=$this->input->post("nik");
				// var_dump($jenis_pekerjaan);exit;								
				
				$i = 0;
				$z = 0;
				foreach ($niks as $niks1){
						$aa[$i] = $niks1;
						$sql1 = 'select sum(jam) as jam from load_pekerjaan_detail where nik ='.$aa[$i];
						$ab = $this->db->query($sql1);						
							foreach($ab->result() as $v){
								$jam_a = $v->jam;
								$jam_total = $jam_a + $jam;							
								if($jam_total > 8){
								$z++;
								}								
							}
				$i++;
				}
				// var_dump($z);exit;
				if($z == 0){
				
				$sql12 = 'delete from load_pekerjaan_detail where id_pekerjaan = '.$id_pekerjaan;
				$ab2 = $this->db->query($sql12);
				
				$result = $this->model_detail_proyek->edit_detail_proyek($keterangan,$jam,$id_pekerjaan,$kode_proyek,$nik,$nama_pekerjaan,$start_date,$end_date,$progress);
				$result_all = $this->model_detail_proyek->get_load_all($kode_proyek);
				// var_dump($result_all);exit;				
				foreach ($result_all as $nikz){
						$data = array (
						'jam' => 0,
						'id_pekerjaan' => $result,
						'nik' => $nikz
						);
						$this->db->insert('load_pekerjaan_detail',$data);
				}
				
				foreach ($niks as $cek){
						$data = array (
						'jam' => $jam,
						);
						$this->db->where('id_pekerjaan',$result);
						$this->db->where('nik',$cek);
						$this->db->update('load_pekerjaan_detail',$data);
				}
				
				redirect("detail_proyek/view_detail_proyek/".$kode_proyek);
				}else{
					echo "<script> alert('Ada karyawan yang overload pekerjaan');
					document.location='http://localhost/web6/proyek/index';
					</script>";
					// echo "gagal overload";
				}
		
		}
	}
	
	public function update_detail_proyek()
	{
	
		$this->load->model('model_detail_proyek');
		$id_pekerjaan=$this->input->post("id_pekerjaan");
		$nama_pekerjaan=$this->input->post("nama_pekerjaan");
		$nik=$this->input->post("nik");
		$start_date=$this->input->post("start_date");
		$end_date=$this->input->post("end_date");
		$kategori=$this->input->post("kategori");
		$this->model_detail_proyek->update_detail_proyek($id_pekerjaan,$nama_pekerjaan,$nik,$start_date,$end_date,$kategori);
		redirect("proyek/index");
	}

	public function upload($id_pekerjaan)
	{
		$this->load->model('model_detail_proyek');
		$nik=$this->session->userdata('nik');
	//	$this->model_detail_proyek->get_nik2($nik,$id_pekerjaan);
		$data['nik'] = $this->model_detail_proyek->get_nik2($nik,$id_pekerjaan);
		$data['id_pekerjaan'] = $id_pekerjaan;

		foreach ($data['nik'] as $row) {
			$nik12=$row['nik'];
		}
		if($nik == $nik12){
			$this->load->view('form_upload',$data); //menampilkan halaman upload
							}
		else{
			echo "<script> alert('You do not have an access to upload');
					document.location='http://localhost/web6/proyek/index';
					</script>";
		}
	}

	public function do_upload()
	{
		$config['upload_path'] = APPPATH .'../assets/upload/'; //lokasi folder yang akan digunakan untuk menyimpan file
		$config['allowed_types'] = 'jpg|png|JPEG|pdf|docx|xlsx|odt'; //extension yang diperbolehkan untuk diupload
		$config['file_name'] = url_title($this->input->post('file_upload'));

		$this->upload->initialize($config); //meng set config yang sudah di atur
		if( !$this->upload->do_upload('file_upload'))
		{ 
			echo $this->upload->display_errors();
		}
		else{
			$data = array(
			'id_pekerjaan'=>$this->input->post("id_pekerjaan"),
			'nama_file'=>$this->upload->file_name,
			'tanggal_upload' => date('Y-m-d')
			);
			$this->crud->insert($data,'laporan');
			//redirect('upload_file/view');
			redirect (detail_proyek/upload/$row['id_pekerjaan']);
		}
	}

	 public function view()
	 {
	 $data['laporan'] = $this->crud->show('laporan');
	 $this->load->view('view_upload',$data);
	 }
 
	public function view_download($id_laporan)
	{
		if ($this->session->userdata('email')){

		$this->load->model('model_detail_proyek');
		$data['detail_proyek']=$this->model_detail_proyek->view_download($id_laporan);
		//print_r($data['detail_proyek']);die;
		$data['edit_detail_proyek']="";
		$this->load->view('view_download',$data);
		}
		else
		{
			redirect("welcome/login");
		}
	}

	public function update_status_laporan()
	{
		if ($this->input->post() == TRUE) { 
		$this->load->model('model_detail_proyek');
		$data['id_pekerjaan'] = $this->input->post('id_pekerjaan');
		//print_r($data['id_pekerjaan']);die;
		$this->model_detail_proyek->update_status_laporan($this->input->post(id_laporan),$data);
		redirect("proyek");
		}	

	}

	public function update_status_laporan2()
	{
		if ($this->input->post() == TRUE) { 
		$this->load->model('model_detail_proyek');
		$data['id_pekerjaan'] = $this->input->post('id_pekerjaan');
		//print_r($data);die;
		$this->model_detail_proyek->update_status_laporan2($this->input->post('id_laporan'),$data);
		//$this->model_detail_proyek->update_progress();
		redirect("proyek");
		}	

	}

	public function download($id_laporan)
	{
		$this->load->helper('download'); //jika sudah diaktifkan di autoload, maka tidak perlu di tulis kembali
		$this->load->model('model_detail_proyek');
		$name=$this->model_detail_proyek->get_nama_file($id_laporan);
		//$name = $nama_file;
		//print_r($name[0]['nama_file']); die();
		$nama=$name[0]['nama_file'];
		$data = file_get_contents(base_url()."assets/upload/".$name[0]['nama_file']); // letak file pada aplikasi kita
		//print_r($nama); die();
		force_download($nama,$data);
	}

	public function chart()
	{
		$id_pekerjaan = $this->session->userdata('id_pekerjaan');
		//print_r($id_pekerjaan);die;
		$this->load->model('model_detail_proyek');
		$data['chart'] = $this->model_detail_proyek->view_detail_proyek($id_pekerjaan);
		$this->gantt_proyek($data['chart']);
	}

	public function gantt_proyek($data_chart)
	{
		require_once APPPATH.'../assets/jpgraph/src/jpgraph.php';
		require_once APPPATH.'../assets/jpgraph/src/jpgraph_gantt.php';

		$graph = new GanttGraph();

		$graph->title->Set("Gantt Chart");
		// Setup some "very" nonstandard colors
		$graph->SetMarginColor('lightgreen@0.8');
		$graph->SetBox(true,'yellow:0.6',2);
		$graph->SetFrame(true,'darkgreen',4);
		$graph->scale->divider->SetColor('yellow:0.6');
		$graph->scale->dividerh->SetColor('yellow:0.6');

		// Explicitely set the date range 
		// (Autoscaling will of course also work)
		$i = 0;
		foreach($data_chart as $row) {
			//$graph->SetDateRange(date('Y-m-d',strtotime($row['start_date'])),date('Y-m-d',strtotime($row['end_date'])));
			$graph->SetDateRange('2014-06-06','2014-12-10');
			$end = explode('-', $row['end_date']);
			$end_date = $end[2];
			$end_date1= $end[1];
			$end_date2= $end[0];


			$start = explode('-',  $row['start_date']);
			$start_date = $start[2];
			$start_date1= $start[1];
			$start_date2= $start[0];

			$jd1 = GregorianToJD($end_date1, $end_date, $end_date2);
			$jd2 = GregorianToJD($start_date1, $start_date, $start_date2);

			$date_sel = $jd1 - $jd2 + 1;

			//$data = array();
			$data1 = array($i, array($row['nama_pekerjaan'], strval($date_sel), date('d-m-Y',strtotime($row['start_date'])), date('d-m-Y',strtotime($row['end_date']))), 
			$row['start_date'], $row['end_date'],FF_ARIAL,FS_NORMAL,8);
			$i++;
			$data[] = $data1;
		}

		// Display month and year scale with the gridlines
		$graph->ShowHeaders(GANTT_HMONTH | GANTT_HYEAR);
		$graph->scale->month->grid->SetColor('gray');
		$graph->scale->month->grid->Show(true);
		$graph->scale->year->grid->SetColor('gray');
		$graph->scale->year->grid->Show(true);


		// Setup activity info

		// For the titles we also add a minimum width of 100 pixels for the Task name column
		$graph->scale->actinfo->SetColTitles(
			array('Projek','Duration','Start','Finish'),array(100));
		$graph->scale->actinfo->SetBackgroundColor('green:0.5@0.5');
		$graph->scale->actinfo->SetFont(FF_ARIAL,FS_NORMAL,10);
		$graph->scale->actinfo->vgrid->SetStyle('solid');
		$graph->scale->actinfo->vgrid->SetColor('gray');

		// Data for our example activities

		// Create the bars and add them to the gantt chart
		 //print_r($data);die;
		foreach($data_chart as $row2) {

		$ab = $row2['progress'] / 100 ;
		$aaa[] = $ab;

		$bb = $row2['progress'];
		$abc[] = $bb;
		
		}
		for($i=0; $i<count($data); ++$i) {

			$bar = new GanttBar($data[$i][0],$data[$i][1],$data[$i][2],$data[$i][3],$abc[$i],10);
			if( count($data[$i])>4 )
				$bar->title->SetFont($data[$i][4],$data[$i][5],$data[$i][6]);
			$bar->SetPattern(BAND_RDIAG,"yellow");
			$bar->SetFillColor("gray");
			$bar->progress->Set($aaa[$i]);
			$bar->progress->SetPattern(GANTT_SOLID,"darkgreen");
			$graph->Add($bar);
		}
 
		// Display the graph
		$graph->Stroke();
	}

}