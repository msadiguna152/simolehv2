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
                <form enctype="multipart/form-data" action="<?php echo site_url('page/admin/produk/insert')?>" method="post" onsubmit="return formValidasi()">
                <div class="row">
                  <div class="col-md-12">

                        <div class="form-group">
                          <label for="nama_produk">Nama Produk</label>
                          <input type="text" class="form-control" id="" name="nama_produk" required="" placeholder="Masukan Nama Produk...">
                        </div>

                        <div class="form-group">
                          <label for="id_kategori">Kategori</label>
                          <select type="text" id="id_kategori" name="id_kategori" class="form-control select2bs4" data-live-search="true" data-live-search-placeholder="Cari Kategori..." required="">
                            <option value="" hidden="">---Pilih Kategori---</option>
                            <?php foreach ($data_kategori->result() as $key): ?>
                              <option value="<?php echo $key->id_kategori?>"><?php echo $key->nama_kategori;?></option>
                              <?php endforeach;?>
                          </select>
                        </div>

                        <div class="form-group">
                          <label for="harga">Harga</label>
                          <input type="number" min="1" maxlength="12" class="form-control" id="harga1" name="harga" placeholder="Masukan Harga Produk..." required="">
                        </div>

                        <div class="form-group">
                          <label for="harga_promosi">Harga Promosi</label>
                          <input type="number" min="-1" maxlength="12" class="form-control" id="harga_promosi1" name="harga_promosi" placeholder="Masukan Harga Promosi Produk..." value="0">
                        </div>

                        <div class="form-group">
                          <label for="deskripsi">Deskripsi</label>
                          <textarea class="form-control" id="" name="deskripsi" placeholder="Masukan Deskripsi Produk..." required=""></textarea>
                        </div>

                        <div class="form-group">
                          <label for="gambar">Gambar Produk</label>
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" name="gambar" accept="image/*" required="" onchange="return validasiFile()">
                            <label class="custom-file-label" for="customFile">Pilih Foto (Maksimal 1 MB)</label>
                          </div>
                          <div id="pratinjauGambar"></div>
                        </div>

                        <div class="form-group">
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="promosi" id="promosi" value="1" class="custom-control-input" id="promosi">
                            <label class="custom-control-label" for="promosi">Promosi</label>
                          </div>
                        </div>

                        <div class="form-group">
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="terlaris" value="1" class="custom-control-input" id="terlaris">
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
    function formValidasi() {
      var get_harga = document.getElementById('harga1').value;
      var get_harga_promosi = document.getElementById('harga_promosi1').value;
      if (parseInt(get_harga_promosi)>parseInt(get_harga)) {
        alert('Harga Promosi Tidak Boleh Melebihi Harga Jual!');
        return false;
      }
    }
  </script>

  <!-- <script type="text/javascript">
    document.getElementById('promosi').onchange = function() {
        document.getElementById('harga_promosi1').readonly = !this.checked;
        document.getElementById('harga_promosi1').value = 0;

    };
  </script> -->
