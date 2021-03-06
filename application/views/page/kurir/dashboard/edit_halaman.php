<?php
    foreach ($data_pengguna->result() as $data):
    $id_pengguna = $data->id_pengguna;
    $nama_pengguna = $data->nama_pengguna;
    $username = $data->username;
    $password = $data->password;
    $email = $data->email;
    $no_telpon = $data->no_telpon;
    $level = $data->level;
    $foto_pengguna = $data->foto_pengguna;
    endforeach;
?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-1">
          <div class="col-sm-6">
            <h5 class="m-0 text-dark">
              <?php 
              $menu = $this->session->userdata('menu');
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
                <h3 class="card-title">Ubah <?php echo ucwords($this->session->userdata('menu')); ?></h3>

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
                <form role="form" enctype="multipart/form-data" action="<?php echo site_url('page/kurir/pengguna/update')?>" method="post" id="quickForm" onsubmit="return formValidasi()">
                <div class="row">
                  <div class="col-md-12">

                        <div class="form-group">
                          <label for="nama_pengguna">Nama Pengguna</label>
                          <input type="text" class="form-control" id="" name="nama_pengguna" required="" value="<?= $nama_pengguna; ?>" placeholder="Masukan Nama Pengguna...">
                          <input type="text" hidden="" name="id_pengguna" value="<?= $id_pengguna; ?>">

                        </div>

                        <div class="form-group">
                          <label for="no_telpon">No. Telpon</label>
                          <input type="text" class="form-control" maxlength="13" onkeypress="return hanyaAngka(event)" name="no_telpon" required="" value="<?= $no_telpon; ?>" placeholder="Masukan No. Telpon...">
                        </div>

                        <div class="form-group">
                          <label for="email">Email</label>
                          <input type="text" class="form-control" id="" name="email" required="" value="<?= $email; ?>" placeholder="Masukan Email...">
                        </div>

                        <div class="form-group">
                          <label for="username">Username</label>
                          <input type="text" class="form-control" id="" name="username" required="" value="<?= $username; ?>" placeholder="Masukan Username...">
                        </div>

                        <div class="form-group">
                          <label for="password_baru">Password Baru</label>
                          <input type="password" class="form-control" id="password_baru" name="password_baru" placeholder="Masukan Password Baru..." required="">
                        </div>

                        <div class="form-group">
                          <label for="kon_password_baru">Konfirmasi Password Baru</label>
                          <input type="password" class="form-control" id="kon_password_baru" name="kon_password_baru" placeholder="Masukan Konfirmasi Password Baru..." required="">
                        </div>

                        <div class="form-group">
                          <label for="level">Level</label>
                          <select disabled="" type="text" id="level" name="level" class="form-control select2bs4" data-live-search="true" data-live-search-placeholder="Cari Level..." required="">
                            <option value="" hidden="">---Pilih Level---</option>
                            <option <?php if (htmlspecialchars($level)=="Admin") { echo "selected"; }?> value="Admin">Admin</option>
                            <option <?php if (htmlspecialchars($level)=="Kurir") { echo "selected"; }?> value="Kurir">Kurir</option>
                            <option <?php if (htmlspecialchars($level)=="Pembeli") { echo "selected"; }?> value="Pembeli">Pembeli</option>
                          </select>
                        </div>

                        <div class="form-group">
                          <label for="foto_pengguna">Foto Pengguna</label>
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" name="foto_pengguna" accept="image/*" onchange="return validasiFile()">
                            <label class="custom-file-label" for="customFile">Pilih Foto (Maksimal 1 MB)</label>
                          </div>
                          <div id="pratinjauGambar"><img src="<?php echo base_url()?>file/<?php echo $foto_pengguna; ?>" class="img-thumbnail" style="height: 100px; width: 100px;"></div>
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
    };

    function formValidasi() {
      var get_password_baru = document.getElementById('password_baru').value;
      var get_kon_password_baru = document.getElementById('kon_password_baru').value;
      if (get_password_baru!=get_kon_password_baru) {
        alert('Konfirmasi Password Tidak Sesuai!');
        return false;
      }
    };

    function hanyaAngka(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode
      if (charCode > 31 && (charCode < 48 || charCode > 57)){
        return false;
      }else {
        return true;
      }
    };
  </script>

