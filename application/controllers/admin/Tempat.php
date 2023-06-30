<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tempat extends CI_Controller {

	//load database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('tempat_model', 'tempat');
	}

	//Listing data barang
	public function index()
	{
		$tempat = $this->tempat->listing();

		$data = array(	'title'		=>	'Data Venue ('.count($tempat).')',
						'tempat'	=>	$tempat,
						'isi'		=>	'admin/tempat/list'
				);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	//Tambah
	public function tambah()
	{
		//valid
		$valid = $this->form_validation;

		$valid->set_rules('nama_lokasi','Nama Venue','required',
				array('required'	=>	'%s harus diisi'));

		$valid->set_rules('alamat','Alamat','required',
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

		$data = array(	'title'			=>	'Tambah data Venue',
						'error_upload'	=>	 $this->upload->display_errors(),
						'isi'			=>	'admin/tempat/tambah'
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
							'nama_lokasi'=>	$i->post('nama_lokasi'),
							'alamat'=>	$i->post('alamat'),
							'harga'		=>	$i->post('harga'),
							'deskripsi'	=>	$i->post('deskripsi'),
							'foto'		=>	$upload_data['uploads']['file_name'],
						);

			$this->tempat->tambah($data);
			$this->session->set_flashdata('sukses', 'Data Telah Ditambah');
			redirect(base_url('admin/tempat'),'refresh');
		}}
		//End Masuk Database
		$data = array(	'title'			=> 'Tambah data Venue',
						'isi'			=> 'admin/tempat/tambah'
			);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	//Edit
	public function edit($id)
	{
		$tempat = $this->tempat->detail($id);

		//valid
		$valid = $this->form_validation;

		$valid->set_rules('nama_lokasi','Nama Venue','required',
				array('required'	=>	'%s harus diisi'));

		$valid->set_rules('alamat','Alamat','required',
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

		$data = array(	'title'			=>	'Edit data Venue '.$tempat->nama_lokasi,
						'tempat'			=>	$tempat,
						'error_upload'	=>	 $this->upload->display_errors(),
						'isi'			=>	'admin/tempat/edit'
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
			if($tempat->foto != "")
			{
				unlink('./assets/upload/image/'.$tempat->foto);
				unlink('./assets/upload/image/thumbs/'.$tempat->foto);
			}
			//End Hapus gambar

			$data = array(	'id'		=>	$id,
							'nama_lokasi'	=>	$i->post('nama_lokasi'),
							'alamat'	=>	$i->post('alamat'),
							'harga'		=>	$i->post('harga'),
							'deskripsi'	=>	$i->post('deskripsi'),
							'foto'		=>	$upload_data['uploads']['file_name'],		
						);
			$this->tempat->edit($data);
			$this->session->set_flashdata('sukses', 'Data Telah DiUpdate');
			redirect(base_url('admin/tempat'),'refresh');
		}}else {
			//Update barang tanpa gambar
			$i = $this->input;
			$data = array(	'id'		=>	$id,
							'nama_lokasi'	=>	$i->post('nama_lokasi'),
							'alamat'	=>	$i->post('alamat'),
							'harga'		=>	$i->post('harga'),
							'deskripsi'	=>	$i->post('deskripsi'),		
						);
			$this->tempat->edit($data);
			$this->session->set_flashdata('sukses', 'Data Telah DiUpdate');
			redirect(base_url('admin/tempat'),'refresh');

		}}
		//End Masuk Database
		$data = array(	'title'			=>	'Edit data venue '.$tempat->nama_lokasi,
						'tempat'			=>	$tempat,
						'isi'			=>	'admin/tempat/edit'
			);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	//Delete
	public function delete($id)
	{
		//Proteksi delete
		$this->check_login->check();
		
		$tempat = $this->tempat->detail($id);

		//Hapus Gambar
		if($tempat->foto != "") {
			unlink('./assets/upload/image/'.$tempat->foto);
			unlink('./assets/upload/image/thumbs/'.$tempat->foto);
		}
		//End Hapus Gambar
		$data = array('id'	=>	$tempat->id);
		$this->tempat->delete($data);
		$this->session->set_flashdata('sukses', 'Data Telah dihapus');
		redirect(base_url('admin/tempat'),'refresh');
	}
}