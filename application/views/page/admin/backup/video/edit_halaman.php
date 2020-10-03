<?php

  $token2 = md5($get_token2);
  $token = $this->session->flashdata('token');

  if (!empty($token) AND $token==$token2) {
    foreach ($data_video->result() as $data):
    $id_video = $data->id_video;
    $id_pengguna = $data->id_pengguna;
    $nama_pengguna = $data->nama_pengguna;
    $judul_video = $data->judul_video;
    $deskripsi_video = $data->deskripsi_video;
    $tanggal_video = $data->tanggal_video;
    $status_video = $data->status_video;
    $url_video = $data->url_video;
    endforeach;
  } else {
      echo '<script language="javascript">document.location="'.site_url('page/admin/Video').'";</script>';
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
                <form role="form" enctype="multipart/form-data" action="<?php echo site_url('page/admin/Video/update')?>" method="post" id="quickForm">
                <div class="row">
                  <div class="col-md-6">
                        <div class="form-group">
                          <label for="nama_pengguna">Penulis</label>
                          <input type="text" class="form-control" id="" name="nama_pengguna" readonly="" value="<?php echo $nama_pengguna; ?>">
                          <input type="text" hidden="" name="id_pengguna" value="<?php echo $id_pengguna; ?>">
                          <input type="text" hidden="" name="id_video" value="<?php echo $id_video; ?>">

                        </div>
                        <div class="form-group">
                          <label for="judul_video">Judul Video</label>
                          <input type="text" class="form-control" id="" name="judul_video" value="<?php echo $judul_video; ?>" placeholder="Masukan Judul Video..." required="">
                        </div>
                        <div class="form-group">
                          <label for="tanggal_video">Tanggal Dibuat</label>
                          <input type="text" class="form-control" id="" name="tanggal_video" value="<?php echo $tanggal_video; ?>" readonly="">
                        </div>

                        <div class="form-group">
                          <label for="url_video">URL Video</label>
                          <input type="text" class="form-control" id="" name="url_video" value="<?php echo $url_video; ?>" placeholder="Masukan URL Video..." required="">
                        </div>
                        <div class="form-group">
                          <label for="status_video">Status Video</label>
                          <select class="form-control" id="" name="status_video" value="<?php echo $url_video; ?>" required="">
                            <option value="Aktif">Aktif</option>
                            <option value="Tidak Aktif">Tidak Aktif</option>
                          </select>
                        </div>
                  </div>
                  <div class="col-md-6">

                        <div class="form-group">
                          <label for="deskripsi_video">Deskripsi Video</label> 
                          <textarea class="form-control" name="deskripsi_video" placeholder="Masukan Deskripsi Video"><?php echo $deskripsi_video; ?></textarea>
                        </div>
                        <div class="form-group">
                          <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/1ujVI2WdJCI" frameborder="1" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                          </div>
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

