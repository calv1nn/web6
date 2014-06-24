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
		$this->load->view('detail_proyek',$data);
		}
		else
		{
			redirect("welcome/login");
		}
	}
	
	/* public function view_detail_proyek2($id_pekerjaan)
	{
		if ($this->session->userdata('login_valid')){
		
		$this->load->model('model_detail_proyek');
		$data['status']=$this->model_detail_proyek->get_progress($id_pekerjaan);
		//print_r($data['detail_proyek']);die;
		$data['edit_detail_proyek']="";
		$this->load->view('detail_proyek',$data);
		}
		else
		{
			redirect("welcome/login");
		}
	} */
	
	public function add_detail_proyek($kode_proyek)
	{
		if ($this->input->post() != TRUE)
		{
			$this->load->model('model_detail_proyek');
			$nik['kode_proyek'] = $kode_proyek;
			$nik['dropdown'] = $this->model_detail_proyek->get_nik();
			$this->load->view('add_detail_proyek',$nik);
		}
		else
		{
				$this->load->model('model_detail_proyek');
				$id_pekerjaan=$this->input->post("id_pekerjaan");
				$kode_proyek=$this->input->post("kode_proyek");
				$nik=$this->input->post("nik");
				$nama_pekerjaan=$this->input->post("nama_pekerjaan");
				$start_date=$this->input->post("start_date");
				$end_date=$this->input->post("end_date");
				$progress=$this->input->post("progress");
				$kategori=$this->input->post("kategori");
				
				$this->model_detail_proyek->insert_detail_proyek($id_pekerjaan,$kode_proyek,$nik,$nama_pekerjaan,$start_date,$end_date,$progress,$kategori);
				redirect("proyek");
		}
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
		$config['allowed_types'] = 'gif|jpg|png|JPEG|pdf'; //extension yang diperbolehkan untuk diupload
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
		
		$this->model_detail_proyek->update_status_laporan2($this->input->post(id_laporan),$data);
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

	
	
}
