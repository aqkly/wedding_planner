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

		$x = 0;
		foreach ($paket as $p) {
			$paket[$x]['nama_tema'] 	= $this->paket->nama_tema($p['id_tema']);
			$paket[$x]['nama_tempat'] 	= $this->paket->nama_tempat($p['id_tempat']);
			$paket[$x]['nama_musik'] 	= $this->paket->nama_musik($p['id_musik']);
			$paket[$x]['nama_kostum'] 	= $this->paket->nama_kostum($p['id_kostum']);
			$paket[$x]['nama_catering'] = $this->paket->nama_catering($p['id_catering']);
			$paket[$x]['nama_photo'] 	= $this->paket->nama_photo($p['id_photo']);
			$x++;
		}

		$data = array(	'title'		=>	'Data Paket ('.count($paket).')',
						'paket'	=>	$paket,
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
							'id_tema'		=>	$i->post('tema'),
							'id_tempat'		=>	$i->post('tempat'),
							'id_musik'		=>	$i->post('musik'),
							'id_photo'		=>	$i->post('photo'),
							'id_catering'	=>	$i->post('catering'),
							'id_kostum'		=>	$i->post('kostum'),
							'harga'			=>	$i->post('harga'),
							'deskripsi'		=>	$i->post('deskripsi'),
						);

			$this->paket->tambah($data);
			$this->session->set_flashdata('sukses', 'Data Telah Ditambah');
			redirect(base_url('admin/paket'),'refresh');
		}

		$tema     = $this->paket->get_tema();
		$tempat   = $this->paket->get_tempat();
		$musik    = $this->paket->get_musik();
		$photo    = $this->paket->get_photo();
		$catering = $this->paket->get_catering();
		$kostum   = $this->paket->get_kostum();

		//End Masuk Database
		$data = array(	'title'			=> 'Tambah data Paket',
						'isi'			=> 'admin/paket/tambah',
						'tema' 			=> $tema,
						'tempat' 			=> $tempat,
						'musik' 			=> $musik,
						'photo' 			=> $photo,
						'catering' 			=> $catering,
						'kostum' 			=> $kostum,
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