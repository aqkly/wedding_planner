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
}