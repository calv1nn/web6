<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Load_pekerjaan extends CI_Controller {

	public function view_load_pekerjaan($kode_proyek)
	{
		if ($this->session->userdata('login_valid')){
		
		$this->load->model('model_load_pekerjaan');
		$data['load_pekerjaan']=$this->model_load_pekerjaan->view_load_pekerjaan($kode_proyek);
	//	$data['laporan']=$this->model_load_pekerjaan->view_load_pekerjaan2($id_pekerjaan);
		$data['nama_proyek']=$this->model_load_pekerjaan->get_nama_proyek($kode_proyek);
		//print_r($data['laporan']);die;
		$data['edit_load_pekerjaan']="";
		$this->load->view('view_proyek',$data);
		}
		else
		{
			redirect("welcome/login");
		}
	}

	public function add_load_pekerjaan($kode_proyek)
	{
		
		if ($this->input->post() != TRUE)
		{
			$this->load->model('model_load_pekerjaan');
			$nik['kode_proyek'] = $kode_proyek;
			$nik['checkbox'] = $this->model_load_pekerjaan->get_nik();
			$nik['getload'] = $this->model_load_pekerjaan->get_load($kode_proyek);
			
			//print_r($nik['getload']);die;
			$this->load->view('add_load_pekerjaan',$nik);
		}
		else
		{
				$this->load->model('model_load_pekerjaan');
				$kode_proyek=$this->input->post("kode_proyek");
				$nik=$this->input->post("nik");
				
				foreach ($nik as $cek){
					$data = array (
						'kode_proyek' => $kode_proyek,
						'nik' => $cek,
					);
					$this->model_load_pekerjaan->insert_load_pekerjaan($data);
				}
				redirect("proyek");
		}
	}
}
?>