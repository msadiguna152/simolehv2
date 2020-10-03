<?php

  $token2 = md5($get_token2);
  $token = $this->session->flashdata('token');

  if (!empty($token) AND $token==$token2) {
    foreach ($data_produk->result() as $data):
    $id_produk = $data->id_produk;
    $id_kategori = $data->id_kategori;
    $nama_produk = $data->nama_produk;
    $harga = $data->harga;
    $harga_promosi = $data->harga_promosi;
    $deskripsi = $data->deskripsi;
    $gambar = $data->gambar;
    $promosi = $data->promosi;
    $terlaris = $data->terlaris;

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
                <form role="form" enctype="multipart/form-data" action="<?php echo site_url('page/admin/produk/update')?>" method="post" id="quickForm">
                <div class="row">
                  <div class="col-md-6">

                        <div class="form-group">
                          <label for="nama_produk">Nama Produk</label>
                          <input type="text" class="form-control" id="" name="nama_produk" required="" value="<?= htmlspecialchars($nama_produk); ?>">
                          <input type="text" class="form-control" id="" name="id_produk" required="" value="<?= htmlspecialchars($id_produk); ?>">

                        </div>

                        <div class="form-group">
                          <label for="id_kategori">Kategori</label>
                          <select type="text" id="id_kategori" name="id_kategori" class="form-control select2bs4" data-live-search="true" data-live-search-placeholder="Cari Kategori..." required="">
                            <option value="" hidden="">---Pilih Kategori---</option>
                            <?php foreach ($data_kategori->result() as $key): ?>
                              <option <?php if (htmlspecialchars($id_kategori)==$key->id_kategori) { echo "selected"; }?> value="<?php echo $key->id_kategori?>"><?php echo $key->nama_kategori;?></option>
                              <?php endforeach;?>
                          </select>
                        </div>

                        <div class="form-group">
                          <label for="harga">Harga</label>
                          <input type="number" min="1" maxlength="12" class="form-control" id="" name="harga" value="<?= htmlspecialchars($harga); ?>" required="">
                        </div>

                        <div class="form-group">
                          <label for="harga_promosi">Harga Promosi</label>
                          <input type="number" min="-1" maxlength="12" class="form-control" id="" name="harga_promosi" value="<?= htmlspecialchars($harga_promosi); ?>" required="">
                        </div>

                        <div class="form-group">
                          <label for="deskripsi">Deskripsi</label>
                          <textarea class="form-control" id="" name="deskripsi" placeholder="Masukan Deskripsi Produk..." required=""><?= htmlspecialchars($deskripsi); ?></textarea>
                        </div>

                        <div class="form-group">
                          <label for="gambar">Gambar Produk</label>
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" name="gambar" accept="image/*" onchange="return validasiFile()">
                            <label class="custom-file-label" for="customFile">Pilih Foto (Maksimal 1 MB)</label>
                          </div>
                          <div id="pratinjauGambar"><img src="<?php echo base_url()?>file/<?php echo $gambar ?>" class="img-thumbnail" style="height: 200px;"></div>
                        </div>

                        <div class="form-group">
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="promosi" <?php if (htmlspecialchars($promosi)==1) { echo "checked"; }?> value="1" class="custom-control-input" id="promosi">
                            <label class="custom-control-label" for="promosi">Promosi</label>
                          </div>
                        </div>

                        <div class="form-group">
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="terlaris" <?php if (htmlspecialchars($terlaris)==1) { echo "checked"; }?> value="1" class="custom-control-input" id="terlaris">
                            <label class="custom-control-label" for="terlaris">Terlaris</label>
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

