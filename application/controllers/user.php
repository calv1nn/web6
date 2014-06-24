<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
	 
	
	public function index()
	{
		$this->load->view('index');
	}
	
	public function karyawan()
	{
		if ($this->session->userdata('bpm')){
		$this->load->model('model_karyawan');
		$data['karyawan']=$this->model_karyawan->view_karyawan();
		$data['edit_karyawan']="";
		$this->load->view('karyawan',$data);
		}
		else
		{
			redirect("welcome/login");
		}
	}
	
	public function delete_karyawan($nik)
	{
		$this->load->model('model_karyawan');
		$this->model_karyawan->delete_karyawan($nik);
		redirect("user/karyawan");
	}
	
	public function add_karyawan()
	{
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$rules = array(
            array(
                'field' => 'nik',
                'label' => 'NIK',
                'rules' => 'trim|required|min_length[3]|is_unique[karyawan.nik]'
            ),
			
			array(
                'field' => 'nama_karyawan',
                'label' => 'Nama Karyawan',
                'rules' => 'required'
            ),
           
            array(
                'field' => 'email',
                'label' => 'E-Mail',
                'rules' => 'trim|required|valid_email|is_unique[karyawan.email]'
            ),
     
            array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required|min_length[6]|matches[passconf]'
            ),
            array(
                'field' => 'passconf',
                'label' => 'Conf Password',
                'rules' => 'required'
            ),
        );
        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('add_karyawan');
        }
        else
        {
        $this->load->model('model_karyawan');
		$nik=$this->input->post("nik");
		$email=$this->input->post("email");
		$password=$this->input->post("password");
		$nama_karyawan=$this->input->post("nama_karyawan");
		$jabatan=$this->input->post("jabatan");
		$status=$this->input->post("status");
		
		$this->model_karyawan->insert_karyawan($nik,$email,$password,$nama_karyawan,$jabatan,$status);
		redirect("user/karyawan");
	   }
		
	}

	public function edit_karyawan($nik)
	{
		$this->load->model('model_karyawan');
		$data['karyawan']=$this->model_karyawan->view_karyawan();
		$data['edit_karyawan']=$this->model_karyawan->get_karyawan($nik);
		$this->load->view('edit_karyawan',$data);
	}

	public function update_karyawan()
	{
	
		$this->load->model('model_karyawan');
		$data['edit_karyawan']=$this->model_karyawan->get_karyawan($nik);
		$this->load->view('karyawan',$data);
		$nik=$this->input->post("nik");
		$email=$this->input->post("email");
		$nama_karyawan=$this->input->post("nama_karyawan");
		$jabatan=$this->input->post("jabatan");
		$status=$this->input->post("status");
		$this->model_karyawan->update_karyawan($nik,$email,$nama_karyawan,$jabatan,$status);
		redirect("user/karyawan");
	}
	
}

/* End of file user.php */
/* Location: ./application/controllers/welcome.php */
