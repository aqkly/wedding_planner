<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>GADAI BANDUNG DOT COM</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
   <link rel="stylesheet" href="<?= base_url() ?>assets/admin/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/dist/css/AdminLTE.min.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style type="text/css" media="print">
  @page { size: landscape; }
</style>
</head>
<body onload="window.print();">
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
  	<div class="row">
      
      <div class="col-xs-12 table-responsive">

      	<h3>DETAIL PEMBAYARAN</h3>
      	<br>
        <table class="table table-striped">
          <thead>
          <tr>
            <th width="5%">NO</th>
		    <th>TGL BAYAR</th>
		    <th>TOTAL BAYAR</th>
		    <th>BUKTI BAYAR</th>
          </tr>
	        </thead>
          	<tbody>
          		<?php $no = 1; foreach ($trans as $t) { ?>
          			<tr>
          				<td><?=$no++?></td>
          				<td style="white-space:nowrap; "><?=date('d-m-Y', strtotime($t['tgl_bayar']))?></td>
          				<td><?=number_format($t['total_bayar'])?></td>
          				<td>
          					<img src="<?= base_url('assets/upload/image/thumbs/'.$t['bukti_bayar']) ?>" width="60" class="img img-thumbnail">
          				</td>
          			</tr>
          		<?php } ?>
        	</tbody>
        </table>

      </div>
      
    </div>

  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>
