<?php

  $token2 = md5($get_token2);
  $token = $this->session->flashdata('token');

  if (!empty($token) AND $token==$token2) {
    foreach ($data_pembeli->result() as $data):
    $id_pembeli = $data->id_pembeli;
    $nama_pembeli = $data->nama_pembeli;
    $no_telpon = $data->no_telpon;
    $email = $data->email;
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

          <div class="col-md-4 connectedSortable">

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
                <form role="form" enctype="multipart/form-data" action="<?php echo site_url('page/admin/pembeli/update')?>" method="post" id="quickForm">
                <div class="row">
                  <div class="col-md-12">

                        <div class="form-group">
                          <label for="nama_pembeli">Nama Pembeli</label>
                          <p class="text-justify"><?= htmlspecialchars($nama_pembeli); ?></p>
                          <input type="text" hidden="" name="id_pembeli" required="" value="<?= $id_pembeli; ?>">
                        </div>

                        <div class="form-group">
                          <label for="no_telpon">Nomor Telpon</label>
                          <p class="text-justify">
                            <?php
                            $getNoHp = str_replace("-", "", $no_telpon);
                            $getNoHp2 = str_replace("0", "62", substr($getNoHp, 0,4));
                            $getNoHp3 = substr($getNoHp, 4,10);
                            echo htmlspecialchars($getNoHp2.$getNoHp3); 
                            ?>  
                          </p>
                        </div>

                        <div class="form-group">
                          <label for="email">Email</label>
                          <p class="text-justify"><?= htmlspecialchars($email); ?></p>
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
                <h3 class="card-title">Alamat Pembeli</h3>

                <div class="card-tools">
                  <a class="btn btn-primary btn-block btn-sm" href="<?php echo base_url()?>page/admin/alamat/tambah?id=<?php echo $id_pembeli ?>&token=<?php echo md5($id_pembeli) ?>">Tambah</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body  table-responsive">
                <table id="alamat" class="table table-hover table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Alamat Lengkap</th>
                    <th>Rincian Alamat</th>
                    <th>Map</th>
                    <th>Pilihan</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $no=1; foreach ($data_alamat->result() as $data): ?>
                    <tr>
                      <td><?php echo $no ?></td>
                      <td><?php echo htmlspecialchars($data->alamat_lengkap); ?></td>
                      <td><?php echo htmlspecialchars($data->rincian_alamat); ?></td>
                      <td>
                        <a target="_BLANK" class="btn btn-success btn-sm btn-block" data-toggle="tooltip" data-placement="bottom" title="Lihat Alamat Di Map" href="http://www.google.com/maps/place/<?php echo htmlspecialchars($data->lat); ?>,<?php echo htmlspecialchars($data->long); ?>">
                            <i class="fas fa-map"></i>
                        </a>
                      </td>
                      <td align="center">

                        <!-- Tombol Edit -->
                        <a class="btn btn-success btn-sm btn-block" data-toggle="tooltip" data-placement="bottom" title="Edit Data Alamat" href="<?php echo base_url()?>page/admin/alamat/edit?id=<?php echo $data->id_alamat ?>&token=<?php echo md5($data->id_alamat) ?>">
                            <i class="fas fa-edit"></i>
                        </a>
                        <!-- Tombol Delete -->
                        <a class="btn btn-danger btn-sm btn-block" data-toggle="tooltip" data-placement="bottom" title="Hapus Data Alamat" href="<?php echo base_url()?>page/admin/alamat/delete?id_alamat=<?php echo $data->id_alamat ?>" onclick="return confirm('Apa Anda Yakin Akan Menghapus Data <?php echo $data->id_pembeli ?> ?')">
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

