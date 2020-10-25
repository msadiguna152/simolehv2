      <div class="p-3 bg-white">
         <div class="d-flex align-items-center">
            <a class="font-weight-bold text-success text-decoration-none" onclick="history.back(-1)"><i class="icofont-rounded-left back-page"></i> Kembali</a>
         </div>
      </div>
      <div class="osahan-account">
         <div class="p-4 profile text-center border-bottom">
            <img style="height: 100px; width: 100px;" src="<?= base_url()?>pengaturan/<?= $this->session->userdata('foto_pengguna'); ?>" class="img-fluid rounded-pill">
            <h6 class="font-weight-bold m-0 mt-2"><?= htmlspecialchars($this->session->userdata('nama_pengguna')); ?></h6>
            <p class="small text-muted">Email : <?= $this->session->userdata('email'); ?> | No. Telepon : <?= $this->session->userdata('no_telpon'); ?></p>
         </div>
         <div class="p-3">
            <form method="POST" action="<?= base_url();?>akun/update" onsubmit="return formValidasi()" enctype="multipart/form-data">
               <div class="form-group">
                  <label for="nama_pengguna">Nama Lengkap</label>
                  <input type="text" class="form-control" name="nama_pengguna" value="<?= htmlspecialchars($this->session->userdata('nama_pengguna')); ?>">
                  <input type="text" hidden="" name="id_pengguna" value="<?= htmlspecialchars($this->session->userdata('id_pengguna')); ?>">
               </div>
               <div class="form-group">
                  <label for="no_telpon">Nomor Telepon</label>
                  <input type="number" maxlength="14" min="-1" class="form-control" name="no_telpon" value="<?= htmlspecialchars($this->session->userdata('no_telpon')); ?>">
               </div>
               <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" name="email" value="<?= htmlspecialchars($this->session->userdata('email')); ?>">
               </div>
               <div class="form-group">
                  <label for="password">Password Baru</label>
                  <input type="password" name="password" id="password" class="form-control" placeholder="Masukan Password Baru...">
               </div>
               <div class="form-group">
                  <label for="password2">Konfirmasi Password Baru</label>
                  <input type="password" name="password2" id="password2" class="form-control" placeholder="Masukan Konfirmasi Password Baru...">
               </div>
               <div class="form-group">
                  <label for="foto_pengguna">Foto Profil</label>
                  <input type="file" name="foto_pengguna" class="form-control" placeholder="Pilih File Foto...">
               </div>
               <div class="text-center">
                  <button type="submit" class="btn btn-success btn-block btn-sm">Simpan</button>
               </div>
            </form>
         </div>
         
      </div>
<script type="text/javascript">
   function formValidasi() {
      var get_password_baru = document.getElementById('password').value;
      var get_kon_password_baru = document.getElementById('password2').value;
      if (get_password_baru!=get_kon_password_baru) {
        alert('Konfirmasi Password Tidak Sesuai!');
        return false;
      }
   }
</script>