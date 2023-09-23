<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paket extends CI_Controller {

	//load database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('paket_model', 'paket');
	}

	//Listing data barang
	public function index()
	{
		$paket = $this->paket->listing();

		$data = array(	'title'		=>	'Data Paket ('.count($paket).')',
						'paket'		=>	$paket,
						'isi'		=>	'admin/paket/list'
				);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	//Tambah
	public function tambah()
	{
		//valid
		$valid = $this->form_validation;

		$valid->set_rules('nama_paket','Nama Paket','required',
				array('required'	=>	'%s harus diisi'));

		$valid->set_rules('harga','Harga','required',
				array('required'	=>	'%s harus diisi'));

		$valid->set_rules('deskripsi','Deskripsi','required',
				array('required'	=>	'%s harus diisi'));

		if($valid->run()) {
			$i = $this->input;
			$data = array(	
							'nama_paket' 	=>	$i->post('nama_paket'),
							'berisi' 		=>	$i->post('berisi'),
							'harga'			=>	$i->post('harga'),
							'deskripsi'		=>	$i->post('deskripsi'),
						);

			$this->paket->tambah($data);
			$this->session->set_flashdata('sukses', 'Data Telah Ditambah');
			redirect(base_url('admin/paket'),'refresh');
		}

		//End Masuk Database
		$data = array(	'title'			=> 'Tambah data Paket',
						'isi'			=> 'admin/paket/tambah',
			);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	//Delete
	public function delete($id)
	{
		//Proteksi delete
		$this->check_login->check();
		
		$paket = $this->paket->detail($id);

		//End Hapus Gambar
		$data = array('id'	=>	$paket->id);
		$this->paket->delete($data);
		$this->session->set_flashdata('sukses', 'Data Telah dihapus');
		redirect(base_url('admin/paket'),'refresh');
	}

	public function upload_image()
	{
		$config['upload_path']          = './assets/upload/image/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 5000;
		$config['max_width']            = 5000;
		$config['max_height']           = 5000;

		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('file')) {
			return;
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

			$gambar = $upload_data['uploads']['file_name'];
			$id = $_POST['id'];

			$this->db->query("INSERT INTO image_paket (`id_paket`, `img`) VALUES ('$id', '$gambar')");

			$this->session->set_flashdata('sukses', 'Upload image sukses');
			redirect(base_url('admin/paket'),'refresh');
		}
	}

	public function list_image($id)
	{
		$paket = $this->paket->get_gambar($id);

		$x = 0;
		foreach($paket as $p)
		{
			$paket[$x]['nama_paket'] = $this->paket->nama_paket($id);
			$x++;
		}

		$data = array(	'title'		=>	'Image Paket ('.count($paket).')',
						'paket'		=>	$paket,
						'isi'		=>	'admin/paket/list_image'
				);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	//Delete
	public function hapus_image($id)
	{
		//Proteksi delete
		$this->check_login->check();

		$id_paket = $_GET['id_paket'];

		//End Hapus Gambar
		$this->db->query("DELETE FROM image_paket WHERE id = '$id'");
		$this->session->set_flashdata('sukses', 'Data Telah dihapus');
		redirect(base_url('admin/paket/list_image/'.$id_paket),'refresh');
	}
}