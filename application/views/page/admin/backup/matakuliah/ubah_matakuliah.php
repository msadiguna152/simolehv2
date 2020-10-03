<?php foreach($edit_data->result() as $data) :
    $kode_mk= $data->kode_mk;
    $nama_mk = $data->nama_mk;
    $sks = $data->sks;

endforeach; ?>

  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Mata Kuliah</a>
        </li>
        <li class="breadcrumb-item active">Ubah Mata Kuliah</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-edit"></i> UBAH DATA MATA KULIAH
        </div>
        <div class="card-body">
          <form class="form-horizontal" method="post" action="<?php echo site_url()?>admin/Matakuliah/update">

              <div class="row clearfix">
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                  <label for="kode_mk">Kode Mata Kuliah</label>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                  <div class="form-group">
                    <div class="form-line">
                      <input type="text" id="kode_mk" name="kode_mk" class="form-control" readonly="" value="<?php echo $kode_mk; ?>">
                    </div>
                  </div>
                </div>
              </div>

              <div class="row clearfix">
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                  <label for="nama_mk">Nama Mata Kuliah</label>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                  <div class="form-group">
                    <div class="form-line">
                      <input type="text" id="nama_mk" name="nama_mk" class="form-control" required="" autocomplete="off" autofocus="" value="<?php echo $nama_mk; ?>">
                    </div>
                  </div>
                </div>
              </div>

              <div class="row clearfix">
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                  <label for="sks">SKS</label>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                  <div class="form-group">
                    <div class="form-line">
                      <input type="text" id="sks" name="sks" class="form-control" required="" autocomplete="off" onkeypress="return hanyaAngka(event)" maxlength="1" value="<?php echo $sks; ?>">
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

        <script>
            function hanyaAngka(evt) {
              var charCode = (evt.which) ? evt.which : event.keyCode
               if (charCode > 31 && (charCode < 48 || charCode > 57))
         
              return false;
              return true;
            }
        </script>

