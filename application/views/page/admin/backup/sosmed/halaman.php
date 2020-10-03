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
                <a href="<?php echo site_url('page/admin/Sosmed/tambah')?>" data-toggle="tooltip" data-placement="right" title="Tambah Data Sosial Media"><button class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah</button></a>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                  </button>

                  <label hidden=""
                  <?php if ($this->session->flashdata('hasil')=="swalberhasilsimpan") { echo 'class="swalberhasilsimpan"';}?>>
                  </label>
                  <label hidden=""
                  <?php if ($this->session->flashdata('hasil')=="swalberhasilhapus") { echo 'class="swalberhasilhapus"';}?>>
                  </label>
                  <label hidden=""
                  <?php if ($this->session->flashdata('hasil')=="swalberhasilubah") { echo 'class="swalberhasilubah"';};?>>
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
                    <th>Nama Pengguna</th>
                    <th>Nama Sosmed</th>
                    <th>URL Sosmed</th>
                    <th>Jenis Sosmed</th>
                    <th>Pilihan</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $no=1; foreach ($data_sosmed->result() as $data): ?>
                    <tr>
                      <td><?php echo $no ?></td>
                      <td><?php echo $data->nama_pengguna ?> <b>(<?php echo $data->level ?>)</b></td>
                      <td><?php echo $data->nama_sosmed ?></td>
                      <td><a href="<?php echo $data->url_sosmed ?>" target="_BLANK">Kunjungi</a></td>
                      <td><img class="img img-rounded" style="height: 30px" src="<?php echo base_url()?>assets/<?php echo strtolower($data->jenis_sosmed).'.png' ?>"> <?php echo $data->jenis_sosmed ?></td>
                      <td align="center">
                        <!-- Tombol Edit -->
                        <a href="<?php echo base_url()?>page/admin/Sosmed/edit?id=<?php echo $data->id_sosmed ?>&token=<?php echo md5($data->id_sosmed) ?>">
                          <button class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="bottom" title="Edit Data <?php echo $data->nama_sosmed ?>">
                            <i class="fas fa-edit"></i>
                          </button>
                        </a>
                        <!-- Tombol Delete -->
                        <a href="<?php echo base_url()?>page/admin/Sosmed/delete?id_sosmed=<?php echo $data->id_sosmed ?>" onclick="return confirm('Apa Anda Yakin Akan Menghapus Data <?php echo $data->nama_sosmed ?> ?')">
                          <button class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="bottom" title="Hapus Data <?php echo $data->nama_sosmed ?>">
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
