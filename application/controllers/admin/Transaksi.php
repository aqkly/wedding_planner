<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	//load database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('konfigurasi_model', 'konf');
	}

	//Listing data barang
	public function index()
	{
		$trans = $this->konf->list_trans_2();

		$x = 0;
		foreach ($trans as $t) {
			$trans[$x]['nama_paket'] 	= $this->konf->get_nama_paket($t['id_paket']);
			// $trans[$x]['nama_tempat'] 	= $this->konf->get_nama_tempat($t['id_tempat']);
			$trans[$x]['nama_tema'] 	= $this->konf->get_nama_tema($t['id_tema']);
			$trans[$x]['nama_makeup'] 	= $this->konf->get_nama_makeup($t['id_makeup']);
			$trans[$x]['nama_musik'] 	= $this->konf->get_nama_musik($t['id_musik']);
			$trans[$x]['nama_photo'] 	= $this->konf->get_nama_photo($t['id_photo']);
			$trans[$x]['nama_kostum'] 	= $this->konf->get_nama_kostum($t['id_kostum']);
			$trans[$x]['nama_user'] 	= $this->konf->get_nama_user($t['id_user']);
			$trans[$x]['total_bayar'] 	= $this->konf->get_total_bayar($t['id']);
			$x++;
		}

		$data = array(	'title'		=>	'Data Transaksi ('.count($trans).')',
						'trans'		=>	$trans,
						'isi'		=>	'admin/trans/list'
				);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function detail($id)
	{
		$trans = $this->konf->list_trans_2_det($id);		

		$data = array(	'title'		=>	'Data Transaksi ('.count($trans).')',
						'trans'		=>	$trans,
						'isi'		=>	'admin/trans/detail'
				);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function print_data($id)
	{
		$trans = $this->konf->list_trans_2_det($id);	

		$no_transaksi = $this->konf->get_no_transaksi($id);	

		$data = array(	'title'		=>	'Data Transaksi ('.count($trans).')',
						'trans'		=>	$trans,
						'no_transaksi'		=>	$no_transaksi,
						'isi'		=>	'admin/trans/print'
				);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function print_data_det($id)
	{
		$trans = $this->konf->list_trans_2_det_asli($id);	

		$data = array(	'title'		=>	'Data Transaksi ('.count($trans).')',
						'trans'		=>	$trans,
						'isi'		=>	'admin/trans/print_det'
				);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function batal()
	{
		$id = $_POST['id'];

		$query = $this->db->query("UPDATE transaksi SET status = '5' WHERE id = '$id'");

		if($query){
			echo json_encode(['result' => 'sukses']);
		}
	}

	public function konf_trans()
	{
		$config['upload_path']         	= './assets/upload/image/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 5000;
        $config['max_width']            = 5000;
        $config['max_height']           = 5000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('gambar')){
			//End Validasi
			$this->session->set_flashdata('sukses', $this->upload->display_errors());
			redirect(base_url('admin/transaksi'),'refresh');
		}else{
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

			$i 				= $this->input;
			$foto 			= $upload_data['uploads']['file_name'];
			$id 			= $i->post('id');
			$tgl_bayar 		= $i->post('tgl_bayar').' '.date('H:i:s');
			$total_bayar 	= $i->post('total_bayar');
			$id_admin   	= $_SESSION['id_user'];

			$total_harga  	= $this->konf->get_harga($id);
			$history_bayar  = $this->konf->get_total_bayar($id);

			$tot_bayar_asli = ($history_bayar + $total_bayar);

			if( $tot_bayar_asli == $total_harga ){
				$status = '3';
			}else if(($history_bayar + $total_bayar) > $total_harga){
				$this->session->set_flashdata('gagal', 'Total bayar Tidak boleh melebihi Total harga');
				redirect(base_url('admin/transaksi'),'refresh');
				die;
			}else{
				$status = '3';
			}

			$this->db->query("INSERT INTO transaksi_detail (id_transaksi, tgl_bayar, total_bayar, bukti_bayar) VALUES ('$id', '$tgl_bayar', '$total_bayar', '$foto')");

			$this->db->query("UPDATE transaksi SET status = '$status' WHERE id = '$id'");

			$this->session->set_flashdata('sukses', 'Konfirmasi bayar sukses');
			redirect(base_url('dashboard'),'refresh');
		}
	}

	public function konf_bayar()
	{
			$i 				= $this->input;
			$id 			= $i->post('id');
			$id_admin   	= $_SESSION['id_user'];

			$total_harga  	= $this->konf->get_harga($id);
			$history_bayar  = $this->konf->get_total_bayar($id);

			$tot_bayar_asli = $history_bayar;

			if( $tot_bayar_asli == $total_harga ){
				$status = '5';
			}else if($history_bayar > $total_harga){
				$this->session->set_flashdata('gagal', 'Total bayar Tidak boleh melebihi Total harga');
				redirect(base_url('admin/transaksi'),'refresh');
				die;
			}else{
				$status = '4';
			}
			
			$this->db->query("UPDATE transaksi SET status = '$status' WHERE id = '$id'");

			echo json_encode(['result' => 'sukses']);
	}

	public function get_harga()
	{
		$id = $_POST['id'];

		$harga = $this->konf->get_harga($id);

		echo json_encode($harga);
	}
}