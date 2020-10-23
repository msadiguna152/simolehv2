  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">
              <?php 
              $menu = $this->session->userdata('menu');
              echo strtoupper($menu);
              ?>
            </h1>
          </div><!-- /.col -->
          <button type="button" hidden=""
          <?php if ($this->session->flashdata('hasil')=="berhasillogin") { echo 'class="berhasillogin"';}?>>
          </button>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-shopping-cart"></i></span>
				<?php
		          $baru = $this->db->query("SELECT id_pesanan FROM `tb_pesanan` WHERE status='1'");
		          $jbaru = $baru->num_rows();
		        ?>
              <div class="info-box-content">
                <span class="info-box-text">BARU</span>
                <span class="info-box-number">
                  <?= $jbaru;?>
                  <small>Pesanan</small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i style="color: white;" class="fas fa-retweet"></i></span>
              	<?php
		          $diproses = $this->db->query("SELECT id_pesanan FROM `tb_pesanan` WHERE status='2'");
		          $jdiproses = $diproses->num_rows();
		        ?>
              <div class="info-box-content">
                <span class="info-box-text">DIPROSES</span>
                <span class="info-box-number">
               	<?= $jdiproses;?>
                <small>Pesanan</small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-truck"></i></span>
              	<?php
		          $dikirim = $this->db->query("SELECT id_pesanan FROM `tb_pesanan` WHERE status='3'");
		          $jdikirim = $dikirim->num_rows();
		        ?>
              <div class="info-box-content">
                <span class="info-box-text">DIKIRIM</span>
                <span class="info-box-number">
                	<?= $jdikirim;?>
                	<small>Pesanan</small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-check"></i></span>
				<?php
		          $selesai = $this->db->query("SELECT id_pesanan FROM `tb_pesanan` WHERE status='3'");
		          $jselesai = $selesai->num_rows();
		        ?>
              <div class="info-box-content">
                <span class="info-box-text">SELESAI</span>
                <span class="info-box-number">
                	<?= $jselesai;?>
                	<small>Pesanan</small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-times"></i></span>
              	<?php
		          $batal = $this->db->query("SELECT id_pesanan FROM `tb_pesanan` WHERE status='3'");
		          $jbatal = $batal->num_rows();
		        ?>
              <div class="info-box-content">
                <span class="info-box-text">BATAL</span>
                <span class="info-box-number">
                	<?= $jbatal;?>
                	<small>Pesanan</small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
