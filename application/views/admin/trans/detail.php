<?php
//Notifikasi
if($this->session->flashdata('sukses')){
  echo '<div class="alert alert-success">';
  echo $this->session->flashdata('sukses');
  echo '</div>';
}
?>

 <table class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>TGL BAYAR</th>
      <th>TOTAL BAYAR</th>
      <th>BUKTI BAYAR</th>
      <th width="15%">AKSI</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $i = 1;
    foreach ($trans as $b) {
    ?>
	    <tr>
	      <td style="white-space:nowrap"><?= date('d-m-Y', strtotime($b['tgl_bayar'])) ?></td>
	      <td><?=number_format($b['total_bayar'])?></td>
	      <td><img src="<?= base_url('assets/upload/image/thumbs/'.$b['bukti_bayar']) ?>" width="60" class="img img-thumbnail">
	      </td>
	      <td style="white-space:nowrap">
	      	<a href="<?=base_url('admin/transaksi/print_data_det/'.$b['id'])?>" class="btn btn-default btn-xs">Print</a>
	      </td>
	    </tr>
    </tr>
    <?php } ?>
  </tbody>
</table>
