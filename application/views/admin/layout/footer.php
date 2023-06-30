 </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer text-center">
    <strong>Copyright &copy; <?= '2023' ?> || Wedding Management System.</strong> All rights
    reserved.
  </footer>

<!-- jQuery 3 -->

<script src="<?= base_url() ?>assets/admin/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url() ?>assets/admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>assets/admin/dist/js/adminlte.min.js"></script>
<!-- DataTables -->
<script src="<?= base_url() ?>assets/admin/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?= base_url() ?>assets/admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?= base_url() ?>assets/admin/bower_components/fastclick/lib/fastclick.js"></script>

<script src="<?= base_url() ?>assets/admin/datatable/datatables.min.js"></script>
<script src="<?= base_url() ?>assets/admin/datatable/datatables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/admin/datatable/datatables.buttons.min.js"></script>
<script src="<?= base_url() ?>assets/admin/datatable/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>assets/admin/datatable/dataTables.rowGroup.min.js"></script>
<script src="<?= base_url() ?>assets/admin/datatable/dataTables.select.min.js"></script>
<script src="<?= base_url() ?>assets/admin/datatable/responsive.bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/admin/datatable/responsive.bootstrap4.js"></script>

<script src="<?= base_url() ?>assets/admin/datatable/jszip.min.js"></script>
<script src="<?= base_url() ?>assets/admin/datatable/pdfmake.min.js"></script>
<script src="<?= base_url() ?>assets/admin/datatable/vfs_fonts.js"></script>
<script src="<?= base_url() ?>assets/admin/datatable/buttons.html5.min.js"></script>


<!-- AdminLTE for demo purposes -->
<script src="<?= base_url() ?>assets/admin/dist/js/demo.js"></script>
<!-- page script -->
<script>

$(document).ready(function(){

    $("#dasbor1").DataTable({
          lengthChange: true,
          searching: false,
    });

    $("#user1").DataTable({
          lengthChange: true,
          searching: false,
    });

    $("#coa1").DataTable({
          lengthChange: true,
          searching: false,
    });

    $("#tema1").DataTable({
          lengthChange: true,
          searching: false,
    });

    $("#musik1").DataTable({
          lengthChange: true,
          searching: false,
    });

    $("#transaksi1").DataTable({
          lengthChange: true,
          searching: false,
    });

    $("#penjualan1").DataTable({
          lengthChange: true,
          searching: false,
    });

    $("#jurnal1").DataTable({
          lengthChange: true,
          searching: false,
    });

    $("#bukubesar1").DataTable({
          lengthChange: true,
          searching: false,
    });

    // var table = $("#bukubesar1").DataTable({
          
    //       lengthChange: true,
    //       dom: 'Blfrtip',
    //       buttons: [
    //           { 
    //             extend: 'excelHtml5', 
    //             className: 'btn btn-outline-secondary btn-sm', 
    //             text: '<i class="fas fa-file-excel"></i> Excel',
    //             exportOptions: {
    //                 columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9 ]
    //             } 
    //           },
    //           { 
    //             extend: 'pdfHtml5', 
    //             className: 'btn btn-outline-secondary btn-sm', 
    //             text: '<i class="fas fa-file-pdf"></i> PDF',
    //             exportOptions: {
    //                 columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9 ]
    //             } 
    //           },
              
    //       ],
    //     });
    // table.buttons().container()
    //           .appendTo('.dataTables_wrapper .dataTables_filter');


  $("#nominal_jual").on('blur', function(){

    var nom = $("#nominal_jual").val();

    var komisi = ((parseFloat(nom)*20) / 100);

    $("#komisi_jual").val(komisi);
  
  });

});

function cari_barang(){
  
  var id = $("#nasabah").val();

  $.ajax({
    type: "POST", 
    url: "<?= base_url('admin/transaksi/cari_barang') ?>", 
    data: "id="+id, 
    dataType: "JSON", 
    success: function(data){
      var html = "<option value=''>--Pilih barang--</option>";
      for (var i = 0; i < data.length; i++) {
          html += "<option value='"+data[i].id_barang+"'>"+data[i].nama_barang+"</option>"; 
      }

      $("#barang").html(html);
    }

  });
}

function cari_tebusan()
{
    var pinjam      = $("#jumlah_pinjam").val();
    var lama_simpan = $("#lama_simpan").val();

    if(lama_simpan == 15){
      var pers = 3.9;
    }else{
      var pers = 7.8;
    }

    var jasa = ((pinjam*4.3) / 100);

    var bunga  = ((pinjam*pers) / 100);

    var potongan    = ((pinjam*pers) / 100);
    
    var biaya_admin = 15000;

    var bea_simpan  = 15000;

    var tot_terima   = parseFloat(pinjam) - parseFloat(biaya_admin) - parseFloat(bea_simpan) - parseFloat(jasa);

    var total = parseFloat(pinjam) + parseFloat(bunga);

    $("#potongan").val(potongan);
    $("#biaya_admin").val(biaya_admin);
    $("#biaya_simpan").val(biaya_admin);
    $("#biaya_jasa").val(jasa);

    $("#diterima").val(tot_terima);

    $("#total_tebusan").val(total);
}  

function perpanjang_tempo(id)
{
    $("#tempo_id_gadai").val(id);

    $("#tempo_modal").show('modal');
}

function jual_modal(id)
{
    $("#jual_id_gadai").val(id);
    $("#jual_modal").show('modal');
}

function tebus(id)
{
  $.ajax({
    type: "POST", 
    url: "<?= base_url('admin/transaksi/tebus_barang') ?>", 
    data: "id="+id, 
    dataType: "JSON", 
    success: function(data){
      $("#id_gadai").val(id);
      for (var i = 0; i < data.length; i++) {
        $("#span_tgl").html(data[i].tgl_gadai_a);
        $("#span_nasabah").html(data[i].nama_nasabah);
        $("#span_barang").html(data[i].nama_barang);
        $("#span_jumlah_pinjaman").html(data[i].jumlah_pinjaman_a);
        $("#span_jatuh_tempo").html(data[i].jatuh_tempo_a);
        $("#span_total_tebusan").html(data[i].total_tebusan_a);
        // $("#adm").val(data[i].adm_perpanjang_a);
        $("#adm").val(0);
        $("#denda").val(data[i].denda);
        $("#tot_bay").val(data[i].total_bay);
      }
      $("#tebus_modal").show('modal');
    }

  });
}

function close_modal_tebus()
{
  $("#tebus_modal").hide('modal'); 
}

function close_modal_tempo()
{
  $("#tempo_modal").hide('modal'); 
}

function close_modal_jual()
{
  $("#jual_modal").hide('modal'); 
}
</script>
</body>
</html