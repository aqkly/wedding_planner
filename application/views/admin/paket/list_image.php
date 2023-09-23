<?php
//Notifikasi
if($this->session->flashdata('sukses')){
  echo '<div class="alert alert-success">';
  echo $this->session->flashdata('sukses');
  echo '</div>';
}
?>

<table id="tema1" class="table table-bordered table-striped table-responsive">
  <thead>
    <tr>
      <th width="5%">NO</th>
      <th>NAMA PAKET</th>
      <th>IMAGE</th>
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
          <td><img src="<?= base_url('assets/upload/image/thumbs/'.$b['img']) ?>" width="60" class="img img-thumbnail"></td>
	      <td style="white-space: nowrap;">
          <a class="btn btn-danger btn-sm" href="<?=base_url('admin/paket/hapus_image/'.$b['id'])?>?id_paket=<?=$b['id_paket']?>">Hapus</a>
        </td>
	    </tr>
    </tr>
    <?php } ?>
  </tbody>
</table>