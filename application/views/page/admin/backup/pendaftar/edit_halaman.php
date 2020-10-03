<?php

  $token2 = md5($get_token2);
  $token = $this->session->flashdata('token');

  if (!empty($token) AND $token==$token2) {
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
  } else {
      echo '<script language="javascript">document.location="'.site_url('page/admin/Pendaftar').'";</script>';
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
                            <input type="text" class="form-control" id="" name="kode_pendaftar" placeholder="Masukan NIK..." value="<?php echo $kode_pendaftar; ?>" required="">
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
                            <input type="text" class="form-control" id="" name="nomor_hp" placeholder="Masukan Nomor HP (WA)..." value="<?php echo $nomor_hp; ?>" required="">
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
