<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	//Load Database
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//Listing User
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('admin');
		$this->db->order_by('id_user');
		$query = $this->db->get();
		return $query->result();
	}

	//Detail User
	public function detail($id_user)
	{
		$this->db->select('*');
		$this->db->from('admin');
		$this->db->where('id_user',$id_user);
		$this->db->order_by('id_user');
		$query = $this->db->get();
		return $query->row();
	}

	//Login User
	public function login($username, $password)
	{
		// $pass = sha1($password);

		// $c = "SELECT * FROM petugas 
		// 		WHERE username = '$username' 
		// 		AND password = '$pass' 
		// 		ORDER BY id_user";

		// $query = $this->db->query($c);
		
		// return $query->result();		

		$this->db->select('*');
		$this->db->from('admin');
		$this->db->where(array('username'	=> $username,
							   'password'	=> sha1($password)));
		$this->db->order_by('id_user');
		// $query = $this->db->get();
		return $this->db->get();
		// return $query->row();
	}

	//Tambah User
	public function tambah($data)
	{
		$this->db->insert('admin', $data);
	}

	//Edit User
	public function edit($data)
	{
		$this->db->where('id_user',$data['id_user']);
		$this->db->update('admin',$data);
	}

	//Delete User

	public function delete($data)
	{
		$this->db->where('id_user',$data['id_user']);
		$this->db->delete('admin',$data);
	}
}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */