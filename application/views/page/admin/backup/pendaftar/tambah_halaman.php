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
                <form autocomplete="off" role="form" action="<?php echo site_url('page/admin/Pendaftar/insert')?>" enctype="multipart/form-data" method="post" id="quickForm">
                <div class="row">
                  <div class="col-md-6">
                        <div class="form-group">
                          <label for="nama_lengkap">Nama Lengkap</label>
                          <input type="text" class="form-control" id="" name="nama_lengkap" placeholder="Masukan Nama Lengkap..." required="">
                        </div>

                        <div class="form-group">
                          <label for="kode_pendaftar">NIK</label>
                          <input type="text" class="form-control" id="" onkeypress="return hanyaAngka(event)" name="kode_pendaftar" placeholder="Masukan NIK..." required="" maxlength="16">
                        </div>

                        <div class="form-group">
                          <label for="jenis_kelamin">Jenis Kelamin</label>
                          <select class="form-control select2bs4" style="width: 100%;" id="" name="jenis_kelamin" data-placeholder="Pilih Jenis Kelamin" required="">
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                          </select>
                        </div>

                        <div class="form-group">
                          <label for="tempat_lahir">Tempat Lahir</label>
                          <input type="text" class="form-control" id="" name="tempat_lahir" placeholder="Masukan Tempat Lahir..." required="">
                        </div>

                        <div class="form-group">
                          <label for="tanggal_lahir">Tanggal Lahir</label>
                          <input type="text" class="form-control" id="" name="tanggal_lahir" placeholder="Masukan Tanggal Lahir..." required="" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                        </div>

                        <div class="form-group">
                          <label for="email">E-mail</label>
                          <input type="email" class="form-control" id="" name="email" placeholder="Masukan E-mail..." required="">
                        </div>

                  </div>

                  <div class="col-md-6">
                        <div class="form-group">
                          <label for="nomor_hp">Nomor HP (WA)</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text">+62</span>
                            </div>
                            <input type="text" class="form-control" id="" name="nomor_hp" onkeypress="return hanyaAngka(event)" placeholder="Masukan Nomor HP (WA)..." required="" maxlength="12">
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="alamat">Alamat</label>
                          <textarea class="form-control" id="" name="alamat" placeholder="Masukan Alamat..." required=""></textarea>
                        </div>

                        <div class="form-group">
                          <label for="pekerjaan">Pekerjaan</label>
                          <input type="text" class="form-control" id="" name="pekerjaan" placeholder="Masukan Pekerjaan..." required="">
                        </div>

                        <div class="form-group">
                          <label for="pendidikan_terakhir">Pendidikan Terakhir</label>
                          <input type="text" class="form-control" id="" name="pendidikan_terakhir" placeholder="Masukan Pendidikan Terakhir..." required="">
                        </div>

                        <div class="form-group">
                          <label for="dokumen">File</label>
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile2" name="dokumen" required="" accept="application/zip,application/rar" onchange="return validasiFile2()">
                            <label class="custom-file-label" for="customFile">Pilih File (Maksimal 5 MB)</label>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="alasan_mendaftar">Alasan Mendaftar</label>
                          <textarea class="form-control" id="" name="alasan_mendaftar" placeholder="Masukan Alasan Mendaftar..." required=""></textarea>
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

  <script>
    function hanyaAngka(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode
      if (charCode > 31 && (charCode < 48 || charCode > 57)){
        return false;
      }else {
        return true;
      }
    }
    function validasiFile2(){
      var inputFile = document.getElementById('customFile2');
      var pathFile = inputFile.value;
      var file_size = inputFile.files[0].size;
      if (file_size>5000000) {
        alert("File Tidak Boleh Lebih Dari 5 MB!")
        inputFile.value = '';
        return false;
      }
    }
  </script>
