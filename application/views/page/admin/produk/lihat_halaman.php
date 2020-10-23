<?php

  $token2 = md5($get_token2);
  $token = $this->session->flashdata('token');
  if (!empty($token) AND $token==$token2) {
    foreach ($data_produk->result() as $data):
    $nama_kategori = $data->nama_kategori;
    $nama_produk = $data->nama_produk;
    $harga = $data->harga;
    $harga_promosi = $data->harga_promosi;
    $deskripsi = $data->deskripsi;
    $gambar = $data->gambar;
    $promosi = $data->promosi;
    $terlaris = $data->terlaris;
    $slug = $data->slug_p;
    endforeach;
  } else {
      echo '<script language="javascript">document.location="'.site_url('page/admin/produk').'";</script>';
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
                <div class="row">
                  <div class="col-md-6">
                    <img src="<?php echo base_url()?>file/<?php echo $gambar ?>" class="img-thumbnail" style="width:500px;">
                  </div>

                  <div class="col-md-6">

                        <div class="form-group">
                          <label for="nama_produk">Nama Produk</label>
                          <p class="text-justify"><?= htmlspecialchars($nama_produk); ?></p>
                        </div>

                        <div class="form-group">
                          <label for="id_kategori">Kategori</label>
                          <p class="text-justify"><?= htmlspecialchars($nama_kategori); ?></p>
                        </div>

                        <div class="form-group">
                          <label for="harga">Harga</label>
                          <p class="text-justify"><?= "Rp " . number_format(htmlspecialchars($harga),2,',','.'); ?></p>
                        </div>

                        <div class="form-group">
                          <label for="harga_promosi">Harga Promosi</label>
                          <p class="text-justify"><?= "Rp " . number_format(htmlspecialchars($harga_promosi),2,',','.'); ?></p>
                        </div>

                        <div class="form-group">
                          <label for="deskripsi">Deskripsi</label>
                          <p class="text-justify"><?= htmlspecialchars($deskripsi); ?></p>
                        </div>

                        <div class="form-group">
                            <label for="promosi">Promosi</label>
                            <?php
                              if ($promosi==1) {
                                echo '<i style="color: green;" class="fas fa-check"></i>';
                              } else {
                                echo '<i style="color: red;" class="fas fa-times"></i>';
                              }
                            ?> 
                        </div>

                        <div class="form-group">
                            <label for="promosi">Terlaris</label>
                            <?php
                              if ($terlaris==1) {
                                echo '<i style="color: green;" class="fas fa-check"></i>';
                              } else {
                                echo '<i style="color: red;" class="fas fa-times"></i>';
                              }
                            ?>
                        </div>
                        <div class="form-group">
                          <label for="slug_p">Slug Produk</label>
                          <p class="text-justify"><?= htmlspecialchars($slug); ?></p>
                        </div>

                  </div>

                </div>
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

