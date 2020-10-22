      <div class="osahan-signin">
         <div class="p-3 bg-white">
            <div class="d-flex align-items-center">
               <a class="font-weight-bold text-success text-decoration-none" onclick="history.back(-1)"><i
                        class="icofont-rounded-left back-page"></i> Kembali</a>
            </div>
         </div>
         <div class="p-3">
            <h2 class="my-0">Buat Akun</h2>
            <form method="POST" action="<?php echo site_url()?>akun/insert" onsubmit="return formValidasi()">
               <div class="form-group">
                  <label for="nama_pembeli">Nama Lengkap</label>
                  <input type="text" name="nama_pembeli" class="form-control" placeholder="Masukan Nama Lengkap..." required="">
               </div>
               <div class="form-group">
                  <label for="no_telpon">Nomor Telepon</label>
                  <input type="text" name="no_telpon" class="form-control" placeholder="Masukan Nomor Telepon..." required="">
               </div>
               <div class="form-group">
                  <label for="email">Email</label>
                  <input type="text" name="email" class="form-control" placeholder="Masukan Email..." required="">
               </div>
               <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" name="password" id="password" class="form-control" placeholder="Masukan Password..." required="">
               </div>
               <div class="form-group">
                  <label for="password2">Konfirmasi Password</label>
                  <input type="password" name="password2" id="password2" class="form-control" placeholder="Masukan Konfirmasi Password..." required="">
               </div>
               <button type="submit" class="btn btn-primary btn-md rounded btn-block">Buat Akun</button>
               <button type="reset" class="btn btn-danger btn-md rounded btn-block">Batal</button>
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