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
                <a href="<?php echo site_url('page/admin/pesanan/tambah')?>" data-toggle="tooltip" data-placement="right" title="Tambah Data Kategori"><button class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah</button></a>
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
                    <th>Tanggal Pesanan</th>
                    <th>Nama Pembeli</th>
                    <th>Status</th>
                    <th>Cara Pembayaran</th>
                    <th>Ongkos Kirim</th>
                    <th>Total Pembayaran</th>
                    <th>Voucher</th>
                    <th>Rincian Pesanan</th>
                    <th>Pilihan</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $no=1; foreach ($data_pesanan->result() as $data): ?>
                    <tr>
                      <td><?php echo $no ?></td>
                      <td><?php echo htmlspecialchars($data->tanggal_pesanan); ?></td>
                      <td><?php echo htmlspecialchars($data->nama_pembeli); ?></td>
                      <td><?php echo htmlspecialchars($data->status); ?></td>
                      <td><?php echo htmlspecialchars($data->cara_pembayaran); ?></td>
                      <td><?php echo "Rp " . number_format(htmlspecialchars($data->ongkir),2,',','.'); ?></td>
                      <td><?php echo "Rp " . number_format(htmlspecialchars($data->total_pembayaran),2,',','.'); ?></td>
                      <td><?php echo htmlspecialchars($data->voucher); ?></td>
                      <td>
                        <a class="btn btn-success btn-sm btn-block" data-toggle="tooltip" data-placement="bottom" title="Edit Data Pembeli : <?php echo $data->id_pesanan ?>" href="<?php echo base_url()?>page/admin/pesanan/edit?id=<?php echo $data->id_pesanan ?>&token=<?php echo md5($data->id_pesanan) ?>">
                            <i class="fas fa-eye"></i>
                        </a>
                      </td>
                      <td align="center">

                        <!-- Tombol Edit -->
                        <a class="btn btn-info btn-sm btn-block" target="_BLANK" data-toggle="tooltip" data-placement="bottom" title="Kirim Pesan" href="https://api.whatsapp.com/send?phone=<?php echo $data->no_telpon; ?>">
                            <i class="fas fa-envelope"></i>
                        </a>

                        <!-- Tombol Edit -->
                        <a class="btn btn-success btn-sm btn-block" data-toggle="tooltip" data-placement="bottom" title="Edit Data Pembeli : <?php echo $data->id_pesanan ?>" href="<?php echo base_url()?>page/admin/pesanan/edit?id=<?php echo $data->id_pesanan ?>&token=<?php echo md5($data->id_pesanan) ?>">
                            <i class="fas fa-edit"></i>
                        </a>
                        <!-- Tombol Delete -->
                        <a class="btn btn-danger btn-sm btn-block" data-toggle="tooltip" data-placement="bottom" title="Hapus Data Pembeli <?php echo $data->id_pesanan ?>" href="<?php echo base_url()?>page/admin/pesanan/delete?id_pesanan=<?php echo $data->id_pesanan ?>" onclick="return confirm('Apa Anda Yakin Akan Menghapus Data <?php echo $data->id_pesanan ?> ?')">
                            <i class="fas fa-trash"></i>
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
