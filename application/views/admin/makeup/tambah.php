<?php
// Error Warning
echo validation_errors('<div class="alert alert-warning">', '</div>');

//Error Upload
if(isset($error_upload)) {
	echo '<div class="alert alert-warning">'.$error_upload.'</div>';
}

//attribut
$attribut = 'class="alert alert-info"';
//form open
echo form_open_multipart(base_url('admin/makeup/tambah'),$attribut);
?>

<div class="row">
	<div class="col-md-12">
		<div class="form-group form-group-lg">
			<label>NAMA</label>
			<input type="text" name="nama" class="form-control" placeholder="Nama Makeup" value="<?= set_value('nama') ?>" required>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="form-group form-group-lg">
			<label>HARGA</label>
			<input type="number" step="any" name="harga" class="form-control" placeholder="Harga" value="<?= set_value('harga') ?>" required>
		</div>
	</div>	
</div>

<div class="row">
	<div class="col-md-12">
		<div class="form-group form-group-lg">
			<label>DESKRIPSI</label>
			<textarea required name="deskripsi" class="form-control" placeholder="Deskripsi"><?= set_value('deskripsi') ?></textarea>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="form-group form-group-lg">
			<label>Upload Foto</label>
			<input type="file" name="gambar" class="form-control" required>
		</div>
	</div>
</div>

<div class="col-md-12">
	<div class="form-group text-right">
		<button type="submit" name="submit" class=" btn btn-success btn-lg">
			<i class="fa fa-save"></i> Simpan			
		</button>
		<button type="reset" name="reset" class=" btn btn-default btn-lg">
			<i class="fa fa-times"></i> Reset			
		</button>
	</div>
</div>

<div class="clearfix"></div>
<?php
//form close
echo form_close();
?>