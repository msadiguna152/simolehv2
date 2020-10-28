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
                <a href="<?php echo site_url('page/admin/sliders/tambah')?>" data-toggle="tooltip" data-placement="right" title="Tambah Data Produk"><button class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah</button></a>
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
                <table id="example2" class="table table-hover table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>URL Slider</th>
                    <th>Gambar</th>
                    <th>Keterangan</th>
                    <th>Pilihan</th>
                  </tr>
                  </thead>

                  <tbody>
                    <?php $no=1; foreach ($data_sliders->result() as $data): ?>
                    <tr>
                      <td><?php echo $no ?></td>
                      <td style="width: 30%;"><?php echo $data->url_sliders; ?></td>
                      <td><img class="img img-thumbnail" style="height: 100px;" src="<?= base_url()?>sliders/<?= $data->gambar_sliders; ?>"></td>
                      <td><?php echo $data->keterangan_sliders; ?></td>


                      <td align="center">

                        <!-- Tombol Edit -->
                        <a class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="bottom" title="Edit Data Sliders" href="<?php echo base_url()?>page/admin/sliders/edit?id=<?php echo $data->id_sliders ?>&token=<?php echo md5($data->id_sliders) ?>">
                            <i class="fas fa-edit"></i>
                        </a>

                        <!-- Tombol Delete -->
                        <a class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="bottom" title="Hapus Data Sliders" href="<?php echo base_url()?>page/admin/sliders/delete?id_sliders=<?php echo $data->id_sliders ?>" onclick="return confirm('Apa Anda Yakin Akan Menghapus Data?')">
                            <i class="fas fa-trash"></i>
                        </a>
                      </td>
                    </tr>
                    <?php $no++; endforeach;?>
                  </tbody>
                </table>
              </div>
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
