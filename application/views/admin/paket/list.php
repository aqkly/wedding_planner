<?php
//Notifikasi
if($this->session->flashdata('sukses')){
  echo '<div class="alert alert-success">';
  echo $this->session->flashdata('sukses');
  echo '</div>';
}
?>

<p>
  <a href="<?= base_url('admin/paket/tambah') ?>" title="Tambah Data" class="btn btn-success">
    <i class="fa fa-plus"></i> Tambah Baru
  </a>
</p>

 <table id="tema1" class="table table-bordered table-striped table-responsive">
  <thead>
    <tr>
      <th width="5%">NO</th>
      <th>NAMA</th>
      <th>BERISI</th>
      <th>HARGA</th>
      <th>DESKRIPSI</th>
      <th width="15%">AKSI</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $i = 1;
    foreach ($paket as $b) {
    ?>
	    <tr>
	      <td><?= $i++ ?></td>
	      <td><?= $b['nama_paket'] ?></td>
	      <td><?=$b['berisi']?></td>
	      <td class="text-right"><?=number_format($b['harga'])?></td>
	      <td><?= $b['deskripsi'] ?></td>
	      <td style="white-space: nowrap;">
	        <?php
	        //Link Delete
	        include('delete.php');
	        ?>
          <button type="button" onclick="upload_paket('<?=$b['id']?>')" class="btn btn-info btn-sm">Upload Image</button>
          <a class="btn btn-default btn-sm" href="<?=base_url('admin/paket/list_image/'.$b['id'])?>">Lihat Image</a>
        </td>
	    </tr>
    </tr>
    <?php } ?>
  </tbody>
</table>

<div class="modal fade modal-biru" id="mod_up_paket" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="myModalLabel18" aria-modal="true" role="dialog">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel18">Upload Image</h4>
        </div>
        <form action="<?= base_url('admin/paket/upload_image') ?>" method="post" enctype="multipart/form-data">  
            <div class="modal-body">
              <div class="row">
                <div class="col-sm-6">
                  <input type="hidden" name="id" id="up_paket_id">
                  <input type="file" name="file">
                </div>
              </div>
            </div>
            <div class="modal-footer">
                <button type="submit" name="submit" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Ok" data-original-title="Tooltip on top">Upload</button>
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal" aria-label="Close" data-toggle="tooltip" data-placement="top" title="Tutup" data-original-title="Tooltip on top">Tutup</button>
            </div>
        </form>
    </div>
</div>
</div>