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
		$this->load->helper('text');
		}
	
	public function index()
	{
		if ($this->session->userdata('email')){
		$this->load->model('model_karyawan');
		$this->load->model('model_diskusi');
		$this->load->model('model_proyek');
		
		$data['hasil'] = $this->model_diskusi->daftar(5,0);
		$data['karyawan']=$this->model_karyawan->view_karyawan();
		$data['proyek']=$this->model_proyek->view_proyek();
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
			elseif($jabatan == 'Admin'){
			$this->session->set_userdata('admin', TRUE);
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
	
	
	public function changepwd(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('opassword','Old Password','required|trim|xss_clean|callback_change');
		$this->form_validation->set_rules('npassword','New Password','required|trim');
		$this->form_validation->set_rules('cpassword','Confirm Password','required|trim|matches[npassword]');

		if($this->form_validation->run()!= true)
		{
		$this->load->view('change_password');

		}
		}
		public function change() // we will load models here to check with database
		{
		$sql = $this->db->select("*")->from("karyawan")->where("email",$this->session->userdata('email'))->get();

		foreach ($sql->result() as $my_info) {

		$db_password = $my_info->password;
		$db_nik = $my_info->nik;

		}

		if(md5($this->input->post("opassword")) == $db_password){

		$fixed_pw = mysql_real_escape_string(md5($this->input->post("npassword")));
		$update = $this->db->query("Update `karyawan` SET `password`='$fixed_pw' WHERE `nik`='$db_nik'")or die(mysql_error());
		$this->form_validation->set_message('change','<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert">&times;</a>
		<strong>Password Updated!</strong></div>');
		return false;

		}else
		$this->form_validation->set_message('change','<div class="alert alert-error"><a href="#" class="close" data-dismiss="alert">&times;</a>
		<strong>Wrong Old Password!</strong> </div>');

		return false;

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
	
		public function upload()
	{
		$this->load->view('form_upload_template', array('error' => ' ' )); //menampilkan halaman upload
	}
	
		public function do_upload()
	{
		//$this->load->library('upload');
		$config['upload_path'] = APPPATH .'../assets/upload/'; //lokasi folder yang akan digunakan untuk menyimpan file
		$config['allowed_types'] = 'xlsx';
		$config['overwrite'] = TRUE;
		//$config['client_name'] = 'format_laporan.xlsx';
		//$config['file_name'] = url_title($this->input->post('file_upload'));
		
		$config['file_name'] = 'format_laporan.xlsx';
		//$config['overwrite'] = false;

		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		

		if( !$this->upload->do_upload('file_upload'))
		{
			$error = array('error' => $this->upload->display_errors());

			$this->load->view('form_upload_template', $error);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());

			redirect('welcome/index');
		}
	}

	public function download()
	{
		$this->load->helper('download'); //jika sudah diaktifkan di autoload, maka tidak perlu di tulis kembali
		$name='format_laporan.xlsx';
		$data = file_get_contents(base_url()."assets/upload/format_laporan.xlsx"); // letak file pada aplikasi kita
		//print_r($nama); die();
		force_download($name,$data);
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
