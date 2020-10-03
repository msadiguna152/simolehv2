<?php foreach($edit_data->result() as $data) :
    $nim= $data->nim;
    $nama_mhs = $data->nama_mhs;
    $tmp_lahir = $data->tmp_lahir;

    $date1  = date_create($data->tgl_lahir);
    $tgl_lahir = date_format($date1,'d/m/Y');

    $jenis_kelamin = $data->jenis_kelamin;
    $alamat = $data->alamat;

endforeach; ?>

  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Mahasiswa</a>
        </li>
        <li class="breadcrumb-item active">Ubah Mahasiswa</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-edit"></i> UBAH DATA MAHASISWA
        </div>
        <div class="card-body">
          <form class="form-horizontal" method="post" action="<?php echo site_url()?>admin/Mahasiswa/update">

              <div class="row clearfix">
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                  <label for="nim">NIM</label>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                  <div class="form-group">
                    <div class="form-line">
                      <input type="text" id="nim" name="nim" class="form-control" readonly="" value="<?php echo $nim; ?>">
                    </div>
                  </div>
                </div>
              </div>

              <div class="row clearfix">
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                  <label for="nama_mhs">Nama Mahasiswa</label>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                  <div class="form-group">
                    <div class="form-line">
                      <input type="text" id="nama_mhs" name="nama_mhs" class="form-control" required="" autocomplete="off" autofocus="" value="<?php echo $nama_mhs; ?>">
                    </div>
                  </div>
                </div>
              </div>

              <div class="row clearfix">
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                  <label for="tmp_lahir">Tempat Lahir</label>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                  <div class="form-group">
                    <div class="form-line">
                      <input type="text" id="tmp_lahir" name="tmp_lahir" class="form-control" required="" autocomplete="off" autofocus="" value="<?php echo $tmp_lahir; ?>">
                    </div>
                  </div>
                </div>
              </div>

              <div class="row clearfix">
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                  <label for="tgl_lahir">Tanggal Lahir</label>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                  <div class="form-group">
                      <input type="text" id="datepicker" name="tgl_lahir" class="form-control" placeholder="Masukan Tanggal Lahir..." autocomplete="off" value="<?php echo $tgl_lahir; ?>">
                  </div>
                </div>
              </div>

              <div class="row clearfix">
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                  <label for="jenis_kelamin">Jenis Kelamin</label>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                  <div class="form-group">
                    <select id="jenis_kelamin" name="jenis_kelamin" class="form-control" required="Tidak Boleh Kosong">
                      <option value="">---Pilih Jenis Kelamin---</option>
                      <option <?php if('Laki-laki'==$jenis_kelamin ){echo "selected"; } ?> value="Laki-laki">Laki-laki</option>
                      <option <?php if('Perempuan'==$jenis_kelamin ){echo "selected"; } ?> value="Perempuan">Perempuan</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="row clearfix">
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                  <label for="alamat">Alamat</label>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                  <div class="form-group">
                    <div class="form-line">
                      <textarea id="alamat" name="alamat" class="form-control" required=""><?php echo $alamat; ?></textarea>
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-group" align="center">
                <button class="btn btn-primary" type="submit">UBAH</button>
                <button class="btn btn-default" type="reset">BATAL</button>
                <button class="btn btn-danger" type="reset" onclick="window.history.back();">KEMBALI</button>
              </div>
          </form>
        </div>
        <div class="card-footer small text-muted"></div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->

