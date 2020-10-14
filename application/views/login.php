      <div class="osahan-signin">
         <div class="border-bottom p-3 d-flex align-items-center">
            <a class="font-weight-bold text-success text-decoration-none" href="account-setup.html"><i class="icofont-rounded-left back-page"></i></a>
            <a class="toggle ml-auto" href="#"><i class="icofont-navigation-menu"></i></a>
         </div>
         <div class="p-3">
            <h2 class="my-0">Silahkan Login</h2>
            <form method="POST" action="<?php echo site_url()?>auth/proses_login">
               <div class="form-group">
                  <label for="exampleInputEmail1">Username</label>
                  <input placeholder="Masukan USername..." type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required="">
               </div>
               <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input placeholder="Masukan Password..." type="password" name="password" class="form-control" id="exampleInputPassword1" required="">
               </div>
               <button type="submit" class="btn btn-success btn-lg rounded btn-block">Login</button>
            </form>
            <p class="text-muted text-center small m-0 py-3">Atau</p>
            <a href="get_started.html" class="btn btn-light btn-block rounded btn-lg btn-google">
            <i class="icofont-user text-danger mr-2"></i>Buat Akun
            </a>
         </div>
      </div>