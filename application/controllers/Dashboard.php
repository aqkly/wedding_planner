<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	//Load Database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('tema_model', 'tema');
		$this->load->model('musik_model', 'musik');
		$this->load->model('tempat_model', 'tempat');
		$this->load->model('catering_model', 'catering');
		$this->load->model('photo_model', 'photo');
		$this->load->model('kostum_model', 'kostum');
		$this->load->model('paket_model', 'paket');
		$this->load->model('konfigurasi_model');
	}

	public function index()
	{
		if(!empty($_SESSION['uid'])){
			$id_user    = $_SESSION['uid'];	
		}else{
			$id_user    = null;
		}

		if(!empty($_SESSION['unama_lengkap'])){
			$nama_user  = $_SESSION['unama_lengkap'];
		}else{
			$nama_user    = null;
		}
		
		$tema 		= $this->tema->listing();
		$musik 		= $this->musik->listing();
		$catering 	= $this->catering->listing();
		$tempat 	= $this->tempat->listing();
		$photo 		= $this->photo->listing();
		$kostum 	= $this->kostum->listing();
		$paket 		= $this->paket->listing();

		$konfigurasi 	= $this->konfigurasi_model->listing();

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

		$trans     = $this->konfigurasi_model->get_trans($id_user);

		$arr_trans = $this->konfigurasi_model->get_tgl_book();

		$arr = [];
		foreach($arr_trans as $a){
			$arr[] = $a['tgl_booking']; 
		}

		$data = array(
						'title'			=> 'Naufal Wedding',
						'tema' 			=> $tema,
						'tempat' 		=> $tempat,
						'paket' 		=> $paket,
						'catering' 		=> $catering,
						'musik' 		=> $musik,
						'photo' 		=> $photo,
						'kostum'		=> $kostum,
						'konfigurasi'	=> $konfigurasi,
						'trans' 		=> $trans,
						'nama_user' 	=> $nama_user,
						'arr_trans' 	=> json_encode($arr)
					);

		$this->load->view('user/index', $data);
	}

}