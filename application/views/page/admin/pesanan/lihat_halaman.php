<?php

  $token2 = md5($get_token2);
  $token = $this->session->flashdata('token');
  if (!empty($token) AND $token==$token2) {
    foreach ($data_pembeli->result() as $data):
    $id_pembeli = $data->id_pembeli;
    $nama_pembeli = $data->nama_pembeli;
    $getNoHp = str_replace("-", "", $data->no_pembeli);
    $getNoHp2 = str_replace("0", "62", substr($getNoHp, 0,4));
    $getNoHp3 = substr($getNoHp, 4,10);
    $no_telpon = htmlspecialchars($getNoHp2.$getNoHp3);
    $alamat_lengkap = $data->alamat_lengkap;
    $status = $data->status;
    $jenis_pembayaran = $data->jenis_pembayaran;
    $status_pembayaran = $data->status_pembayaran;
    $voucher = $data->voucher;
    $ongkir = $data->ongkir;
    $tanggal_pesanan = $data->tanggal_pesanan;
    $catatan = $data->catatan;
    $nama_pengguna = $data->nama_pengguna;
    endforeach;
  } else {
      echo '<script language="javascript">document.location="'.site_url('page/admin/pesanan').'";</script>';
  }
?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-1">
          <div class="col-sm-6">
            <h5 class="m-0 text-dark">
              <?php 
              $menu = $this->session->userdata('menu')." / ".$this->session->userdata('aksi')." Rincinan Pesanan";
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

          <div class="col-md-4 connectedSortable">

            <!-- PRODUCT LIST -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Rincian Pembeli</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form" enctype="multipart/form-data" action="<?php echo site_url('page/admin/pembeli/update')?>" method="post" id="quickForm">
                <div class="row">
                  <div class="col-md-12">
                        <div class="form-group">
                          <label for="tanggal_pesanan">Tanggal Pesanan</label>
                          <p class="text-justify"><?= $tanggal_pesanan; ?></p>
                        </div>

                        <div class="form-group">
                          <label for="nama_pembeli">Nama Pembeli</label>
                          <p class="text-justify"><?= $nama_pembeli; ?></p>
                          <input type="text" hidden="" name="id_pembeli" required="" value="<?= $id_pembeli; ?>">
                        </div>

                        <div class="form-group">
                          <label for="no_telpon">Nomor Telpon</label>
                          <p class="text-justify"><?= $no_telpon; ?></p>
                        </div>

                        <div class="form-group">
                          <label for="alamat_lengkap">Alamat</label>
                          <p class="text-justify"><?= $alamat_lengkap; ?></p>
                        </div>

                        <div class="form-group">
                          <label for="status">Status Pesanan</label>
                          <p class="text-justify">
                            <?php
                              $status = htmlspecialchars($data->status); 
                              if ($status==1) {
                                echo '<span class="badge badge-primary">Baru</span>';
                              } elseif ($status==2) {
                                echo '<span class="badge badge-warning">Diproses</span>';
                              } elseif ($status==3) {
                                echo '<span class="badge badge-info">Dikirim</span>';
                              } elseif ($status==4) {
                                echo '<span class="badge badge-success">Selesai</span>';
                              } elseif ($status==5) {
                                echo '<span class="badge badge-danger">Batal</span>';
                              }
                            ?>
                          </p>
                        </div>

                        <div class="form-group">
                          <label for="jenis_pembayaran">Cara Pembayaran</label>
                          <p class="text-justify"><?= $jenis_pembayaran; ?></p>
                        </div>

                        <div class="form-group">
                          <label for="status_pembayaran">Status Pembayaran</label>
                          <p class="text-justify"><?= $status_pembayaran; ?></p>
                        </div>

                        <div class="form-group">
                          <label for="catatan">Catatan</label>
                          <p class="text-justify"><?= nl2br(str_replace(' ', '  ', htmlspecialchars($catatan))); ?></p>
                        </div>

                        <div class="form-group">
                          <label for="nama_pengguna">Pengantar</label>
                          <p class="text-justify"><?= $nama_pengguna; ?></p>
                        </div>
                  </div>
                </div>

                </form>
              </div>
            </div>
            <!-- /.card -->
          </div>

          <div class="col-md-8 connectedSortable">

            <!-- PRODUCT LIST -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Rincian Pesanan</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="" class="table table-hover table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Banyak</th>
                    <th>Sub Total</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $no=1;$total=0; foreach ($data_produk->result() as $data): ?>
                    <tr>
                      <td><?php echo $no ?></td>
                      <td><?php echo $data->nama_produk; ?></td>
                      <td><?php echo $data->banyak; ?></td>
                      <td><?php echo "Rp " . number_format($data->sub_total,0,',','.'); $total = $total + $data->sub_total; ?></td>
                    </tr>
                    
                    <?php $no++; endforeach;?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th colspan="3">Jumlah Belanja</th>
                    <th><?= "Rp " . number_format($total,0,',','.'); ?></th>
                  </tr>

                  <tr>
                    <th colspan="3">Diskon Voucher</th>
                    <th><?= "Rp " . number_format($voucher,0,',','.'); ?></th>
                  </tr>

                  <tr>
                    <th colspan="3">Sub Total</th>
                    <th><?= "Rp " . number_format($total-$voucher,0,',','.'); ?></th>
                  </tr>

                  <tr>
                    <th colspan="3">Ongkos Kirim</th>
                    <th><?= "Rp " . number_format($ongkir,0,',','.'); ?></th>
                  </tr>
                  <tr>
                    <th colspan="3">Total Pembayaran</th>
                    <th><?= "Rp " . number_format(($total-$voucher)+$ongkir,0,',','.'); ?></th>
                  </tr>

                  </tfoot>
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

  <script type="text/javascript">
    function validasiFile(){
        var inputFile = document.getElementById('customFile');
        var pathFile = inputFile.value;
        var file_size = inputFile.files[0].size;
        if (file_size>1000000) {
          alert("File Tidak Boleh Lebih Dari 1 MB!")
          inputFile.value = '';
          return false;
        }
        if (inputFile.files && inputFile.files[0]) {
          var reader = new FileReader();
          reader.onload = function(e) {
            document.getElementById('pratinjauGambar').innerHTML = '<img src="'+e.target.result+'" class="img-thumbnail" style="height: 200px;">';
          };
          reader.readAsDataURL(inputFile.files[0]);
      }
    }
  </script>

  <script type="text/javascript">
    function validasiFile2(){
        var inputFile = document.getElementById('customFile2');
        var pathFile = inputFile.value;
        var file_size = inputFile.files[0].size;
        if (file_size>2000000) {
          alert("File Tidak Boleh Lebih Dari 2 MB!")
          inputFile.value = '';
          return false;
        }
    
    }
  </script>

