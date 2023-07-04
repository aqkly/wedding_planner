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

    <title><?=$title?></title>
</head>

<body>
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
            <p><i>With Naufal Wedding Planner</i></p>
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
                		<button type="button" onclick="modal_tempat()">
	                		<img src="<?=base_url('assets/user/img/tempat.jpg')?>" style="width: 230px !important;height: 170px !important" />
	                        <p class="text-md">Tempat / Gedung</p>
                    	</button>
                	</div>

                	<div>
                		<button type="button" onclick="modal_tema()">
	                		<img src="<?=base_url('assets/user/img/tema.jpg')?>" style="width: 230px !important;height: 170px !important" />
	                        <p class="text-md">Tema Pernikahan</p>
                    	</button>
                	</div>

                	<div>
                		<button type="button" onclick="modal_catering()">
	                		<img src="<?=base_url('assets/user/img/catering.jpg')?>" style="width: 230px !important;height: 170px !important" />
	                        <p class="text-md">Catering</p>
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
	                		<img src="<?=base_url('assets/user/img/photo.jpg')?>" style="width: 230px !important;height: 170px !important" />
	                        <p class="text-md">Photoshop</p>
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
                <div class="tab-2-content-top">
                    <p class="text-lg">
                        Beberapa paket wedding yang bisa kamu pilih
                    </p>
                </div>
                <div class="tab-2-content-bottom">
                	<?php foreach ($paket as $p) { ?>
                    <div>
                        <p class="text-md"><?=$p['nama_paket']?></p>
                        <p style="color:#999">
                            <strong>Tempat / Gedung</strong> : <?=$p['nama_tempat']?> <br> <strong>Tema</strong>: <?=$p['nama_tema']?> <br> <strong>Catering</strong>: <?=$p['nama_catering']?>
                            <br> <strong>Musik</strong>: <?=$p['nama_musik']?> <br> <strong>Photo</strong>: <?=$p['nama_photo']?> <br> <strong>Kostum</strong>: <?=$p['nama_kostum']?>
                        </p>

                        <a href="#" class="btn btn-lg"><?=number_format($p['harga'])?></a>
                    </div>
                <?php } ?>
                </div>
            </div>

            <!-- Tab 3 Content -->
            <div id="tab-3-content" class="tab-content-item">
                <?php if(empty($_SESSION['uid'])){ ?>
                    <h4>Silahkan login untuk booking Naufal Wedding</h4>
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
                            <div class="col-sm-3">TOTAL HARGA</div>
                            <div class="col-sm-3">
                                <input type="number" value="0" step="any" name="harga" id="harga" class="form-control form-control-sm">
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
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>TGL BOOKING</th>
                                    <th>NO TRANSAKSI</th>
                                    <th>NAMA PEMESAN</th>
                                    <th>NAMA USER</th>
                                    <th>JENIS TRAKSAKSI</th>
                                    <th>TOTAL HARGA</th>
                                    <th>TGL JTH TEMPO</th>
                                    <th>STATUS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($trans as $t) { ?>
                                    <tr>
                                        <td><?=date('d-m-Y', strtotime($t['tgl_booking']))?></td>
                                        <td><?=$t['no_transaksi']?></td>
                                        <td><?=$t['nama_pemesan']?></td>
                                        <td><?=$nama_user?></td>
                                        <td><?=$t['jenis_booking']?></td>
                                        <td><?=number_format($t['total_harga'])?></td>
                                        <td><?=date('d-m-Y H:i:s', strtotime($t['jth_tempo_bayar']))?></td>
                                        <td>
                                            <?php if($t['status'] == '1'){ ?>
                                                <div>Baru</div>
                                            <?php }else if($t['status'] == '2'){ ?>
                                                <div>Menunggu Pembayaran (Jika sudah membayar silahkan konfirmasi melalu WA, Jika tidak ada konfirmasi setelah tgl jatuh tempo maka order akan otomatis d batalkan)</div>
                                            <?php }else if($t['status'] == '3'){ ?>
                                                <div>Sudah Bayar</div>
                                            <?php }else if($t['status'] == '4'){ ?>
                                                <div>Batal</div>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>

                <?php } ?>
            </div>
        </div>
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

	<div class="modal fade" id="mod_catering" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">CATERING</h5>
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
	        		<?php foreach($catering as $t){ ?>
	        		<tr>
	        			<td><?=$t->nama_catering?></td>
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
	        			<th>NAMA</th>
	        			<th>HARGA</th>
	        			<th>DESKRIPSI</th>
	        			<th>FOTO</th>
	        		</tr>
	        	</thead>
	        	<tbody>
	        		<?php foreach($photo as $t){ ?>
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

 	<script type="text/javascript">

    $(document).ready(function(){

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
                        var tempat      = data.tempat;
                        var catering    = data.catering;
                        var musik       = data.musik;
                        var photo       = data.photo;
                        var kostum      = data.kostum;

                        var sel_tema = "<option value=''>-- PILIH TEMA --</option>";
                        
                        for (var i = 0; i < tema.length; i++) {
                            sel_tema += "<option value='"+tema[i].id+"'>"+tema[i].nama_tema+"</option>";
                        }

                        var sel_gedung = "<option value=''>-- PILIH TEMPAT / GEDUNG --</option>";
                        
                        for (var i = 0; i < tempat.length; i++) {
                            sel_gedung += "<option value='"+tempat[i].id+"'>"+tempat[i].nama_lokasi+"</option>";
                        }

                        var sel_catering = "<option value=''>-- PILIH CATERING --</option>";
                        
                        for (var i = 0; i < catering.length; i++) {
                            sel_catering += "<option value='"+catering[i].id+"'>"+catering[i].nama_catering+"</option>";
                        }

                        var sel_musik = "<option value=''>-- PILIH MUSIK --</option>";
                        
                        for (var i = 0; i < musik.length; i++) {
                            sel_musik += "<option value='"+musik[i].id+"'>"+musik[i].nama_musik+"</option>";
                        }

                        var sel_photo = "<option value=''>-- PILIH PHOTO --</option>";
                        
                        for (var i = 0; i < photo.length; i++) {
                            sel_photo += "<option value='"+photo[i].id+"'>"+photo[i].nama+"</option>";
                        }

                        var sel_kostum = "<option value=''>-- PILIH KOSTUM --</option>";
                        
                        for (var i = 0; i < kostum.length; i++) {
                            sel_kostum += "<option value='"+kostum[i].id+"'>"+kostum[i].nama+"</option>";
                        }

                        html = "<div class='row'><div class='col-sm-3'>TEMA</div><div class='col-sm-3'><select name='tema' id='tema' onchange='on_tema()' class='form-control form-control-sm'>"+sel_tema+"</select></div><div class='col-sm-4 text-muted'>&nbsp; *Kosongkan jika tidak order ini</div></div><br><div class='row'><div class='col-sm-3'>GEDUNG</div><div class='col-sm-3'><select name='tempat' id='tempat' onchange='on_tempat()' class='form-control form-control-sm'>"+sel_gedung+"</select></div><div class='col-sm-4 text-muted'>&nbsp; *Kosongkan jika tidak order ini</div></div><br><div class='row'><div class='col-sm-3'>CATERING</div><div class='col-sm-3'><select name='catering' id='catering' onchange='on_catering()' class='form-control form-control-sm'>"+sel_catering+"</select></div><div class='col-sm-4 text-muted'>&nbsp; *Kosongkan jika tidak order ini</div></div><br><div class='row'><div class='col-sm-3'>MUSIK</div><div class='col-sm-3'><select name='musik' id='musik' onchange='on_musik()'class='form-control form-control-sm'>"+sel_musik+"</select></div><div class='col-sm-4 text-muted'>&nbsp; *Kosongkan jika tidak order ini</div></div><br><div class='row'><div class='col-sm-3'>PHOTO</div><div class='col-sm-3'><select name='photo' id='photo' onchange='on_photo()' class='form-control form-control-sm'>"+sel_photo+"</select></div><div class='col-sm-4 text-muted'>&nbsp; *Kosongkan jika tidak order ini</div></div><br><div class='row'><div class='col-sm-3'>KOSTUM</div><div class='col-sm-3'><select name='kostum' id='kostum' onchange='on_kostum()' class='form-control form-control-sm'>"+sel_kostum+"</select></div><div class='col-sm-4 text-muted'>&nbsp; *Kosongkan jika tidak order ini</div></div>"; 

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
            var tempat   = $("#tempat").val();
            var catering = $("#catering").val();
            var musik    = $("#musik").val();
            var photo    = $("#photo").val();
            var kostum   = $("#kostum").val();

            $.ajax({
                type: "POST",
                url: "<?= base_url('user/get_harga_custom') ?>",
                data: "tema="+tema+"&tempat="+tempat+"&catering="+catering+"&musik="+musik+"&photo="+photo+"&kostum="+kostum,
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

	function modal_catering()
	{
		$("#mod_catering").modal('show');
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
 		
 	</script>
</body>

</html>