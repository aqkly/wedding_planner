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
		$this->load->model('makeup_model', 'makeup');
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
		$makeup 	= $this->makeup->listing();
		$tempat 	= $this->tempat->listing();
		$photo 		= $this->photo->listing();
		$kostum 	= $this->kostum->listing();
		$paket 		= $this->paket->listing();

		$konfigurasi 	= $this->konfigurasi_model->listing();

		$trans     = $this->konfigurasi_model->get_trans($id_user);

		$x = 0;
		foreach ($trans as $t) {
			$trans[$x]['nama_paket'] = $this->konfigurasi_model->get_nama_paket($t['id_paket']);
			$trans[$x]['nama_tema'] = $this->konfigurasi_model->get_nama_tema($t['id_tema']);
			$trans[$x]['nama_musik'] = $this->konfigurasi_model->get_nama_musik($t['id_musik']);
			$trans[$x]['nama_makeup'] = $this->konfigurasi_model->get_nama_makeup($t['id_makeup']);
			$trans[$x]['nama_photo'] = $this->konfigurasi_model->get_nama_photo($t['id_photo']);
			$trans[$x]['nama_kostum'] = $this->konfigurasi_model->get_nama_kostum($t['id_kostum']);
			$x++;
		}

		$arr_trans = $this->konfigurasi_model->get_tgl_book();

		$arr = [];
		foreach($arr_trans as $a){
			$arr[] = $a['tgl_booking']; 
		}

		$data = array(
						'title'			=> 'RUMAH RIAS YASMINE',
						'tema' 			=> $tema,
						'tempat' 		=> $tempat,
						'paket' 		=> $paket,
						'makeup' 		=> $makeup,
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