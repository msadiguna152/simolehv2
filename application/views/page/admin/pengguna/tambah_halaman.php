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

          <div class="col-md-6 connectedSortable">

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
                <form role="form" enctype="multipart/form-data" action="<?php echo site_url('page/admin/pengguna/insert')?>" method="post" id="quickForm">
                <div class="row">
                  <div class="col-md-12">

                        <div class="form-group">
                          <label for="nama_pengguna">Nama Pengguna</label>
                          <input type="text" class="form-control" id="" name="nama_pengguna" required="" placeholder="Masukan Nama Pengguna...">
                        </div>

                        <div class="form-group">
                          <label for="no_telpon">No. Telpon</label>
                          <input type="text" class="form-control" id="" name="no_telpon" required="" placeholder="Masukan No. Telpon...">
                        </div>

                        <div class="form-group">
                          <label for="email">Email</label>
                          <input type="text" class="form-control" id="" name="email" required="" placeholder="Masukan Email...">
                        </div>

                        <div class="form-group">
                          <label for="username">Username</label>
                          <input type="text" class="form-control" id="" name="username" required="" placeholder="Masukan Username...">
                        </div>

                        <div class="form-group">
                          <label for="password">Password</label>
                          <input type="text" class="form-control" id="" name="password" required="" placeholder="Masukan Password...">
                        </div>

                        <div class="form-group">
                          <label for="level">Level</label>
                          <select type="text" id="level" name="level" class="form-control select2bs4" data-live-search="true" data-live-search-placeholder="Cari Level..." required="">
                            <option value="" hidden="">---Pilih Level---</option>
                            <option value="Admin">Admin</option>
                            <option value="Kurir">Kurir</option>
                            <option value="Pembeli">Pembeli</option>
                          </select>
                        </div>

                        <div class="form-group">
                          <label for="foto_pengguna">Foto Pengguna</label>
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" name="foto_pengguna" accept="image/*" required="" onchange="return validasiFile()">
                            <label class="custom-file-label" for="customFile">Pilih Foto (Maksimal 1 MB)</label>
                          </div>
                          <div id="pratinjauGambar"></div>
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

  <script type="text/javascript">
    function validasiFile(){
        var inputFile = document.getElementById('customFile');
        var pathFile = inputFile.value;
        var file_size = inputFile.files[0].size;
        if (file_size>1000000) {
          alert("File Tidak Boleh Lebih Dari 1 MB!")
          inputFile.value = '';
          return false;
        }
        if (inputFile.files && inputFile.files[0]) {
          var reader = new FileReader();
          reader.onload = function(e) {
            document.getElementById('pratinjauGambar').innerHTML = '<img src="'+e.target.result+'" class="img-thumbnail" style="height: 200px;">';
          };
          reader.readAsDataURL(inputFile.files[0]);
      }
    }
  </script>

  <script type="text/javascript">
    function validasiFile2(){
        var inputFile = document.getElementById('customFile2');
        var pathFile = inputFile.value;
        var file_size = inputFile.files[0].size;
        if (file_size>2000000) {
          alert("File Tidak Boleh Lebih Dari 2 MB!")
          inputFile.value = '';
          return false;
        }
    
    }
  </script>

