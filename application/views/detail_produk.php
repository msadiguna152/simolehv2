      <div class="p-3 bg-white">
         <div class="d-flex align-items-center">
            <a class="font-weight-bold text-success text-decoration-none" onclick="history.back(-1)"><i class="icofont-rounded-left back-page"></i> Kembali</a>
         </div>
      </div>

      <?php
      foreach ($data_produk->result() as $data_p):
      ?>

      <div class="px-3 bg-white pb-3">
         <div class="pt-0">
            <h2 class="font-weight-bold"><?= htmlspecialchars($data_p->nama_produk); ?></h2>
            <p class="font-weight-light text-dark m-0 d-flex align-items-center">
               <b class="h6 text-dark m-0">Harga Produk : <?= "Rp" . number_format(htmlspecialchars($data_p->harga),0,',','.'); ?></b>
               <span class="badge badge-danger ml-2">50% OFF</span>
            </p>
         </div>
      </div>

      <div class="osahan-product">
         
         <div class="product-details">
            <div class="recommend-slider py-1">
               <div class="osahan-slider-item m-2">
                  <img src="<?= base_url() ?>file/<?= $data_p->gambar;?>" class="img-fluid mx-auto shadow-sm rounded" alt="Responsive image">
               </div>
            </div>
            <div class="details">
               <div class="p-3 bg-white">
                  <div class="d-flex align-items-center">
                    
                     <a class="ml-auto" href="">
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
               <div class="p-3">
                 
                  <p class="font-weight-bold mb-2">Deskripsi Produk</p>
                  <p class="text-muted small">
                     <?= htmlspecialchars($data_p->deskripsi); ?>
                  </p>
               </div>
            </div>
         </div>
      </div>
      <?php endforeach;?>