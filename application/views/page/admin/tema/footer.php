<?php
  $pengaturan = $query = $this->db->get('tb_pengaturan');
  foreach ($pengaturan->result() as $data){
    $nama_bisnis = $data->nama_bisnis;
  }
?>
<!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer text-sm">
    <strong>Copyright &copy; 2020 <a href=""><?= $nama_bisnis; ?> </a></strong>.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url()?>assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url()?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url()?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url()?>assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url()?>assets/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?php echo base_url()?>assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url()?>assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url()?>assets/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url()?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?php echo base_url()?>assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url()?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url()?>assets/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url()?>assets/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url()?>assets/dist/js/demo.js"></script>

<!-- pace-progress -->
<script src="<?php echo base_url()?>assets/plugins/pace-progress/pace.min.js"></script>

<script src="<?php echo base_url()?>assets/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>

<!-- DataTables -->
<script src="<?php echo base_url()?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url()?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

<!-- Select2 -->
<script src="<?php echo base_url()?>assets/plugins/select2/js/select2.full.min.js"></script>

<!-- SweetAlert2 -->
<script src="<?php echo base_url()?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="<?php echo base_url()?>assets/plugins/toastr/toastr.min.js"></script>

<!-- Summernote -->
<script src="<?php echo base_url()?>assets/plugins/summernote/summernote-bs4.min.js"></script>

<!-- bs-custom-file-input -->
<script src="<?php echo base_url()?>assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

<script type="text/javascript">
  $(document).ready(function () {
    bsCustomFileInput.init();
  });
</script>

<script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>

<script type="text/javascript">
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    $('.berhasillogin').show(function() {
      Toast.fire({
        type: 'info',
        title: ' Selamat Datang <?php echo $this->session->userdata("nama_pengguna")?>, Anda Login Sebagai <?php echo $this->session->userdata("level")?>'
      })
    });

    $('.swalberhasilhapus').show(function() {
      Toast.fire({
        type: 'success',
        title: ' Data Berhasil Di Hapus!'
      })
    });

    $('.swalberhasilsimpan').show(function() {
      Toast.fire({
        type: 'success',
        title: ' Data Berhasil Di Simpan!'
      })
    });

    $('.swalberhasilubah').show(function() {
      Toast.fire({
        type: 'success',
        title: ' Data Berhasil Di Ubah!'
      })
    });

    //Gagal
    $('.swalgagalhapus').show(function() {
      Toast.fire({
        type: 'error',
        title: ' Data Gagal Di Hapus!'
      })
    });

    $('.swalgagalsimpan').show(function() {
      Toast.fire({
        type: 'error',
        title: ' Data Gagal Di Simpan!'
      })
    });

    $('.swalgagalubah').show(function() {
      Toast.fire({
        type: 'error',
        title: ' Data Gagal Di Ubah!'
      })
    });
  });

</script>

</script>

<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

  })
</script>
<script>
  $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip({delay: {show: 0, hide: 0}});   
  });
</script>

<script type="text/javascript">
    $(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#example3 thead tr').clone(true).appendTo('#example3 thead');
    $('#example3 thead tr:eq(1) th').each( function (i) {
            var title = $(this).text();
            $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
     
            $( 'input', this ).on( 'keyup change', function () {
                if ( table.column(i).search() !== this.value ) {
                    table
                        .column(i)
                        .search( this.value )
                        .draw();
                }
            } );

        } );
     
    var table = $('#example3').DataTable(
    {
      "language": {
        "sProcessing": "Sedang memproses...",
        "sLengthMenu": "Tampilkan _MENU_ entri",
        "sZeroRecords": "Tidak ditemukan data yang sesuai",
        "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
        "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
        "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
        "sInfoPostFix": "",
        "sSearch": "Cari :",
        "oPaginate": {
          "sFirst": "Pertama",
          "sPrevious": "Sebelumnya",
          "sNext": "Selanjutnya",
          "sLast": "Terakhir",
        }
      },
      orderCellsTop: true,
      fixedHeader: true,
    });
    });
    </script>

    <script type="text/javascript">
      $(document).ready(function() {
        $('#example2').DataTable({
            initComplete: function () {
                this.api().columns().every( function () {
                    var column = this;
                    var select = $('<br><select class="form-control"><option value="">Semua</option></select>')
                        .appendTo( $(column.footer()).empty() )
                        .on( 'change', function () {
                            var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()
                            );
                            column
                                .search( val ? '^'+val+'$' : '', true, false )
                                .draw();
                        } );
     
                    column.data().unique().sort().each( function ( d, j ) {
                        select.append('<option value="'+d+'">'+d+'</option>')
                    } );
                } );
            }   
        });
    } );
    </script>

    <script type="text/javascript">
      $(document).ready(function() {
          var table = $('#example').DataTable(
            {
              "language": {
                "sProcessing":   "Sedang memproses...",
                "sLengthMenu":   "Tampilkan _MENU_ entri",
                "sZeroRecords":  "Tidak ditemukan data yang sesuai",
                "sInfo":         "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                "sInfoEmpty":    "Menampilkan 0 sampai 0 dari 0 entri",
                "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                "sInfoPostFix":  "",
                "sSearch":       "Cari:",
                "oPaginate": {
                  "sFirst":    "Pertama",
                  "sPrevious": "Sebelumnya",
                  "sNext":     "Selanjutnya",
                  "sLast":     "Terakhir"
                }
              }
          });
       
          // menerapkan pencarian pada tabel
          table.columns().every( function () {
            var column = this;
            var select = $('<select class="form-control"><option value="">Semua</option></select>')
            .appendTo($(column.header()))
            .on('change', function () {
              var val = $.fn.dataTable.util.escapeRegex($(this).val());
              column.search( val ? '^'+val+'$' : '', true, false ).draw();
            });

            column.data().unique().sort().each( function ( d, j ) {
                if(column.search() === '^'+d+'$'){
                    select.append( '<option value="'+d+'" selected="selected">'+d+'</option>' )
                } else {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                }
            } );

          });

        });
    </script>
    <script type="text/javascript">
      $(document).ready(function() {
          $('#example4').DataTable(
            {
              "language": {
                "sProcessing":   "Sedang memproses...",
                "sLengthMenu":   "Tampilkan _MENU_ entri",
                "sZeroRecords":  "Tidak ditemukan data yang sesuai",
                "sInfo":         "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                "sInfoEmpty":    "Menampilkan 0 sampai 0 dari 0 entri",
                "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                "sInfoPostFix":  "",
                "sSearch":       "Cari:",
                "oPaginate": {
                  "sFirst":    "Pertama",
                  "sPrevious": "Sebelumnya",
                  "sNext":     "Selanjutnya",
                  "sLast":     "Terakhir"
                }
              }
            })
          });
    </script>

    <script type="text/javascript">
      $(document).ready(function() {
          $('#alamat').DataTable(
            {
              searching: true,
              ordering:  false,
              paging: false,
              "language": {
                "sProcessing":   "Sedang memproses...",
                "sLengthMenu":   "Tampilkan _MENU_ entri",
                "sZeroRecords":  "Tidak ditemukan data yang sesuai",
                "sInfo":         "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                "sInfoEmpty":    "Menampilkan 0 sampai 0 dari 0 entri",
                "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                "sInfoPostFix":  "",
                "sSearch":       "Cari:",
                "oPaginate": {
                  "sFirst":    "Pertama",
                  "sPrevious": "Sebelumnya",
                  "sNext":     "Selanjutnya",
                  "sLast":     "Terakhir"
                }
              }
            })
          });
    </script>

</body>
</html>