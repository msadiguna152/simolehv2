  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dosen</a>
        </li>
        <li class="breadcrumb-item active">Halaman Dosen</li>
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
          <i class="fa fa-table"></i> Data Dosen
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="example" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>NIP</th>
                  <th>Nama Dosen</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>No</th>
                  <th>NIP</th>
                  <th>Nama Dosen</th>
                  <th>Aksi</th>
                </tr>
              </tfoot>
              <tbody>
                <?php $no=1; foreach ($data_dosen->result() as $key): ?>
                <tr>
                  <td><?php echo $no ?></td>
                  <td><?php echo $key->nip ?></td>
                  <td><?php echo $key->nama_dosen ?></td>
                  <td align="center">
                    <!-- Tombol Print -->
                    <!-- Tombol Edit -->
                    <a href="<?php echo base_url()?>admin/Dosen/edit?nip=<?php echo $key->nip ?>" class="modal-with-form">
                      <button class="btn bg-blue-grey waves-effect" data-toggle="tooltip" data-placement="bottom" title="Edit Data <?php echo $key->nama_dosen ?>"><i class="fa fa-edit"></i></button>
                    </a>
                    <!-- Tombol Delete -->
                    <a href="<?php echo base_url()?>admin/Dosen/delete?nip=<?php echo $key->nip ?>" onclick="return confirm('Apa Anda Yakin Akan Menghapus Data <?php echo $key->nama_dosen ?> ?')">
                      <button class="btn bg-red waves-effect" data-toggle="tooltip" data-placement="bottom" title="Hapus Data <?php echo $key->nama_dosen ?>"><i class="fa fa-trash-o"></i></button>
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
            <h5 class="modal-title" id="Modaltambahdata2" align="text-center">MASUKAN DATA DOSEN</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">x</span>
            </button>
          </div>
          <form class="form-horizontal" method="post" action="<?php echo site_url()?>admin/Dosen/insert" onsubmit="return validasi2()">
          <div class="modal-body">


              <div class="row clearfix">
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                  <label for="nip">NIP</label>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                  <div class="form-group">
                      <input type="text" id="nip" name="nip" class="form-control date" placeholder="Masukan NIP..." required="Tidak Boleh Kosong">
                  </div>
                </div>
              </div>

              <div class="row clearfix">
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                  <label for="nama_dosen">Nama Dosen</label>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                  <div class="form-group">
                      <input type="text" id="nama_dosen" name="nama_dosen" class="form-control date" placeholder="Masukan Nama Dosen..." required="Tidak Boleh Kosong">
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

      <script type="text/javascript">
          function validasi2() {
            var get_nip = document.getElementById('nip').value;

            if (get_nip ==null) {
              alert('NIP : '+get_nip+', sudah tersedia! Silahkan masukan NIP yang valid!');
              return false;
            } 
            <?php $data_nip = $this->db->query("SELECT * FROM dosen");foreach ($data_nip->result() as $key): ?>
            else if (get_nip == <?php echo $key->nip;?>) {
              alert('NIP : '+get_nip+', sudah tersedia! Silahkan masukan NIP yang valid!');
              return false;
            } 
            <?php endforeach;?>
            else {
              return true;
            }
          }
        </script>

