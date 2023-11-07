<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-sclae=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https:use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="shortcut icon" href="<?= base_url('assets/upload/image/'.$konfigurasi->icon) ?>">
    <link rel="stylesheet" href="<?=base_url('assets/user/css/style.css')?>">
    <link rel="stylesheet" href="<?=base_url('assets/user/css/style_baru.css')?>">

    <link href="<?=base_url()?>assets/user/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  	<!-- Libraries CSS Files -->
  	<link href="<?=base_url()?>assets/user/lib/animate/animate.min.css" rel="stylesheet">
  	<link href="<?=base_url()?>assets/user/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  	<link href="<?=base_url()?>assets/user/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  	<link href="<?=base_url()?>assets/user/lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/vx/app-assets/vendors/css/pickers/pickadate/pickadate.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/vx/app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css" rel="stylesheet" />
    <title><?=$title?></title>
</head>

<body>
    <?php
    //Notifikasi
    if($this->session->flashdata('sukses')){
    echo '<div class="alert alert-success">';
    echo $this->session->flashdata('sukses');
    echo '</div>';
    }

    if($this->session->flashdata('gagal')){
    echo '<div class="alert alert-warning">';
    echo $this->session->flashdata('gagal');
    echo '</div>';
    }
    ?>
    <header class="showcase">
        <div class="showcase-top">
            <?php if(empty($_SESSION['uid'])){ ?>
                <a href="<?=base_url('user/login')?>" class="btn btn-rounded">Ingin Booking? Silahkan Login</a>
            <?php }else{ ?>
                <a href="<?=base_url('user/logout')?>">HELO, <?=$_SESSION['unama_lengkap']?> | <span style="color:white" class="btn btn-sm">Logout</span></a>
            <?php } ?>
        </div>
        <div class="showcase-content">
            <h1>Take Your Dream Wedding</h1>
            <p><i>With Rumah Rias Yasmine</i></p>
        </div>
    </header>

    <section class="tabs">
        <div class="container">
            <div id="tab-1" class="tab-item tab-border">
                <i class="fas fa-door-open fa-3x"></i>
                <p class="hide-sm">Services</p>
            </div>
            <div id="tab-2" class="tab-item">
                <i class="fas fa-gift fa-3x"></i>
                <p class="hide-sm">Paket Wedding</p>
            </div>
            <?php /* if(!empty($_SESSION['uid'])){ */ ?>
            <div id="tab-3" class="tab-item">
                <i class="fas fa-tags fa-3x"></i>
                <p class="hide-sm">Booking</p>
            </div>
            <?php /* } */ ?>
        </div>
    </section>

    <section class="tab-content">
        <div class="container">
            <!-- tab content 1 -->
            <div id="tab-1-content" class="tab-content-item show">
                <div class="tab-1-content-inner">
                	<div>
                		<button type="button" onclick="modal_makeup()">
	                		<img src="<?=base_url('assets/user/img/makeup.jpg')?>" style="width: 230px !important;height: 170px !important" />
	                        <p class="text-md">Makeup</p>
                    	</button>
                	</div>

                	<div>
                		<button type="button" onclick="modal_tema()">
	                		<img src="<?=base_url('assets/user/img/tema.jpg')?>" style="width: 230px !important;height: 170px !important" />
	                        <p class="text-md">Tema Pernikahan</p>
                    	</button>
                	</div>

                	<div>
                		<button type="button" onclick="modal_musik()">
	                		<img src="<?=base_url('assets/user/img/musik.jpg')?>" style="width: 230px !important;height: 170px !important" />
	                        <p class="text-md">Musik</p>
                    	</button>
                	</div>

                    <div>
                        <button type="button" onclick="modal_photo()">
                            <img src="<?=base_url('assets/user/img/photo.jpg')?>" style="width: 230px !important;height: 170px !important;" />
                            <p class="text-md">Foto / Video</p>
                        </button>
                    </div>

                    <div>
                        <button type="button" onclick="modal_kostum()">
                            <img src="<?=base_url('assets/user/img/kostum.jpg')?>" style="width: 230px !important;height: 170px !important" />
                            <p class="text-md">Kostum</p>
                        </button>
                    </div>
                </div>

            </div>

            <!-- Tab 2 Content -->
            <div id="tab-2-content" class="tab-content-item">
                <div class="tab-2-content-bottom">
                	<?php foreach ($paket as $p) { ?>
                        <div>
                            <div class="slider">
                                <figure>
                                    <?php foreach($p['gambar'] as $q){ ?>
                                        <div class="slide">
                                            <img style="width: 300px !important;height: 200px !important;"   src="<?=base_url('assets/upload/image/'.$q['img'])?>" />
                                        </div>
                                    <?php } ?>
                                </figure>
                            </div>
                            <h4 style="color:red !important"><?=$p['nama_paket']?></h4>
                            <div class="shrinkable"><?=$p['berisi']?></div>
                            <a href="#" class="btn"><?=number_format($p['harga'])?></a>
                        </div>
                    <?php } ?>
                </div>
            </div>

            <!-- Tab 3 Content -->
            <div id="tab-3-content" class="tab-content-item">
                <?php if(empty($_SESSION['uid'])){ ?>
                    <h4>Silahkan login untuk booking Rumah Rias Yasmine</h4>

                    <div style="border: 1px solid #fff"></div>
                    <br>

                    <div id="kalender"><div>
                <?php }else{ ?>
                    <div>
                        <div class="row text-center">
                            <h3 class="col-sm-12">FORM BOOKING WEDDING</h3>
                        </div>
                        <br><br>
                        <form action="<?=base_url('user/booking')?>" method="post" id="booking_">
                        <div class="row">
                            <div class="col-sm-3">TGL BOOKING</div>
                            <div class="col-sm-3">
                                <input type="text" name="tgl_booking" id="tgl_booking" class="form-control form-control-sm flatpickr-basic flatpickr-input" placeholder="YYYY-MM-DD" readonly="readonly" value="<?= date('Y-m-d') ?>">
                            </div>
                            <div class="col-sm-4">
                                <span class="text-muted">&nbsp; *Tgl Yang bisa dipilih, berarti tersedia</span>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-3">PILIH JENIS</div>
                            <div class="col-sm-3">
                                <select name="jenis" id="jenis" class="form-control form-control-sm">
                                    <option>-- PILIH JENIS --</option>
                                    <option value="paketan">PAKETAN</option>
                                    <option value="custom">CUSTOM</option>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div id="ini_form_book_jenis">
                            
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-3">NAMA PEMESAN</div>
                            <div class="col-sm-3">
                                <input type="text" name="nama" id="nama_pem" onblur="ini_nama_pem()" required class="form-control form-control-sm">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-3">ALAMAT</div>
                            <div class="col-sm-3">
                                <textarea name="alamat" class="form-control form-control-sm"></textarea>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-3">TOTAL HARGA</div>
                            <div class="col-sm-3">
                                <input type="number" value="0" step="any" name="harga" id="harga" class="form-control form-control-sm">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-3">KETERANGAN</div>
                            <div class="col-sm-3">
                                <textarea name="ket" class="form-control form-control-sm"></textarea>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-6">
                                <button type="submit" name="submit" id="submit" class="btn2 btn-rounded btn-sm">Simpan</button>
                                <button type="button" onclick="batal()" class="btn btn-rounded btn-sm">Batal</button>
                            </div>
                        </div>
                        </form>
                    </div>

                    <br>

                    <div style="border: 1px solid #fff"></div>
                    <br>

                        <div class="row text-center">
                            <h3 class="col-sm-12">HISTORY PEMESANAN</h3>
                        </div>

                        <br>
                        <table class="table table-responsive">
                            <thead>
                                <tr>
                                    <th>TGL BOOKING</th>
                                    <th>NAMA PEMESAN</th>
                                    <th>ALAMAT</th>
                                    <th>BOOKING ORDER</th>
                                    <th>TOTAL HARGA</th>
                                    <th>NO REKENING</th>
                                    <th>STATUS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($trans as $t) { ?>
                                    <tr>
                                        <td style="white-space: nowrap"><?=date('d-m-Y', strtotime($t['tgl_booking']))?></td>
                                        <td><?=$t['nama_pemesan']?></td>
                                        <td><?=$t['alamat']?></td>
                                        <td>
                                            <?php if($t['jenis_booking'] == 'paketan'){ ?>
                                                <?=$t['nama_paket']?>        
                                            <?php }else{ ?>
                                                <?php if(!empty($t['nama_tema'])){ ?>
                                                    <li>Tema: <?=$t['nama_tema']?></li>
                                                <?php }else{ ?>
                                                    <li>Tema: -</li>
                                                <?php } ?>

                                                <?php if(!empty($t['nama_musik'])){ ?>
                                                    <li>Musik: <?=$t['nama_musik']?></li>
                                                <?php }else{ ?>
                                                    <li>Musik: -</li>
                                                <?php } ?>

                                                <?php if(!empty($t['nama_makeup'])){ ?>
                                                    <li>Makeup: <?=$t['nama_makeup']?></li>
                                                <?php }else{ ?>
                                                    <li>Makeup: -</li>
                                                <?php } ?>

                                                <?php if(!empty($t['nama_photo'])){ ?>
                                                    <li>Photo: <?=$t['nama_photo']?></li>
                                                <?php }else{ ?>
                                                    <li>Photo: -</li>
                                                <?php } ?>

                                                <?php if(!empty($t['nama_kostum'])){ ?>
                                                    <li>Kostum: <?=$t['nama_kostum']?></li>
                                                <?php }else{ ?>
                                                    <li>Kostum: -</li>
                                                <?php } ?>
                                            <?php } ?>
                                        </td>
                                        <td><?=number_format($t['total_harga'])?></td>
                                        <td><?=$konfigurasi->no_rek?></td>
                                        <td>
                                            <?php if($t['status'] == '1'){ ?>
                                                <div>Baru</div>
                                            <?php }else if($t['status'] == '2'){ ?>
                                                <div>Menunggu Pembayaran (Silahkan membayar tgl booking Rp. 3000.000,00 agar tgl anda terbooking sebelum tgl: <?=date('d-m-Y H:i:s', strtotime($t['jth_tempo_bayar']))?>)</div>
                                            <?php }else if($t['status'] == '3'){ ?>
                                                <div>Menunggu Konf Pembayaran</div>
                                            <?php }else if($t['status'] == '4'){ ?>
                                                <div>Bayar Sebagian</div>
                                            <?php }else if($t['status'] == '5'){ ?>
                                                <div>Sudah Full Bayar</div>
                                            <?php }else if($t['status'] == '6'){ ?>
                                                <div>Batal</div>
                                            <?php } ?>

                                            <?php if($t['total_bayar'] < $t['total_harga']){ ?>
                                                <button type="button" onclick="konf_trans('<?=$t['id']?>')" class="btn btn-success btn-xs">Upload Bukti Bayar</button>
                                            <?php } ?>
                                        </td>

                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <div style="border: 1px solid #fff"></div>
                    <br>

                    <div id="kalender"><div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>

    <section class="tabs">
        <div class="peringatan">
            <div class="text-center"><h3>KETENTUAN PAKET WEDDING</h3></div>
            <hr>
            <li>BOOKING TANGGAL RP 3.000.000,-</li>
            <li>DP 75% SEBELUM ACARA BERLANGSUNG</li>
            <li>PELUNASAN MAKSIMAL H+1 SETELAH ACARA BERLANGSUNG</li>
            <li>JIKA TERJADI PEMBATALAN MAKA BOOKING TIDAK DIKEMBALIKAN DALAM
            BENTUK APAPUN</li>
            <li>HARGA BISA KURANG ATAU LEBIH TERGANTUNG LUASNYA LOKASI
            PEMASANGAN TENDA</li>
            <li>JIKA ADA TAMBAHAN MAKE UP KENA CHARGE PER ORANG</li>
        <div>
    </section>

	<footer class="footer">
        <p>Ada Pertanyaan? Silahkan Hubungi Telp Atau WA, <a style="color:white !important" target="_blank" class="btn" href="https://api.whatsapp.com/send?phone=<?=$konfigurasi->telepon?>"><?=$konfigurasi->telepon?></a></p>
        <div class="footer-cols socials mb-1">
            <ul>
                <li>
                	<a href="https://goo.gl/maps/GXcKDmCpQG1yPPUt8" target="_blank" class="elementor-button-link elementor-button elementor-size-xs" role="button">
						<span class="elementor-button-content-wrapper">
							<span class="elementor-button-icon elementor-align-icon-left">
						<i aria-hidden="true" class="fas fa-map-marker-alt"></i></span>
						<span class="elementor-button-text">Buka Google Maps</span></span>
					</a>
                </li>
                
            </ul>
            <ul>
            	<li>Copyright &copy; <?= '2023' ?> <a target="_blank" href="<?=base_url('login')?>">Wedding Admin</a></strong></li>
            </ul>
            <ul>
                <li>
                	<a href="<?=$konfigurasi->facebook?>" target="_blank"><span class="ico-circle"><i class="ion-social-facebook"></i></span></a>
                </li> &nbsp;
                <li><a href="<?=$konfigurasi->instagram?>" target="_blank"><span class="ico-circle"><i class="ion-social-instagram"></i></span></a></li>
                &nbsp;
                <li><a href="<?=base_url()?>" target="_blank"><span class="ico-circle"><i class="fas fa-globe"></i></span></a></li>
            </ul>
        </div>
    </footer>

    <div class="modal fade" id="mod_tempat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">TEMPAT / GEDUNG</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <table class="table">
	        	<thead>
	        		<tr>
	        			<th>NAMA</th>
	        			<th>ALAMAT</th>
	        			<th>HARGA</th>
	        			<th>DESKRIPSI</th>
	        			<th>FOTO</th>
	        		</tr>
	        	</thead>
	        	<tbody>
	        		<?php foreach($tempat as $t){ ?>
	        		<tr>
	        			<td><?=$t->nama_lokasi?></td>
	        			<td><?=$t->alamat?></td>
	        			<td><?=number_format($t->harga)?></td>	
	        			<td><?=$t->deskripsi?></td>
	        			<td>
	        				<a href="<?=base_url('assets/upload/image/thumbs/'.$t->foto)?>" data-lightbox="gallery-mf">
	        					<img src="<?=base_url('assets/upload/image/thumbs/'.$t->foto)?>" style="width: 60px !important" class="img img-thumbnail" />
		        			</a>
	        			</td>
	        		</tr>
	        		<?php } ?>
	        	</tbody>
	        </table>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn" data-dismiss="modal">Tutup</button>
	      </div>
	    </div>
	  </div>
	</div>

	<div class="modal fade" id="mod_tema" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">TEMA PERNIKAHAN</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <table class="table">
	        	<thead>
	        		<tr>
	        			<th>NAMA</th>
	        			<th>HARGA</th>
	        			<th>DESKRIPSI</th>
	        			<th>FOTO</th>
	        		</tr>
	        	</thead>
	        	<tbody>
	        		<?php foreach($tema as $t){ ?>
	        		<tr>
	        			<td><?=$t->nama_tema?></td>
	        			<td><?=number_format($t->harga)?></td>	
	        			<td><?=$t->deskripsi?></td>
	        			<td>
	        				<a href="<?=base_url('assets/upload/image/thumbs/'.$t->foto)?>" data-lightbox="gallery-mf">
	        					<img src="<?=base_url('assets/upload/image/thumbs/'.$t->foto)?>" style="width: 60px !important" class="img img-thumbnail" />
		        			</a>
	        			</td>
	        		</tr>
	        		<?php } ?>
	        	</tbody>
	        </table>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn" data-dismiss="modal">Tutup</button>
	      </div>
	    </div>
	  </div>
	</div>

	<div class="modal fade" id="mod_makeup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">MAKEUP</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <table class="table">
	        	<thead>
	        		<tr>
	        			<th>NAMA</th>
	        			<th>HARGA</th>
	        			<th>DESKRIPSI</th>
	        			<th>FOTO</th>
	        		</tr>
	        	</thead>
	        	<tbody>
	        		<?php foreach($makeup as $t){ ?>
	        		<tr>
	        			<td><?=$t->nama?></td>
	        			<td><?=number_format($t->harga)?></td>	
	        			<td><?=$t->deskripsi?></td>
	        			<td>
	        				<a href="<?=base_url('assets/upload/image/thumbs/'.$t->foto)?>" data-lightbox="gallery-mf">
	        					<img src="<?=base_url('assets/upload/image/thumbs/'.$t->foto)?>" style="width: 60px !important" class="img img-thumbnail" />
		        			</a>
	        			</td>
	        		</tr>
	        		<?php } ?>
	        	</tbody>
	        </table>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn" data-dismiss="modal">Tutup</button>
	      </div>
	    </div>
	  </div>
	</div>

	<div class="modal fade" id="mod_musik" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">MUSIK</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <table class="table">
	        	<thead>
	        		<tr>
	        			<th>NAMA</th>
	        			<th>HARGA</th>
	        			<th>DESKRIPSI</th>
	        			<th>FOTO</th>
	        		</tr>
	        	</thead>
	        	<tbody>
	        		<?php foreach($musik as $t){ ?>
	        		<tr>
	        			<td><?=$t->nama_musik?></td>
	        			<td><?=number_format($t->harga)?></td>	
	        			<td><?=$t->deskripsi?></td>
	        			<td>
	        				<a href="<?=base_url('assets/upload/image/thumbs/'.$t->foto)?>" data-lightbox="gallery-mf">
	        					<img src="<?=base_url('assets/upload/image/thumbs/'.$t->foto)?>" style="width: 60px !important" class="img img-thumbnail" />
		        			</a>
	        			</td>
	        		</tr>
	        		<?php } ?>
	        	</tbody>
	        </table>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn" data-dismiss="modal">Tutup</button>
	      </div>
	    </div>
	  </div>
	</div>

	<div class="modal fade" id="mod_photo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">PHOTO SHOP</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <table class="table">
	        	<thead>
	        		<tr>
	        			<th>NAMA FOTOGRAPHER</th>
                        <th>NAMA</th>
	        			<th>HARGA</th>
	        			<th>DESKRIPSI</th>
	        			<th>FOTO</th>
	        		</tr>
	        	</thead>
	        	<tbody>
	        		<?php foreach($photo as $t){ ?>
	        		<tr>
                        <td><?=$t->nama_fotographer?></td>
	        			<td><?=$t->nama?></td>
	        			<td><?=number_format($t->harga)?></td>	
	        			<td><?=$t->deskripsi?></td>
	        			<td>
	        				<a href="<?=base_url('assets/upload/image/thumbs/'.$t->foto)?>" data-lightbox="gallery-mf">
	        					<img src="<?=base_url('assets/upload/image/thumbs/'.$t->foto)?>" style="width: 60px !important" class="img img-thumbnail" />
		        			</a>
	        			</td>
	        		</tr>
	        		<?php } ?>
	        	</tbody>
	        </table>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn" data-dismiss="modal">Tutup</button>
	      </div>
	    </div>
	  </div>
	</div>

	<div class="modal fade" id="mod_kostum" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">KOSTUM</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <table class="table">
	        	<thead>
	        		<tr>
	        			<th>NAMA</th>
	        			<th>HARGA</th>
	        			<th>DESKRIPSI</th>
	        			<th>FOTO</th>
	        		</tr>
	        	</thead>
	        	<tbody>
	        		<?php foreach($kostum as $t){ ?>
	        		<tr>
	        			<td><?=$t->nama?></td>
	        			<td><?=number_format($t->harga)?></td>	
	        			<td><?=$t->deskripsi?></td>
	        			<td>
	        				<a href="<?=base_url('assets/upload/image/thumbs/'.$t->foto)?>" data-lightbox="gallery-mf">
	        					<img src="<?=base_url('assets/upload/image/thumbs/'.$t->foto)?>" style="width: 60px !important" class="img img-thumbnail" />
		        			</a>
	        			</td>
	        		</tr>
	        		<?php } ?>
	        	</tbody>
	        </table>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn" data-dismiss="modal">Tutup</button>
	      </div>
	    </div>
	  </div>
	</div>

    <div class="modal fade" id="trans_mod" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-centered modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">KONFIRMASI PEMBAYARAN</h5>
            </button>
        </div>
        <?php
        $attribut = 'class="alert alert-info"';
        echo form_open_multipart(base_url('admin/transaksi/konf_trans'),$attribut);
        ?>
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-3">TGL BAYAR</div>
                <div class="col-sm-6">
                    <input type="hidden" name="id" id="trans_id">
                    <input type="date" name="tgl_bayar" class="form-control form-control-sm" value="<?=date('Y-m-d')?>" required>
                </div>
            </div>
            <br>
            <div class="row mt-1">
                <div class="col-sm-3">TOTAL BAYAR</div>
                <div class="col-sm-6">
                    <input type="number" step="any" name="total_bayar" id="trans_harga" class="form-control form-control-sm" value="0" required>
                </div>
            </div>
            <br>
            <div class="row mt-1">
                <div class="col-sm-3">BUKTI BAYAR</div>
                <div class="col-sm-6">
                    <input type="file" name="gambar" required class="form-control form-control-sm" required>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" name="submit" class="btn btn-success btn-sm">Simpan</button>
            <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Tutup</button>
        </div>
        <?php
        //form close
        echo form_close();
        ?>
        </div>
    </div>
    </div>

    <script src="<?=base_url('assets/user/js/main.js')?>"></script>
    <script src="<?=base_url()?>assets/user/lib/jquery/jquery.min.js"></script>
  	<script src="<?=base_url()?>assets/user/lib/jquery/jquery-migrate.min.js"></script>
  	<script src="<?=base_url()?>assets/user/lib/popper/popper.min.js"></script>
  	<script src="<?=base_url()?>assets/user/lib/bootstrap/js/bootstrap.min.js"></script>
  	<script src="<?=base_url()?>assets/user/lib/easing/easing.min.js"></script>
  	<script src="<?=base_url()?>assets/user/lib/counterup/jquery.waypoints.min.js"></script>
  	<script src="<?=base_url()?>assets/user/lib/counterup/jquery.counterup.js"></script>
  	<script src="<?=base_url()?>assets/user/lib/owlcarousel/owl.carousel.min.js"></script>
  	<script src="<?=base_url()?>assets/user/lib/lightbox/js/lightbox.min.js"></script>
 	<script src="<?=base_url()?>assets/user/lib/typed/typed.min.js"></script>
    <script src="<?= base_url(); ?>assets/vx/app-assets/vendors/js/pickers/pickadate/picker.js"></script>
    <script src="<?= base_url(); ?>assets/vx/app-assets/vendors/js/pickers/pickadate/picker.date.js"></script>
    <script src="<?= base_url(); ?>assets/vx/app-assets/vendors/js/pickers/pickadate/picker.time.js"></script>
    <script src="<?= base_url(); ?>assets/vx/app-assets/vendors/js/pickers/pickadate/legacy.js"></script>
    <script src="<?= base_url(); ?>assets/vx/app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js"></script>

    <script src="<?= base_url(); ?>assets/vx/app-assets/js/scripts/forms/pickers/form-pickers.js"></script>
    <script src="<?= base_url() ?>assets/vx/app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js"></script>

 	<script type="text/javascript">

    $(document).ready(function(){

          $('#kalender').fullCalendar({
            events: <?=$arr2?>
          });

        $('#tgl_booking').flatpickr({
          enableTime: false,
          minDate: 'today',
          defaultDate: 'today',
          disable: [ 
              // function(date) {
              //     return (date.getDay() === 0 || date.getDay() === 7);
              // },
              function(date) {                    
                  const rdatedData = <?=$arr_trans?>;              
                  return rdatedData.includes (toISODate(date));
              },
          ],
          // locale: {
          //     'firstDayOfWeek': 1 // start week on Monday
          // },
      });

        $(document).on('submit', '[id^=booking_]' , function(e) {
            e.preventDefault();
            var data = $(this).serialize();
            Swal.fire({
                title: 'Peringatan!',
                text: 'Yakin Booking Wedding ?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Booking!',
                customClass: {
                  confirmButton: 'btn2',
                  cancelButton: 'btn ml-1'
                },
              }).then(function (result) {
                  if (result.value) {
                      $.ajax({
                        type: "POST",
                        url: "<?= base_url('user/booking') ?>",
                        data: data,
                        dataType: "JSON",
                        success: function (data) {
                        if(data.result == 'sukses'){
                            Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil!',
                                    text: 'Booking Wedding Sukses',
                                    timer: 3000,
                                    customClass: {
                                      confirmButton: 'btn btn-success'
                                    }
                                  });

                           window.location.reload(); 
                        }
                       }
                    });
                 }
             });      
        });

        $("#jenis").on('change', function(){
            var jenis = $("#jenis").val();

            if(jenis == 'paketan'){

                $.ajax({
                    type: "POST",
                    url: "<?= base_url('user/get_paketan') ?>",
                    data: "",
                    dataType: "JSON",
                    success: function (data) {

                        var dat = "<option value=''>-- PILIH PAKET --</option>";
                        
                        for (var i = 0; i < data.length; i++) {
                            dat += "<option value='"+data[i].id+"'>"+data[i].nama_paket+"</option>";
                        }

                        html = "<div class='row'><div class='col-sm-3'>PAKET</div><div class='col-sm-3'><select name='paket' onchange='on_paket()' id='paket' class='form-control form-control-sm'>"+dat+"</select></div></div>"; 

                        $("#ini_form_book_jenis").html(html);
                    }
                });

            }else if(jenis == 'custom'){
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('user/get_custom') ?>",
                    data: "",
                    dataType: "JSON",
                    success: function (data) {

                        var tema        = data.tema;
                        // var tempat      = data.tempat;
                        var makeup      = data.makeup;
                        var musik       = data.musik;
                        var photo       = data.photo;
                        var kostum      = data.kostum;

                        var sel_tema = "<option value=''>-- PILIH TEMA --</option>";
                        
                        for (var i = 0; i < tema.length; i++) {
                            sel_tema += "<option value='"+tema[i].id+"'>"+tema[i].nama_tema+"</option>";
                        }

                        // var sel_gedung = "<option value=''>-- PILIH TEMPAT / GEDUNG --</option>";
                        
                        // for (var i = 0; i < tempat.length; i++) {
                        //     sel_gedung += "<option value='"+tempat[i].id+"'>"+tempat[i].nama_lokasi+"</option>";
                        // }

                        var sel_makeup = "<option value=''>-- PILIH MAKEUP --</option>";
                        
                        for (var i = 0; i < makeup.length; i++) {
                            sel_makeup += "<option value='"+makeup[i].id+"'>"+makeup[i].nama+"</option>";
                        }

                        var sel_musik = "<option value=''>-- PILIH MUSIK --</option>";
                        
                        for (var i = 0; i < musik.length; i++) {
                            sel_musik += "<option value='"+musik[i].id+"'>"+musik[i].nama_musik+"</option>";
                        }

                        var sel_photo = "<option value=''>-- PILIH PHOTO --</option>";
                        
                        for (var i = 0; i < photo.length; i++) {
                            sel_photo += "<option value='"+photo[i].id+"'>"+photo[i].nama+" ("+photo[i].nama_fotographer+")"+"</option>";
                        }

                        var sel_kostum = "<option value=''>-- PILIH KOSTUM --</option>";
                        
                        for (var i = 0; i < kostum.length; i++) {
                            sel_kostum += "<option value='"+kostum[i].id+"'>"+kostum[i].nama+"</option>";
                        }

                        html = "<div class='row'><div class='col-sm-3'>TEMA</div><div class='col-sm-3'><select name='tema' id='tema' onchange='on_tema()' class='form-control form-control-sm'>"+sel_tema+"</select></div><div class='col-sm-4 text-muted'>&nbsp; *Kosongkan jika tidak order ini</div></div><br><div class='row'><div class='col-sm-3'>MAKEUP</div><div class='col-sm-3'><select name='makeup' id='makeup' onchange='on_catering()' class='form-control form-control-sm'>"+sel_makeup+"</select></div><div class='col-sm-4 text-muted'>&nbsp; *Kosongkan jika tidak order ini</div></div><br><div class='row'><div class='col-sm-3'>MUSIK</div><div class='col-sm-3'><select name='musik' id='musik' onchange='on_musik()'class='form-control form-control-sm'>"+sel_musik+"</select></div><div class='col-sm-4 text-muted'>&nbsp; *Kosongkan jika tidak order ini</div></div><br><div class='row'><div class='col-sm-3'>PHOTO</div><div class='col-sm-3'><select name='photo' id='photo' onchange='on_photo()' class='form-control form-control-sm'>"+sel_photo+"</select></div><div class='col-sm-4 text-muted'>&nbsp; *Kosongkan jika tidak order ini</div></div><br><div class='row'><div class='col-sm-3'>KOSTUM</div><div class='col-sm-3'><select name='kostum' id='kostum' onchange='on_kostum()' class='form-control form-control-sm'>"+sel_kostum+"</select></div><div class='col-sm-4 text-muted'>&nbsp; *Kosongkan jika tidak order ini</div></div>"; 

                        $("#ini_form_book_jenis").html(html);
                    }
                });
            }else{
                html = "";
            }
        });
    });

    function ini_nama_pem()
    {
        var jenis = $("#jenis").val();

        if(jenis == 'paketan'){
            var paket = $("#paket").val();

            $.ajax({
                type: "POST",
                url: "<?= base_url('user/get_harga_paket') ?>",
                data: "paket="+paket,
                dataType: "JSON",
                success: function (data) {

                    var harga = parseFloat(data);

                    $("#harga").val(harga);
                }
            });
        }else if(jenis == 'custom'){
            
            var tema     = $("#tema").val();
            // var tempat   = $("#tempat").val();
            var makeup   = $("#makeup").val();
            var musik    = $("#musik").val();
            var photo    = $("#photo").val();
            var kostum   = $("#kostum").val();

            $.ajax({
                type: "POST",
                url: "<?= base_url('user/get_harga_custom') ?>",
                data: "tema="+tema+"&makeup="+makeup+"&musik="+musik+"&photo="+photo+"&kostum="+kostum,
                dataType: "JSON",
                success: function (data) {

                    var harga_baru = parseFloat(data);

                    $("#harga").val(harga_baru);
                }
            });
        }else{
            $("#harga").val(0);
        }
    }

    function on_paket()
    {
        $("#nama_pem").val('');
    }

    function on_tema()
    {
        $("#nama_pem").val('');
    }

    function on_tempat()
    {
        $("#nama_pem").val('');
    }

    function on_catering()
    {
        $("#nama_pem").val('');
    }

    function on_musik()
    {
        $("#nama_pem").val('');
    }

    function on_photo()
    {
        $("#nama_pem").val('');
    }

    function on_kostum()
    {
        $("#nama_pem").val('');
    }

	function modal_tempat()
	{
		$("#mod_tempat").modal('show');
	}

	function modal_tema()
	{
		$("#mod_tema").modal('show');
	}

	function modal_makeup()
	{
		$("#mod_makeup").modal('show');
	}

	function modal_musik()
	{
		$("#mod_musik").modal('show');
	}

	function modal_photo()
	{
		$("#mod_photo").modal('show');
	}

	function modal_kostum()
	{
		$("#mod_kostum").modal('show');
	}

    function toISODate(d) {
        const z = n  => ('0' + n).slice(-2);
        return d.getFullYear() + '-' +  z(d.getMonth()+1) + '-' + 
        z(d.getDate()); 
    }

    function showMore(id){
        document.getElementById(id+'Overflow').className='';
        document.getElementById(id+'MoreLink').className='hidden';
        document.getElementById(id+'LessLink').className='';
    }

    function showLess(id){
        document.getElementById(id+'Overflow').className='hidden';
        document.getElementById(id+'MoreLink').className='';
        document.getElementById(id+'LessLink').className='hidden';
    }

    var len = 100;
    var shrinkables = document.getElementsByClassName('shrinkable');
    if (shrinkables.length > 0) {
        for (var i = 0; i < shrinkables.length; i++){
            var fullText = shrinkables[i].innerHTML;
            if(fullText.length > len){
                var trunc = fullText.substring(0, len).replace(/\w+$/, '');
                var remainder = "";
                var id = shrinkables[i].id;
                remainder = fullText.substring(len, fullText.length);
                shrinkables[i].innerHTML = '<span>' + trunc + '<span class="hidden" id="' + id + 'Overflow">'+ remainder +'</span></span>&nbsp;<a id="' + id + 'MoreLink" href="#!" onclick="showMore(\''+ id + '\');">More</a><a class="hidden" href="#!" id="' + id + 'LessLink" onclick="showLess(\''+ id + '\');">Less</a>';
            }
        }
    }

    function konf_trans(id)
    {
    $.ajax({
        type: "POST",
        url: "<?= base_url('admin/transaksi/get_harga') ?>",
        data: "id="+id,
        dataType: "JSON",
        success: function (data) {
        $("#trans_harga").val(data);
        $("#trans_id").val(id);
        $("#trans_mod").modal('show');
        }
    });
    }
 		
 	</script>
</body>

</html>