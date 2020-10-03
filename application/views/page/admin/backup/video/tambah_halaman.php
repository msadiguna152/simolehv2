  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-1">
          <div class="col-sm-6">
            <h5 class="m-0 text-dark">
              <?php 
              $menu = $this->session->userdata('menu')." / ".$this->session->userdata('aksi')." data";
              echo strtoupper($menu);
              ?>
            </h5>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <!-- Main row -->
        <div class="row">

          <div class="col-md-12 connectedSortable">

            <!-- PRODUCT LIST -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><?php echo strtoupper($this->session->userdata('aksi')." data"); ?></h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form" enctype="multipart/form-data" action="<?php echo site_url('page/admin/Video/insert')?>" method="post" id="quickForm">
                <div class="row">
                  <div class="col-md-6">
                        <div class="form-group">
                          <label for="nama_pengguna">Penulis</label>
                          <input type="text" class="form-control" id="" name="nama_pengguna" readonly="" value="<?php echo $this->session->userdata('nama_pengguna'); ?>">
                          <input type="text" hidden="" name="id_pengguna" value="<?php echo $this->session->userdata('id_pengguna'); ?>">
                        </div>
                        <div class="form-group">
                          <label for="judul_video">Judul Video</label>
                          <input type="text" class="form-control" id="" name="judul_video" placeholder="Masukan Judul Video..." required="">
                        </div>
                        <div class="form-group">
                          <label for="tanggal_video">Tanggal Dibuat</label>
                          <input type="text" class="form-control" id="" name="tanggal_video" value="<?php echo date('d/m/Y')?>" readonly="">
                        </div>

                        <div class="form-group">
                          <label for="url_video">URL Video</label>
                          <input type="text" class="form-control" id="" name="url_video" placeholder="Masukan URL Video..." required="">
                        </div>
                  </div>
                  <div class="col-md-6">

                        <div class="form-group">
                          <label for="deskripsi_video">Deskripsi Video</label> 
                          <textarea class="form-control" name="deskripsi_video" placeholder="Masukan Deskripsi Video"></textarea>
                        </div>

                  </div>
                </div>
                <div class="row">
                  <div class="col-md-2">
                    <div class="form-group">
                      <button type="submit" name="simpan" class="btn btn-primary btn-block btn-sm">Simpan</button>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <button type="reset" name="reset" class="btn btn-danger btn-block btn-sm">Reset</button>
                    </div>
                  </div>
                </div>
                </form>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>

