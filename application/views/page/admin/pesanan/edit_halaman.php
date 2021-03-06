<?php

  $token2 = md5($get_token2);
  $token = $this->session->flashdata('token');

  if (!empty($token) AND $token==$token2) {
    foreach ($data_pesanan->result() as $data):
    $id_pesanan = $data->id_pesanan;
    $id_pembeli = $data->id_pembeli;
    $id_pengguna = $data->id_pengguna;
    $nama_pembeli = $data->nama_pembeli;
    $tanggal_pesanan = $data->tanggal_pesanan;
    $jenis_pembayaran = $data->jenis_pembayaran;
    $total_pembayaran = $data->total_pembayaran;
    $voucher = $data->voucher;
    $ongkir = $data->ongkir;
    $status = $data->status;
    $catatan = $data->catatan;
    endforeach;
  } else {
      echo '<script language="javascript">document.location="'.site_url('page/admin/pembeli').'";</script>';
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
              $menu = $this->session->userdata('menu')." / ".$this->session->userdata('aksi')." data";
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

          <div class="col-md-6 connectedSortable">

            <!-- PRODUCT LIST -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><?php echo strtoupper($this->session->userdata('aksi')." data"); ?></h3>

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
              <div class="card-body">
                <form role="form" enctype="multipart/form-data" action="<?php echo site_url('page/admin/pesanan/update')?>" method="post" id="quickForm">
                <div class="row">
                  <div class="col-md-12">
                        <div class="form-group">
                          <label for="tanggal_pesanan">Tanggal Pesanan</label>
                          <input type="text" class="form-control" id="" readonly="" value="<?= $tanggal_pesanan; ?>">
                        </div>

                        <div class="form-group">
                          <label for="nama_pembeli">Nama Pembeli</label>
                          <input type="text" class="form-control" id="" name="nama_pembeli" readonly="" value="<?= $nama_pembeli; ?>">
                          <input type="text" hidden="" name="id_pembeli" required="" value="<?= $id_pembeli; ?>">
                          <input type="text" hidden="" name="id_pesanan" required="" value="<?= $id_pesanan; ?>">
                        </div>

                        <div class="form-group">
                          <label for="jenis_pembayaran">Cara Pembayaran</label>
                          <input type="text" class="form-control" id="" readonly="" value="<?= $jenis_pembayaran; ?>">
                        </div>

                        <div class="form-group">
                          <label for="total_pembayaran">Total Pembayaran</label>
                          <input type="text" class="form-control" id="" name="total_pembayaran" value="<?= $total_pembayaran; ?>">
                        </div>

                        <div class="form-group">
                          <label for="voucher">Voucher</label>
                          <input type="text" class="form-control" id="" name="voucher" value="<?= $voucher; ?>">
                        </div>

                        <div class="form-group">
                          <label for="ongkir">Ongkos Kirim</label>
                          <input type="text" class="form-control" id="" name="ongkir" value="<?= $ongkir; ?>">
                        </div>

                        <div class="form-group">
                          <label for="status">Status Pesanan</label>
                          <select class="form-control" id="" name="status">
                            <option <?php if ($status==1) { echo "selected";} ?> value="1">Baru</option>
                            <option <?php if ($status==2) { echo "selected";} ?> value="2">Diproses</option>
                            <option <?php if ($status==3) { echo "selected";} ?> value="3">Dikirim</option>
                            <option <?php if ($status==4) { echo "selected";} ?> value="4">Selesai</option>
                            <option <?php if ($status==5) { echo "selected";} ?> value="5">Batal</option>
                          </select>
                        </div>

                        <div class="form-group">
                          <label for="catatan">Catatan</label>
                          <textarea class="form-control" id="" name="catatan"><?= $catatan; ?></textarea>
                        </div>

                        <div class="form-group">
                          <label for="id_pengguna">Pengantar</label>
                          <select type="text" id="id_pengguna" name="id_pengguna" class="form-control select2bs4" data-live-search="true" data-live-search-placeholder="Cari Pengantar..." required="">
                            <option value="" hidden="">---Pilih Pengantar---</option>
                            <?php foreach ($data_kurir->result() as $key): ?>
                              <option <?php if (htmlspecialchars($id_pengguna)==$key->id_pengguna) { echo "selected"; }?> value="<?php echo $key->id_pengguna?>"><?php echo $key->nama_pengguna;?></option>
                              <?php endforeach;?>
                          </select>
                        </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-2">
                    <div class="form-group">
                      <button type="submit" name="simpan" class="btn btn-primary btn-block btn-sm">Simpan</button>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <button type="reset" name="reset" class="btn btn-danger btn-block btn-sm">Reset</button>
                    </div>
                  </div>
                </div>
                </form>
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

