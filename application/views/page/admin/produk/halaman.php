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
                <a href="<?php echo site_url('page/admin/produk/tambah')?>" data-toggle="tooltip" data-placement="right" title="Tambah Data Produk"><button class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah</button></a>
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
                    <th>Nama Produk</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Harga Promosi</th>
                    <th>Gambar</th>
                    <th>Promosi</th>
                    <th>Terlaris</th>
                    <th>Pilihan</th>
                  </tr>
                  </thead>
                  <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Harga Promosi</th>
                    <th>Gambar</th>
                    <th>Promosi</th>
                    <th>Terlaris</th>
                    <th>Pilihan</th>
                  </tr>
                  </tfoot>
                  <tbody>
                    <?php $no=1; foreach ($data_produk->result() as $data): ?>
                    <tr>
                      <td><?php echo $no ?></td>
                      <td><?php echo $data->nama_produk; ?></td>
                      <td><?php echo $data->nama_kategori ?></td>
                      <td><?php echo "Rp " . number_format($data->harga,0,',','.'); ?> </td>
                      <td><?php echo "Rp " . number_format($data->harga_promosi,0,',','.'); ?> </td>
                      <td><img class="img-thumbnail" style="width: 150px; height: 100px;" src="<?php echo base_url()?>file/<?php echo $data->gambar ?>"></td>
                      <td style="text-align: center;vertical-align: middle;">
                        <?php
                          if ($data->promosi==1) {
                            echo '<i style="color: green;" class="fas fa-check"></i>';
                          } else {
                            echo '<i style="color: red;" class="fas fa-times"></i>';
                          }
                        ?> 
                      </td>
                      <td style="text-align: center;vertical-align: middle;">
                        <?php
                          if ($data->terlaris==1) {
                            echo '<i style="color: green;" class="fas fa-check"></i>';
                          } else {
                            echo '<i style="color: red;" class="fas fa-times"></i>';
                          }
                        ?> 
                      </td>

                      <td align="center">
                        <!-- Tombol Edit -->
                        <a class="btn btn-info btn-sm btn-block" data-toggle="tooltip" data-placement="bottom" title="Lihat Produk : <?php echo $data->nama_produk ?>" href="<?php echo base_url()?>page/admin/produk/lihat?id=<?php echo $data->id_produk ?>&token=<?php echo md5($data->id_produk) ?>">
                            <i class="fas fa-eye"></i>
                        </a>

                        <!-- Tombol Edit -->
                        <a class="btn btn-success btn-sm btn-block" data-toggle="tooltip" data-placement="bottom" title="Edit Data Barang : <?php echo $data->nama_produk ?>" href="<?php echo base_url()?>page/admin/produk/edit?id=<?php echo $data->id_produk ?>&token=<?php echo md5($data->id_produk) ?>">
                            <i class="fas fa-edit"></i>
                        </a>

                        <!-- Tombol Delete -->
                        <a class="btn btn-danger btn-sm btn-block" data-toggle="tooltip" data-placement="bottom" title="Hapus Data <?php echo $data->nama_produk ?>" href="<?php echo base_url()?>page/admin/produk/delete?id_produk=<?php echo $data->id_produk ?>" onclick="return confirm('Apa Anda Yakin Akan Menghapus Data <?php echo $data->nama_produk ?>?')">
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
