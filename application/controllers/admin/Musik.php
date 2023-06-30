<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Musik extends CI_Controller {

	//load database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('musik_model', 'musik');
	}

	//Listing data barang
	public function index()
	{
		$musik = $this->musik->listing();

		$data = array(	'title'		=>	'Data Musik ('.count($musik).')',
						'musik'		=>	$musik,
						'isi'		=>	'admin/musik/list'
				);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	//Tambah
	public function tambah()
	{
		//valid
		$valid = $this->form_validation;

		$valid->set_rules('nama_musik','Nama Musik','required',
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

		$data = array(	'title'			=>	'Tambah data Musik',
						'error_upload'	=>	 $this->upload->display_errors(),
						'isi'			=>	'admin/musik/tambah'
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
							'nama_musik'=>	$i->post('nama_musik'),
							'harga'		=>	$i->post('harga'),
							'deskripsi'	=>	$i->post('deskripsi'),
							'foto'		=>	$upload_data['uploads']['file_name'],
						);

			$this->musik->tambah($data);
			$this->session->set_flashdata('sukses', 'Data Telah Ditambah');
			redirect(base_url('admin/musik'),'refresh');
		}}
		//End Masuk Database
		$data = array(	'title'			=> 'Tambah data Musik',
						'isi'			=> 'admin/musik/tambah'
			);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	//Edit
	public function edit($id)
	{
		$musik = $this->musik->detail($id);

		//valid
		$valid = $this->form_validation;

		$valid->set_rules('nama_musik','Nama Musik','required',
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

		$data = array(	'title'			=>	'Edit data Musik '.$musik->nama_musik,
						'musik'			=>	$musik,
						'error_upload'	=>	 $this->upload->display_errors(),
						'isi'			=>	'admin/musik/edit'
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
			if($musik->foto != "")
			{
				unlink('./assets/upload/image/'.$musik->foto);
				unlink('./assets/upload/image/thumbs/'.$musik->foto);
			}
			//End Hapus gambar

			$data = array(	'id'		=>	$id,
							'nama_musik'	=>	$i->post('nama_musik'),
							'harga'		=>	$i->post('harga'),
							'deskripsi'	=>	$i->post('deskripsi'),
							'foto'		=>	$upload_data['uploads']['file_name'],		
						);
			$this->musik->edit($data);
			$this->session->set_flashdata('sukses', 'Data Telah DiUpdate');
			redirect(base_url('admin/musik'),'refresh');
		}}else {
			//Update barang tanpa gambar
			$i = $this->input;
			$data = array(	'id'		=>	$id,
							'nama_musik'	=>	$i->post('nama_musik'),
							'harga'		=>	$i->post('harga'),
							'deskripsi'	=>	$i->post('deskripsi'),		
						);
			$this->musik->edit($data);
			$this->session->set_flashdata('sukses', 'Data Telah DiUpdate');
			redirect(base_url('admin/musik'),'refresh');

		}}
		//End Masuk Database
		$data = array(	'title'			=>	'Edit data tema '.$musik->nama_musik,
						'musik'			=>	$musik,
						'isi'			=>	'admin/musik/edit'
			);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	//Delete
	public function delete($id)
	{
		//Proteksi delete
		$this->check_login->check();
		
		$musik = $this->musik->detail($id);

		//Hapus Gambar
		if($musik->foto != "") {
			unlink('./assets/upload/image/'.$musik->foto);
			unlink('./assets/upload/image/thumbs/'.$musik->foto);
		}
		//End Hapus Gambar

		$data = array('id'	=>	$musik->id);
		$this->musik->delete($data);
		$this->session->set_flashdata('sukses', 'Data Telah dihapus');
		redirect(base_url('admin/musik'),'refresh');
	}
}