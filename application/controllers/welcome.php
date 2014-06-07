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
		if ($this->session->userdata('login_valid')){
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
		$password=$this->input->post("password");
		if ($this->model_karyawan->check_login($email,$password))
		{
			$this->session->set_userdata('login_valid', TRUE);
			$this->session->set_userdata('email',$email);
			redirect("welcome/index");
		}
		else
		echo "<script> alert('Username & Password do not match');
					document.location='welcome/login';
					</script>";
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
