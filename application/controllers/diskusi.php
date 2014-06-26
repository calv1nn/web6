<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Diskusi extends CI_Controller {

	public function index()
	{
		if ($this->session->userdata('email')){
		$this->load->model('model_diskusi');
		$data['daftarartikel']=$this->model_diskusi->daftar(6,0);
		$this->load->library('pagination');
		$config['base_url']	=	base_url().'index.php/diskusi/index/';
		$config['total_rows']= $this->db->count_all('diskusi');
		$config['per_page']=5;
		$config['num_link']=20;
		
		$this->pagination->initialize($config);
		//$data['hasil'] = $this->db->get('diskusi',$config['per_page'], $this->uri->segment(3));
		$data['hasil'] = $this->model_diskusi->daftar(6,0);
		//print_r($data['hasil']);die;
		$this->load->view('list_diskusi',$data);
		}
		else
		{
		redirect("welcome/login");
		}
		
	}

	public function tambah()
	{
		if ($this->session->userdata('email')){
		$this->load->helper('xinha_helper');
		$dati['xinha_java']= javascript_xinha(array('isi'));
		$dati['edit_diskusi']='';
		// this line for the xinha
		$this->load->view('add_diskusi', $dati);
		}
		else
		{
		redirect("welcome/login");
		}
	}
	
	public function view_diskusi($id)
	{
		$this->load->model('model_diskusi');
		$data['view']=$this->model_diskusi->view($id);
		
		$data['view_balasan']=$this->model_diskusi->view_balasan($id);
		//print_r($data['view_balasan']);die;
		$this->load->view('view_diskusi',$data);
	}
	
	public function add_diskusi()
	{
		$this->load->model('model_diskusi');
		$email=$this->session->userdata('email');
		$penulis=$this->model_diskusi->get_email($email);
		
		$id=$this->input->post("id");
		$judul=$this->input->post("judul");
		$penulis=$penulis[0]['nama_karyawan'];
		$isi=$this->input->post("isi");
		$tanggal=$this->input->post("tanggal");
		
		$this->model_diskusi->insert_diskusi($id,$judul,$penulis,$isi,$tanggal);
		redirect("diskusi");
	}
	
	public function delete_diskusi($id)
	{
		$this->load->model('model_diskusi');
		$this->model_diskusi->delete_diskusi($id);
		redirect("diskusi");
	}
	
	public function edit_diskusi($id)
	{
		$this->load->helper('xinha_helper');
		$data['xinha_java']= javascript_xinha(array('isi'));
		$this->load->model('model_diskusi');
		$data['diskusi']=$this->model_diskusi->view_diskusi();
		$data['edit_diskusi']=$this->model_diskusi->get_diskusi($id);
		$this->load->view('add_diskusi',$data);
	}
	
	public function update_diskusi()
	{
		$this->load->model('model_diskusi');
		$id=$this->input->post("id");
		$judul=$this->input->post("judul");
		$isi=$this->input->post("isi");
		$this->model_diskusi->update_diskusi($id,$judul,$isi);
		redirect("diskusi");
	}

	/* ------------------------baris untuk komentar---------------------- */
	
	public function view_balasan($id_balasan)
	{
		$this->load->model('model_diskusi');
		$this->load->view('view_diskusi',$data);
	}
	
	public function tambah_balasan($id)
	{
		$this->load->model('model_diskusi');
		$this->load->helper('xinha_helper');
		$dati['xinha_java']= javascript_xinha(array('isi'));
		
		$dati['edit_diskusi']=$this->model_diskusi->get_diskusi($id);
		// this line for the xinha
		$this->load->view('add_balasan', $dati);
	}
	
	public function add_balasan()
	{
		$this->load->model('model_diskusi');
		
		$email=$this->session->userdata('email');
		$penulis=$this->model_diskusi->get_email($email);
		
		$id_balasan=$this->input->post("id_balasan");
		$id_diskusi=$this->input->post("id_diskusi");
		$penulis=$penulis[0]['nama_karyawan'];
		$isi=$this->input->post("isi");
		$tanggal_balasan=$this->input->post("tanggal_balasan");
		
		$this->model_diskusi->insert_balasan($id_balasan,$id_diskusi,$penulis,$isi,$tanggal_balasan);
		redirect("diskusi");
	}
	
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
