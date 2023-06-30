<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Photo extends CI_Controller {

	//load database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('photo_model', 'photo');
	}

	//Listing data barang
	public function index()
	{
		$photo = $this->photo->listing();

		$data = array(	'title'		=>	'Data Photoshop ('.count($photo).')',
						'photo'		=>	$photo,
						'isi'		=>	'admin/photo/list'
				);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	//Tambah
	public function tambah()
	{
		//valid
		$valid = $this->form_validation;

		$valid->set_rules('nama','Nama','required',
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

		$data = array(	'title'			=>	'Tambah data Photo',
						'error_upload'	=>	 $this->upload->display_errors(),
						'isi'			=>	'admin/photo/tambah'
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
							'nama'		=>	$i->post('nama'),
							'harga'		=>	$i->post('harga'),
							'deskripsi'	=>	$i->post('deskripsi'),
							'foto'		=>	$upload_data['uploads']['file_name'],
						);

			$this->photo->tambah($data);
			$this->session->set_flashdata('sukses', 'Data Telah Ditambah');
			redirect(base_url('admin/photo'),'refresh');
		}}
		//End Masuk Database
		$data = array(	'title'			=> 'Tambah data Photo',
						'isi'			=> 'admin/photo/tambah'
			);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	//Edit
	public function edit($id)
	{
		$photo = $this->photo->detail($id);

		//valid
		$valid = $this->form_validation;

		$valid->set_rules('nama','Nama','required',
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

		$data = array(	'title'			=>	'Edit data Photo '.$photo->nama,
						'photo'			=>	$photo,
						'error_upload'	=>	 $this->upload->display_errors(),
						'isi'			=>	'admin/photo/edit'
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
			if($photo->foto != "")
			{
				unlink('./assets/upload/image/'.$photo->foto);
				unlink('./assets/upload/image/thumbs/'.$photo->foto);
			}
			//End Hapus gambar

			$data = array(	'id'		=>	$id,
							'nama'		=>	$i->post('nama'),
							'harga'		=>	$i->post('harga'),
							'deskripsi'	=>	$i->post('deskripsi'),
							'foto'		=>	$upload_data['uploads']['file_name'],		
						);
			$this->photo->edit($data);
			$this->session->set_flashdata('sukses', 'Data Telah DiUpdate');
			redirect(base_url('admin/photo'),'refresh');
		}}else {
			//Update barang tanpa gambar
			$i = $this->input;
			$data = array(	'id'		=>	$id,
							'nama'	=>	$i->post('nama'),
							'harga'		=>	$i->post('harga'),
							'deskripsi'	=>	$i->post('deskripsi'),		
						);
			$this->photo->edit($data);
			$this->session->set_flashdata('sukses', 'Data Telah DiUpdate');
			redirect(base_url('admin/photo'),'refresh');

		}}
		//End Masuk Database
		$data = array(	'title'			=>	'Edit data Photo '.$photo->nama,
						'photo'			=>	$photo,
						'isi'			=>	'admin/photo/edit'
			);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	//Delete
	public function delete($id)
	{
		//Proteksi delete
		$this->check_login->check();
		
		$photo = $this->photo->detail($id);

		//Hapus Gambar
		if($photo->foto != "") {
			unlink('./assets/upload/image/'.$photo->foto);
			unlink('./assets/upload/image/thumbs/'.$photo->foto);
		}
		//End Hapus Gambar
		$data = array('id'	=>	$photo->id);
		$this->photo->delete($data);
		$this->session->set_flashdata('sukses', 'Data Telah dihapus');
		redirect(base_url('admin/photo'),'refresh');
	}
}