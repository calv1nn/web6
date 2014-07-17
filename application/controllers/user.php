<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
	 public function __construct()
 {
 parent::__construct();
 $this->load->library('upload');
 }
	
	public function index()
	{
		$this->load->view('index');
	}
	
	public function karyawan($nik=NULL)
	{
		if ($this->session->userdata('email')){
			
		$this->load->model('model_karyawan');
		
		$this->load->library('pagination');
		
		$config['base_url'] = base_url().'user/karyawan/';
		$jml = $this->db->get('karyawan');
		$config['total_rows'] = $jml->num_rows();
		$config['per_page'] = 8;
		$config['num_link']=10;
		
		//inisialisasi config
		$this->pagination->initialize($config);
		
		//buat pagination
		$data['halaman'] = $this->pagination->create_links();
		
		//tamplikan data
		$data['query'] = $this->model_karyawan->view_karyawan($config['per_page'], $nik);
		//$data['karyawan']=$this->model_karyawan->view_karyawan(6,0);
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

	public function add_karyawan1()
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
                'rules' => 'email', 'Email', 'trim|required|valid_email', 'is_unique[karyawan.email]'
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
            $this->load->model('model_karyawan');
		$keyword    =   $this->input->post('nik');
        $data['results']    =   $this->model_karyawan->search_karyawan($keyword);
        $this->load->view('search_nik',$data);
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
	
	
	public function edit_password($nik)
	{
		$this->load->model('model_karyawan');
		$data['karyawan']=$this->model_karyawan->view_karyawan();
		$data['edit_password']=$this->model_karyawan->get_karyawan($nik);
		$this->load->view('reset_password',$data);
	}
		
	public function update_password()
	{
	
		$this->load->model('model_karyawan');
		$data['edit_password']=$this->model_karyawan->get_karyawan($nik);
		$this->load->view('reset_password',$data);
		$nik=$this->input->post("nik");
		$password=$this->input->post("password");
		$this->model_karyawan->update_password($nik,$password);
		redirect("user/karyawan");
	}
	
	public function search_nik()
    {
		$this->load->model('model_karyawan');
		$keyword    =   $this->input->post('keyword');
        $data['results']    =   $this->model_karyawan->search_karyawan($keyword);
        $this->load->view('search_nik',$data);
    }
	
}

/* End of file user.php */
/* Location: ./application/controllers/welcome.php */
