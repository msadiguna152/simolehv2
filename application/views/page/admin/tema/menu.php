<?php
$pengaturan = $query = $this->db->get('tb_pengaturan');
foreach ($pengaturan->result() as $data) {
	$nama_bisnis = $data->nama_bisnis;
	$icon = $data->icon;
}
?>
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

		<ul class="navbar-nav ml-auto">
			<li class="nav-item dropdown">
				<?php
				$jnotif = $this->db->query("SELECT id_pesanan AS notif FROM `tb_pesanan` WHERE status='1'");
				$jnotif2 = $jnotif->num_rows();
				?>
				<a class="nav-link" data-toggle="dropdown" href="#">
					<i class="far fa-bell"></i>
					<span class="badge badge-warning navbar-badge" id="notif-count"><?= $jnotif2; ?></span>
				</a>
				<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" >
					<span class="dropdown-item dropdown-header"><?= $jnotif2; ?> Pemberitahuan</span>
					<div id="notif-container">
						<?php
						$notif = $this->db->query("SELECT * FROM `tb_pesanan` WHERE status='1' ORDER BY id_pesanan DESC");
						foreach ($notif->result() as $data):
							?>
							<div class="dropdown-divider"></div>
							<a href="<?php echo base_url() ?>page/admin/pesanan/lihat?id=<?php echo $data->id_pesanan ?>&token=<?php echo md5($data->id_pesanan) ?>"
							   class="dropdown-item notif-item">
								<i class="fas fa-cart mr-2"></i>
								<span class="float-left text-sm">Pesanan Baru : <?= $data->tanggal_pesanan; ?></span>
							</a>
						<?php endforeach; ?>
					</div>
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
			<img src="<?php echo base_url() ?>pengaturan/<?= $icon; ?>" alt="<?= $nama_bisnis; ?>"
				 class="brand-image img-circle elevation-3" style="opacity: .8">
			<span class="brand-text font-weight-light"><marquee><b><?= $nama_bisnis; ?></b></marquee></span>
		</a>

		<!-- Sidebar -->
		<div class="sidebar">
			<!-- Sidebar user panel (optional) -->
			<div class="user-panel mt-3 pb-3 mb-3 d-flex">
				<div class="image">
					<img src="<?php echo base_url() ?>file/<?php echo $this->session->userdata('foto_pengguna'); ?>"
						 class="img-circle elevation-2" alt="">
				</div>
				<div class="info">
					<a href="<?php echo base_url() ?>page/admin/Admin/edit"
					   class="d-block"><?php echo substr($this->session->userdata('nama_pengguna'), 0, 18); ?> <i
								class="fa fa-circle fa-sm text-success" data-toggle="tooltip" data-placement="right"
								title="Online"></i></a>
				</div>
			</div>

			<!-- Sidebar Menu -->
			<nav class="mt-2">
				<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
					data-accordion="false">

					<li class="nav-item">
						<a href="<?php echo site_url('page/admin/dashboard') ?>"
						   class="nav-link <?php if ($this->session->userdata('menu') == 'dashboard') {
							   echo "active";
						   } ?>">
							<i class="nav-icon fas fa-home"></i>
							<p>
								Dashboard
							</p>
						</a>
					</li>

					<li class="nav-item has-treeview <?php if ($this->session->userdata('menu2') == 'pembeli') {
						echo "menu-open";
					} ?>">
						<a href="#" class="nav-link <?php if ($this->session->userdata('menu2') == 'pembeli') {
							echo "active";
						} ?>">
							<i class="nav-icon fas fa-users"></i>
							<p>
								Pembeli
								<i class="fas fa-angle-left right"></i>
							</p>
						</a>
						<ul class="nav nav-treeview">

							<li class="nav-item">
								<a href="<?php echo site_url('page/admin/pembeli') ?>"
								   class="nav-link <?php if ($this->session->userdata('menu') == 'pembeli') {
									   echo "active";
								   } ?>">
									<i class="far fa-circle nav-icon"></i>
									<p>Pembeli</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="<?php echo site_url('page/admin/alamat') ?>"
								   class="nav-link <?php if ($this->session->userdata('menu') == 'alamat') {
									   echo "active";
								   } ?>">
									<i class="far fa-circle nav-icon"></i>
									<p>Alamat</p>
								</a>
							</li>
						</ul>
					</li>

					<li class="nav-item has-treeview <?php if ($this->session->userdata('menu2') == 'pesanan') {
						echo "menu-open";
					} ?>">
						<a href="#" class="nav-link <?php if ($this->session->userdata('menu2') == 'pesanan') {
							echo "active";
						} ?>">
							<i class="nav-icon fas fa-shopping-cart"></i>
							<p>
								Pesanan
								<i class="fas fa-angle-left right"></i>
							</p>
						</a>
						<ul class="nav nav-treeview">

							<li class="nav-item">
								<a href="<?php echo site_url('page/admin/pesanan') ?>"
								   class="nav-link <?php if ($this->session->userdata('menu') == 'pesanan') {
									   echo "active";
								   } ?>">
									<i class="far fa-circle nav-icon"></i>
									<p>Pesanan</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="<?php echo site_url('page/admin/pembayaran') ?>"
								   class="nav-link <?php if ($this->session->userdata('menu') == 'pembayaran') {
									   echo "active";
								   } ?>">
									<i class="far fa-circle nav-icon"></i>
									<p>Pembayaran</p>
								</a>
							</li>
						</ul>
					</li>

					<li class="nav-item has-treeview <?php if ($this->session->userdata('menu2') == 'produk') {
						echo "menu-open";
					} ?>">
						<a href="#" class="nav-link <?php if ($this->session->userdata('menu2') == 'produk') {
							echo "active";
						} ?>">
							<i class="nav-icon fas fa-tags"></i>
							<p>
								Produk
								<i class="fas fa-angle-left right"></i>
							</p>
						</a>
						<ul class="nav nav-treeview">

							<li class="nav-item">
								<a href="<?php echo site_url('page/admin/produk') ?>"
								   class="nav-link <?php if ($this->session->userdata('menu') == 'produk') {
									   echo "active";
								   } ?>">
									<i class="far fa-circle nav-icon"></i>
									<p>Produk</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="<?php echo site_url('page/admin/kategori') ?>"
								   class="nav-link <?php if ($this->session->userdata('menu') == 'kategori') {
									   echo "active";
								   } ?>">
									<i class="far fa-circle nav-icon"></i>
									<p>Kategori</p>
								</a>
							</li>
						</ul>
					</li>

					<li class="nav-item">
						<a href="<?php echo base_url() ?>page/admin/sliders"
						   class="nav-link <?php if ($this->session->userdata('menu') == 'sliders') {
							   echo "active";
						   } ?>">
							<i class="nav-icon fas fa-clone"></i>
							<p>
								Sliders
							</p>
						</a>
					</li>

					<li class="nav-item">
						<a href="<?php echo base_url() ?>page/admin/pengguna"
						   class="nav-link <?php if ($this->session->userdata('menu') == 'pengguna') {
							   echo "active";
						   } ?>">
							<i class="nav-icon fas fa-list"></i>
							<p>
								Pengguna
							</p>
						</a>
					</li>

					<li class="nav-item">
						<a href="<?php echo base_url() ?>page/admin/dashboard/profil"
						   class="nav-link <?php if ($this->session->userdata('menu') == 'profil') {
							   echo "active";
						   } ?>">
							<i class="nav-icon fas fa-user"></i>
							<p>
								Profil
							</p>
						</a>
					</li>

					<li class="nav-item">
						<a href="<?php echo base_url() ?>page/admin/medsos"
						   class="nav-link <?php if ($this->session->userdata('menu') == 'medsos') {
							   echo "active";
						   } ?>">
							<i class="nav-icon fas fa-bookmark"></i>
							<p>
								Medsos
							</p>
						</a>
					</li>

					<li class="nav-item">
						<a href="<?php echo base_url() ?>page/admin/pengaturan"
						   class="nav-link <?php if ($this->session->userdata('menu') == 'pengaturan') {
							   echo "active";
						   } ?>">
							<i class="nav-icon fas fa-cog"></i>
							<p>
								Pengaturan
							</p>
						</a>
					</li>

					<li class="nav-item">
						<a target="_BLANK" href="<?php echo base_url() ?>" class="nav-link">
							<i class="nav-icon fas fa-eye"></i>
							<p>
								Lihat Website
							</p>
						</a>
					</li>

					<li class="nav-item">
						<a href="<?php echo site_url('auth/logout') ?>" class="nav-link"
						   onclick="return confirm('Yakin Logout <?php echo $this->session->userdata('nama_pengguna'); ?>?')">
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
