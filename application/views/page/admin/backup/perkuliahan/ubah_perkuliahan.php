<?php foreach($edit_data->result() as $data) :
    $nim= $data->nim;
    $nip = $data->nip;
    $kode_mk = $data->kode_mk;
    $id_perkuliahan = $data->id_perkuliahan;
    $nilai = $data->nilai;
endforeach; ?>

  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Perkuliahan</a>
        </li>
        <li class="breadcrumb-item active">Ubah Perkuliahan</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-edit"></i> UBAH DATA PERKULIAHAN
        </div>
        <div class="card-body">
          <form class="form-horizontal" method="post" action="<?php echo site_url()?>admin/Perkuliahan/update">

              <div class="row clearfix">
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                  <label for="nim">Mahasiswa</label>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                  <div class="form-group">
                    <div class="form-line">
                      <select id="nim" name="nim" class="form-control selectpicker" data-live-search="true" data-live-search-placeholder="Cari Mahasiswa...">
                        <option value="" hidden="">---Pilih Mahasiswa---</option>
                        <?php foreach ($data_mahasiswa->result() as $key): ?>
                          <option <?php if($key->nim==$nim){echo "selected"; } ?> value="<?php echo $key->nim?>"><?php echo $key->nama_mhs?> (<?php echo $key->nim?>)</option>
                          <?php endforeach;?>
                      </select>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row clearfix">
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                  <label for="nip">Dosen</label>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                  <div class="form-group">
                    <div class="form-line">
                      <select type="text" id="nip" name="nip" class="form-control selectpicker" data-live-search="true" data-live-search-placeholder="Cari Dosen...">
                        <option value="" hidden="">---Pilih Dosen---</option>
                        <?php foreach ($data_dosen->result() as $key): ?>
                          <option <?php if($key->nip==$nip){echo "selected"; } ?> value="<?php echo $key->nip?>"><?php echo $key->nama_dosen?> (<?php echo $key->nip?>)</option>
                          <?php endforeach;?>
                      </select>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row clearfix">
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                  <label for="kode_mk">Mata Kuliah</label>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                  <div class="form-group">
                    <div class="form-line">
                      <select type="text" id="kode_mk" name="kode_mk" class="form-control selectpicker" data-live-search="true" data-live-search-placeholder="Cari Mata Kuliah...">
                        <option value="" hidden="">---Pilih Mata Kuliah---</option>
                        <?php foreach ($data_matakuliah->result() as $key): ?>
                          <option <?php if($key->kode_mk==$kode_mk){echo "selected"; } ?> value="<?php echo $key->kode_mk?>"><?php echo $key->nama_mk?></option>
                          <?php endforeach;?>
                      </select>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row clearfix">
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                  <label for="nilai">Nilai</label>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                  <div class="form-group">
                      <input type="text" id="id_perkuliahan" hidden="" name="id_perkuliahan" value="<?php echo $id_perkuliahan ?>">
                      <input type="text" maxlength="1" id="nilai" name="nilai" class="form-control date" placeholder="Masukan Nilai..." required="Tidak Boleh Kosong" onkeypress="return hanyaAngka(event)" value="<?php echo $nilai ?>" >
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

