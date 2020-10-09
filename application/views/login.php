<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

    <script language='javaScript'>
      var txt="www.lusiapw.com       ";
      var speed=300;
      var refresh=null;
      function action() { document.title=txt;
      txt=txt.substring(1,txt.length)+txt.charAt(0);
      refresh=setTimeout("action()",speed);}action();
    </script>

    <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
  
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

  <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/toastr/toastr.min.css">
  <!-- pace-progress -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/pace-progress/themes/black/pace-theme-flat-top.css">

  <style type="text/css">
    .ignielPelangi {
    background: linear-gradient(45deg, #f22613, #f89406, #26a65b, #5868ec, #f54e80, #f7ca18, #d2527f);
    background-size: 500% 500%;
    -webkit-animation: ignielGradient 12s ease infinite;
    -moz-animation: ignielGradient 12s ease infinite;
    animation: ignielGradient 12s ease infinite;
  }
  @-webkit-keyframes ignielGradient {
      0%{background-position:0% 50%}
      50%{background-position:100% 50%}
      100%{background-position:0% 50%}
  }
  @-moz-keyframes ignielGradient {
      0%{background-position:0% 50%}
      50%{background-position:100% 50%}
      100%{background-position:0% 50%}
  }
  @keyframes ignielGradient {
      0%{background-position:0% 50%}
      50%{background-position:100% 50%}
      100%{background-position:0% 50%}
  }
  </style>

</head>

<body class="hold-transition layout-top-nav layout-navbar-fixed layout-footer-fixed pace-success">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-primary navbar-dark">
    <div class="container">
      <a href="<?php echo site_url()?>Lusiapw" class="navbar-brand">
        <img src="<?php echo base_url()?>assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light"><b style="color: white;">SIMOLEH</b></span>
      </a>
    </div>
  </nav>
  <!-- /.navbar -->  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper ignielPelangi">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <label hidden="" <?php if ($this->session->flashdata('hasil')=="toastinfosukses") { echo 'class="toastinfosukses"';}?>>
          <label hidden="" <?php if ($this->session->flashdata('hasil')=="toastinfogagal") { echo 'class="toastinfogagal"';}?>>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content animated bounceIn">
      <div class="container connectedSortable">
        <div class="row">
          <div class="col-lg-12">
            <div class="row connectedSortable">
              <div class="col-lg-3">
              </div>
              <div class="col-lg-6">
                <div class="card card-primary card-outline">
                  <div class="card-header">
                    <h5 class="card-title m-0">SILAHKAN LOGIN</h5>
                  </div>
                  <div class="card-body">
                    <form action="<?php echo site_url()?>Auth/proses_login" method="post">
                      <div class="input-group mb-3">
                        <input type="text" class="form-control" name="username" placeholder="Username...">
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <span class="fas fa-user"></span>
                          </div>
                        </div>
                      </div>
                      <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Password...">
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <span class="fas fa-key"></span>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-4">
                          <button type="submit" name="login" class="btn btn-primary btn-block btn-sm">Login</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer text-sm">
    <strong>Copyright &copy; 2020 <a href="www.lusiapw.com">www.lusiapw.com</a>.</strong>
      All rights reserved. <b>Version</b> 1.0.0
    
    <div class="float-right d-none d-sm-inline-block">
      
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

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
<!-- pace-progress -->
<script src="<?php echo base_url()?>assets/plugins/pace-progress/pace.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script type="text/javascript">
  $(document).ready(function () {
    bsCustomFileInput.init();
  });
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

<script type="text/javascript">
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: true,
      timer: 5000
    });


    $('.toastinfosukses').show(function() {
      Toast.fire({
        type: 'info',
        title: ' Berhasil Mendaftar, Silahkan Tunggu Konfimasi Dari Admin!'
      })
    });

    $('.toastinfogagal').show(function() {
      Toast.fire({
        type: 'error',
        title: ' Gagal Mendaftar, Silahkan Hubungi Admin!'
      })
    })

  });

</script>
</body>
</html>
