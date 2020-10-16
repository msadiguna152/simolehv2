<?php

  $token2 = md5($get_token2);
  $token = $this->session->flashdata('token');

  if (!empty($token) AND $token==$token2) {
    foreach ($data_pembeli->result() as $data):
    $id_pembeli = $data->id_pembeli;
    $nama_pembeli = $data->nama_pembeli;
    $no_telpon = $data->no_telpon;
    $email = $data->email;
    $password = $data->password;
    endforeach;
  } else {
      echo '<script language="javascript">document.location="'.site_url('page/admin/pembeli').'";</script>';
  }
?>

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
                <form role="form" enctype="multipart/form-data" action="<?php echo site_url('page/admin/alamat/insert')?>" method="post" id="quickForm">
                <div class="row">
                  <div class="col-md-12">

                        <div class="form-group">
                          <label for="id_pembeli">Nama Pembeli</label>
                          <input disabled="" type="text" class="form-control" id="" name="nama_pembeli" required="" value="<?= $nama_pembeli; ?>">
                          <input type="text" hidden="" name="id_pembeli" required="" value="<?= $id_pembeli; ?>">
                        </div>

                        <div class="form-group">
                          <label for="alamat_lengkap">Alamat Lengkap</label>
                          <textarea class="form-control" id="" name="alamat_lengkap" required="" placeholder="Masukan Alamat Lengkap..."></textarea>
                        </div>

                        <div class="form-group">
                          <label for="rincian_alamat">Rincian Alamat</label>
                          <textarea class="form-control" id="" name="rincian_alamat" required="" placeholder="Masukan Rincian Alamat..."></textarea>
                        </div>

                        <div class="form-group">
                          <label for="lat">Latitude</label>
                          <input type="text" class="form-control" id="" name="lat" required="" value="" placeholder="Masukan Latitude...">
                        </div>

                        <div class="form-group">
                          <label for="long">Longitude</label>
                          <input type="text" class="form-control" id="" name="long" required="" value="" placeholder="Masukan Longitude...">
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

