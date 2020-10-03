  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper ignielPelangi">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content" >


      <div class="container connectedSortable">

        <div class="jumbotron navbar-light card-outline">
          <center>      
            <h2>VIDEO</h2>
          </center>

        </div>

        <div class="row">
          <div class="col-lg-8">
            <div class="row connectedSortable">
              <div class="col-lg-12">
                <div class="card card-primary card-outline">
                  <div class="card-header">
                    <h5 class="card-title" style="font-family: sans-serif;"><i class="fa fa-md fa-list fa-fw"></i> VIDEO</h5>
                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                          <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                          <i class="fas fa-times"></i>
                        </button>
                      </div>
                  </div>
                  <div class="card-body">
                    <div class="row">
                    <?php $no=1; foreach ($data_video->result() as $data): 
                    $link=str_replace('http://www.youtube.com/watch?v=', '', $data->url_video);
                    $link=str_replace('https://www.youtube.com/watch?v=', '', $link);
                    $link_jadi='https://img.youtube.com/vi/'.$link.'/hqdefault.jpg';
                    ?>

                    <div class="col-md-6">
                      <div class="card mb-6 box-shadow">
                        <img class="card-img-top" data-src="<?= $link_jadi; ?>" style="height: 225px; width: 100%; display: block;" src="<?= $link_jadi; ?>" data-holder-rendered="true">
                        <div class="card-body">
                          <strong class="card-text d-inline-block mb-1 text-primary"><?= $data->judul_video; ?></strong>
                          <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                              <a href="<?= base_url()?>Lusiapw/detail_video/<?= $data->id_video;?>">
                                <button type="button" class="btn btn-sm btn-success">Lihat Video</button>
                              </a>
                            </div>
                            <small class="text-muted"><i class="fa fa-sm fa-user fa-fw"></i> <b><?= $data->nama_pengguna; ?></b><br><i class="fa fa-sm fa-clock fa-fw"></i><?= $data->tanggal_video; ?></small>
                          </div>
                        </div>
                      </div>
                    </div>
                    <?php $no++; endforeach;?>
                    </div>
                  </div>
                  <div class="card-footer">
                    <a href="<?= base_url()?>Lusiapw/view_video" class="btn btn-primary btn-block btn-sm">Lihat Semua</a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-12 col-lg-4 col-md-12 col-sm-12">
            <div class="card card-success card-outline">
              <div class="card-header">
                <h3 class="card-title">Fixed Header Table 2</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 300px;">
                <div class="card-body">
                <h6 class="card-title">Special title treatment</h6>

                <p class="card-text">With supporting text below as a natural lead-in to additional content.With supporting text below as a natural lead-in to additional content.With supporting text below as a natural lead-in to additional content.With supporting text below as a natural lead-in to additional content.With supporting text below as a natural lead-in to additional content.With supporting text below as a natural lead-in to additional content.With supporting text below as a natural lead-in to additional content.With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>

      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
