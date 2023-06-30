<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Catering_model extends CI_Model {

	//Load Database
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//Listing
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('catering');
		$this->db->where('status', 1);
		$this->db->order_by('id','ASC');
		$query = $this->db->get();
		return $query->result();
	}

	public function tambah($data)
	{
		$this->db->insert('catering', $data);
	}

	//Detail
	public function detail($id)
	{
		$this->db->select('*');
		$this->db->from('catering');
		$this->db->where('id',$id);
		$this->db->order_by('id');
		$query = $this->db->get();
		return $query->row();
	}

	//Edit
	public function edit($data)
	{
		$this->db->where('id',$data['id']);
		$this->db->update('catering',$data);
	}

	//Delete
	public function delete($data)
	{
		$id = $data['id'];

		$c  = "UPDATE catering SET status = '0', foto = null WHERE id = '$id'";

		$this->db->query($c);
	}
}