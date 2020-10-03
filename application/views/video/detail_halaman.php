<?php
    foreach ($data_video->result() as $data):
    $id_video = $data->id_video;
    $nama_pengguna = $data->nama_pengguna;
    $foto_pengguna = $data->foto_pengguna;
    $judul_video = $data->judul_video;
    $deskripsi_video = $data->deskripsi_video;
    $tanggal_video = $data->tanggal_video;
    $status_video = $data->status_video;
    $url_video = $data->url_video;
    endforeach;

    $link=str_replace('http://www.youtube.com/watch?v=', '', $url_video);

    $link=str_replace('https://www.youtube.com/watch?v=', '', $link);

    $link_jadi='http://www.youtube.com/embed/'.$link;
?>
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

        <div class="jumbotron navbar-light">
          <center>      
            <h2 style="font-family: sans-serif;">VIDEO</h2>
          </center>

        </div>

        <div class="row">
          <div class="col-md-8 connectedSortable">
            <!-- Box Comment -->
            <div class="card card-widget">
              <div class="card-header">
                <div class="user-block">
                  <img class="img-circle" src="<?php echo base_url()?>profile/<?php echo $foto_pengguna;?>" alt="User Image">
                  <span class="username"><a href="#"><?php echo $nama_pengguna; ?></a></span>
                  <span class="description">Tanggal : <?php echo $tanggal_video ?></span>
                </div>
                <!-- /.user-block -->
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <div class="card-header" style="text-align: center; font-size: 18px">
                <b><?php echo $judul_video; ?></b>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="<?php echo $link_jadi; ?>" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>

                <p style="text-align: justify;"><?php echo $deskripsi_video; ?></p>

                <span class="float-right text-muted"> Komentar</span>
              </div>
              <!-- /.card-body -->
              <div class="card-footer card-comments">
                <div class="card-comment">
                  <!-- User image -->
                  <img class="img-circle img-sm" src="<?php echo base_url()?>assets/dist/img/user3-128x128.jpg" alt="User Image">

                  <div class="comment-text">
                    <span class="username">
                      Maria Gonzales
                      <span class="text-muted float-right">8:03 PM Today</span>
                    </span><!-- /.username -->
                    It is a long established fact that a reader will be distracted
                    by the readable content of a page when looking at its layout.
                  </div>
                  <!-- /.comment-text -->
                </div>
              </div>
              <!-- /.card-footer -->
              <div class="card-footer">
                <form action="#" method="post">
                  <img class="img-fluid img-circle img-sm" src="<?php echo base_url()?>assets/dist/img/user4-128x128.jpg" alt="Alt Text">
                  <!-- .img-push is used to add margin to elements next to floating images -->
                  <div class="img-push">
                    <input type="text" class="form-control form-control-sm" placeholder="Press enter to post comment">
                  </div>
                </form>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
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
