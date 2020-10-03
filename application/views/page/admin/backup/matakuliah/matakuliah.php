  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Mata Kuliah</a>
        </li>
        <li class="breadcrumb-item active">Halaman Mata Kuliah</li>
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
          <i class="fa fa-table"></i> Data Mata Kuliah
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="example" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Kode MK</th>
                  <th>Mata Kuliah</th>
                  <th>SKS</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>No</th>
                  <th>Kode MK</th>
                  <th>Mata Kuliah</th>
                  <th>SKS</th>
                  <th>Aksi</th>
                </tr>
              </tfoot>
              <tbody>
                <?php $no=1; foreach ($data_matakuliah->result() as $key): ?>
                <tr>
                  <td><?php echo $no ?></td>
                  <td><?php echo $key->kode_mk ?></td>
                  <td><?php echo $key->nama_mk ?></td>
                  <td><?php echo $key->sks ?></td>
                  <td align="center">
                    <!-- Tombol Edit -->
                    <a href="<?php echo base_url()?>admin/Matakuliah/edit?kode_mk=<?php echo $key->kode_mk ?>" class="modal-with-form">
                      <button class="btn bg-blue-grey waves-effect" data-toggle="tooltip" data-placement="bottom" title="Edit Data <?php echo $key->nama_mk ?>"><i class="fa fa-edit"></i></button>
                    </a>
                    <!-- Tombol Delete -->
                    <a href="<?php echo base_url()?>admin/Matakuliah/delete?kode_mk=<?php echo $key->kode_mk ?>" onclick="return confirm('Apa Anda Yakin Akan Menghapus Data <?php echo $key->nama_mk ?> ?')">
                      <button class="btn bg-red waves-effect" data-toggle="tooltip" data-placement="bottom" title="Hapus Data <?php echo $key->nama_mk ?>"><i class="fa fa-trash-o"></i></button>
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
            <h5 class="modal-title" id="Modaltambahdata4" align="text-center">MASUKAN DATA MATA KULIAH</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">x</span>
            </button>
          </div>
          <form class="form-horizontal" method="post" action="<?php echo site_url()?>admin/Matakuliah/insert">
          <div class="modal-body">


              <div class="row clearfix">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-5 form-control-label">
                  <label for="kode_mk">Kode Mata Kuliah</label>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-7">
                  <div class="form-group">
                      <input type="text" id="kode_mk" name="kode_mk" class="form-control date" readonly="" value="<?php echo $kode_otomatis; ?>"  >
                  </div>
                </div>
              </div>

              <div class="row clearfix">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-5 form-control-label">
                  <label for="nama_mk">Nama Mata Kuliah</label>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-7">
                  <div class="form-group">
                      <input type="text" id="nama_mk" name="nama_mk" class="form-control date" placeholder="Masukan Nama Mata Kuliah..." required="Tidak Boleh Kosong">
                  </div>
                </div>
              </div>

              <div class="row clearfix">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-5 form-control-label">
                  <label for="sks">SKS</label>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-7">
                  <div class="form-group">
                      <input type="text" id="sks" name="sks" class="form-control date" placeholder="Masukan SKS..." maxlength="1" required="Tidak Boleh Kosong" onkeypress="return hanyaAngka(event)" >
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


