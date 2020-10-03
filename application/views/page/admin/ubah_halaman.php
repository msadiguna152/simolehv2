<?php 
foreach ($data_pengguna->result() as $data):
  $id_pengguna = $data->id_pengguna;
  $nama_pengguna = $data->nama_pengguna;
  $foto_pengguna = $data->foto_pengguna;
  $username = $data->username;
  $foto_pengguna = $data->foto_pengguna;
  $status_login = $data->status_login;
  $level = $data->level;

endforeach;
?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-0">
          <div class="col-sm-6">
            <h5 class="m-0 text-dark">
              <?php 
              $menu = $this->session->userdata('menu');
              echo strtoupper($menu);
              ?>
            </h5>
          </div><!-- /.col -->
          <label hidden=""<?php if ($this->session->flashdata('hasil')=="berhasillogin") { echo 'class="berhasillogin"';}?>></label>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="<?php echo base_url()?>profile/<?= $this->session->userdata('foto_pengguna'); ?>"
                       alt="User profile picture">
                </div>
                <h3 class="profile-username text-center"><?= $this->session->userdata('nama_pengguna'); ?></h3>
                <p class="text-muted text-center"><?= $this->session->userdata('level'); ?></p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Pengaturan</a></li>
                  <li class="nav-item"><a class="nav-link" href="#data_diri" data-toggle="tab">Data Diri</a></li>
                  <li class="nav-item"><a class="nav-link" href="#kontak" data-toggle="tab">Kontak</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane" id="data_diri">
                    <?php
                      foreach ($data_pendaftar->result() as $data):
                      $id_pendaftar = $data->id_pendaftar;
                      $nama_lengkap = $data->nama_lengkap;
                      $kode_pendaftar = $data->kode_pendaftar;
                      $jenis_kelamin = $data->jenis_kelamin;
                      $tempat_lahir = $data->tempat_lahir;
                      $tanggal_lahir = $data->tanggal_lahir;
                      $email = $data->email;
                      $nomor_hp = $data->nomor_hp;
                      $alamat = $data->alamat;
                      $pekerjaan = $data->pekerjaan;
                      $pendidikan_terakhir = $data->pendidikan_terakhir;
                      $dokumen = $data->dokumen;
                      $alasan_mendaftar = $data->alasan_mendaftar;
                      $tanggal_pendaftar = $data->tanggal_pendaftar;
                      $status_pendaftar = $data->status_pendaftar;
                      endforeach;
                    ?>
                    <form role="form" action="<?php echo site_url('page/admin/Pendaftar/update')?>" enctype="multipart/form-data" method="post" id="quickForm">
                      <div class="row">
                        <div class="col-md-6">
                              <div class="form-group">
                                <label for="nama_lengkap">Nama Lengkap</label>
                                <input type="text" class="form-control" id="" name="nama_lengkap" placeholder="Masukan Nama Lengkap..." value="<?php echo $nama_lengkap; ?>" required="">
                                <input type="text" class="form-control" id="" hidden="" name="id_pendaftar" value="<?php echo $id_pendaftar; ?>" required="">
                              </div>

                              <div class="form-group">
                                <label for="kode_pendaftar">NIK</label>
                                <input maxlength="16" type="text" class="form-control" id="" name="kode_pendaftar" placeholder="Masukan NIK..." value="<?php echo $kode_pendaftar; ?>" required="" onkeypress="return hanyaAngka(event)">
                              </div>

                              <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <select class="form-control select2bs4" style="width: 100%;" id="" name="jenis_kelamin" data-placeholder="Pilih Jenis Kelamin" required="">
                                  <option value="">Pilih Jenis Kelamin</option>
                                  <option <?php if ($jenis_kelamin=="Laki-laki") { echo 'selected=""';}?> value="Laki-laki">Laki-laki</option>
                                  <option <?php if ($jenis_kelamin=="Perempuan") { echo 'selected=""';}?> value="Perempuan">Perempuan</option>
                                </select>
                              </div>

                              <div class="form-group">
                                <label for="tempat_lahir">Tempat Lahir</label>
                                <input type="text" class="form-control" id="" name="tempat_lahir" placeholder="Masukan Tempat Lahir..." value="<?php echo $tempat_lahir; ?>" required="">
                              </div>

                              <div class="form-group">
                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                <input type="text" class="form-control" id="" name="tanggal_lahir" placeholder="Masukan Tanggal Lahir..." value="<?php echo $tanggal_lahir; ?>" required="" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                              </div>

                              <div class="form-group">
                                <label for="email">E-mail</label>
                                <input type="email" class="form-control" id="" name="email" placeholder="Masukan E-mail..." value="<?php echo $email; ?>" required="">
                              </div>

                              <div class="form-group">
                                <label for="nomor_hp">Nomor HP (WA)</label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text">+62</span>
                                  </div>
                                  <input type="text" class="form-control" id="" name="nomor_hp" onkeypress="return hanyaAngka(event)" placeholder="Masukan Nomor HP (WA)..." required="" maxlength="12" value="<?php echo $nomor_hp; ?>">
                                </div>
                              </div>

                        </div>

                        <div class="col-md-6">

                              <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea class="form-control" id="" name="alamat" placeholder="Masukan Alamat..." required=""><?php echo $alamat; ?></textarea>
                              </div>
                              
                              <div class="form-group">
                                <label for="pekerjaan">Pekerjaan</label>
                                <input type="text" class="form-control" id="" name="pekerjaan" placeholder="Masukan Pekerjaan..." value="<?php echo $pekerjaan; ?>" required="">
                              </div>

                              <div class="form-group">
                                <label for="pendidikan_terakhir">Pendidikan Terakhir</label>
                                <input type="text" class="form-control" id="" name="pendidikan_terakhir" placeholder="Masukan Pendidikan Terakhir..." value="<?php echo $pendidikan_terakhir; ?>" required="">
                              </div>

                              <div class="form-group">
                                <label for="dokumen">File</label>
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" id="customFile" name="dokumen">
                                  <label class="custom-file-label" for="customFile"><?php echo $dokumen; ?></label>
                                </div>
                                <label for="dokumen">Download : <a href="<?php echo site_url('page/admin/Pendaftar/download_dokumen')?>?file=<?php echo $dokumen; ?>" target="_BLANK"><?php echo $dokumen; ?></a></label>
                              </div>

                              <div class="form-group">
                                <label for="alasan_mendaftar">Alasan Mendaftar</label>
                                <textarea class="form-control" id="" name="alasan_mendaftar" placeholder="Masukan Alasan Mendaftar..." required=""><?php echo $alasan_mendaftar; ?></textarea>
                              </div>

                              <div class="form-group">
                                <label for="tanggal_pendaftar">Tanggal Pendaftar</label>
                                <input type="text" class="form-control" id="" name="tanggal_pendaftar" readonly="" value="<?php echo $tanggal_pendaftar; ?>" >
                              </div>

                              <div class="form-group">
                                <label for="status_pendaftar">Status Pendaftar</label>
                                <select class="form-control select2bs4" style="width: 100%;" id="" name="status_pendaftar" data-placeholder="Pilih Status Pendaftar" required="">
                                  <option value="">Pilih JStatus Pendaftar</option>
                                  <option <?php if ($status_pendaftar=="Aktif") { echo 'selected=""';}?> value="Aktif">Aktif</option>
                                  <option <?php if ($status_pendaftar=="Tidak Aktif") { echo 'selected=""';}?> value="Tidak Aktif">Tidak Aktif</option>
                                </select>
                              </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-2">
                          <div class="form-group">
                            <button type="submit" name="simpan" class="btn btn-primary btn-block btn-sm">Update</button>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="tab-pane" id="kontak">
                    <?php foreach ($data_sosmed->result() as $data):?>
                      <div class="form-group">
                        <a target="_BLANK" href="<?= $data->url_sosmed; ?>"><img class="img img-rounded" style="height: 30px" src="<?php echo base_url()?>assets/<?php echo strtolower($data->jenis_sosmed).'.png' ?>"> <?= $data->nama_sosmed; ?></a>
                      </div>
                    <?php endforeach; ?>
                  </div>
                  <div class="tab-pane active" id="settings">
                    <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo base_url()?>page/admin/Admin/update" method="post" onsubmit="return formValidasi()">

                      <div class="form-group row">
                        <label for="nama_pengguna" class="col-sm-2 col-form-label">Nama Pengguna</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="username" name="nama_pengguna" value="<?= $nama_pengguna; ?>">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="username" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="username" name="username" value="<?= $username; ?>">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="password_baru" class="col-sm-2 col-form-label">Password Baru</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" id="password_baru" name="password_baru" placeholder="Masukan Password Baru...">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="kon_password_baru" class="col-sm-2 col-form-label">Konfirmasi Password Baru</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" id="kon_password_baru" name="kon_password_baru" placeholder="Masukan Konfirmasi Password Baru...">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="foto_pengguna" class="col-sm-2 col-form-label">Foto Profile</label>
                        <div class="col-sm-10">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="foto_pengguna" name="foto_pengguna" accept="image/" onchange="return validasiFile()">
                            <label class="custom-file-label" for="foto_pengguna">Pilih Foto (Maksimal 1 MB)</label>
                          </div>
                          <div id="pratinjauGambar"></div>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="level" class="col-sm-2 col-form-label">Level</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="level" name="level" value="<?= $level; ?>" readonly="">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>

  </div>

  <script type="text/javascript">
    function validasiFile(){
        var inputFile = document.getElementById('foto_pengguna');
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

    function formValidasi() {
      var get_password_baru = document.getElementById('password_baru').value;
      var get_kon_password_baru = document.getElementById('kon_password_baru').value;
      if (get_password_baru!=get_kon_password_baru) {
        alert('Konfirmasi Password Tidak Sesuai!');
        return false;
      }
    }
  </script>

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
