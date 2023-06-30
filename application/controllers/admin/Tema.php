<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tema extends CI_Controller {

	//load database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('tema_model', 'tema');
	}

	//Listing data barang
	public function index()
	{
		$tema = $this->tema->listing();

		$data = array(	'title'		=>	'Data Tema ('.count($tema).')',
						'tema'		=>	$tema,
						'isi'		=>	'admin/tema/list'
				);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	//Tambah
	public function tambah()
	{
		//valid
		$valid = $this->form_validation;

		$valid->set_rules('nama_tema','Nama Tema','required',
				array('required'	=>	'%s harus diisi'));

		$valid->set_rules('harga','Harga','required',
				array('required'	=>	'%s harus diisi'));

		$valid->set_rules('deskripsi','Deskripsi','required',
				array('required'	=>	'%s harus diisi'));

		if($valid->run()) {
			$config['upload_path']          = './assets/upload/image/';
	        $config['allowed_types']        = 'gif|jpg|png|jpeg';
	        $config['max_size']             = 5000;
	        $config['max_width']            = 5000;
	        $config['max_height']           = 5000;

	        $this->load->library('upload', $config);
	        if ( ! $this->upload->do_upload('gambar')) {
		//End Validasi

		$data = array(	'title'			=>	'Tambah data Tema',
						'error_upload'	=>	 $this->upload->display_errors(),
						'isi'			=>	'admin/tema/tambah'
			);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		//Masuk database
		}else{
			//Proses Manipulasi Gambar
			$upload_data	= array('uploads'	=> $this->upload->data());
			//Gambar asli disimpan di folder assets/upload/image
			//lalu gambar asli itu dicopy untuk versi mini size ke folder assets/upload/image/thumbs

			$config['image_library']  	= 'gd2';
			$config['source_image']   	= './assets/upload/image/'.$upload_data['uploads']['file_name'];
			//Gambar versi kecil dipindahkan
			$config['new_image']		= './assets/upload/image/thumbs/'.$upload_data['uploads']['file_name'];
			$config['create_thumb']   	= TRUE;
			$config['maintain_ratio'] 	= TRUE;
			$config['width']          	= 200;
			$config['height']         	= 200;
			$config['thumb_marker']		= '';

			$this->load->library('image_lib', $config);
			$this->image_lib->resize();

			$i = $this->input;
			$data = array(	
							'nama_tema'	=>	$i->post('nama_tema'),
							'harga'		=>	$i->post('harga'),
							'deskripsi'	=>	$i->post('deskripsi'),
							'foto'		=>	$upload_data['uploads']['file_name'],
						);

			$this->tema->tambah($data);
			$this->session->set_flashdata('sukses', 'Data Telah Ditambah');
			redirect(base_url('admin/tema'),'refresh');
		}}
		//End Masuk Database
		$data = array(	'title'			=> 'Tambah data Tema',
						'isi'			=> 'admin/tema/tambah'
			);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	//Edit
	public function edit($id_tema)
	{
		$tema = $this->tema->detail($id_tema);

		//valid
		$valid = $this->form_validation;

		$valid->set_rules('nama_tema','Nama Tema','required',
				array('required'	=>	'%s harus diisi'));

		$valid->set_rules('harga','Harga','required',
				array('required'	=>	'%s harus diisi'));

		$valid->set_rules('deskripsi','Deskripsi','required',
				array('required'	=>	'%s harus diisi'));

		if($valid->run()) {
			//Kalo ga ganti gambar
			if(!empty($_FILES['gambar']['name'])) {

			$config['upload_path']          = './assets/upload/image/';
	        $config['allowed_types']        = 'gif|jpg|png|jpeg';
	        $config['max_size']             = 5000;
	        $config['max_width']            = 5000;
	        $config['max_height']           = 5000;

	        $this->load->library('upload', $config);
	        if ( ! $this->upload->do_upload('gambar')) {
		//End Validasi

		$data = array(	'title'			=>	'Edit data Tema '.$tema->nama_tema,
						'tema'			=>	$tema,
						'error_upload'	=>	 $this->upload->display_errors(),
						'isi'			=>	'admin/tema/edit'
			);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		//Masuk database
		}else{
			//Proses Manipulasi Gambar
			$upload_data	= array('uploads'	=> $this->upload->data());
			//Gambar asli disimpan di folder assets/upload/image
			//lalu gambar asli itu dicopy untuk versi mini size ke folder assets/upload/image/thumbs

			$config['image_library']  	= 'gd2';
			$config['source_image']   	= './assets/upload/image/'.$upload_data['uploads']['file_name'];
			//Gambar versi kecil dipindahkan
			$config['new_image']		= './assets/upload/image/thumbs/'.$upload_data['uploads']['file_name'];
			$config['create_thumb']   	= TRUE;
			$config['maintain_ratio'] 	= TRUE;
			$config['width']          	= 200;
			$config['height']         	= 200;
			$config['thumb_marker']		= '';

			$this->load->library('image_lib', $config);
			$this->image_lib->resize();

			$i = $this->input;

			//Hapus gambar lama jika ada upload gambar baru
			if($tema->foto != "")
			{
				unlink('./assets/upload/image/'.$tema->foto);
				unlink('./assets/upload/image/thumbs/'.$tema->foto);
			}
			//End Hapus gambar

			$data = array(	'id'		=>	$id_tema,
							'nama_tema'	=>	$i->post('nama_tema'),
							'harga'		=>	$i->post('harga'),
							'deskripsi'	=>	$i->post('deskripsi'),
							'foto'		=>	$upload_data['uploads']['file_name'],		
						);
			$this->tema->edit($data);
			$this->session->set_flashdata('sukses', 'Data Telah DiUpdate');
			redirect(base_url('admin/tema'),'refresh');
		}}else {
			//Update barang tanpa gambar
			$i = $this->input;
			$data = array(	'id'		=>	$id_tema,
							'nama_tema'	=>	$i->post('nama_tema'),
							'harga'		=>	$i->post('harga'),
							'deskripsi'	=>	$i->post('deskripsi'),		
						);
			$this->tema->edit($data);
			$this->session->set_flashdata('sukses', 'Data Telah DiUpdate');
			redirect(base_url('admin/tema'),'refresh');

		}}
		//End Masuk Database
		$data = array(	'title'			=>	'Edit data tema '.$tema->nama_tema,
						'tema'			=>	$tema,
						'isi'			=>	'admin/tema/edit'
			);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	//Delete
	public function delete($id)
	{
		//Proteksi delete
		$this->check_login->check();
		
		$tema = $this->tema->detail($id);

		//Hapus Gambar
		if($tema->foto != "") {
			unlink('./assets/upload/image/'.$tema->foto);
			unlink('./assets/upload/image/thumbs/'.$tema->foto);
		}
		//End Hapus Gambar

		$data = array('id'	=>	$tema->id);
		$this->tema->delete($data);
		$this->session->set_flashdata('sukses', 'Data Telah dihapus');
		redirect(base_url('admin/tema'),'refresh');
	}
}