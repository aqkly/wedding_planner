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

    <title><?=$title?></title>
</head>

<body>
    <header class="showcase">
        <div class="showcase-top">
            <a href="#" class="btn btn-rounded">Ingin Booking? Silahkan Login</a>
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
            <div id="tab-3" class="tab-item">
                <i class="fas fa-tags fa-3x"></i>
                <p class="hide-sm">Booking</p>
            </div>
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

                <!-- TEMPAT -->
                <h2>TEMPAT / GEDUNG</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>NAMA</th>
                            <th>HARGA</th>
                            <th>DESKRIPSI</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $no = 1; foreach ($tempat as $t) { ?>
                        <tr>
                            <td><?=$no++?></td>
                            <td><?=$t->nama_lokasi?></td>
                            <td><?=number_format($t->harga)?></td>
                            <td><?=$t->deskripsi?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>

                <!-- TEMA -->
                <h2>TEMA PERNIKAHAN</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>NAMA</th>
                            <th>HARGA</th>
                            <th>DESKRIPSI</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $no = 1; foreach ($tema as $t) { ?>
                        <tr>
                            <td><?=$no++?></td>
                            <td><?=$t->nama_tema?></td>
                            <td><?=number_format($t->harga)?></td>
                            <td><?=$t->deskripsi?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>

                <h2>CATERING</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>NAMA</th>
                            <th>HARGA</th>
                            <th>DESKRIPSI</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $no = 1; foreach ($catering as $t) { ?>
                        <tr>
                            <td><?=$no++?></td>
                            <td><?=$t->nama_catering?></td>
                            <td><?=number_format($t->harga)?></td>
                            <td><?=$t->deskripsi?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>

                <h2>MUSIK</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>NAMA</th>
                            <th>HARGA</th>
                            <th>DESKRIPSI</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $no = 1; foreach ($musik as $t) { ?>
                        <tr>
                            <td><?=$no++?></td>
                            <td><?=$t->nama_musik?></td>
                            <td><?=number_format($t->harga)?></td>
                            <td><?=$t->deskripsi?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>

                <h2>PHOTOSHOP</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>NAMA</th>
                            <th>HARGA</th>
                            <th>DESKRIPSI</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $no = 1; foreach ($photo as $t) { ?>
                        <tr>
                            <td><?=$no++?></td>
                            <td><?=$t->nama?></td>
                            <td><?=number_format($t->harga)?></td>
                            <td><?=$t->deskripsi?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>

                <h2>KOSTUM</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>NAMA</th>
                            <th>HARGA</th>
                            <th>DESKRIPSI</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $no = 1; foreach ($kostum as $t) { ?>
                        <tr>
                            <td><?=$no++?></td>
                            <td><?=$t->nama?></td>
                            <td><?=number_format($t->harga)?></td>
                            <td><?=$t->deskripsi?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

	<footer class="footer">
        <p>Ada Pertanyaan? Silahkan Hubungi, <a style="color:white !important" target="_blank" class="btn" href="https://api.whatsapp.com/send?phone=<?=$konfigurasi->telepon?>"><?=$konfigurasi->telepon?></a></p>
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
            	<li>Copyright &copy; <?= '2023' ?> || Wedding Management System.</strong></li>
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

 	<script type="text/javascript">
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
 		
 	</script>
</body>

</html>