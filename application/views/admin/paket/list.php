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
	      <td>
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