<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Detail_proyek extends CI_Controller {
	 
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
		if ($this->session->userdata('login_valid')){
		
		$this->load->model('model_detail_proyek');
		$data['detail_proyek']=$this->model_detail_proyek->view_detail_proyek($id_pekerjaan);
		$data['nama_proyek']=$this->model_detail_proyek->get_nama_proyek($id_pekerjaan);
		$data['edit_detail_proyek']="";
		$this->load->view('detail_proyek',$data);
		}
		else
		{
			redirect("welcome/login");
		}
	}
	
	public function add_proyek()
	{
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$rules = array(
            array(
                'field' => 'nama_proyek',
                'label' => 'Nama proyek',
                'rules' => 'required'
            ),
			
           array(
                'field' => 'start_date',
                'label' => 'Start Date',
                'rules' => 'required'
            ),
			
			array(
                'field' => 'end_date',
                'label' => 'End Date',
                'rules' => 'required|greater_than[start_date]'
            ),
			
            array(
                'field' => 'client',
                'label' => 'Client Name',
                'rules' => 'required'
            ),
     
           
        );
        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('add_proyek');
        }
        else
        {
        $this->load->model('model_proyek');
		$kode_proyek=$this->input->post("kode_proyek");
		$nama_proyek=$this->input->post("nama_proyek");
		$start_date=$this->input->post("start_date");
		$end_date=$this->input->post("end_date");
		$client=$this->input->post("client");
		$progress=$this->input->post("progress");
		
		$this->model_proyek->insert_proyek($kode_proyek,$nama_proyek,$start_date,$end_date,$client,$progress);
		redirect("proyek/index");
	   }
	}
	
}