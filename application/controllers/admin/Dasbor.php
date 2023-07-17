<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dasbor extends CI_Controller {

	//Load Model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('tema_model', 'tema');
		$this->load->model('musik_model', 'musik');
		$this->load->model('tempat_model', 'tempat');
		$this->load->model('makeup_model', 'makeup');
		$this->load->model('photo_model', 'photo');
		$this->load->model('kostum_model', 'kostum');
		$this->load->model('paket_model', 'paket');
		$this->load->model('user_model');
		$this->load->model('konfigurasi_model');
	}

	public function index()
	{
		$tema 		= $this->tema->listing();
		$musik 		= $this->musik->listing();
		$makeup 	= $this->makeup->listing();
		$tempat 	= $this->tempat->listing();
		$photo 		= $this->photo->listing();
		$kostum 	= $this->kostum->listing();
		$paket 		= $this->paket->listing();
		$user 		= $this->user_model->listing();
		$trans 	    = $this->konfigurasi_model->list_trans();

		$data = array(	'title'		=> 'Halaman Dasbor Administrator',
						'tema'		=> $tema,
						'musik'		=> $musik,
						'makeup'	=> $makeup,
						'tempat'	=> $tempat,
						'photo'		=> $photo,
						'kostum'	=> $kostum,
						'paket'		=> $paket,
						'user'		=> $user,
						'trans' 	=> $trans,
						'isi'		=> 'admin/dasbor/list'
			);
		$this->load->view('admin/layout/wrapper', $data, FALSE);	
	}

}

/* End of file Dasbor.php */
/* Location: ./application/controllers/admin/Dasbor.php */