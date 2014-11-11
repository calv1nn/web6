<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_diskusi extends CI_Model {

	function __construct(){
		parent::__construct();
		}
		
	public function daftar($limit,$offset)
	{
		$this->db->select('judul,isi,id,tanggal');
		$this->db->order_by("id", "desc");
		$this->db->from('diskusi');
		$this->db->limit($limit,$offset);
		$query = $this->db->get();
		//print_r($query);die;
		return $query;
		
	}
	
	public function view_diskusi()
	{
		//$this->load->database();
		$this->db->order_by("id", "asc");
		$query = $this->db->get('diskusi');
		return $query->result_array();
	}
	
	public function view($id)
	{
		$this->db->select('judul,isi,id,tanggal,penulis');
		$this->db->where('id',$id);
		$this->db->from('diskusi');
		$query = $this->db->get();
		return $query;
	}
	
	public function insert_diskusi($id,$judul,$penulis,$isi,$tanggal)
	{
		$data = array(
				'id' => $id,
				'judul' => $judul,
				'penulis' => $penulis,
				'isi' => $isi,
				'tanggal' => date("Y-m-d")
		);
		$this->db->insert('diskusi', $data);
	}
	
	public function delete_diskusi($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('diskusi');
	}
	
	public function get_diskusi($id)
	{
		$this->db->where("id",$id);
		$query=$this->db->get('diskusi');
		return $query->result_array();
	}
	
	public function get_email($email)
	{
		$this->db->where("email",$email);
		$query=$this->db->get('karyawan');
		return $query->result_array();
	}
	
	public function update_diskusi($id,$judul,$isi)
	{
		$data = array (
				'judul' => $judul,
				'isi' => $isi
		);
		$this->db->where('id',$id);
		$this->db->update('diskusi',$data);
	}
	
	 public function search($keyword)
    {
        $this->db->like('judul',$keyword);
        $query  =   $this->db->get('diskusi');
        return $query->result();
    }
	
	/* ------------------- komentar ----------------------------------*/
	
	public function view_balasan($id)
	{
		$this->db->select('balasan.isi,id_balasan,id_diskusi,tanggal_balasan,balasan.penulis');
		
		$this->db->from('balasan');
		$this->db->join('diskusi','diskusi.id=balasan.id_diskusi');
		$this->db->where('id',$id);
		$query = $this->db->get();
		return $query;
	}
	
	public function insert_balasan($id_balasan,$id_diskusi,$penulis,$isi,$tanggal_balasan)
	{
		$data = array(
				'id_balasan' => $id_balasan,
				'id_diskusi' => $id_diskusi,
				'penulis' => $penulis,
				'isi' => $isi,
				'tanggal_balasan' => date("Y-m-d")
		);
		$this->db->insert('balasan', $data);
	}
	
}

?>