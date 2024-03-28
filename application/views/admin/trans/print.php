<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>DETAIL TRANSAKSI</title>
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
  <!-- <style type="text/css" media="print">
  @page { size: landscape; }
</style> -->
</head>
<body onload="window.print();">
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
      	<h3>DETAIL TRANSAKSI</h3>

        <?php foreach($trans as $i){ ?>

          <table class="table table-bordered table-responsive">
            <thead>
              <th>NAMA PEMESAN</th>
              <th>ALAMAT</th>
              <th>TGL BOOKING</th>
              <?php if($i['jenis_booking'] == 'paketan'){ ?>
              <th>NAMA PAKET</th>
              <?php }else{ ?>
              <th>TEMA</th>
              <th>MUSIK</th>
              <th>MAKEUP</th>
              <th>PHOTO</th>
              <!-- <th>KOSTUM</th> -->
              <?php } ?>
              <th>TOTAL HARGA</th>
              <th>STATUS</th>
            </thead>
            <tbody>
              <td><?=$i['nama_pemesan']?></td>
              <td><?=$i['alamat']?></td>
              <td><?=$i['tgl_booking']?></td>
              <?php if($i['jenis_booking'] == 'paketan'){ ?>
              <td><?=$i['nmpaket']?></td>
              <?php }else{ ?>
              <td><?=$i['tema']?></td>
              <td><?=$i['musik']?></td>
              <td><?=$i['makeup']?></td>
              <td><?=$i['photo']?></td>
              <!-- <td><?=$i['kostum']?></td> -->
              <?php } ?>
              <td><?=number_format($i['total_harga'])?></td>
              <?php if($i['status'] == '1'){ ?>
                <td>Baru</td>
            <?php }else if($i['status'] == '2'){ ?>
                <td>Menunggu Pembayaran</td>
            <?php }else if($i['status'] == '3'){ ?>
                <td>Menunggu Konf Pembayaran</td>
            <?php }else if($i['status'] == '4'){ ?>
                <td>Bayar Sebagian</td>
            <?php }else if($i['status'] == '5'){ ?>
                <td>Sudah Full Bayar</td>
            <?php }else if($b['status'] == '6'){ ?>
                <td>Batal</td>
            <?php } ?>
            </tbody>
          </table>

      <?php } ?>

  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>
