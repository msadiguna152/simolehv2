      <div class="osahan-account">
         <div class="p-3 border-bottom">
            <div class="d-flex align-items-center">
               <h5 class="font-weight-bold m-0">AKUN KU</h5>
            </div>
         </div>
         <div class="p-4 profile text-center border-bottom">
            <img style="height: 100px; width: 100px;" src="<?= base_url()?>assets2/img/<?= $this->session->userdata('foto_pengguna'); ?>" class="img-fluid rounded-pill">
            <h6 class="font-weight-bold m-0 mt-2"><?= $this->session->userdata('nama_pengguna'); ?></h6>
            <p class="small text-muted">Email : <?= $this->session->userdata('email'); ?> | No. Telepon : <?= $this->session->userdata('no_telpon'); ?></p>
            <a href="<?= base_url(); ?>akun/edit" class="btn btn-primary btn-sm"><i class="icofont-pencil-alt-5"></i> Ubah Profil</a>
            <a onclick="return confirm('Apa Anda Yakin?')" href="<?= base_url(); ?>akun/logout" class="btn btn-danger btn-sm"><i class="icofont-exit"></i> Logout</a>
         </div>
      </div>

            <div class="p-3 mt-5" id="detail-checkout-href" style="display: none">
               <a href="<?php echo site_url('/keranjang/checkout') ?>" class="text-decoration-none">
                  <div class="rounded shadow bg-success d-flex align-items-center p-3 text-white">
                     <div class="more">
                        <h6 class="m-0" id="subtotal">Jumlah Belanja Rp.</h6>
                        <p class="small m-0">Lanjutkan untuk proses Checkout</p>
                     </div>
                     <div class="ml-auto"><i class="icofont-simple-right"></i></div>
                  </div>
               </a>
            </div>