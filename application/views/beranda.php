
      <!-- home page -->
      <div class="osahan-home-page">
         <div class="border-bottom p-3">
            <div class="title d-flex align-items-center">
               <a href="home.html" class="text-decoration-none text-dark d-flex align-items-center">
                  <img class="osahan-logo mr-2" src="img/logo.svg">
                  <h4 class="font-weight-bold text-success m-0">SIMOLEH</h4>
               </a>
               <p class="ml-auto m-0">
                  <a href="notification.html" class="text-decoration-none bg-white p-1 rounded shadow-sm d-flex align-items-center">
                  <i class="text-dark icofont-notification"></i>
                  <span class="badge badge-danger p-1 ml-1 small">2</span>
                  </a>
               </p>
               <a class="toggle ml-3" href="#"><i class="icofont-navigation-menu"></i></a>
            </div>
            <a href="<?= site_url()?>pencarian" class="text-decoration-none">
               <div class="input-group mt-3 rounded shadow-sm overflow-hidden bg-white">
                  <div class="input-group-prepend">
                     <button class="border-0 btn btn-outline-secondary text-success bg-white"><i class="icofont-search"></i></button>
                  </div>
                  <input type="text" class="shadow-none border-0 form-control pl-0" placeholder="Pencarian . . ." aria-label="" aria-describedby="basic-addon1">
               </div>
            </a>
         </div>
         <!-- body -->
         <div class="osahan-body">
            <!-- categories -->
            <div class="p-3 osahan-categories">
               <h6 class="mb-2">Kategori</h6>
               <div class="row m-0">
                  <?php foreach ($data_kategori->result() as $data): ?>
                  <div class="col pl-0 pr-1 py-1">
                     <div class="bg-white shadow-sm rounded text-center  px-2 py-3 c-it">
                        <a href="<?= base_url('')?>beranda/kategori/<?= strtolower($data->nama_kategori); ?>">
                           <img src="<?php echo base_url()?>file/<?php echo $data->icon; ?>" class="img-fluid px-2">
                           <p class="m-0 pt-2 text-muted text-center"><?= $data->nama_kategori; ?></p>
                        </a>
                     </div>
                  </div>
                  <?php endforeach;?>
               </div>
            </div>

            <!-- Promos -->
            <div class="py-3 bg-white osahan-promos shadow-sm">
               <div class="d-flex align-items-center px-3 mb-2">
                  <h6 class="m-0">Promosi Untuk Kamu</h6>
                  <a href="promos.html" class="ml-auto text-success">Lihat Semua</a>
               </div>
               <div class="promo-slider">
                  <?php foreach ($data_promosi->result() as $data): ?>
                  <div class="osahan-slider-item m-2">
                     <a href=""><img src="<?= base_url()?>file/<?php echo $data->gambar; ?>" class="img-fluid mx-auto rounded" alt="<?= $data->nama_produk; ?>"></a>
                  </div>
                  <?php endforeach;?>
               </div>
            </div>

            <!-- Pick's Today -->
            <div class="title d-flex align-items-center mb-3 mt-3 px-3">
               <h6 class="m-0">Pilih Hari Ini</h6>
               <a class="ml-auto text-success" href="picks_today.html">Lihat Semua</a>
            </div>
            <!-- pick today -->

            <div class="pick_today px-3">
               <?php $a=1; foreach ($data_kategori->result() as $data): ?>
               <div class="row <?php if ($a>=2) { echo "pt-3"; }?>">
                  <?php
                  $id_kategori = $data->id_kategori;
                  $data_produk = $this->db->query("SELECT * FROM `tb_produk` JOIN tb_kategori ON tb_produk.id_kategori=tb_kategori.id_kategori WHERE tb_produk.id_kategori='$id_kategori' LIMIT 2"); 
                  foreach ($data_produk->result() as $data_p): ?>

                  <div class="col-6">
                     <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                        <div class="list-card-image">
                           <a href="product_details.html" class="text-dark">
                              <div class="member-plan position-absolute">
                                 <span class="badge mt-3 mb-3 ml-3 badge-success"><?= $data_p->nama_kategori; ?></span>
                                 <span class="badge badge-warning">5%</span>
                              </div>
                              <div class="p-3">
                                 <img src="<?= base_url()?>file/<?= $data_p->gambar;?>" class="img-fluid item-img w-100 mb-3">
                                 <h6><?= $data_p->nama_produk; ?></h6>
                                 <p><?= $data_p->deskripsi; ?></p>
                                 <div class="d-flex align-items-center">
                                    <h6 class="price m-0 text-success"><?= "Rp " . number_format($data_p->harga,2,',','.'); ?></h6>
                           <a class="ml-auto" href="cart.html">
                           <div class="input-group input-spinner ml-auto cart-items-number">
                           <div class="input-group-prepend">
                           <button class="btn btn-success btn-sm" type="button" id="button-plus"> + </button>
                           </div>
                           <input type="text" class="form-control" value="1">
                           <div class="input-group-append">
                           <button class="btn btn-success btn-sm" type="button" id="button-minus"> − </button>
                           </div>
                           </div>
                           </a>
                           </div>
                           </div>
                           </a>
                        </div>
                     </div>
                  </div>
                  <?php endforeach;?>
               </div>
               <?php $a++; endforeach;?>
            </div>

            <!-- Most sales -->
            <div class="title d-flex align-items-center p-3">
            </div>

         </div>
      </div>
      <!-- Footer -->
