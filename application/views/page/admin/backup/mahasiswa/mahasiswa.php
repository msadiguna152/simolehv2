  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Mahasiswa</a>
        </li>
        <li class="breadcrumb-item active">Halaman Mahasiswa</li>
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
          <i class="fa fa-table"></i> Data Mahasiswa
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="example" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>NIM</th>
                  <th>Nama</th>
                  <th>TTL</th>
                  <th>Alamat</th>
                  <th>Jenis Kelamin</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>No</th>
                  <th>NIM</th>
                  <th>Nama</th>
                  <th>TTL</th>
                  <th>Alamat</th>
                  <th>Jenis Kelamin</th>
                  <th>Aksi</th>
                </tr>
              </tfoot>
              <tbody>
                <?php $no=1; foreach ($data_mahasiswa->result() as $key): ?>
                <tr>
                  <td><?php echo $no ?></td>
                  <td><?php echo $key->nim ?></td>
                  <td><?php echo $key->nama_mhs ?></td>
                  <td><?php echo $key->tmp_lahir ?>, <?php echo tgl_indo($key->tgl_lahir) ?></td>
                  <td><?php echo $key->alamat ?></td>
                  <td><?php echo $key->jenis_kelamin ?></td>
                  <td align="center">
                    <!-- Tombol Edit -->
                    <a href="<?php echo base_url()?>admin/Mahasiswa/edit?nim=<?php echo $key->nim ?>" class="modal-with-form">
                      <button class="btn bg-blue-grey waves-effect" data-toggle="tooltip" data-placement="bottom" title="Edit Data <?php echo $key->nama_mhs ?>"><i class="fa fa-edit"></i></button>
                    </a>
                    <!-- Tombol Delete -->
                    <a href="<?php echo base_url()?>admin/Mahasiswa/delete?nim=<?php echo $key->nim ?>" onclick="return confirm('Apa Anda Yakin Akan Menghapus Data <?php echo $key->nama_mhs ?> ?')">
                      <button class="btn bg-red waves-effect" data-toggle="tooltip" data-placement="bottom" title="Hapus Data <?php echo $key->nama_mhs ?>"><i class="fa fa-trash-o"></i></button>
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
          <form class="form-horizontal" method="post" action="<?php echo site_url()?>admin/Mahasiswa/insert" onsubmit="return validasi2()">
          <div class="modal-body">


              <div class="row clearfix">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-5 form-control-label">
                  <label for="nim">NIM</label>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-7">
                  <div class="form-group">
                      <input type="text" id="nim" name="nim" class="form-control" class="form-control" placeholder="Masukan NIM Mahasiswa..." required="Tidak Boleh Kosong">
                  </div>
                </div>
              </div>

              <div class="row clearfix">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-5 form-control-label">
                  <label for="nama_mhs">Nama Mahasiswa</label>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-7">
                  <div class="form-group">
                      <input type="text" id="nama_mhs" name="nama_mhs" class="form-control" placeholder="Masukan Nama Mahasiswa..." required="Tidak Boleh Kosong">
                  </div>
                </div>
              </div>

              <div class="row clearfix">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-5 form-control-label">
                  <label for="tmp_lahir">Tempat Lahir</label>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-7">
                  <div class="form-group">
                      <input type="text" id="tmp_lahir" name="tmp_lahir" class="form-control" placeholder="Masukan Tempat Lahir..." required="Tidak Boleh Kosong">
                  </div>
                </div>
              </div>

              <div class="row clearfix">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-5 form-control-label">
                  <label for="tgl_lahir">Tanggal Lahir</label>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-7">
                  <div class="form-group">
                      <input type="text" id="datepicker" name="tgl_lahir" class="form-control" placeholder="Masukan Tempat Lahir...">
                  </div>
                </div>
              </div>

              <div class="row clearfix">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-5 form-control-label">
                  <label for="jenis_kelamin">Jenis Kelamin</label>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-7">
                  <div class="form-group">
                    <select id="jenis_kelamin" name="jenis_kelamin" class="form-control" required="Tidak Boleh Kosong">
                      <option value="">---Pilih Jenis Kelamin---</option>
                      <option value="Laki-laki">Laki-laki</option>
                      <option value="Perempuan">Perempuan</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="row clearfix">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-5 form-control-label">
                  <label for="alamat">Alamat</label>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-7">
                  <div class="form-group">
                    <textarea id="alamat" name="alamat" class="form-control" placeholder="Masukan Alamat..." required="Tidak Boleh Kosong"></textarea>
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

        <script type="text/javascript">
          function validasi2() {
            var get_nim = document.getElementById('nim').value;

            if (get_nim ==null) {
              alert('NIM : '+get_nim+', sudah tersedia! Silahkan masukan NIM yang valid!');
              return false;
            } 
            <?php $data_nim = $this->db->query("SELECT * FROM mahasiswa");foreach ($data_nim->result() as $key): ?>
            else if (get_nim == <?php echo $key->nim;?>) {
              alert('NIM : '+get_nim+', sudah tersedia! Silahkan masukan NIM yang valid!');
              return false;
            } 
            <?php endforeach;?>
            else {
              return true;
            }
          }
        </script>


