  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-1">
          <div class="col-sm-6">
            <h5 class="m-0 text-dark">
              <?php 
              $menu = $this->session->userdata('menu');
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

            <div class="card">
              <div class="card-header">
                <a href="<?php echo site_url('page/admin/Pendaftar/tambah')?>" data-toggle="tooltip" data-placement="right" title="Tambah Data Pendaftar"><button class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah</button></a>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                  </button>

                  <label hidden=""
                  <?php if ($this->session->flashdata('hasil')=="swalberhasilsimpan") { echo 'class="swalberhasilsimpan"';}if ($this->session->flashdata('hasil')=="swalberhasilhapus") { echo 'class="swalberhasilhapus"';}if ($this->session->flashdata('hasil')=="swalberhasilubah") { echo 'class="swalberhasilubah"';};?>>
                  </label>
                </div>
              </div>
            </div>
            <!-- /.card -->

            <!-- PRODUCT LIST -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DATA <?php echo strtoupper($menu); ?></h3>

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
              <div class="card-body  table-responsive">
                <table id="example4" class="table table-hover table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NIK</th>
                    <th>Jenis Kelamin</th>
                    <th>TTL</th>
                    <th>E-mail</th>
                    <th>Nomor HP</th>
                    <th>Tanggal Pendaftar</th>
                    <th>Status</th>
                    <th>Pilihan</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $no=1; foreach ($data_pendaftar->result() as $data): ?>
                    <tr
                      <?php
                        if ($data->status_pendaftar=='Aktif') {
                          echo 'style="background-color: #007bffa1"';
                        } else if ($data->status_pendaftar=='Tidak Aktif'){
                          echo 'style="background-color: #e21a25c9"';
                        } 
                        
                      ?>
                    >
                      <td><?php echo $no ?></td>
                      <td><?php echo $data->nama_lengkap ?></td>
                      <td><?php echo $data->kode_pendaftar ?></td>
                      <td><?php echo $data->jenis_kelamin ?></td>
                      <td><?php echo $data->tempat_lahir ?>, <?php echo $data->tanggal_lahir ?></td>
                      <td><?php echo $data->email ?></td>
                      <td>
                        <a href="https://api.whatsapp.com/send?phone=<?php echo $data->nomor_hp ?>&text=*Konfirmasi%20Aktivasi%20Akun*%0A%0ASilahkan%20gunakan%0A*_Username%20:%20<?php echo $data->kode_pendaftar ?>_*%0A*_Password%20:%20<?php echo $data->kode_pendaftar ?>_*%0A%0AAtau klik link berikut :" data-toggle="tooltip" data-placement="bottom" title="Konfirmasi Akun" onclick="return confirm('Apa Anda Yakin Akan Mengirim Konfirmasi Aktivasi Akun ke <?php echo $data->nama_lengkap ?>?')" target="_BLANK">
                          <?php echo $data->nomor_hp ?>
                        </a>
                      </td>
                      <td><?php echo $data->tanggal_pendaftar ?></td>
                      <td><?php echo $data->status_pendaftar ?></td>
                      <td align="center">
                        <!-- Tombol Edit -->
                        <a href="<?php echo base_url()?>page/admin/Pendaftar/edit?id=<?php echo $data->kode_pendaftar ?>&token=<?php echo md5($data->kode_pendaftar) ?>">
                          <button class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="bottom" title="Edit Data <?php echo $data->nama_lengkap ?>">
                            <i class="fas fa-edit"></i>
                          </button>
                        </a>
                        <!-- Tombol Delete -->
                        <a href="<?php echo base_url()?>page/admin/Pendaftar/delete?kode_pendaftar=<?php echo $data->kode_pendaftar ?>" onclick="return confirm('Apa Anda Yakin Akan Menghapus Data <?php echo $data->nama_lengkap ?> ?')">
                          <button class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="bottom" title="Hapus Data <?php echo $data->nama_lengkap ?>">
                            <i class="fas fa-trash"></i>
                          </button>
                        </a>

                      </td>
                    </tr>
                    <?php $no++; endforeach;?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer text-center">
                <a href="javascript:void(0)" class="uppercase">View All Products</a>
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
