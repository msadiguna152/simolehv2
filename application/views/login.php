<div class="osahan-signin">
	<div class="p-3">
		<h2 class="my-0">Silahkan Login</h2>
		<form method="POST" action="<?php echo site_url() ?>akun/proses_login">
			<div class="form-group">
				<label for="exampleInputEmail1">Username</label>
				<input placeholder="Masukan USername..." type="text" name="username" class="form-control"
					   id="exampleInputEmail1" aria-describedby="emailHelp" required="">
			</div>
			<div class="form-group">
				<label for="exampleInputPassword1">Password</label>
				<input placeholder="Masukan Password..." type="password" name="password" class="form-control"
					   id="exampleInputPassword1" required="">
			</div>
			<button type="submit" class="btn btn-success btn-md rounded btn-block">Login</button>
		</form>
		<p class="text-muted text-center small m-0 py-3">Atau</p>
		<a href="<?= base_url() ?>/akun/registrasi" class="btn btn-info btn-block rounded btn-md btn-google">
			<i class="icofont-user text-danger mr-2"></i>Buat Akun
		</a>
	</div>
</div>

<div class="p-3 mt-5" id="detail-checkout-href">
	<a href="<?php echo site_url('/pesanan') ?>" class="text-decoration-none">
		<div class="rounded shadow bg-success d-flex align-items-center p-3 text-white">
			<div class="more">
				<h6 class="m-0" id="subtotal">Daftar Pesanan Anda</h6>
				<p class="small m-0">Klik untuk melihat</p>
			</div>
			<div class="ml-auto"><i class="icofont-simple-right"></i></div>
		</div>
	</a>
</div>
