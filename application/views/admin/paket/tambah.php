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
echo form_open(base_url('admin/paket/tambah'),$attribut);
?>

<div class="row">
	<div class="col-md-12">
		<div class="form-group form-group-lg">
			<label>NAMA PAKET</label>
			<input type="text" name="nama_paket" class="form-control" placeholder="Nama Paket" value="<?= set_value('nama') ?>" required>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="form-group form-group-lg">
			<label>TEMA</label>
			<select name="tema" class="form-control" required>
				<option>-- PILIH TEMA --</option>
				<?php foreach ($tema as $t) { ?>
					<option value="<?=$t['id']?>"><?=$t['nama']?></option>
				<?php } ?>
			</select>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="form-group form-group-lg">
			<label>VENUE</label>
			<select name="tempat" class="form-control" required>
				<option>-- PILIH VENUE --</option>
				<?php foreach ($tempat as $t) { ?>
					<option value="<?=$t['id']?>"><?=$t['nama']?></option>
				<?php } ?>
			</select>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="form-group form-group-lg">
			<label>MUSIK</label>
			<select name="musik" class="form-control" required>
				<option>-- PILIH MUSIK --</option>
				<?php foreach ($musik as $t) { ?>
					<option value="<?=$t['id']?>"><?=$t['nama']?></option>
				<?php } ?>
			</select>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="form-group form-group-lg">
			<label>PHOTO</label>
			<select name="photo" class="form-control" required>
				<option>-- PILIH PHOTO --</option>
				<?php foreach ($photo as $t) { ?>
					<option value="<?=$t['id']?>"><?=$t['nama']?></option>
				<?php } ?>
			</select>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="form-group form-group-lg">
			<label>KOSTUM</label>
			<select name="kostum" class="form-control" required>
				<option>-- PILIH KOSTUM --</option>
				<?php foreach ($kostum as $t) { ?>
					<option value="<?=$t['id']?>"><?=$t['nama']?></option>
				<?php } ?>
			</select>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="form-group form-group-lg">
			<label>CATERING</label>
			<select name="catering" class="form-control" required>
				<option>-- PILIH CATERING --</option>
				<?php foreach ($catering as $t) { ?>
					<option value="<?=$t['id']?>"><?=$t['nama']?></option>
				<?php } ?>
			</select>
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