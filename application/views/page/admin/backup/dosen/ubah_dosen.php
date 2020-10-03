<?php foreach($edit_data->result() as $data) :
    $nip= $data->nip;
    $nama_dosen = $data->nama_dosen;

endforeach; ?>

  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dosen</a>
        </li>
        <li class="breadcrumb-item active">Halaman Dosen</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-edit"></i> UBAH DATA DOSEN
        </div>
        <div class="card-body">
          <form class="form-horizontal" method="post" action="<?php echo site_url()?>admin/Dosen/update">

              <div class="row clearfix">
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                  <label for="nip">NIP</label>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                  <div class="form-group">
                    <div class="form-line">
                      <input type="text" id="nip" name="nip" class="form-control" readonly="" value="<?php echo $nip; ?>">
                    </div>
                  </div>
                </div>
              </div>

              <div class="row clearfix">
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                  <label for="nama_dosen">Nama Dosen</label>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                  <div class="form-group">
                    <div class="form-line">
                      <input type="text" id="nama_dosen" name="nama_dosen" class="form-control" required="" autocomplete="off" autofocus="" value="<?php echo $nama_dosen; ?>">
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-group" align="center">
                <button class="btn btn-primary" type="submit">UBAH</button>
                <button class="btn btn-default" type="reset">BATAL</button>
                <button class="btn btn-danger" type="reset" onclick="window.history.back();">KEMBALI</button>
              </div>
          </form>
        </div>
        <div class="card-footer small text-muted"></div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->

