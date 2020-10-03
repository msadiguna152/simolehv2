<?php

  $token2 = md5($get_token2);
  $token = $this->session->flashdata('token');

  if (!empty($token) AND $token==$token2) {
    foreach ($data_sosmed->result() as $data):
    $id_sosmed = $data->id_sosmed;
    $nama_sosmed = $data->nama_sosmed;
    $kode_sosmed = $data->kode_sosmed;
    $url_sosmed = $data->url_sosmed;
    $jenis_sosmed = $data->jenis_sosmed;
    endforeach;
  } else {
      echo '<script language="javascript">document.location="'.site_url('page/admin/Sosmed').'";</script>';
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

          <div class="col-md-12 connectedSortable">

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
                <form role="form" action="<?php echo site_url('page/admin/Sosmed/update')?>" method="post" id="quickForm">
                <div class="row">
                  <div class="col-md-6">
                        <div class="form-group">
                          <label for="nama_sosmed">Nama Sosial Media*</label>
                          <input type="text" class="form-control" id="" name="nama_sosmed" placeholder="Masukan Nama Sosial Media..." required="" value="<?php echo $nama_sosmed; ?>">
                          <input type="text"  name="id_sosmed" hidden="" value="<?php echo $id_sosmed; ?>">
                        </div>

                        <div class="form-group">
                          <label for="url_sosmed">URL Sosial Media*</label>
                          <input type="text" class="form-control" id="" name="url_sosmed" placeholder="Masukan URL Sosial Media..." required="" value="<?php echo $url_sosmed; ?>">
                        </div>

                        <div class="form-group">
                          <label for="jenis_sosmed">Jenis Sosial Media*</label>
                          <select class="form-control select2bs4" style="width: 100%;" id="" name="jenis_sosmed" data-placeholder="Pilih Jenis Sosial Media" required="">
                            <option value="">Pilih Jenis Sosial Media</option>
                            <option <?php if ($jenis_sosmed=="Facebook") { echo 'selected=""';}?> value="Facebook">Facebook</option>
                            <option <?php if ($jenis_sosmed=="Instagram") { echo 'selected=""';}?>value="Instagram">Instagram</option>
                            <option <?php if ($jenis_sosmed=="Youtube") { echo 'selected=""';}?>value="Youtube">Youtube</option>
                            <option <?php if ($jenis_sosmed=="Twitter") { echo 'selected=""';}?>value="Twitter">Twitter</option>
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
              <!-- /.card-body -->
              <div class="card-footer">
                * = Wajib Diisi
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
