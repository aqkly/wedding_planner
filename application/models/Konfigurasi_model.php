<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfigurasi_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//Listing
	Public function listing()
	{
		$query = $this->db->get('konfigurasi');
		return $query->row();
	}

	//Edit
	public function edit($data)
	{
		$this->db->where('id_konfigurasi', $data['id_konfigurasi']); 
		$this->db->update('konfigurasi', $data);
	}

	//Menu
	public function menu_berita()
	{
		$this->db->select(	'berita.*,
							kategori.nama_kategori,
							kategori.slug_kategori,
							admin.nama');
		$this->db->from('berita');
		//Join
		$this->db->join('kategori','kategori.id_kategori = berita.id_kategori','LEFT');
		$this->db->join('admin','admin.id_user = berita.id_user','LEFT');
		//End Join
		$this->db->where(array(	'berita.status_berita'	=> 'Publish',
								'berita.jenis_berita'	=> 'Berita'));
		// $this->db->group_by('berita.id_kategori');
		$this->db->order_by('id_berita','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	//Menu Layanan
	public function menu_layanan()
	{
		$this->db->select('layanan.*,
							admin.nama');
		$this->db->from('layanan');
		//JOIN
		$this->db->join('admin','admin.id_user = layanan.id_user','LEFT');
		//END JOIN
		$this->db->where('layanan.status_layanan','Publish');
		$this->db->order_by('id_layanan','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	//Menu Profil
	public function menu_profil()
	{
		$this->db->select(	'berita.*,
							kategori.nama_kategori,
							kategori.slug_kategori,
							admin.nama');
		$this->db->from('berita');
		//Join
		$this->db->join('kategori','kategori.id_kategori = berita.id_kategori','LEFT');
		$this->db->join('admin','admin.id_user = berita.id_user','LEFT');
		//End Join
		$this->db->where(array(	'berita.status_berita'	=> 'Publish',
								'berita.jenis_berita'	=> 'Profil'));
		$this->db->order_by('id_berita','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public function cek_login($username, $password)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where(array('username'	=> $username,
							   'password'	=> $password));
		$this->db->order_by('id');
		return $this->db->get();
	}

	public function get_paket()
	{
		$c = "SELECT id, nama_paket FROM paket WHERE status = '1' GROUP BY id ORDER BY id ASC";

		$query = $this->db->query($c);

		return $query->result_array();
	}

	public function get_harga_paket($id)
	{
		$c = "SELECT harga FROM paket WHERE id = '$id'";

		$query = $this->db->query($c);

		if($query->num_rows() > 0){
			return $query->result_array()[0]['harga'];
		}else{
			return 0;
		}
	}

	public function get_harga_custom($id, $table)
	{
		$c = "SELECT harga FROM $table WHERE id = '$id'";

		$query = $this->db->query($c);

		if($query->num_rows() > 0){
			return $query->result_array()[0]['harga'];
		}else{
			return 0;
		}
	}

	public function get_custom($table)
	{
		if($table == 'tema'){
			$c = "SELECT id, nama_tema FROM $table WHERE status = '1' GROUP BY id ORDER BY id ASC";
		}else if($table == 'tempat'){
			$c = "SELECT id, nama_lokasi FROM $table WHERE status = '1' GROUP BY id ORDER BY id ASC";
		}else if($table == 'catering'){
			$c = "SELECT id, nama_catering FROM $table WHERE status = '1' GROUP BY id ORDER BY id ASC";
		}else if($table == 'musik'){
			$c = "SELECT id, nama_musik FROM $table WHERE status = '1' GROUP BY id ORDER BY id ASC";
		}else if($table == 'photo'){
			$c = "SELECT id, nama FROM $table WHERE status = '1' GROUP BY id ORDER BY id ASC";
		}else if($table == 'kostum'){
			$c = "SELECT id, nama FROM $table WHERE status = '1' GROUP BY id ORDER BY id ASC";
		}
		$query = $this->db->query($c);

		return $query->result_array();
	}

	public function get_trans($id_user)
	{
		$c = "SELECT * FROM transaksi WHERE id_user = '$id_user'";

		$query = $this->db->query($c);

		return $query->result_array();
	}

	//Listing
	public function list_trans()
	{
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->order_by('id','ASC');
		$query = $this->db->get();
		return $query->result();
	}

	public function list_trans_2()
	{
		$c = "SELECT * FROM transaksi ORDER BY id";

		$query = $this->db->query($c);

		return $query->result_array();
	}

	public function get_nama_paket($id)
	{
		$c = "SELECT nama_paket FROM paket WHERE id = '$id'";

		$query = $this->db->query($c);

		if($query->num_rows() > 0){
			return $query->result_array()[0]['nama_paket'];
		}else{
			return null;
		}
	}

	public function get_nama_tempat($id)
	{
		$c = "SELECT nama_lokasi FROM tempat WHERE id = '$id'";

		$query = $this->db->query($c);

		if($query->num_rows() > 0){
			return $query->result_array()[0]['nama_lokasi'];
		}else{
			return null;
		}
	}

	public function get_nama_tema($id)
	{
		$c = "SELECT nama_tema FROM tema WHERE id = '$id'";

		$query = $this->db->query($c);

		if($query->num_rows() > 0){
			return $query->result_array()[0]['nama_tema'];
		}else{
			return null;
		}
	}

	public function get_nama_catering($id)
	{
		$c = "SELECT nama_catering FROM catering WHERE id = '$id'";

		$query = $this->db->query($c);

		if($query->num_rows() > 0){
			return $query->result_array()[0]['nama_catering'];
		}else{
			return null;
		}
	}

	public function get_nama_musik($id)
	{
		$c = "SELECT nama_musik FROM musik WHERE id = '$id'";

		$query = $this->db->query($c);

		if($query->num_rows() > 0){
			return $query->result_array()[0]['nama_musik'];
		}else{
			return null;
		}
	}

	public function get_nama_photo($id)
	{
		$c = "SELECT nama FROM photo WHERE id = '$id'";

		$query = $this->db->query($c);

		if($query->num_rows() > 0){
			return $query->result_array()[0]['nama'];
		}else{
			return null;
		}
	}

	public function get_nama_kostum($id)
	{
		$c = "SELECT nama FROM kostum WHERE id = '$id'";

		$query = $this->db->query($c);

		if($query->num_rows() > 0){
			return $query->result_array()[0]['nama'];
		}else{
			return null;
		}
	}

	public function get_nama_user($id)
	{
		$c = "SELECT nama_lengkap FROM user WHERE id = '$id'";

		$query = $this->db->query($c);

		if($query->num_rows() > 0){
			return $query->result_array()[0]['nama_lengkap'];
		}else{
			return null;
		}
	}

	public function get_harga($id)
	{
		$c = "SELECT total_harga FROM transaksi WHERE id = '$id'";

		$query = $this->db->query($c);

		if($query->num_rows() > 0){
			return $query->result_array()[0]['total_harga'];
		}else{
			return null;
		}
	}
}

/* End of file Konfigurasi_model.php */
/* Location: ./application/models/Konfigurasi_model.php */