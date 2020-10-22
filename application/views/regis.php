      <div class="osahan-signin">
         <div class="p-3">
            <h2 class="my-0">Buat Akun</h2>
            <form method="POST" action="<?php echo site_url()?>akun/insert">
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
               <button type="submit" class="btn btn-primary btn-md rounded btn-block">Buat Akun</button>
               <button type="reset" class="btn btn-danger btn-md rounded btn-block">Batal</button>
            </form>
         </div>
      </div>