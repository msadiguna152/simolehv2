<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed pace-success">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <!-- <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form> -->

<ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <?php
          $id_pengguna = $this->session->userdata('id_pengguna');
          $jnotif = $this->db->query("SELECT id_pesanan AS notif FROM `tb_pesanan` WHERE status='1' AND id_pengguna='$id_pengguna'");
          $jnotif2 = $jnotif->num_rows();
        ?>
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge"><?= $jnotif2; ?></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header"><?= $jnotif2; ?> Pemberitahuan</span>
          <?php
            $id_pengguna = $this->session->userdata('id_pengguna');
            $notif = $this->db->query("SELECT * FROM `tb_pesanan` WHERE status='1' AND id_pengguna='$id_pengguna' ORDER BY id_pesanan DESC");
            foreach ($notif->result() as $data):
          ?>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-cart mr-2"></i> 
            <span class="float-left text-muted text-sm"><?= $data->tanggal_pesanan;?></span>
          </a>
          <?php endforeach;?>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">Lihat Semua</a>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-navy elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link navbar-white">
      <img src="<?php echo base_url()?>assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light"><marquee><b>E-Commerce Simpel Oleh Oleh (SIMOLEH)</b></marquee></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url()?>file/<?php echo $this->session->userdata('foto_pengguna');?>" class="img-circle elevation-2" alt="">
        </div>
        <div class="info">
          <a href="<?php echo base_url()?>page/kurir/Admin/edit" class="d-block"><?php echo substr($this->session->userdata('nama_pengguna'), 0,18);?> <i class="fa fa-circle fa-sm text-success" data-toggle="tooltip" data-placement="right" title="Online"></i></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <li class="nav-item">
            <a href="<?php echo base_url()?>page/kurir/pesanan" class="nav-link <?php if($this->session->userdata('menu') == 'pesanan'){echo "active"; }?>">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Pesanan
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url()?>page/kurir/dashboard/profil" class="nav-link <?php if($this->session->userdata('menu') == 'profil'){echo "active"; }?>">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Profil
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo site_url('auth/logout')?>" class="nav-link" onclick="return confirm('Yakin Logout <?php echo $this->session->userdata('nama_pengguna'); ?>?')">
              <i class="nav-icon fas fa-power-off"></i>
              <p>
                Logout
              </p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>