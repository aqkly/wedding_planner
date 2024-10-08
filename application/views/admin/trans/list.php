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

 <table class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>NO TRANSAKSI</th>
      <th>TGL BOOKING</th>
      <th>JENIS BOOKING</th>
      <th>NAMA PAKET</th>
      <th>NAMA TEMA</th>
      <th>NAMA MAKEUP</th>
      <th>NAMA MUSIK</th>
      <th>NAMA PHOTO</th>
      <th>NAMA KOSTUM</th>
      <th>TOTAL HARGA</th>
      <th>JTH TEMPO</th>
      <th>NAMA USER</th>
      <th>STATUS</th>
      <th width="15%">AKSI</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $i = 1;
    foreach ($trans as $b) {
    ?>
	    <tr>
	      <td><?=$b['no_transaksi']?></td>
	      <td><?= date('d-m-Y', strtotime($b['tgl_booking'])) ?></td>
	      <td><?=$b['jenis_booking']?></td>
	      <td><?=$b['nama_paket']?></td>
	      <td><?=$b['nama_tema']?></td>
	      <td><?=$b['nama_makeup']?></td>
	      <td><?=$b['nama_musik']?></td>
	      <td><?=$b['nama_photo']?></td>
	      <td><?=$b['nama_kostum']?></td>
	      <td><?=number_format($b['total_harga'])?></td>
	      <td><?= date('d-m-Y', strtotime($b['jth_tempo_bayar'])) ?></td>
	      <td><?=$b['nama_user']?></td>
	      <td>
	      	<?php if($b['status'] == '1'){ ?>
                Baru
            <?php }else if($b['status'] == '2'){ ?>
                Menunggu Pembayaran
            <?php }else if($b['status'] == '3'){ ?>
                Menunggu Konf Pembayaran
            <?php }else if($b['status'] == '4'){ ?>
                Bayar Sebagian
            <?php }else if($b['status'] == '5'){ ?>
                Sudah Full Bayar
            <?php }else if($b['status'] == '6'){ ?>
                Batal
            <?php } ?>
	      </td>
	      <td>
          <a href="<?=base_url('admin/transaksi/detail/'.$b['id'])?>" class="btn btn-info btn-xs">Detail</a>

          <?php if($b['status'] == '3'){ ?>
            <button type="button" onclick="konf_bayar('<?=$b['id']?>')" class="btn btn-warning btn-xs">Konf Bayar</button>
          <?php } ?>

	      	<?php if($b['status'] != '6' && $b['status'] != '4' && $b['status'] != '5'){ ?>
	      		<button type="button" onclick="batal_trans('<?=$b['id']?>')" class="btn btn-danger btn-xs">Batalkan</button>
	      	<?php } ?>

          <a href="<?=base_url('admin/transaksi/print_data/'.$b['id'])?>" class="btn btn-default btn-xs">Print</a>
	      </td>
	    </tr>
    </tr>
    <?php } ?>
  </tbody>
</table>

<div class="modal fade" id="trans_mod" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">KONFIRMASI PEMBAYARAN</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
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
      			<input type="date" name="tgl_bayar" class="form-control form-control-sm" value="<?=date('Y-m-d')?>">
      		</div>
      	</div>
      	<br>
      	<div class="row mt-1">
      		<div class="col-sm-3">TOTAL BAYAR</div>
      		<div class="col-sm-6">
      			<input type="number" step="any" name="total_bayar" id="trans_harga" class="form-control form-control-sm" value="0">
      		</div>
      	</div>
      	<br>
      	<div class="row mt-1">
      		<div class="col-sm-3">BUKTI BAYAR</div>
      		<div class="col-sm-6">
      			<input type="file" name="gambar" required class="form-control form-control-sm">
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