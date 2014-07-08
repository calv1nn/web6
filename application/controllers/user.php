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
	
	
	function upload()
	{
		$this->load->view('form_upload_karyawan');
	}

    function do_upload()
	{
		$config['upload_path'] = APPPATH .'../assets/upload/';
		$config['allowed_types'] = 'xls';
		$this->upload->initialize($config);
		//$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$data = array('error' => $this->upload->display_errors());

		}
		else
		{
            $data = array('error' => false);
			$upload_data = $this->upload->data();

            $this->load->library('excel_reader');
			$this->excel_reader->setOutputEncoding('CP1251');

			$file =  $upload_data['full_path'];
			$this->excel_reader->read($file);
			error_reporting(E_ALL ^ E_NOTICE);

			// Sheet 1
			$data = $this->excel_reader->sheets[0] ;
                        $dataexcel = Array();
			for ($i = 1; $i <= $data['numRows']; $i++) {

                            if($data['cells'][$i][1] == '') break;
                            $dataexcel[$i-1]['nik'] = $data['cells'][$i][1];
                            $dataexcel[$i-1]['nama'] = $data['cells'][$i][2];
                            $dataexcel[$i-1]['no_ktp'] = $data['cells'][$i][3];
                            $dataexcel[$i-1]['tempat_lahir'] = $data['cells'][$i][4];
                            $dataexcel[$i-1]['tanggal_lahir'] = $data['cells'][$i][5];
                            $dataexcel[$i-1]['jk'] = $data['cells'][$i][6];
                            $dataexcel[$i-1]['agama'] = $data['cells'][$i][7];
                            $dataexcel[$i-1]['alamat'] = $data['cells'][$i][8];
                            $dataexcel[$i-1]['status'] = $data['cells'][$i][9];
                            $dataexcel[$i-1]['gol_darah'] = $data['cells'][$i][10];
                            $dataexcel[$i-1]['no_telp'] = $data['cells'][$i][11];
                            $dataexcel[$i-1]['pend_terakhir'] = $data['cells'][$i][12];
                            $dataexcel[$i-1]['jabatan'] = $data['cells'][$i][13];
                            $dataexcel[$i-1]['departemen'] = $data['cells'][$i][14];
                            $dataexcel[$i-1]['golongan'] = $data['cells'][$i][15];
                            $dataexcel[$i-1]['tgl_masuk'] = $data['cells'][$i][16];
                            $dataexcel[$i-1]['npwp'] = $data['cells'][$i][17];
                            $dataexcel[$i-1]['remark'] = $data['cells'][$i][18];
                            

			}

            delete_files($upload_data['file_path']);
            $this->load->model('model_karyawan');
            $this->model_karyawan->tambahuser($dataexcel);
            $data['karyawan_all'] = $this->model_karyawan->getuser();
            
		}
		print_r($data['karyawan_all']);die;
        redirect('welcome/index');
	}
	
}

/* End of file user.php */
/* Location: ./application/controllers/welcome.php */
