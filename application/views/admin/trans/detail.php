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
	      <td>
          <button type="button" onclick="lihat_bbb('<?=$b['bukti_bayar']?>')"><img src="<?= base_url('assets/upload/image/thumbs/'.$b['bukti_bayar']) ?>" width="60" class="img img-thumbnail"></button>
	      </td>
	      <td style="white-space:nowrap">
	      	<a href="<?=base_url('admin/transaksi/print_data_det/'.$b['id'])?>" class="btn btn-default btn-xs">Print</a>
	      </td>
	    </tr>
    </tr>
    <?php } ?>
  </tbody>
</table>

<div class="modal fade modal-biru" id="modal_foto" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="myModalLabel18" aria-modal="true" role="dialog">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel18">FOTO</h4>
        </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-sm-12 ini_foto">
                  
                </div>
              </div>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal" aria-label="Close" data-toggle="tooltip" data-placement="top" title="Tutup" data-original-title="Tooltip on top">Tutup</button>
            </div>

    </div>
</div>
</div>
