<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	//Load Database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('konfigurasi_model');
	}

	public function login()
	{
		$konfigurasi 	= $this->konfigurasi_model->listing();

		$data = array(
						'title'			=> 'Login - Naufal Wedding',
						'konfigurasi'	=> $konfigurasi,
					);

		$this->load->view('user/login', $data);
	}

	public function register()
	{
		$konfigurasi 	= $this->konfigurasi_model->listing();

		$data = array(
						'title'			=> 'registrasi - Naufal Wedding',
						'konfigurasi'	=> $konfigurasi,
					);

		$this->load->view('user/register', $data);
	}

	public function daftar()
	{
		$valid = $this->form_validation;

		$valid->set_rules('nama_lengkap','Nama Lengkap','required',
				array('required'	=>	'%s harus diisi'));

		$valid->set_rules('username', 'Username','required|is_unique[user.username]',
				array('required'	=>	'%s harus diisi', 'is_unique' => '%s sudah digunakan'));

		$valid->set_rules('email', 'Email', 'required|valid_email',
				array('required'	=>	'%s harus diisi', 'valid_email'	=>	'Format %s tidak valid'));

		$valid->set_rules('no_hp', 'No HP','required',
				array('required'	=>	'%s harus diisi'));

		$valid->set_rules('alamat', 'Alamat','required',
				array('required'	=>	'%s harus diisi'));

		$valid->set_rules('psw', 'Password','required',
				array('required'	=>	'%s harus diisi'));

		$valid->set_rules('repsw', 'konfirmasi password', 'required|matches[psw]',
				array('required'	=>	'%s harus diisi', 'matches' => 'Konfirmasi password tidak sama dengan password'));

		if($valid->run()) {

			$i = $this->input;

			$nama_lengkap 	= $i->post('nama_lengkap');
			$username 		= $i->post('username');
			$email 			= $i->post('email');
			$no_hp 			= $i->post('no_hp');
			$alamat 		= $i->post('alamat');
			$psw 			= $i->post('psw');

			$this->db->query("INSERT INTO user 
				(`nama_lengkap`, `email`, `no_hp`, `alamat`, `username`, `password`) 
				VALUES ('$nama_lengkap', '$email', '$no_hp', '$alamat', '$username', '$psw')");

			$this->session->set_flashdata('sukses', 'Registrasi sukses, silahkan masuk');
			redirect(base_url('user/login'),'refresh');
		}else{
			$this->session->set_flashdata('error', validation_errors());
    		redirect(base_url('user/register'),'refresh');
		}
	}

	public function masuk()
	{
		$username = $this->input->post('name');
		$password = $this->input->post('psw');

		$check_login = $this->konfigurasi_model->cek_login($username, $password);

		if($check_login->num_rows() > 0) {

			$check_login_2 = $check_login->row();

			$this->session->set_userdata('uid',$check_login_2->id);
			$this->session->set_userdata('uname',$check_login_2->username);
			// $this->session->set_userdata('nama',$check_login_2->nama);
			$this->session->set_userdata('unama_lengkap',$check_login_2->nama_lengkap);
			redirect(base_url('dashboard'),'refresh');
		} else{
			//Kalo ga cocok maka error dan redirect ke login lagi
			$this->session->set_flashdata('gagal', 'Username atau Password salah');
			redirect(base_url('user/login'),'refresh');
		}
	}

	//Logout
	public function logout()
	{
		$this->session->unset_userdata('uid');
		$this->session->unset_userdata('uname');
		$this->session->unset_userdata('unama_lengkap');
		redirect(base_url('dashboard'),'refresh');
	}

	public function get_paketan()
	{
		$paket = $this->konfigurasi_model->get_paket();

		echo json_encode($paket);
	}

	public function get_custom()
	{
		$tema 	  = $this->konfigurasi_model->get_custom('tema');
		$tempat   = $this->konfigurasi_model->get_custom('tempat');
		$makeup   = $this->konfigurasi_model->get_custom('makeup');
		$musik 	  = $this->konfigurasi_model->get_custom('musik');
		$photo 	  = $this->konfigurasi_model->get_custom('photo');
		$kostum   = $this->konfigurasi_model->get_custom('kostum');

		echo json_encode(['tema' => $tema, 'tempat' => $tempat, 
						  'makeup' => $makeup, 'musik' => $musik,
						  'photo' => $photo, 'kostum' => $kostum]);
	}

	public function get_harga_paket()
	{
		$paket = $_POST['paket'];

		$harga = $this->konfigurasi_model->get_harga_paket($paket);

		echo json_encode($harga);
	}

	public function get_harga_custom()
	{
		$tema 		= $_POST['tema'];
		// $tempat 	= $_POST['tempat'];
		$makeup 	= $_POST['makeup'];
		$musik 		= $_POST['musik'];
		$photo 		= $_POST['photo'];
		$kostum 	= $_POST['kostum'];

		$harga_tema 	= $this->konfigurasi_model->get_harga_custom($tema, $table = 'tema');
		// $harga_tempat 	= $this->konfigurasi_model->get_harga_custom($tempat, $table = 'tempat');
		$harga_makeup 	= $this->konfigurasi_model->get_harga_custom($makeup, $table = 'makeup');
		$harga_musik 	= $this->konfigurasi_model->get_harga_custom($musik, $table = 'musik');
		$harga_photo  	= $this->konfigurasi_model->get_harga_custom($photo, $table = 'photo');
		$harga_kostum 	= $this->konfigurasi_model->get_harga_custom($kostum, $table = 'kostum');

		$harga      = $harga_tema+$harga_makeup+$harga_musik+$harga_photo+$harga_kostum;

		echo json_encode($harga);
	}

	public function booking()
	{
		$no_transaksi = $this->gen_kode(); 
		$date 		  = date('Y-m-d H:i:s');
		$tgl_booking  = $_POST['tgl_booking'];
		$jenis 		  = $_POST['jenis'];
		$jth_bayar    = date('Y-m-d H:i:s', strtotime($date.'+1 day'));
		$id_user 	  = $_SESSION['uid'];

		if(!empty($_POST['paket'])){
			$paket 		 = $_POST['paket'];	
		}else{
			$paket 		 = null;
		}

		if(!empty($_POST['tema'])){
			$tema 		 = $_POST['tema'];	
		}else{
			$tema 		 = null;
		}

		if(!empty($_POST['tempat'])){
			$tempat 	 = $_POST['tempat'];	
		}else{
			$tempat 	 = null;
		}

		if(!empty($_POST['makeup'])){
			$makeup 	 = $_POST['makeup'];	
		}else{
			$makeup 	 = null;
		}

		if(!empty($_POST['musik'])){
			$musik 	 = $_POST['musik'];	
		}else{
			$musik 	 = null;
		}

		if(!empty($_POST['photo'])){
			$photo 	 = $_POST['photo'];	
		}else{
			$photo 	 = null;
		}

		if(!empty($_POST['kostum'])){
			$kostum 	 = $_POST['kostum'];	
		}else{
			$kostum 	 = null;
		}
		
		$nama 	 	 = $_POST['nama'];
		$harga 	 	 = $_POST['harga'];
		$alamat 	 = $_POST['alamat'];
		$ket 	 	 = $_POST['ket'];

		$query = $this->db->query("INSERT INTO transaksi (`date`, no_transaksi, nama_pemesan, id_user, tgl_booking, jenis_booking, id_tema, id_musik, id_makeup, id_photo, id_kostum, id_paket, total_harga, status, jth_tempo_bayar, alamat, ket) 
			VALUES ('$date', '$no_transaksi', '$nama', '$id_user', '$tgl_booking', '$jenis', '$tema', '$musik', '$makeup', '$photo', '$kostum', '$paket', '$harga', '2', '$jth_bayar',
			'$alamat', '$ket')");

		if($query){
			echo json_encode(['result' => 'sukses']);
		}
	}
	private function gen_kode()
	{
		$pre = date('Ym');
		$no_urut = 1;

		$query = $this->db->query("select no_transaksi from transaksi where no_transaksi LIKE '%".$pre."%' order by no_transaksi desc limit 1");

		if($query->num_rows() > 0){
			$last_no = $query->result_array()[0]['no_transaksi'];
			$x = explode('-',$last_no);
			$next = intval($x[1])+1;

		}else{
			$next = 1;
		}

		$no_urut = $this->digit3($next);

		$no_transaksi = $pre.'-'.$no_urut;

		return $no_transaksi;

	}

	private function digit3($no){
		$current_digit = strlen($no);
		$digit = 3;

		if($current_digit < $digit){
			$kurang_digit = $digit - $current_digit;
			$new_code = '';
			for($i = 0; $i < $kurang_digit; $i++){
				$new_code .= '0'; 
			}
			$no_urut = $new_code.$no;
			return $no_urut;
		}else{
			return $no;
		}
	}
}