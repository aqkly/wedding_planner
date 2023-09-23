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

 <script
      src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js"
      referrerpolicy="origin"
    ></script>
    <script src="https://cdn.jsdelivr.net/npm/@tinymce/tinymce-jquery@2/dist/tinymce-jquery.min.js"></script>

<script src="<?= base_url() ?>assets/vx/app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>

<script src="<?= base_url() ?>assets/admin/datatable/jszip.min.js"></script>
<script src="<?= base_url() ?>assets/admin/datatable/pdfmake.min.js"></script>
<script src="<?= base_url() ?>assets/admin/datatable/vfs_fonts.js"></script>
<script src="<?= base_url() ?>assets/admin/datatable/buttons.html5.min.js"></script>


<!-- AdminLTE for demo purposes -->
<script src="<?= base_url() ?>assets/admin/dist/js/demo.js"></script>
<!-- page script -->
<script>

$(document).ready(function(){

    $('#berisi_paket').tinymce({ height: 500, /* other settings... */ });

    $("#dasbor1").DataTable({
          lengthChange: true,
          searching: false,
    });

    $("#user1").DataTable({
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
});
function batal_trans(id)
{
  Swal.fire({
      title: 'Peringatan!',
      text: 'Yakin Batalkan Transaksi ?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Ya, Batalkan!',
      customClass: {
        confirmButton: 'btn btn-success btn-sm',
        cancelButton: 'btn btn-danger btn-sm ml-1'
      },
    }).then(function (result) {
        if (result.value) {
            $.ajax({
              type: "POST",
              url: "<?= base_url('admin/transaksi/batal') ?>",
              data: "id="+id,
              dataType: "JSON",
              success: function (data) {
              if(data.result == 'sukses'){
                  Swal.fire({
                          icon: 'success',
                          title: 'Berhasil!',
                          text: 'Batalkan Transaksi Sukses',
                          timer: 3000,
                          customClass: {
                            confirmButton: 'btn btn-success'
                          }
                        });

                 window.location.reload(); 
              }
             }
          });
       }
   });
}

function konf_trans(id)
{
  $.ajax({
    type: "POST",
    url: "<?= base_url('admin/transaksi/get_harga') ?>",
    data: "id="+id,
    dataType: "JSON",
    success: function (data) {
      $("#trans_harga").val(data);
      $("#trans_id").val(id);
      $("#trans_mod").modal('show');
    }
  });
}

function upload_paket(id)
{
  $("#up_paket_id").val(id);
  $("#mod_up_paket").modal('show');
}

</script>
</body>
</html