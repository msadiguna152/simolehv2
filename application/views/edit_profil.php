      <div class="p-3 bg-white">
         <div class="d-flex align-items-center">
            <a class="font-weight-bold text-success text-decoration-none" onclick="history.back(-1)"><i class="icofont-rounded-left back-page"></i> Kembali</a>
         </div>
      </div>
      <div class="osahan-account">
         <div class="p-4 profile text-center border-bottom">
            <img style="height: 100px; width: 100px;" src="<?= base_url()?>assets2/img/<?= $this->session->userdata('foto_pengguna'); ?>" class="img-fluid rounded-pill">
            <h6 class="font-weight-bold m-0 mt-2"><?= $this->session->userdata('nama_pengguna'); ?></h6>
            <p class="small text-muted">Email : <?= $this->session->userdata('email'); ?> | No. Telepon : <?= $this->session->userdata('no_telpon'); ?></p>
         </div>
         <div class="p-3">
            <form action="edit_profile.html">
               <div class="form-group">
                  <label for="exampleInputName1">Full Name</label>
                  <input type="text" class="form-control" id="exampleInputName1" value="Askbootstrap">
               </div>
               <div class="form-group">
                  <label for="exampleInputNumber1">Mobile Number</label>
                  <input type="number" class="form-control" id="exampleInputNumber1" value="1234567890">
               </div>
               <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" value="iamosahan@gmail.com">
               </div>
               <div class="text-center">
                  <button type="submit" class="btn btn-success btn-block btn-sm">Simpan</button>
               </div>
            </form>
         </div>
         
      </div>