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

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="<?php echo base_url()?>assets/dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="<?php echo base_url()?>assets/dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="<?php echo base_url()?>assets/dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-navy elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url()?>page/admin/Admin" class="brand-link navbar-white">
      <img src="<?php echo base_url()?>assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light"><b>SIMOLEH</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <!-- <img src="<?php echo base_url()?>profile/<?php echo $this->session->userdata('foto_pengguna');?>" class="img-circle elevation-2" alt=""> -->
        </div>
        <div class="info">
          <a href="<?php echo base_url()?>page/admin/Admin/edit" class="d-block"><?php echo substr($this->session->userdata('nama_pengguna'), 0,18);?> <i class="fa fa-circle fa-sm text-success" data-toggle="tooltip" data-placement="right" title="Online"></i></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <li class="nav-item">
            <a href="<?php echo site_url('page/admin/dashboard')?>" class="nav-link <?php if($this->session->userdata('menu') == 'dashboard'){echo "active"; }?>">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item has-treeview <?php if($this->session->userdata('menu2') == 'pembeli'){echo "menu-open"; }?>">
            <a href="#" class="nav-link <?php if($this->session->userdata('menu2') == 'pembeli'){echo "active"; }?>">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Pembeli
              <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="<?php echo site_url('page/admin/pembeli')?>" class="nav-link <?php if($this->session->userdata('menu') == 'pembeli'){echo "active"; }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pembeli</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?php echo site_url('page/admin/alamat')?>" class="nav-link <?php if($this->session->userdata('menu') == 'alamat'){echo "active"; }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Alamat</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="<?php echo site_url('page/admin/pesanan')?>" class="nav-link <?php if($this->session->userdata('menu') == 'pesanan'){echo "active"; }?>">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Pesanan
              </p>
            </a>
          </li>

          <li class="nav-item has-treeview <?php if($this->session->userdata('menu2') == 'produk'){echo "menu-open"; }?>">
            <a href="#" class="nav-link <?php if($this->session->userdata('menu2') == 'produk'){echo "active"; }?>">
              <i class="nav-icon fas fa-tags"></i>
              <p>
                Produk
              <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="<?php echo site_url('page/admin/produk')?>" class="nav-link <?php if($this->session->userdata('menu') == 'produk'){echo "active"; }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Produk</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?php echo site_url('page/admin/kategori')?>" class="nav-link <?php if($this->session->userdata('menu') == 'kategori'){echo "active"; }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kategori</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url()?>page/admin/Admin/edit" class="nav-link <?php if($this->session->userdata('menu') == 'profil'){echo "active"; }?>">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Profil
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url()?>page/admin/Admin/edit" class="nav-link <?php if($this->session->userdata('menu') == 'profil'){echo "active"; }?>">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Sliders
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