<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct(){
		parent::__construct();
		session_start();
		}
	
	public function index()
	{
		if ($this->session->userdata('email')){
		$this->load->model('model_karyawan');
		$data['karyawan']=$this->model_karyawan->view_karyawan();
		$this->load->view('index',$data);
		}
		else
		{
			redirect("welcome/login");
		}
	}
	
	public function login()
	{
		$this->load->view('login_form');
	}
	
	public function check_login()
	{
		$this->load->model('model_karyawan');
		$email=$this->input->post("email");
		$password=md5($this->input->post("password", TRUE));
		$jabatan=$this->input->post("jabatan");
		//print_r($jabatan);die;
		$status=$this->input->post("status");
		
		$data['array']=$this->model_karyawan->check_login($email,$password);
		
		//print_r($data['array']);die;
		foreach ($data['array'] as $row) {
			$jabatan=$row['jabatan'];
			$nik=$row['nik'];
		}
		
			if($jabatan == 'Bussiness Project Manager'){
			$this->session->set_userdata('bpm', TRUE);
			}
			elseif($jabatan == 'Tim Teknis'){
			$this->session->set_userdata('timteknis', TRUE);
			}
			elseif($jabatan == 'Project Manager'){
			$this->session->set_userdata('pm', TRUE);
			}
			else{
			echo "<script> alert('Username & Password do not match');
					document.location='welcome/login';
					</script>";
			}
			$this->session->set_userdata('email',$email);
			$this->session->set_userdata('nik',$nik);
			redirect("welcome/index");
		
		
		
	}
	
	public function logout()
	{
		$this->session->sess_destroy();
		redirect("welcome/login");
	}
	
	public function reports()
	{
		$this->load->view('reports');
	}

	public function documents()
	{
		$this->load->view('documents');
	}
	
	public function charts()
	{
		$this->load->view('charts');
	}
	
	public function user()
	{
		$this->load->view('user');
	}
	
	public function diskusi()
	{
		$this->load->view('diskusi');
	}
	
	public function change_password()
	{
		$this->load->view('change_password');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
