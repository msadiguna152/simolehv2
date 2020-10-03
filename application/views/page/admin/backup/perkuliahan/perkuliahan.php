  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Perkuliahan</a>
        </li>
        <li class="breadcrumb-item active">Halaman Perkuliahan</li>
      </ol>

      <div class="row">
        <div class="col-xl-2 col-sm-6 mb-3">
          <a data-toggle="modal" data-target="#Modaltambahdata">
            <button class="btn btn-primary btn-block"><i class="fa fa-plus"></i> Tambah Data</button>
          </a>
        </div>
      </div>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Data Perkuliahan
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="example" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama / NIM</th>
                  <th>Mata Kuliah</th>
                  <th>Dosen</th>
                  <th>Nilai</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>No</th>
                  <th>Nama / NIM</th>
                  <th>Mata Kuliah</th>
                  <th>Dosen</th>
                  <th>Nilai</th>
                  <th>Aksi</th>
                </tr>
              </tfoot>
              <tbody>
                <?php $no=1; foreach ($data_perkuliahan->result() as $key): ?>
                <tr>
                  <td><?php echo $no ?></td>
                  <td><?php echo $key->nama_mhs ?> / <?php echo $key->nim ?></td>
                  <td><?php echo $key->nama_mk ?></td>
                  <td><?php echo $key->nama_dosen ?></td>
                  <td><?php echo $key->nilai ?></td>
                  <td align="center">
                    <!-- Tombol Edit -->
                    <a href="<?php echo base_url()?>admin/Perkuliahan/edit?id_perkuliahan=<?php echo $key->id_perkuliahan ?>" class="modal-with-form">
                      <button class="btn bg-blue-grey waves-effect" data-toggle="tooltip" data-placement="bottom" title="Edit Data Perkuliahan <?php echo $key->nama_mhs ?>"><i class="fa fa-edit"></i></button>
                    </a>
                    <!-- Tombol Delete -->
                    <a href="<?php echo base_url()?>admin/Perkuliahan/delete?id_perkuliahan=<?php echo $key->id_perkuliahan ?>" onclick="return confirm('Apa Anda Yakin Akan Menghapus Data <?php echo $key->nama_mhs ?> ?')">
                      <button class="btn bg-red waves-effect" data-toggle="tooltip" data-placement="bottom" title="Hapus Data Perkuliahan <?php echo $key->nama_mhs ?>"><i class="fa fa-trash-o"></i></button>
                    </a>
                  </td>
                </tr>
                <?php $no++; endforeach;?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted"></div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->

    <!-- Modal Tambah Data-->
    <div class="modal fade" id="Modaltambahdata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="Modaltambahdata4" align="text-center">MASUKAN DATA PERKULIAHAN</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">x</span>
            </button>
          </div>
          <form class="form-horizontal" method="post" action="<?php echo site_url()?>admin/Perkuliahan/insert">
          <div class="modal-body">

            <div class="row clearfix">
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                  <label for="nim">Mahasiswa</label>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                  <div class="form-group">
                    <div class="form-line">
                      <select id="nim" name="nim" class="form-control selectpicker" data-live-search="true" data-live-search-placeholder="Cari Mahasiswa..." required="">
                        <option value="" hidden="">---Pilih Mahasiswa---</option>
                        <?php foreach ($data_mahasiswa->result() as $key): ?>
                          <option value="<?php echo $key->nim?>"><?php echo $key->nama_mhs?> (<?php echo $key->nim?>)</option>
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
                      <select type="text" id="nip" name="nip" class="form-control selectpicker" data-live-search="true" data-live-search-placeholder="Cari Dosen..." required="">
                        <option value="" hidden="">---Pilih Dosen---</option>
                        <?php foreach ($data_dosen->result() as $key): ?>
                          <option value="<?php echo $key->nip?>"><?php echo $key->nama_dosen?> (<?php echo $key->nip?>)</option>
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
                      <select type="text" id="kode_mk" name="kode_mk" class="form-control selectpicker" data-live-search="true" data-live-search-placeholder="Cari Mata Kuliah..." required="">
                        <option value="" hidden="">---Pilih Mata Kuliah---</option>
                        <?php foreach ($data_matakuliah->result() as $key): ?>
                          <option value="<?php echo $key->kode_mk?>"><?php echo $key->nama_mk?></option>
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
                      <input maxlength="1" type="text" id="nilai" name="nilai" class="form-control date" placeholder="Masukan Nilai..." required="Tidak Boleh Kosong" onkeypress="return hanyaAngka(event)">
                  </div>
                </div>
              </div>

          </div>
          <div class="modal-footer justify-content-center">
            <button class="btn btn-primary" type="submit">SIMPAN</button>
            <button class="btn btn-default" type="reset">BATAL</button>
            <button class="btn btn-danger" type="reset" data-dismiss="modal">TUTUP</button>
          </div>
          </form>
        </div>
      </div>
    </div>

        <script>
            function hanyaAngka(evt) {
              var charCode = (evt.which) ? evt.which : event.keyCode
               if (charCode > 31 && (charCode < 48 || charCode > 57))
         
              return false;
              return true;
            }
        </script>


