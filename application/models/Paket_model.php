<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paket_model extends CI_Model {

	//Load Database
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//Listing
	public function listing()
	{
		$q = "SELECT * FROM paket WHERE status = '1' ORDER BY id ASC";

		$query = $this->db->query($q);

		return $query->result_array();
	}

	public function nama_tema($id)
	{
		$c = "SELECT nama_tema FROM tema WHERE id = '$id'";

		$query = $this->db->query($c);

		if($query->num_rows() > 0){
			return $query->result_array()[0]['nama_tema'];
		}else{
			return null;
		}
	}

	public function nama_tempat($id)
	{
		$c = "SELECT nama_lokasi FROM tempat WHERE id = '$id'";

		$query = $this->db->query($c);

		if($query->num_rows() > 0){
			return $query->result_array()[0]['nama_lokasi'];
		}else{
			return null;
		}
	}

	public function nama_musik($id)
	{
		$c = "SELECT nama_musik FROM musik WHERE id = '$id'";

		$query = $this->db->query($c);

		if($query->num_rows() > 0){
			return $query->result_array()[0]['nama_musik'];
		}else{
			return null;
		}
	}

	public function nama_kostum($id)
	{
		$c = "SELECT nama FROM kostum WHERE id = '$id'";

		$query = $this->db->query($c);

		if($query->num_rows() > 0){
			return $query->result_array()[0]['nama'];
		}else{
			return null;
		}
	}

	public function nama_catering($id)
	{
		$c = "SELECT nama_catering FROM catering WHERE id = '$id'";

		$query = $this->db->query($c);

		if($query->num_rows() > 0){
			return $query->result_array()[0]['nama_catering'];
		}else{
			return null;
		}
	}

	public function nama_photo($id)
	{
		$c = "SELECT nama FROM photo WHERE id = '$id'";

		$query = $this->db->query($c);

		if($query->num_rows() > 0){
			return $query->result_array()[0]['nama'];
		}else{
			return null;
		}
	}

	public function tambah($data)
	{
		$this->db->insert('paket', $data);
	}

	public function get_tema()
	{
		$c = "SELECT id, nama_tema as nama FROM tema WHERE status = '1'";

		$query = $this->db->query($c);

		return $query->result_array();
	}

	public function get_tempat()
	{
		$c = "SELECT id, nama_lokasi as nama FROM tempat WHERE status = '1'";

		$query = $this->db->query($c);

		return $query->result_array();
	}

	public function get_musik()
	{
		$c = "SELECT id, nama_musik as nama FROM musik WHERE status = '1'";

		$query = $this->db->query($c);

		return $query->result_array();
	}

	public function get_photo()
	{
		$c = "SELECT id, nama FROM photo WHERE status = '1'";

		$query = $this->db->query($c);

		return $query->result_array();
	}

	public function get_catering()
	{
		$c = "SELECT id, nama_catering as nama FROM catering WHERE status = '1'";

		$query = $this->db->query($c);

		return $query->result_array();
	}

	public function get_kostum()
	{
		$c = "SELECT id, nama FROM kostum WHERE status = '1'";

		$query = $this->db->query($c);

		return $query->result_array();
	}

	//Detail
	public function detail($id)
	{
		$this->db->select('*');
		$this->db->from('paket');
		$this->db->where('id',$id);
		$this->db->order_by('id');
		$query = $this->db->get();
		return $query->row();
	}

	//Delete
	public function delete($data)
	{
		$id = $data['id'];

		$c  = "UPDATE paket SET status = '0' WHERE id = '$id'";

		$this->db->query($c);
	}
}