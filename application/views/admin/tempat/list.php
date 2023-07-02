<?php
//Notifikasi
if($this->session->flashdata('sukses')){
  echo '<div class="alert alert-success">';
  echo $this->session->flashdata('sukses');
  echo '</div>';
}
?>

<p>
  <a href="<?= base_url('admin/tempat/tambah') ?>" title="Tambah Data" class="btn btn-success">
    <i class="fa fa-plus"></i> Tambah Baru
  </a>
</p>

 <table id="tema1" class="table table-bordered table-striped table-responsive">
  <thead>
    <tr>
      <th width="5%">NO</th>
      <th>FOTO</th>
      <th>NAMA VENUE</th>
      <th>ALAMAT</th>
      <th>HARGA</th>
      <th>DESKRIPSI</th>
      <th width="15%">AKSI</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $i = 1;
    foreach ($tempat as $b) {
    ?>
	    <tr>
	      <td><?= $i++ ?></td>
	      <td><img src="<?= base_url('assets/upload/image/thumbs/'.$b->foto) ?>" width="60" class="img img-thumbnail"></td>
	      <td><?= $b->nama_lokasi ?></td>
	      <td><?= $b->alamat ?></td>
	      <td class="text-right"><?= number_format($b->harga) ?></td>
	      <td><?= $b->deskripsi ?></td>
	      <td>
	      	<a href="<?= base_url('admin/tempat/edit/'.$b->id) ?>" title="Edit Venue" class="btn btn-warning btn-xs">
	        <i class="fa fa-edit"></i> Edit
	      	</a>
	        <?php
	        //Link Delete
	        include('delete.php');
	        ?>
	      </td>
	    </tr>
    </tr>
    <?php } ?>
  </tbody>
</table>