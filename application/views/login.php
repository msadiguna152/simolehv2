  <!-- Content Wrapper. Contains page content -->
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